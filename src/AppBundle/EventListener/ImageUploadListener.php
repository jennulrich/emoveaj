<?php
namespace AppBundle\EventListener;

use AppBundle\Entity\Scooter;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PreUpdateEventArgs;
use AppBundle\Entity\Car;
use AppBundle\Entity\Brand;
use AppBundle\Service\ImageUploader;

class ImageUploadListener
{
    private $uploader;

    /**
     * ImageUploadListener constructor.
     * @param ImageUploader $uploader
     */
    public function __construct(ImageUploader $uploader)
    {
        $this->uploader = $uploader;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    public function preUpdate(PreUpdateEventArgs $args)
    {
        $entity = $args->getEntity();

        $this->uploadFile($entity);
    }

    private function uploadFile($entity)
    {
        if (!$entity instanceof Car and !$entity instanceof Scooter and !$entity instanceof Brand) {
            return;
        }

        $file = $entity->getImage();

        if ($file instanceof UploadedFile) {
            $fileName = $this->uploader->upload($file);
            $entity->setImage($fileName);
        } elseif ($file instanceof File) {
            $entity->setImage($file->getFilename());
        }
    }

    public function postLoad(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if (!$entity instanceof Car and !$entity instanceof Scooter and !$entity instanceof Brand) {
            return;
        }

        if ($fileName = $entity->getImage()) {
            $entity->setImage(new File($this->uploader->getTargetDirectory().'/'.$fileName));
        }
    }
}

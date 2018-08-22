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

        $file2 = $entity->getImage2();

        if ($file2 instanceof UploadedFile) {
            $fileName2 = $this->uploader->upload($file2);
            $entity->setImage2($fileName2);
        } elseif ($file2 instanceof File) {
            $entity->setImage2($file2->getFilename());
        }

        $file3 = $entity->getImage3();

        if ($file3 instanceof UploadedFile) {
            $fileName3 = $this->uploader->upload($file3);
            $entity->setImage2($fileName3);
        } elseif ($file3 instanceof File) {
            $entity->setImage2($file3->getFilename());
        }

        $file4 = $entity->getImage4();

        if ($file4 instanceof UploadedFile) {
            $fileName4 = $this->uploader->upload($file4);
            $entity->setImage2($fileName4);
        } elseif ($file4 instanceof File) {
            $entity->setImage2($file4->getFilename());
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

        if ($fileName2 = $entity->getImage2()) {
            $entity->setImage2(new File($this->uploader->getTargetDirectory().'/'.$fileName2));
        }

        if ($fileName3 = $entity->getImage3()) {
            $entity->setImage3(new File($this->uploader->getTargetDirectory().'/'.$fileName3));
        }

        if ($fileName4 = $entity->getImage4()) {
            $entity->setImage4(new File($this->uploader->getTargetDirectory().'/'.$fileName4));
        }
    }
}

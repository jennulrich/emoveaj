<?php

namespace AppBundle\Service;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader
{
    /** @var string $targetDirectory */
    private $targetDirectory;

    /**
     * ImageUploader constructor.
     * @param $targetDirectory
     */
    public function __construct($targetDirectory)
    {
        $this->targetDirectory = $targetDirectory;
    }

    public function upload(UploadedFile $file)
    {
        $imageName = md5(uniqid()).'.'.$file->guessExtension();

        $file->move($this->getTargetDirectory(), $imageName);

        return $imageName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}

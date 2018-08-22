<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Car
 *
 * @ORM\Table(name="car")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarRepository")
 */
class Car
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Image")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif", "image/jpg" })
     */
    private $image;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Image")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif", "image/jpg" })
     */
    private $image2;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Image")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif", "image/jpg" })
     */
    private $image3;

    /**
     * @ORM\Column(type="string")
     *
     * @Assert\NotBlank(message="Image")
     * @Assert\File(mimeTypes={ "image/jpeg", "image/png", "image/gif", "image/jpg" })
     */
    private $image4;

    /**
     * @ORM\ManyToOne(targetEntity="CarModel", inversedBy="cars", cascade={"persist" ,"remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

    /**
     * @var string
     *
     * @ORM\Column(name="matriculation", type="string", length=255)
     */
    private $matriculation;

    /**
     * @var int
     *
     * @ORM\Column(name="kilometers", type="integer")
     */
    private $kilometers;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="serial_number", type="string", length=255)
     */
    private $serialNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get matriculation
     *
     * @return string
     */
    public function getMatriculation()
    {
        return $this->matriculation;
    }

    /**
     * Set matriculation
     *
     * @param string $matriculation
     *
     * @return Car
     */
    public function setMatriculation($matriculation)
    {
        $this->matriculation = $matriculation;

        return $this;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Car
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Get serialNumber
     *
     * @return string
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * Set serialNumber
     *
     * @param string $serialNumber
     *
     * @return Car
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * Set kilometers
     *
     * @param integer $kilometers
     *
     * @return Car
     */
    public function setKilometers($kilometers)
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    /**
     * Get kilometers
     *
     * @return integer
     */
    public function getKilometers()
    {
        return $this->kilometers;
    }

    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Car
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $car_model
     * @return string
     */
    public function setModel($car_model)
    {
        $this->model = $car_model;

        return $this;
    }

    /**
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Car
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Car
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set image2
     *
     * @param string $image2
     *
     * @return Car
     */
    public function setImage2($image2)
    {
        $this->image2 = $image2;

        return $this;
    }

    /**
     * Get image2
     *
     * @return string
     */
    public function getImage2()
    {
        return $this->image2;
    }

    /**
     * Set image3
     *
     * @param string $image3
     *
     * @return Car
     */
    public function setImage3($image3)
    {
        $this->image3 = $image3;

        return $this;
    }

    /**
     * Get image3
     *
     * @return string
     */
    public function getImage3()
    {
        return $this->image3;
    }

    /**
     * Set image4
     *
     * @param string $image4
     *
     * @return Car
     */
    public function setImage4($image4)
    {
        $this->image4 = $image4;

        return $this;
    }

    /**
     * Get image4
     *
     * @return string
     */
    public function getImage4()
    {
        return $this->image4;
    }
}

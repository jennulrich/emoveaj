<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scooter
 *
 * @ORM\Table(name="scooter")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScooterRepository")
 */
class Scooter
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
     * @ORM\Column(name="serialNumber", type="string", length=255)
     */
    private $serialNumber;

    /**
     * @ORM\ManyToOne(targetEntity="ScooterModel", inversedBy="scooters", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $model;

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
     * Set reference
     *
     * @param string $reference
     *
     * @return Scooter
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
     * Set matriculation
     *
     * @param string $matriculation
     *
     * @return Scooter
     */
    public function setMatriculation($matriculation)
    {
        $this->matriculation = $matriculation;

        return $this;
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
     * Set kilometers
     *
     * @param integer $kilometers
     *
     * @return Scooter
     */
    public function setKilometers($kilometers)
    {
        $this->kilometers = $kilometers;

        return $this;
    }

    /**
     * Get kilometers
     *
     * @return int
     */
    public function getKilometers()
    {
        return $this->kilometers;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Scooter
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
     * Set serialNumber
     *
     * @param string $serialNumber
     *
     * @return Scooter
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
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
     * @param mixed $model
     * @return string
     */
    public function setModel($model)
    {
        $this->model = $model;

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
     * @return Scooter
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
}

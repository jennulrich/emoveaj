<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var Model
     * @ORM\ManyToOne(targetEntity="Model", inversedBy="cars", cascade={"persist"})
     * @ORM\JoinColumn(name="model_id", referencedColumnName="id", nullable=false)
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
     * Set model
     *
     * @param \AppBundle\Entity\Model $model
     *
     * @return Car
     */
    public function setModel(\AppBundle\Entity\Model $model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return \AppBundle\Entity\Model
     */
    public function getModel()
    {
        return $this->model;
    }
}

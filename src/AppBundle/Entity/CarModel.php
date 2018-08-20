<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * CarModel
 *
 * @ORM\Table(name="car_model")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CarModelRepository")
 */
class CarModel
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
     * @ORM\Column(name="name_model", type="string", length=255, nullable=true)
     */
    private $nameModel;

    /**
     * @var string
     *
     * @ORM\Column(name="gamme", type="string", length=255, nullable=true)
     */
    private $gamme;

    /**
     * @var string
     *
     * @ORM\Column(name="autonomie", type="string", length=255, nullable=true)
     */
    private $autonomie;

    /**
     * @ORM\OneToMany(targetEntity="Car", mappedBy="model", cascade={"remove", "persist"})
     */
    private $cars;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="carModel", cascade={"persist" ,"remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $brand;


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
     * Set autonomie
     *
     * @param string $autonomie
     *
     * @return CarModel
     */
    public function setAutonomie($autonomie)
    {
        $this->autonomie = $autonomie;

        return $this;
    }

    /**
     * Get autonomie
     *
     * @return string
     */
    public function getAutonomie()
    {
        return $this->autonomie;
    }

    /**
     * Set nameModel
     *
     * @param string $nameModel
     *
     * @return CarModel
     */
    public function setNameModel($nameModel)
    {
        $this->nameModel = $nameModel;

        return $this;
    }

    /**
     * Get nameModel
     *
     * @return string
     */
    public function getNameModel()
    {
        return $this->nameModel;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cars = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add car
     *
     * @param \AppBundle\Entity\Car $car
     *
     * @return CarModel
     */
    public function addCar(\AppBundle\Entity\Car $car)
    {
        $this->cars[] = $car;

        return $this;
    }

    /**
     * Remove car
     *
     * @param \AppBundle\Entity\Car $car
     */
    public function removeCar(\AppBundle\Entity\Car $car)
    {
        $this->cars->removeElement($car);
    }

    /**
     * Get cars
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCars()
    {
        return $this->cars;
    }

    /**
     * @param mixed $brand
     * @return string
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return string
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set gamme
     *
     * @param string $gamme
     *
     * @return CarModel
     */
    public function setGamme($gamme)
    {
        $this->gamme = $gamme;

        return $this;
    }

    /**
     * Get gamme
     *
     * @return string
     */
    public function getGamme()
    {
        return $this->gamme;
    }
}

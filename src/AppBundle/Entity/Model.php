<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Model
 *
 * @ORM\Table(name="model")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModelRepository")
 */
class Model
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
     * @ORM\Column(name="brand", type="string", length=255, nullable=true)
     */
    private $brand;

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
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="Car", mappedBy="model", cascade={"remove", "persist"})
     */
    private $cars;


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
     * Set brand
     *
     * @param string $brand
     *
     * @return Model
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
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
     * @return Model
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

    /**
     * Set autonomie
     *
     * @param string $autonomie
     *
     * @return Model
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
     * @return Model
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
     * @return Model
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
}

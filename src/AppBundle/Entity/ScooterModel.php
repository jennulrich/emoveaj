<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ScooterModel
 *
 * @ORM\Table(name="scooter_model")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScooterModelRepository")
 */
class ScooterModel
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
     * @ORM\Column(name="nameModel", type="string", length=255)
     */
    private $nameModel;

    /**
     * @var string
     *
     * @ORM\Column(name="gamme", type="string", length=255)
     */
    private $gamme;

    /**
     * @var string
     *
     * @ORM\Column(name="autonomie", type="string", length=255)
     */
    private $autonomie;

    /**
     * @ORM\OneToMany(targetEntity="Scooter", mappedBy="model", cascade={"remove", "persist"})
     */
    private $scooters;

    /**
     * @ORM\ManyToOne(targetEntity="Brand", inversedBy="scooterModel", cascade={"persist" ,"remove"})
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
     * Set nameModel
     *
     * @param string $nameModel
     *
     * @return ScooterModel
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
     * Set gamme
     *
     * @param string $gamme
     *
     * @return ScooterModel
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
     * @return ScooterModel
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
     * Constructor
     */
    public function __construct()
    {
        $this->scooters = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add scooter
     *
     * @param \AppBundle\Entity\Scooter $scooter
     *
     * @return ScooterModel
     */
    public function addScooter(\AppBundle\Entity\Scooter $scooter)
    {
        $this->scooters[] = $scooter;

        return $this;
    }

    /**
     * Remove scooter
     *
     * @param \AppBundle\Entity\Scooter $scooter
     */
    public function removeScooter(\AppBundle\Entity\Scooter $scooter)
    {
        $this->scooters->removeElement($scooter);
    }

    /**
     * Get scooters
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScooters()
    {
        return $this->scooters;
    }

    /**
     * Set brand
     *
     * @param \AppBundle\Entity\Brand $brand
     *
     * @return ScooterModel
     */
    public function setBrand(\AppBundle\Entity\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \AppBundle\Entity\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }
}

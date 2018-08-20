<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Brand
 *
 * @ORM\Table(name="brand")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BrandRepository")
 */
class Brand
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="CarModel", mappedBy="brand", cascade={"remove", "persist"})
     */
    private $carModel;

    /**
     * @ORM\OneToMany(targetEntity="ScooterModel", mappedBy="brand", cascade={"remove", "persist"})
     */
    private $scooterModel;
    
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
     * Set name
     *
     * @param string $name
     *
     * @return Brand
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->carModel = new \Doctrine\Common\Collections\ArrayCollection();
        $this->scooterModel = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add carModel
     *
     * @param \AppBundle\Entity\CarModel $carModel
     *
     * @return Brand
     */
    public function addCarModel(\AppBundle\Entity\CarModel $carModel)
    {
        $this->carModel[] = $carModel;

        return $this;
    }

    /**
     * Remove carModel
     *
     * @param \AppBundle\Entity\CarModel $carModel
     */
    public function removeCarModel(\AppBundle\Entity\CarModel $carModel)
    {
        $this->carModel->removeElement($carModel);
    }

    /**
     * Get carModel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCarModel()
    {
        return $this->carModel;
    }

    /**
     * Add scooterModel
     *
     * @param \AppBundle\Entity\ScooterModel $scooterModel
     *
     * @return Brand
     */
    public function addScooterModel(\AppBundle\Entity\ScooterModel $scooterModel)
    {
        $this->scooterModel[] = $scooterModel;

        return $this;
    }

    /**
     * Remove scooterModel
     *
     * @param \AppBundle\Entity\ScooterModel $scooterModel
     */
    public function removeScooterModel(\AppBundle\Entity\ScooterModel $scooterModel)
    {
        $this->scooterModel->removeElement($scooterModel);
    }

    /**
     * Get scooterModel
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getScooterModel()
    {
        return $this->scooterModel;
    }
}

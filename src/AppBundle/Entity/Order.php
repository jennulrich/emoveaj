<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Orders
 *
 * @ORM\Table(name="`order`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OrderRepository")
 */
class Order
{
    const STATUS_IN_PREPARE = 1;
    const STATUS_SENT = 2;
    const STATUS_CANCELED = 3;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="string", length=255)
     */
    private $comment;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_paid", type="boolean")
     */
    private $isPaid;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * Order constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->isPaid = false;
        $this->status = self::STATUS_IN_PREPARE;
    }

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
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Order
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Order
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set isPaid
     *
     * @param boolean $isPaid
     *
     * @return Order
     */
    public function setIsPaid($isPaid)
    {
        $this->isPaid = $isPaid;

        return $this;
    }

    /**
     * Get isPaid
     *
     * @return bool
     */
    public function getIsPaid()
    {
        return $this->isPaid;
    }

    /**
     * Set status
     *
     * @param integer $status
     *
     * @return Order
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }
}


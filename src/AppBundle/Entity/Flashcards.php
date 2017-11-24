<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flashcards
 *
 * @ORM\Table(name="flashcards", uniqueConstraints={@ORM\UniqueConstraint(name="uid", columns={"uid"})}, indexes={@ORM\Index(name="owner", columns={"owner"})})
 * @ORM\Entity
 */
class Flashcards
{
    /**
     * @var string
     *
     * @ORM\Column(name="frontside", type="string", length=200, nullable=false)
     */
    private $frontside;

    /**
     * @var string
     *
     * @ORM\Column(name="backside", type="string", length=200, nullable=false)
     */
    private $backside;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="create_date", type="datetime", nullable=false)
     */
    private $createDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="modify_date", type="datetime", nullable=false)
     */
    private $modifyDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="uid", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $uid;

    /**
     * @var \AppBundle\Entity\AppUsers
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AppUsers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="owner", referencedColumnName="id")
     * })
     */
    private $owner;


}


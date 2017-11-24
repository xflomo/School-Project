<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserDeck
 *
 * @ORM\Table(name="user_deck", uniqueConstraints={@ORM\UniqueConstraint(name="uid", columns={"uid"}), @ORM\UniqueConstraint(name="share_code", columns={"share_code"})}, indexes={@ORM\Index(name="owner", columns={"owner"})})
 * @ORM\Entity
 */
class UserDeck
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=15, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="share_code", type="string", length=10, nullable=false)
     */
    private $shareCode;

    /**
     * @var boolean
     *
     * @ORM\Column(name="shareable", type="boolean", nullable=false)
     */
    private $shareable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deleted", type="boolean", nullable=false)
     */
    private $deleted = '0';

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


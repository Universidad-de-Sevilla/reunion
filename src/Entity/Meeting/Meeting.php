<?php

namespace US\Reunion\Entity\Meeting;

use Doctrine\ORM\Mapping as ORM;
use US\Reunion\Entity\Person\Group;
use US\Reunion\Entity\Person\Person;

/**
 * @ORM\Entity
 * @ORM\Table(name="Meeting")
 */
class Meeting
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="US\Reunion\Entity\Person\Person")
     * @var Person
     */
    private $creator;

    /**
     * @ORM\ManyToOne(targetEntity="US\Reunion\Entity\Person\Person")
     * @var Person
     */
    private $president;

    /**
     * @ORM\ManyToOne(targetEntity="US\Reunion\Entity\Person\Person")
     * @var Person
     */
    private $secretary;

    /**
     * @ORM\ManyToOne(targetEntity="US\Reunion\Entity\Person\Group", inversedBy="meetings")
     * @var Group
     */
    private $group;

    /**
     * @ORM\ManyToOne(targetEntity="US\Reunion\Entity\Meeting\Status")
     * @var Status
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     * @var int
     */
    private $order;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $place;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $creationDate;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $modifyDate;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $estimatedStartDate;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $estimatedDuration;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $start;

    /**
     * @ORM\Column(type="datetime")
     * @var \DateTime
     */
    private $duration;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $privateNotes;

    /**
     * @ORM\Column(type="text")
     * @var string
     */
    private $publicNotes;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param int $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace($place)
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param string $creationDate
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return string
     */
    public function getModifyDate()
    {
        return $this->modifyDate;
    }

    /**
     * @param string $modifyDate
     */
    public function setModifyDate($modifyDate)
    {
        $this->modifyDate = $modifyDate;
    }

    /**
     * @return string
     */
    public function getEstimatedStartDate()
    {
        return $this->estimatedStartDate;
    }

    /**
     * @param string $estimatedStartDate
     */
    public function setEstimatedStartDate($estimatedStartDate)
    {
        $this->estimatedStartDate = $estimatedStartDate;
    }

    /**
     * @return string
     */
    public function getEstimatedDuration()
    {
        return $this->estimatedDuration;
    }

    /**
     * @param string $estimatedDuration
     */
    public function setEstimatedDuration($estimatedDuration)
    {
        $this->estimatedDuration = $estimatedDuration;
    }

    /**
     * @return string
     */
    public function getStart()
    {
        return $this->start;
    }

    /**
     * @param string $start
     */
    public function setStart($start)
    {
        $this->start = $start;
    }

    /**
     * @return string
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return Person
     */
    public function getCreator()
    {
        return $this->creator;
    }

    /**
     * @param Person $creator
     */
    public function setCreator($creator)
    {
        $this->creator = $creator;
    }

    /**
     * @return Person
     */
    public function getPresident()
    {
        return $this->president;
    }

    /**
     * @param Person $president
     */
    public function setPresident($president)
    {
        $this->president = $president;
    }

    /**
     * @return Person
     */
    public function getSecretary()
    {
        return $this->secretary;
    }

    /**
     * @param Person $secretary
     */
    public function setSecretary($secretary)
    {
        $this->secretary = $secretary;
    }

    /**
     * @return Group
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

    /**
     * @return Status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param Status $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getPrivateNotes()
    {
        return $this->privateNotes;
    }

    /**
     * @param string $privateNotes
     */
    public function setPrivateNotes($privateNotes)
    {
        $this->privateNotes = $privateNotes;
    }

    /**
     * @return string
     */
    public function getPublicNotes()
    {
        return $this->publicNotes;
    }

    /**
     * @param string $publicNotes
     */
    public function setPublicNotes($publicNotes)
    {
        $this->publicNotes = $publicNotes;
    }

}
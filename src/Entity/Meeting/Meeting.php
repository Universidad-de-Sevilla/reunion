<?php

namespace US\Reunion\Entity\Meeting;

/**
 * @Entity
 * @Table(name="Meeting")
 */
class Meeting
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idCreator;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idPresident;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idSecretary;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idGroup;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idStatus;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $number;

    /**
     * @Column(type="string")
     * @var int
     */
    private $shortName;

    /**
     * @Column(type="string")
     * @var string
     */
    private $largeName;


    /**
     * @Column(type="string")
     * @var string
     */
    private $place;

    /**
     * @Column(type="string")
     * @var string
     */
    private $followUp;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $creationDate;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $modifyDate;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $estimatedStartDate;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $estimatedDuration;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $start;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $duration;


    /**
     * @Column(type="text")
     * @var text
     */
    private $note;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getIdCreator()
    {
        return $this->idCreator;
    }

    /**
     * @param int $idCreator
     */
    public function setIdCreator($idCreator)
    {
        $this->idCreator = $idCreator;
    }

    /**
     * @return int
     */
    public function getIdPresident()
    {
        return $this->idPresident;
    }

    /**
     * @param int $idPresident
     */
    public function setIdPresident($idPresident)
    {
        $this->idPresident = $idPresident;
    }

    /**
     * @return int
     */
    public function getIdSecretary()
    {
        return $this->idSecretary;
    }

    /**
     * @param int $idSecretary
     */
    public function setIdSecretary($idSecretary)
    {
        $this->idSecretary = $idSecretary;
    }

    /**
     * @return int
     */
    public function getIdGroup()
    {
        return $this->idGroup;
    }

    /**
     * @param int $idGroup
     */
    public function setIdGroup($idGroup)
    {
        $this->idGroup = $idGroup;
    }

    /**
     * @return int
     */
    public function getIdStatus()
    {
        return $this->idStatus;
    }

    /**
     * @param int $idStatus
     */
    public function setIdStatus($idStatus)
    {
        $this->idStatus = $idStatus;
    }

    /**
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param int $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return int
     */
    public function getShortName()
    {
        return $this->shortName;
    }

    /**
     * @param int $shortName
     */
    public function setShortName($shortName)
    {
        $this->shortName = $shortName;
    }

    /**
     * @return string
     */
    public function getLargeName()
    {
        return $this->largeName;
    }

    /**
     * @param string $largeName
     */
    public function setLargeName($largeName)
    {
        $this->largeName = $largeName;
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
    public function getFollowUp()
    {
        return $this->followUp;
    }

    /**
     * @param string $followUp
     */
    public function setFollowUp($followUp)
    {
        $this->followUp = $followUp;
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
     * @return text
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param text $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

}
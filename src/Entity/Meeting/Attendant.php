<?php

namespace US\Reunion\Entity\Meeting;

/**
 * @Entity
 * @Table(name="MeetingAttendant")
 */
class Attendant
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
    private $idMeeting;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idPerson;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idGuest;

    /**
     * @Column(type="integer",nullable=true))
     * @var int
     */
    private $idNotify;

    /**
     * @Column(type="integer",nullable=true)
     * @var int
     */
    private $idAprobation;

    /**
     * @Column(type="integer",nullable=true))
     * @var int
     */
    private $idStatus;

    /**
     * @Column(type="datetime",nullable=true))
     * @var string
     */
    private $approbationDate;

    /**
     * @Column(type="string",nullable=true))
     * @var string
     */
    private $approbationText;

    /**
     * @Column(type="text",nullable=true))
     * @var string
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
    public function getIdMeeting()
    {
        return $this->idMeeting;
    }

    /**
     * @param int $idMeeting
     */
    public function setIdMeeting($idMeeting)
    {
        $this->idMeeting = $idMeeting;
    }

    /**
     * @return int
     */
    public function getIdPerson()
    {
        return $this->idPerson;
    }

    /**
     * @param int $idPerson
     */
    public function setIdPerson($idPerson)
    {
        $this->idPerson = $idPerson;
    }

    /**
     * @return int
     */
    public function getIdNotify()
    {
        return $this->idNotify;
    }

    /**
     * @param int $idNotify
     */
    public function setIdNotify($idNotify)
    {
        $this->idNotify = $idNotify;
    }

    /**
     * @return int
     */
    public function getIdAprobation()
    {
        return $this->idAprobation;
    }

    /**
     * @param int $idAprobation
     */
    public function setIdAprobation($idAprobation)
    {
        $this->idAprobation = $idAprobation;
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
     * @return string
     */
    public function getApprobationDate()
    {
        return $this->approbationDate;
    }

    /**
     * @param string $approbationDate
     */
    public function setApprobationDate($approbationDate)
    {
        $this->approbationDate = $approbationDate;
    }

    /**
     * @return string
     */
    public function getApprobationText()
    {
        return $this->approbationText;
    }

    /**
     * @param string $approbationText
     */
    public function setApprobationText($approbationText)
    {
        $this->approbationText = $approbationText;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * @param string $note
     */
    public function setNote($note)
    {
        $this->note = $note;
    }

    /**
     * @return int
     */
    public function getIdGuest()
    {
        return $this->idGuest;
    }

    /**
     * @param int $idGuest
     */
    public function setIdGuest($idGuest)
    {
        $this->idGuest = $idGuest;
    }



}
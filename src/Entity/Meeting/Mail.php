<?php

namespace US\Reunion\Entity\Meeting;

/**
 * @Entity
 * @Table(name="MeetingMail")
 */
class Mail
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
    private $idStatus;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idMeeting;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idType;

    /**
     * @Column(type="text")
     * @var text
     */
    private $body;

    /**
     * @Column(type="string")
     * @var string
     */
    private $updateDate;

    /**
     * @Column(type="string")
     * @var string
     */
    private $sendDate;

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
    public function getIdType()
    {
        return $this->idType;
    }

    /**
     * @param int $idType
     */
    public function setIdType($idType)
    {
        $this->idType = $idType;
    }

    /**
     * @return text
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param text $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }

    /**
     * @return string
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * @param string $updateDate
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    }

    /**
     * @return string
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * @param string $sendDate
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;
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
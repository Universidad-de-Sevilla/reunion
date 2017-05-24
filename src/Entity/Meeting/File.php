<?php

namespace US\Reunion\Entity\Meeting;

/**
 * @Entity
 * @Table(name="MeetingFile")
 */
class MeetingFile
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
    private $idNumero;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $date;

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
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getIdNumero()
    {
        return $this->idNumero;
    }

    /**
     * @param int $idNumero
     */
    public function setIdNumero($idNumero)
    {
        $this->idNumero = $idNumero;
    }

    /**
     * @return string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getNameFile()
    {
        return $this->nameFile;
    }

    /**
     * @param string $nameFile
     */
    public function setNameFile($nameFile)
    {
        $nameFile = $this->clearName($nameFile);
        $this->nameFile = $nameFile;
    }

    /**
     * @Column(type="string")
     * @var string
     */
    private $title;

    /**
     * @Column(type="string")
     * @var string
     */
    private $description;

    /**
     * @Column(type="string")
     * @var string
     */
    private $nameFile;

    /**
     * @param $nameFile
     * @return bool
     */
    private function clearName($nameFile)
    {
        return true;
    }

}
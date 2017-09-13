<?php

namespace US\Reunion\Entity\Meeting;

/**
 * @Entity
 * @Table(name="MeetingMailMember")
 */
class MailMember
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
    private $idMail;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idAttendant;

    /**
     * @Column(type="string")
     * @var string
     */
    private $email;

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
    public function getIdMail()
    {
        return $this->idMail;
    }

    /**
     * @param int $idMail
     */
    public function setIdMail($idMail)
    {
        $this->idMail = $idMail;
    }

    /**
     * @return int
     */
    public function getIdAttendant()
    {
        return $this->idAttendant;
    }

    /**
     * @param int $idAttendant
     */
    public function setIdAttendant($idAttendant)
    {
        $this->idAttendant = $idAttendant;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

}
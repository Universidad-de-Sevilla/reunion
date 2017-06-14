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
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
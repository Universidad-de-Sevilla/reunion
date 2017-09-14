<?php

namespace US\Reunion\Entity\Person;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM/Entity
 * @ORM/Table(name="Team")
 */
class Group
{
    /**
     * @ORM/Id
     * @ORM/Column(type="integer")
     * @ORM/GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM/Column(type="string")
     * @var string
     */
    private $description;

    /**
     * @ORM/OneToMany(targetEntity="US\Reunion\Entity\Person\Member", mappedBy="group")
     * @var Member[]
     */
    private $members;

    /**
     * @ORM/Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @ORM/Column(type="datetime")
     * @var string
     */
    private $startDate;

    /**
     * @ORM/Column(type="datetime")
     * @var string
     */
    private $endDate;


    /**
     * @param array $data
     */
    public function __construct($data)
    {
        foreach ($data as $name => $value) {
            $this->$name = $value;
        }
        $this->miembros = new ArrayCollection();
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
     * @return string
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param string $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param Member $member
     */
    public function addMember($member)
    {
        $this->members[] = $member;
    }

     /**
     * @return Member[]
     */
    public function getMembers()
    {
        return $this->members;
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
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param string $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }


}
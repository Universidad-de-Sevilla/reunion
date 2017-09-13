<?php

namespace US\Reunion\Entity\Person;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="Group")
 */
class Group
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(type="string")
     * @var string
     */
    private $name;

    /**
     * @Column(type="string")
     * @var string
     */
    private $descripcion;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $startDate;

    /**
     * @Column(type="datetime")
     * @var string
     */
    private $endDate;

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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param string $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
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



//    /**
//     * @OneToMany(targetEntity="US\Reunion\Entity\Person\Member", mappedBy="group")
//     * @var Member[]
//     */
//    private $members;

//    /**
//     * @param array $data
//     */
//    public function __construct($data)
//    {
//        foreach ($data as $name => $value) {
//            $this->$name = $value;
//        }
//        $this->miembros = new ArrayCollection();
//    }

//    /**
//     * @return int
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @return string
//     */
//    public function getName()
//    {
//        return $this->name;
//    }
//
//    /**
//     * @param string $name
//     */
//    public function setName($name)
//    {
//        $this->name = $name;
//    }
//
//    /**
//     * @return Member[]
//     */
//    public function getMembers()
//    {
//        return $this->members;
//    }
//
//    /**
//     * @param Member $member
//     */
//    public function addMember($member)
//    {
//        $this->members[] = $member;
//    }

}
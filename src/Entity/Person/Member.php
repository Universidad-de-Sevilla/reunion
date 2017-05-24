<?php

namespace US\Reunion\Entity\Person;

/**
 * @Entity
 * @Table(name="Member")
 */
class Member
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
    private $idRol;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $idPersona;

    /**
     * @Column(type="integer")
     * @var int
     */
    private $group;

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
     * @return int
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * @param int $idRol
     */
    public function setIdRol($idRol)
    {
        $this->idRol = $idRol;
    }

    /**
     * @return int
     */
    public function getIdPersona()
    {
        return $this->idPersona;
    }

    /**
     * @param int $idPersona
     */
    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }

    /**
     * @return int
     */
    public function getIdGrupo()
    {
        return $this->idGrupo;
    }

    /**
     * @param int $idGrupo
     */
    public function setIdGrupo($idGrupo)
    {
        $this->idGrupo = $idGrupo;
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
//     * OneToMany(targetEntity="Person")
//     * @var Person
//     */
//    private $person;
//
//    /**
//     * OneToMany(targetEntity="Group")
//     * @var Group
//     */
//    private $group;
//
//    /**
//     * @ManyToOne(targetEntity="Role")
//     * @var Role
//     */
//    private $role;
//
//    /**
//     * @return int
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPerson()
//    {
//        return $this->person;
//    }
//
//    /**
//     * @param mixed $person
//     */
//    public function setPerson($person)
//    {
//        $this->person = $person;
//    }
//
//    /**
//     * @return Group
//     */
//    public function getGroup()
//    {
//        return $this->group;
//    }
//
//    /**
//     * @param Group $group
//     */
//    public function setGroup($group)
//    {
//        $this->group = $group;
//    }
//
//    /**
//     * @return Role
//     */
//    public function getRole()
//    {
//        return $this->role;
//    }
//
//    /**
//     * @param Role $role
//     */
//    public function setRole($role)
//    {
//        $this->role = $role;
//    }
//
//

}

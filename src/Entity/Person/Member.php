<?php

namespace US\Reunion\Entity\Person;

/**
 * @Entity
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
     * OneToMany(targetEntity="Person")
     * @var Person
     */
    private $person;

    /**
     * OneToMany(targetEntity="Group")
     * @var Group
     */
    private $group;

    /**
     * @ManyToOne(targetEntity="MemberRole")
     * @var MemberRole
     */
    private $role;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPerson()
    {
        return $this->person;
    }

    /**
     * @param mixed $person
     */
    public function setPerson($person)
    {
        $this->person = $person;
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
     * @return Role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param Role $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

}

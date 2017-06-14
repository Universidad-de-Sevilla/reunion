<?php

namespace US\Reunion\Entity;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity
 * @Table(name="Team")
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
     * @OneToMany(targetEntity="US\Reunion\Entity\Member", mappedBy="group")
     * @var Member[]
     */
    private $members;

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
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return Member[]
     */
    public function getMembers()
    {
        return $this->members;
    }

    /**
     * @param Member $member
     */
    public function addMember($member)
    {
        $this->members[] = $member;
    }

}
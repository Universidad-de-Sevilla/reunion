<?php

namespace US\Reunion\Entity\Person;

/**
 * @Entity
 * @Table(name="MemberRole")
 */
class MemberRole
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(type="string", unique=TRUE, nullable=FALSE)
     * @var string
     */
    private $name;

    /**
     * @param array $data
     */
    public function __construct($data)
    {
        foreach ($data as $name => $value) {
            $this->$name = $value;
        }
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

}
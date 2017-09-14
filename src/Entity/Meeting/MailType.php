<?php

namespace US\Reunion\Entity\Meeting;

/**
 * @ORM\Entity
 * @ORM\Table(name="MeetingMailType")
 */
class MailType
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
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
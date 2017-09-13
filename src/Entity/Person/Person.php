<?php

namespace US\Reunion\Entity\Person;


use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @Entity
 * @Table(name="Person")
 */
class Person
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    private $id;

    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @Column(type="string", length=150, unique=TRUE)
     * @var EmailAddress
     */
    private $email;

    /**
     * @Column(type="string", length=150)
     * @var string
     */
    private $firstName;

    /**
     * @Column(type="string", length=150)
     * @var string
     */
    private $lastName;

    /**
     * @Column(type="datetime")
     * @var \DateTime
     */
    private $modifiedAt;

    /**
     * @Column(type="string", nullable=TRUE, length=50)
     * @var string
     */
    private $phoneNumber;

    /**
     * Person constructor.
     * @param array $data
     */
    public function __construct($data)
    {
        foreach ($data as $name => $value) {
            $this->$name = $value;
        }
        $this->createdAt = new \DateTime('now');
        $this->modifiedAt = new \DateTime('now');
    }

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
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTime $createdAt
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return EmailAddress
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param EmailAddress $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * @param \DateTime $modifiedAt
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    static public function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('email', new Assert\NotBlank());
        // TODO: For unique email condition see:
        // http://stackoverflow.com/questions/20575033/silex-symfony-form-validator-ensure-a-value-is-unique

    }
}

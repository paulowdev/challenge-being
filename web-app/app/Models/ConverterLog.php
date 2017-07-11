<?php
namespace App\Models;
/**
 * @Entity @Table(name="converter_logs")
 */
class ConverterLog extends BaseModel
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $filename;
    /**
     * @Column(name="created_at", type="datetime")
     * @var DateTime
     */
    protected $createdAt;


    public function __construct()
    {
        parent::__construct();
        $this->setCreatedAt(new \DateTime());
    }


    public function save()
    {
        $this->em->persist($this);
        $this->em->flush();
    }


    // Getters and Setters
    public function getId()
    {
        return $this->id;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getFilename()
    {
        return $this->filename;
    }

    public function setFilename($filename)
    {
        $this->filename = $filename;
    }

    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    public function setCreatedAt($datetime)
    {
        $this->createdAt = $datetime;
    }
}
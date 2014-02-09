<?php

namespace WodorNet\PrintShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="TaskRepository")
 */
class Task
{
    const STATUS_READY = 'ready';
    const STATUS_INPROGRESS = 'in progress';
    const STATUS_ONHOLD = 'on hold';
    const STATUS_DONE = 'done';
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $number;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $status;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $deadline;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="tasks")
     * @ORM\JoinColumn(name="customer_id", referencedColumnName="id")
     */
    private $customer;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $title;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $priority;

    /**
     * @var MachineModel
     * @ORM\ManyToOne(targetEntity="MachineModel", inversedBy="machines")
     * @ORM\JoinColumn(name="machinemodel_id", referencedColumnName="id")
     */
    private $machineModel;

    /**
     * @param string $number
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param \WodorNet\PrintShopBundle\Entity\Customer $customer
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return \WodorNet\PrintShopBundle\Entity\Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param \DateTime $deadline
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;
    }

    /**
     * @return \DateTime
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param \WodorNet\PrintShopBundle\Entity\MachineModel $machineModel
     */
    public function setMachineModel($machineModel)
    {
        $this->machineModel = $machineModel;
    }

    /**
     * @return \WodorNet\PrintShopBundle\Entity\MachineModel
     */
    public function getMachineModel()
    {
        return $this->machineModel;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

}

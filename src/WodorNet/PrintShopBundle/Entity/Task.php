<?php

namespace WodorNet\PrintShopBundle\Entity;

class Task
{
    /**
     * @var string
     */
    private $number;
    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $deadline;

    /**
     * @var Customer
     */
    private $customer;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $priority;

    /**
     * @var MachineModel
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

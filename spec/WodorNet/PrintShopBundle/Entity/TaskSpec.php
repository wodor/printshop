<?php

namespace spec\WodorNet\PrintShopBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use WodorNet\PrintShopBundle\Entity\Customer;
use WodorNet\PrintShopBundle\Entity\MachineModel;

class TaskSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WodorNet\PrintShopBundle\Entity\Task');
    }

    function it_is_assigned_to_customer()
    {
        $customer = new Customer();
        $this->setCustomer($customer);
        $this->getCustomer()->shouldReturn($customer);
    }

    function it_has_a_deadline()
    {
        $deadline = new \DateTime();
        $this->setDeadline($deadline);
        $this->getDeadline()->shouldReturn($deadline);
    }

    function it_has_a_number()
    {
        $number = '123/rf';
        $this->setNumber($number);
        $this->getNumber()->shouldReturn($number);
    }

    function it_has_a_descritpion()
    {
        $description = '123 jdaks s dlaksjklaj';
        $this->setDescription($description);
        $this->getDescription()->shouldReturn($description);
    }

    function it_has_priority()
    {
        $priority = 1;
        $this->setPriority($priority);
        $this->getPriority()->shouldReturn($priority);
    }

    function it_has_status()
    {
        $status = 'open';
        $this->setStatus($status);
        $this->getStatus()->shouldReturn($status);
    }

    function it_is_assigned_to_machine_type()
    {
        $machineModel = new MachineModel();
        $this->setMachineModel($machineModel);
        $this->getMachineModel()->shouldReturn($machineModel);
    }


}

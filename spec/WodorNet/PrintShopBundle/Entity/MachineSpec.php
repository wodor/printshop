<?php

namespace spec\WodorNet\PrintShopBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use WodorNet\PrintShopBundle\Entity\MachineModel;

class MachineSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WodorNet\PrintShopBundle\Entity\Machine');
    }

    function it_has_a_name()
    {
        $name = 'test';
        $this->setName($name);
        $this->getName()->shouldReturn($name);
    }

    function it_is_of_a_machinemodel()
    {
        $model = new MachineModel();
        $this->setModel($model);
        $this->getModel()->shouldReturn($model);
    }
}


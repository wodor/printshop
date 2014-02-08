<?php

namespace spec\WodorNet\PrintShopBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MachineModelSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WodorNet\PrintShopBundle\Entity\MachineModel');
    }

    function it_has_a_name()
    {
        $name = 'name';
        $this->setName($name);
        $this->getName()->shouldReturn($name);
    }
}

<?php

namespace spec\WodorNet\PrintShopBundle\Entity;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CustomerSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WodorNet\PrintShopBundle\Entity\Customer');
    }

    function it_has_a_name()
    {
        $name = 'test';
        $this->setName($name);
        $this->getName()->shouldReturn($name);
    }
}

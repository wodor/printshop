<?php

namespace WodorNet\PrintShopBundle\Entity;

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}

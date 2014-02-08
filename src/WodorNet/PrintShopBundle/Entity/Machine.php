<?php

namespace WodorNet\PrintShopBundle\Entity;

class Machine
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var MachineModel
     */
    private $model;

    /**
     * @param \WodorNet\PrintShopBundle\Entity\MachineModel $model
     */
    public function setModel(MachineModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return \WodorNet\PrintShopBundle\Entity\MachineModel
     */
    public function getModel()
    {
        return $this->model;
    }

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

<?php

namespace WodorNet\PrintShopBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Machine
{
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
    private $name;

    /**
     * @var MachineModel
     * @ORM\ManyToOne(targetEntity="MachineModel", inversedBy="machines")
     * @ORM\JoinColumn(name="machinemodel_id", referencedColumnName="id")
     */
    private $model;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


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

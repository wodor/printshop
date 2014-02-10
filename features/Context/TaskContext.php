<?php

namespace Context;

use Behat\Gherkin\Node\TableNode;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;
use WodorNet\PrintShopBundle\Entity\Customer;
use WodorNet\PrintShopBundle\Entity\MachineModel;
use WodorNet\PrintShopBundle\Entity\Task;

class TaskContext extends PageObjectContext
{
    /**
     * @var FeatureContext
     */
    private $serviceProvider;

    /**
     * @param FeatureContext $serviceProvider
     */
    public function __construct(FeatureContext $serviceProvider)
    {
        $this->serviceProvider = $serviceProvider;
    }

    public function getServiceProvider()
    {
        return $this->serviceProvider;
    }

    /**
     * @Given /^że są następujące zlecenia:$/
     */
    public function thereAreFollowingTasks(TableNode $table)
    {
        foreach($table->getHash() as $taskExample) {

            $customer = $this->findOrCreateCustomer(['name' => $taskExample['klient']]);
            $machineModel = $this->findOrCreateMachineModel(['name' => $taskExample['maszyna']]);
            $task = new Task();

            $task->setCustomer($customer);
            $task->setDeadline(new \DateTime($taskExample['Deadline']));
            $task->setNumber($taskExample['numer']);
            $task->setTitle($taskExample['opis']);
            $task->setDescription($taskExample['specyfikacja']);
            $task->setPriority($taskExample['priorytet']);
            $task->setStatus($this->polishToSystemStatus($taskExample['status']));
            $task->setMachineModel($machineModel);
            $this->getServiceProvider()->getEntityManager()->persist($task);
        }
        $this->getServiceProvider()->getEntityManager()->flush();
    }

    /**
     * @Given /^że są następujące modele maszyn:$/
     */
    public function zeSaNastepujaceModeleMaszyn(TableNode $table)
    {
        foreach($table->getHash() as $modelExample) {
            $model = new MachineModel();
            $model->setName($modelExample['nazwa']);
            $model->setType($modelExample['typ']);
            $this->getServiceProvider()->getEntityManager()->persist($model);
        }
        $this->getServiceProvider()->getEntityManager()->flush();
    }

    /**
     * @Given /^na pulpicie widzę nastepujace zlecenia:$/
     */
    public function naPulpicieWidzeNastepujaceZlecenia(TableNode $table)
    {
        $hash = $table->getHash();
        $dashboard = $this->getPage('Dashboard');
        $dashboard->open();
        expect($dashboard)->toHaveFollowingTasksOnTheListInOrder($hash);
    }

    /**
     * @Given /^widzę nastepujace zlecenia:$/
     */
    public function widzeNastepujaceZlecenia(TableNode $table)
    {
        $hash = $table->getHash();
        $dashboard = $this->getPage('Dashboard');
        expect($dashboard)->toHaveFollowingTasksOnTheListInOrder($hash);
    }


    /**
     * @Given /^powinienem widziec "([^"]*)" w specyfikacji zlecenia "(\d+)"$/
     */
    public function powinienemWidziecDlugitextWSpecyfikacjiZlecenia($description, $taskNumber)
    {
        $dashboard = $this->getPage('Dashboard');
        $dashboard->open();
        expect($dashboard)->toHaveFollowingValueInDescritpionOfTask($taskNumber, $description);
    }

    /**
     * @Given /^powinienem widziec "([^"]*)" w rubryce maszyna zlecenia "(\d+)"$/
     */
    public function powinienemWidziecWRubryceMaszyna($machineModel, $taskNumber)
    {
        $dashboard = $this->getPage('Dashboard');
//        $dashboard->open();
        expect($dashboard)->toHaveFollowingValueInElementOfTask($taskNumber, $machineModel, '.machinemodel');
    }

    /**
     * @Given /^powienienem widziec status "([^"]*)" dla zlecenia "([^"]*)"$/
     */
    public function powienienemWidziecStatusDlaZlecenia($status, $taskNumber)
    {
        $dashboard = $this->getPage('Dashboard');
//        $dashboard->open();
        expect($dashboard)->toHaveFollowingValueInElementOfTask($taskNumber, $status, '.status');
    }

    /**
     * @Given /^klikam przycisk statusu "([^"]*)" dla zlecenia "([^"]*)"$/
     */
    public function klikamPrzyciskDlaZlecenia($status, $number)
    {
        $task = $this->findTaskByNumber($number);
        $buttonId = 'status_' . $this->polishToSystemStatus($status) . '_' . $task->getId();
        $this->getServiceProvider()->clickLink($buttonId);
    }

    /**
     * @param $number
     * @return Task
     * @throws \LogicException
     */
    private function findTaskByNumber($number)
    {
        $repo = $this->getServiceProvider()->getTaskRepository();
        $task = $repo->findOneByNumber($number);

        if(!$task instanceof Task) {
            throw new \LogicException("Task $number not found in test db");
        }

        return $task;
    }


    private function polishToSystemStatus($statusString)
    {
        $map = array(
            'oczekujące' => Task::STATUS_READY,
            'w trakcie' => Task::STATUS_INPROGRESS,
            'wstrzymane' => Task::STATUS_ONHOLD,
            'zakończone' => Task::STATUS_DONE
        );
        return $map[mb_strtolower($statusString)];
    }

    private function findOrCreateCustomer(array $properties)
    {
        $em = $this->getServiceProvider()->getEntityManager();
        $repo = $em->getRepository("WodorNetPrintShopBundle:Customer");
        $customer = $repo->findOneByName($properties['name']);

        if(!$customer instanceof Customer) {
            $customer = new Customer();
            $customer->setName($properties['name']);
            $em->persist($customer);
        }
        return $customer;
    }

    private function findOrCreateMachineModel(array $properties)
    {
        $em = $this->getServiceProvider()->getEntityManager();
        $repo = $em->getRepository("WodorNetPrintShopBundle:MachineModel");
        $customer = $repo->findOneByName($properties['name']);

        if(!$customer instanceof MachineModel) {
            if(!isset($properties['type'])) {
                throw new \LogicException("Can't add model without type");
            }
            $customer = new MachineModel();
            $customer->setName($properties['name']);
            $em->persist($customer);
        }
        return $customer;
    }
}
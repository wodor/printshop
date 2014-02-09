<?php

namespace Context;

use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\TableNode;
use SensioLabs\Behat\PageObjectExtension\Context\PageObjectContext;
use Symfony\Component\Serializer\Exception\LogicException;
use WodorNet\PrintShopBundle\Entity\Customer;
use WodorNet\PrintShopBundle\Entity\MachineModel;
use WodorNet\PrintShopBundle\Entity\Task;

/**
 * Features context.
 */
class FeatureContext extends PageObjectContext implements KernelAwareInterface
{
    /**
    * @var KernelInterface
    */
    private $kernel = null;

    /**
     * Initializes context.
     * Every scenario gets its own context object.
     *
     * @param array $parameters context parameters (set them up through behat.yml)
     */
    public function __construct(array $parameters)
    {
        // Initialize your context here
    }

    /**
     * @param KernelInterface $kernel HttpKernel instance
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    public function getServiceProvider()
    {
        return $this;
    }

    public function getTaskRepository()
    {
        $this->getServiceProvider()->getEntityManager()->getRepository('WodorNetPrintShopBundle:Task');
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    public function getEntityManager()
    {
        return $this->getServiceProvider()->getService('doctrine.orm.entity_manager');
    }

    /**
     * Returns service.
     *
     * @param string $name
     *
     * @return mixed
     */
    private function getService($name)
    {
        return $this->kernel->getContainer()->get($name);
    }

    /**
     * @Given /^że są następujące zlecenia:$/
     */
    public function thereAreFollowingTasks(TableNode $table)
    {
        foreach($table->getHash() as $taskExample) {
            $task = new Task();
            $task->setCustomer(new Customer($taskExample['klient']));
            $task->setDeadline(new \DateTime($taskExample['Deadline']));
            $task->setNumber($taskExample['numer']);
            $task->setTitle($taskExample['opis']);
            $task->setDescription($taskExample['specyfikacja']);
            $task->setPriority($taskExample['priorytet']);
            $task->setStatus($taskExample['status']);
            $task->setMachineModel(new MachineModel('agfa'));
            $this->getServiceProvider()->getEntityManager()->persist($task);
        }
        $this->getServiceProvider()->getEntityManager()->flush();
    }
    /**
    * @Given /^że jestem zalogowany jako .*$/
    */
    public function zeJestemZalogowanyJakoKierownik()
    {
        // for now we just pretend
        //https://gist.github.com/jakzal/825496
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
        $dashboard->open();
        expect($dashboard)->toHaveFollowingValueInElementOfTask($taskNumber, $machineModel, '.machinemodel');
    }

    /**
     * @Given /^klikam na link Edytuj przy zleceniu "([^"]*)"$/
     */
    public function klikamNaLinkEdytujPrzyZleceniu($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^widzę formularz edycji zlecenia$/
     */
    public function widzeFormularzEdycjiZlecenia()
    {
        throw new PendingException();
    }

    /**
     * @Given /^zmieniam opis na "([^"]*)"$/
     */
    public function zmieniamOpisNa($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given /^klikam przycisk zapisz$/
     */
    public function klikamPrzyciskZapisz()
    {
        throw new PendingException();
    }

    /**
     * @Given /^jestem na liscie zlecen$/
     */
    public function jestemNaLiscieZlecen()
    {
        throw new PendingException();
    }

    /**
     * @Given /^widzę opis "([^"]*)"  przy zleceniu "([^"]*)"$/
     */
    public function widzeOpisPrzyZleceniu($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Given /^w historii zmian zlecenia "([^"]*)"  widzę$/
     */
    public function wHistoriiZmianZleceniaWidze($arg1, TableNode $table)
    {
        throw new PendingException();
    }

}


<?php

namespace Context;

use Behat\MinkExtension\Context\MinkContext;
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
class FeatureContext extends MinkContext implements KernelAwareInterface
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
    public function __construct(array $parameters = array())
    {
        $this->useContext('doctrine', new DoctrineContext($parameters));
        $this->useContext('task', new TaskContext($this));
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
        return $this->getServiceProvider()->getEntityManager()->getRepository('WodorNetPrintShopBundle:Task');
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
    * @Given /^że jestem zalogowany jako .*$/
    */
    public function zeJestemZalogowanyJakoKierownik()
    {
        // for now we just pretend
        //https://gist.github.com/jakzal/825496
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


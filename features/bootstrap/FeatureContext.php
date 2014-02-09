<?php

namespace Context;

use Behat\Behat\Context\ClosuredContextInterface,
    Behat\Behat\Context\TranslatedContextInterface,
    Behat\Symfony2Extension\Context\KernelAwareInterface,
    Behat\Behat\Context\BehatContext,
    Symfony\Component\HttpKernel\KernelInterface,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Features context.
 */
class FeatureContext extends RawMinkContext implements KernelAwareInterface
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
        $this->getServiceProvider()->getEntityManager()->getRepository('WodorNetPrintSopBundle:Task');
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
        $this->getTaskRepository();
        foreach($table->getHash() as $TaskExample) {
        
        }
    }
    //https://gist.github.com/jakzal/8254962
}


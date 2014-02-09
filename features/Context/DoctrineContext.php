<?php

namespace Context;

use Behat\Behat\Context\BehatContext;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Doctrine\ORM\Tools\SchemaTool;
use Symfony\Component\EventDispatcher\Event;

use Symfony\Component\HttpKernel\KernelInterface;

class DoctrineContext extends BehatContext implements KernelAwareInterface
{
    /**
     * @var KernelInterface
     */
    private $kernel;

    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @param  $event
     *
     * @BeforeScenario
     *
     * @return null
     */
    public function beforeScenario(Event $event)
    {
        $this->buildSchema();
    }

    /**
     * @param \Behat\Behat\Event\ScenarioEvent $event
     *
     * @AfterScenario
     *
     * @return null
     */
    public function afterScenario(Event $event)
    {
        $this->getEntityManager()->clear();
    }

    /**
     * @return null
     */
    protected function buildSchema()
    {
        $metadata = $this->getMetadata();

        if (!empty($metadata)) {
            $tool = new SchemaTool($this->getEntityManager());
            $tool->dropSchema($metadata);
            $tool->createSchema($metadata);
        }
    }

    /**
     * @return array
     */
    protected function getMetadata()
    {
        return $this->getEntityManager()->getMetadataFactory()->getAllMetadata();
    }

    /**
     * @return \Doctrine\ORM\EntityManager
     */
    protected function getEntityManager()
    {
        return $this->kernel->getContainer()->get('doctrine.orm.entity_manager');
    }
} 
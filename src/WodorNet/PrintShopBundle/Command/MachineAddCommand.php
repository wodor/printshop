<?php

namespace WodorNet\PrintShopBundle\Command;

use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WodorNet\PrintShopBundle\Entity\Machine;
use WodorNet\PrintShopBundle\Entity\MachineModel;

class MachineAddCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('printshop:machine:add')
            ->setDescription('Hello World example command')
            ->addArgument('task', InputArgument::REQUIRED, 'What to do' )
            ->addArgument('name', InputArgument::OPTIONAL, 'Machine name' )
            ->addArgument('modelname', InputArgument::OPTIONAL, 'Model name' );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $task = $input->getArgument('task');

        if(is_callable(array($this, $task))) {
          $this->{$task}($input, $output);
        }
        else {
            $output->writeln($task . ' is not a thing to do');
        }
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     */
    protected function add(InputInterface $input, OutputInterface $output)
    {
        $name = $input->getArgument('name');
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');

        /** @var ObjectRepository $modelRepo */
        $modelRepo = $em->getRepository('WodorNetPrintShopBundle:MachineModel');

        $modelName = $input->getArgument('modelname');
        $model = $modelRepo->findOneByName($modelName);
        if(!$model instanceof MachineModel){
           throw new \LogicException($modelName . ' not found');
        }

        $Machine = new Machine();
        $Machine->setName($name);
        $Machine->setModel($model);
        $em->persist($Machine);
        $em->flush();

        $output->writeln('Added ' . $name . ' machineModel');
    }

    protected function listall(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        /** @var ObjectRepository $repo */
        $repo = $em->getRepository('WodorNetPrintShopBundle:Machine');

        $models = $repo->findAll();

        foreach($models as $machine) {
            /** @var Machine $machine */
            $output->writeln($machine->getId() .
            ":".$machine->getName() .
            ", model:".$machine->getModel()->getName());
        }
    }

}

<?php

namespace WodorNet\PrintShopBundle\Command;

use Doctrine\Common\Persistence\ObjectRepository;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use WodorNet\PrintShopBundle\Entity\MachineModel;

class MachineModelAddCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('printshop:model:add')
            ->setDescription('Hello World example command')
            ->addArgument('task', InputArgument::REQUIRED, 'What to do' )
            ->addArgument('name', InputArgument::OPTIONAL, 'Modelname' );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $task = $input->getArgument('task');

        if(is_callable(array($this, $task))) {
          $this->{$task}($input, $output);
        }

        else{
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

        $machineModel = new MachineModel();
        $machineModel->setName($name);
        $em->persist($machineModel);
        $em->flush();

        $output->writeln('Added ' . $name . ' machineModel');
    }

    protected function listall(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        /** @var ObjectRepository $repo */
        $repo = $em->getRepository('WodorNetPrintShopBundle:MachineModel');

        $models = $repo->findAll();

        foreach($models as $model) {
            /** @var MachineModel $model */
            $output->writeln(print_r(unserialize(serialize($model)),1));
        }
    }

}

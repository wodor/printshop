<?php

namespace WodorNet\PrintShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use WodorNet\PrintShopBundle\Entity\Machine;
use WodorNet\PrintShopBundle\Entity\MachineModel;
use WodorNet\PrintShopBundle\Entity\Task;

/**
 * @Route("/dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Route("/")
     * @Template
     */
    public function indexAction()
    {
        $task = new Task();

        $task->setDescription('dlugitext');
        $task->setNumber('6');
        $task->setMachineModel(new MachineModel('agfa'));

        $taskRepository = $this->getDoctrine()->getRepository('WodorNetPrintShopBundle:Task');
        $tasks = $taskRepository->findByStatus(Task::STATUS_READY);

        return array('tasks' => $tasks);

    }
}

<?php

namespace WodorNet\PrintShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use WodorNet\PrintShopBundle\Entity\Machine;
use WodorNet\PrintShopBundle\Entity\MachineModel;
use WodorNet\PrintShopBundle\Entity\Task;

/**
 * @Route("/dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Route("/", name="printshop_dashboard")
     * @Route("/{status}", name="printshop_dashboard_status")
     * @Template
     */
    public function indexAction($status = null)
    {
        $task = new Task();

        $task->setDescription('dlugitext');
        $task->setNumber('6');
        $task->setMachineModel(new MachineModel('agfa'));

        $taskRepository = $this->getDoctrine()->getRepository('WodorNetPrintShopBundle:Task');
        $tasks = $taskRepository->findTasksForDashBoard(MachineModel::TYPE_PRINT, $status);

        return array('tasks' => $tasks);

    }

    /**
     * @Route("/task/{id}/status/{status}", name="printshop_task_setstatus")
     */
    public function setStatusAction($id, $status, Request $request)
    {
        $taskRepository = $this->getDoctrine()->getRepository('WodorNetPrintShopBundle:Task');
        $task = $taskRepository->find($id);
        if(!$task instanceof Task) {
            throw new \LogicException("Task $id not found");
        }

        $task->setStatus($status);
        $this->getDoctrine()->getManager()->persist($task);
        $this->getDoctrine()->getManager()->flush();
        return new RedirectResponse($request->headers->get('referer'));
    }
}

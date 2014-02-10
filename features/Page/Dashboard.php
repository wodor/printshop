<?php

namespace Page;

use Behat\Mink\Element\NodeElement;
use SensioLabs\Behat\PageObjectExtension\PageObject\Page;
use Symfony\Component\Serializer\Exception\LogicException;

class Dashboard extends Page
{
    protected $path = 'dashboard';


    protected $elements = array(
        'tasks' => array('css' => 'div#tasks')
    );

    public function hasFollowingTasksOnTheListInOrder($tasksHash)
    {
        $numberKey = 'numer';
        $tasks = $this->getElement('tasks')->findAll('css','div.task');
        $tasksList = array_column($tasksHash, $numberKey, $numberKey);
        $tasksFound  = array();
        foreach($tasks as $taskElement) {
            $taskId = substr($taskElement->getAttribute('id'), 5);
            $tasksFound[$taskId] = $taskId;
        }

        $notFound = array_diff($tasksList, $tasksFound);
        if(!empty($notFound)) {
//            return false;
            throw new LogicException("Expected to see Tasks: " .
                implode(', ', $tasksList) . ", not found: ".
                implode(', ', $notFound));
        }

        if($tasksList !==$tasksFound) {
            throw new LogicException("Expected to see Tasks: " .
                implode(', ', $tasksList) . ", but have: ".
                implode(', ', $tasksFound) . " in wrong order");
        }

        return true;
    }

    public function hasFollowingValueInDescritpionOfTask($number, $description)
    {
        return $this->hasFollowingValueInElementOfTask($number, $description, '.description');
    }


    public function hasFollowingValueInElementOfTask($number, $value, $elementSelector)
    {
        $taskidSelector = 'div#task_' . $number;
        $task = $this->getElement('tasks')->find('css', $taskidSelector);

        if(!$task instanceof NodeElement) {
            throw new LogicException($taskidSelector . 'not found');
        }

        $descriptionElement = $task->find('css', $elementSelector);
        if(!$descriptionElement instanceof NodeElement) {
            throw new LogicException($elementSelector . ' not found in ' . $taskidSelector);
        }

        if($descriptionElement->getText() != $value) {
            throw new LogicException($elementSelector. ': ' . $value . ' expected, ' . $descriptionElement->getText() . ' found');
        }

        return true;
    }
}
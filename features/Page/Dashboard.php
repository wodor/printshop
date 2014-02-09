<?php

namespace Page;

use SensioLabs\Behat\PageObjectExtension\PageObject\Page;

class Dashboard extends Page
{
    protected $path = 'dashboard';

    protected $elements = array(
        'Tasks' => array('css' => 'div#tasks')
    );


    public function hasTaskOnTheList($taskNumber)
    {
        $tasks = $this->getElement('Tasks')->findAll('css','div#task');

        foreach($tasks as $taskElement) {
            //TODO: fix for false positives !
            if(strpos($taskElement->getText(), $taskNumber) !== false) {
               return true;
            }
        }
        return false;
    }
}
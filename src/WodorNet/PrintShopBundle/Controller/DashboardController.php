<?php

namespace WodorNet\PrintShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
/**
 * @Route("/dashboard")
 */
class DashboardController extends Controller
{
    /**
     * @Route("/{name}")
     * @Template
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
}

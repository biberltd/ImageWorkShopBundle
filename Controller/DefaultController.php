<?php

namespace BiberLtd\Bundle\ImageWorkShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BiberLtdImageWorkShopBundle:Default:index.html.twig', array('name' => $name));
    }
}

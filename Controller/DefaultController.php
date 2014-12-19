<?php

namespace BiberLtd\Bundle\ImageWorkshopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BiberLtdImageWorkshopBundle:Default:index.html.twig', array('name' => $name));
    }
}

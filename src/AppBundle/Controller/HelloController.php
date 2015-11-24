<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Admin;
use AppBundle\Form\AdminType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class HelloController
 */
class HelloController extends Controller
{
    /**
     * @Route("/", name="hello")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Hello:index.html.twig');
    }
}
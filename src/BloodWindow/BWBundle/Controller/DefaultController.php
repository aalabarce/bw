<?php

namespace BloodWindow\BWBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
    	//echo 1;die;
        return $this->render('BloodWindowBWBundle:Default:landingPage.html.php');
    }
}

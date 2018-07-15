<?php

namespace AppBundle\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class mySiteController extends Controller
{
    /**
    * @Route("/", name="indexPage")
    */
    public function indexAction(Request $request){
                
        return $this->render('Courses/index.html.twig');
    }
    /**
    * @Route("/cv", name="Courses_cv")
    */
    public function cvAction(Request $request){
       
        return $this->render('Courses/cv.html.twig');
    }

}

<?php
namespace AppBundle\Controller;

use Symfony\Component\Filesystem\Filesystem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;
use AppBundle\Entity\cours;
use AppBundle\Form\coursType;

class coursController extends Controller
{ 
    /**
     * @Route("/cours/new", name="app_cours_new")
     */
    public function newAction(Request $request)
    {
        $courss = new cours();
        $form = $this->createForm(coursType::class, $courss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            /**
            *@var UploadedFile $file
            */
            $file = $courss->getPdfFile();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('PDF_directory'),
                $fileName
            );
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $courss->setPdfFile($fileName);
            $em=$this-> getDoctrine()->getManager();
            $em->persist($courss);
            $em->flush();
             $this->addFlash(
                'success',
                'Your Add were saved!'
            );
            return $this->redirectToRoute('show_cours');
        }
        return $this->render('Courses/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    /**
    * @Route("/cours/Edit/{id}", name="Courses_Edit")
    */
    public function EditAction($id, Request $request){
        $courss=$this->getDoctrine()->getrepository('AppBundle:cours')->find($id);
        
        $courss->setnomCours($courss->getnomCours());
        $courss->setnomMat($courss->getnomMat());
        $courss->setPdfFile($courss->getpdfFile());
        $form = $this->createForm(coursType::class, $courss);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // $file stores the uploaded PDF file
            /**
            *@var UploadedFile $file
            */
            $file = $courss->getPdfFile();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('PDF_directory'),
                $fileName
            );
            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $courss->setPdfFile($fileName);
            $em=$this-> getDoctrine()->getManager();
            $em->persist($courss);
            $em->flush();
             $this->addFlash(
                'success',
                'Your Add were saved!'
            );
            return $this->redirectToRoute('show_cours');
        }
        return $this->render('Courses/edit.html.twig', array(
            'form' => $form->createView(),
        ));
       
    }
    /**
     * @Route("/cours/show", name="show_cours")
     */
    public function showcours()
    {
        $courss=$this->getDoctrine()->getrepository('AppBundle:cours')->findAll();
        //traja3lik 9adech men record l9i
        $rowcount = count($courss);
        if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
        else             
          $this->addFlash('fail',"Sorry, No Courses Found !") ;
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
    /**
     * @Route("/cours/ia", name="find_ia")
     */
    public function findIA()
      {  
        $repository = $this->getDoctrine()->getrepository('AppBundle:cours');
        $courss = $repository->findBy(array('nomMat' => 'Artificial Intelligence'));
        $rowcount = count($courss);
        if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
          else             
            $this->addFlash('fail',"Sorry, No Courses Found !") ;      
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
    /**
     * @Route("/cours/AS", name="find_cours")
     */
    public function findAS()
      {  
        $repository = $this->getDoctrine()->getrepository('AppBundle:cours');
        $courss = $repository->findBy(array('nomMat' => 'System Administrator'));
        $rowcount = count($courss);
        if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
          else             
            $this->addFlash('fail',"Sorry, No Courses Found !") ;         
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
    /**
     * @Route("/cours/java", name="find_java")
     */
    public function findjava()
      {  
        $repository = $this->getDoctrine()->getrepository('AppBundle:cours');
        $courss = $repository->findBy(array('nomMat' => 'Java'));        
        $rowcount = count($courss);
         if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
          else             
            $this->addFlash('fail',"Sorry, No Courses Found !") ;
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
    /**
     * @Route("/cours/web", name="find_web")
     */
    public function findweb()
      {  
        $repository = $this->getDoctrine()->getrepository('AppBundle:cours');
        $courss = $repository->findBy(array('nomMat' => 'Web Development'));    
        $rowcount = count($courss);
        if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
        else             
            $this->addFlash('fail',"Sorry, No Courses Found !") ;
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
        /**
     * @Route("/cours/network", name="find_net")
     */
    public function findnet()
      {  
        $repository = $this->getDoctrine()->getrepository('AppBundle:cours');
        $courss = $repository->findBy(array('nomMat' => 'Networks II')); 

        $rowcount = count($courss);
        if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
        else             
            $this->addFlash('fail',"Sorry, No Courses Found !") ;
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
    /**
     * @Route("/cours/multimedia", name="find_mul")
     */
    public function findmulti()
      {  
        $repository = $this->getDoctrine()->getrepository('AppBundle:cours');
        $courss = $repository->findBy(array('nomMat' => 'Multimedia'));        
        $rowcount = count($courss);
         if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
          else             
            $this->addFlash('fail',"Sorry, No Courses Found !") ;
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
    /**
     * @Route("/cours/security", name="find_security")
     */
    public function findSI()
      {  
        $repository = $this->getDoctrine()->getrepository('AppBundle:cours');
        $courss = $repository->findBy(array('nomMat' => 'Computer Security'));
        $rowcount = count($courss);
         if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
          else             
            $this->addFlash('fail',"Sorry, No Courses Found !") ;            
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
    /**
     * @Route("/cours/ds", name="find_ds")
     */
    public function findDS()
      {  
        $repository = $this->getDoctrine()->getrepository('AppBundle:cours');
        $courss = $repository->findBy(array('nomMat' => 'Distributed System'));
        $rowcount = count($courss);
         if($rowcount>0)
          $this->addFlash('info',$rowcount.' Courses has been Found !');
          else             
            $this->addFlash('fail',"Sorry, No Courses Found !") ;           
        return $this->render('Courses/Cours.html.twig',array('courss' => $courss));
    }
    /**
    * @Route("/cours/delete/{id}", name="delete_cours")
    */
    public function deletecours($id,Request $request)
    {   
        $courss=$this->getDoctrine()->getRepository('AppBundle:cours')->find($id);        
        $fileName = $courss->getPdfFile();
        $path = $this->getParameter('PDF_directory').'/'.$fileName;
        $fs = new Filesystem();
        $fs->remove(array($path));
        $em= $this->getDoctrine()->getManager();
        $em->remove($courss);
        $em->flush();
        $this->addFlash(
            'deleted','Course has been Deleted Successfully!'
        ); 
         return $this->redirectToRoute('show_cours');    
    }
}
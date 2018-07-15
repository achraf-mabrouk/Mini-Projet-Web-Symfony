<?php
namespace AppBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Response;
class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
	    // get the login error if there is one
	    $error = $authUtils->getLastAuthenticationError();

	    // last username entered by the user
	    $lastUsername = $authUtils->getLastUsername();

	    return $this->render('security/login.html.twig', array(
	        'last_username' => $lastUsername,
	        'error'         => $error,
	    ));
    }
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(){
    	return new Response('<html><title>Admin Page</title><body>Welcome to Admin Page!</body></html>');
    }
}

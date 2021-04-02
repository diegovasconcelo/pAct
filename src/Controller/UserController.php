<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Form\RegisterType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class UserController extends AbstractController
{

    public function register(Request $request, UserPasswordEncoderInterface $encoder)
    {
        $user = New User();
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $user->setRole('ROLE_USER');
            $user->setCreatedAt(new \DateTime('now'));

            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);

            //Save
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('tasks');
        }
        return $this->render('user/register.html.twig', [
            'form'=>$form->createView()
        ]);
    }

    public function login(AuthenticationUtils $authenticationUtils){
        $error = $authenticationUtils->getLastAuthenticationError();

        $lastUsername=$authenticationUtils->getLastUsername();

        return $this->render('user/login.html.twig', [
            'error'=>$error,
            'last_username'=>$lastUsername
        ]);
    }
}

<?php

namespace App\Controller;

use LogicException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // if ($this->getUser()) {
        //     return $this->redirectToRoute('target_path');
        // }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('@EasyAdmin/page/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
            'page_title' => 'Connexion',
            'target_path' => $this->generateUrl('admin'),
            'username_label' => 'Votre email',
            'password_label' => 'Votre mot de passe',
            'sign_in_label' => 'Se connecter',
            'remember_me_enabled' => true,
            'remember_me_checked' => true,
            'remember_me_label' => 'Se souvenir de moi',
            'remember_me_parameter' => '_remember_me',
            'csrf_token_intention' => 'authenticate',]);

    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/api/login', name: 'api_login')]
    public function apiLogin(): Response
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the login key on your firewall.');
    }
}

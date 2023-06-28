<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SocialNetworkController extends AbstractController
{
    /**
     * @Route("/social/network", name="social_network")
     */
    public function index(): Response
    {
        return $this->render('social_network/index.html.twig', [
            'controller_name' => 'SocialNetworkController',
        ]);
    }
}

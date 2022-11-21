<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HostController extends AbstractController
{
    #[Route(path: '/host', name: 'host')]
    public function host(): Response
    {
        return $this->render('host/hosts.html.twig');
    }

    #[Route(path: '/host/add', name: 'addHost')]
    public function AddHost(): Response
    {
        return $this->render('host/addHost.html.twig');
    }

    #[Route(path: '/host/update/{id}', name: 'updateHost')]
    public function updateHost(string $id): Response
    {
        return $this->render('host/updateHost.html.twig', [
            "id" => $id
        ]);
    }
}
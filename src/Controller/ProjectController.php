<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    #[Route(path: '/project', name: 'project')]
    public function project(): Response
    {
        return $this->render('project/projects.html.twig');
    }

    #[Route(path: '/project/add', name: 'addProject')]
    public function addProject(): Response
    {
        return $this->render('project/addProject.html.twig');
    }

    #[Route(path: '/project/update/{id}', name: 'updateProject')]
    public function updateProject(string $id): Response
    {
        return $this->render('project/updateProject.html.twig', [
            "id" => $id
        ]);
    }
}
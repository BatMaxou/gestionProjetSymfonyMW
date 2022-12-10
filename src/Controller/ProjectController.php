<?php

namespace App\Controller;

use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    #[Route(path: '/project', name: 'project')]
    public function project(ProjectRepository $repository): Response
    {
        $projects = $repository->getAll();

        return $this->render('project/projects.html.twig', [
            'projects' => $projects
        ]);
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
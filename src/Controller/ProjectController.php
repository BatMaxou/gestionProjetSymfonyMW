<?php

namespace App\Controller;

use App\Entity\Host;
use App\Entity\Project;
use App\Entity\Customer;
use App\Form\ProjectType;
use App\Repository\ProjectRepository;
use Symfony\Component\HttpFoundation\Request;
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
    public function addProject(Request $request, ProjectRepository $projectRepository): Response
    {
        $customer = new Customer(0, '', '', '');
        $host = new Host(0, '', '', '');
        $project = new Project(0, '', '', '', '', '', '', $host, $customer);
        $form = $this->createForm(ProjectType::class, $project);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $projectRepository->save($project);

            return $this->redirectToRoute('project');
        }

        return $this->render('project/addProject.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/project/update/{id}', name: 'updateProject')]
    public function updateProject(string $id): Response
    {
        return $this->render('project/updateProject.html.twig', [
            "id" => $id
        ]);
    }
}
<?php

namespace App\Controller;

use App\Entity\Host;
use App\Form\HostType;
use App\Form\HostDeleteType;
use App\Repository\HostRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HostController extends AbstractController
{
    #[Route(path: '/host', name: 'host')]
    public function host(Request $request, HostRepository $hostRepository): Response
    {
        return $this->render('host/hosts.html.twig', [
            'hosts' => $hostRepository->getAll(),
        ]);
    }

    #[Route(path: '/host/add', name: 'addHost')]
    public function AddHost(Request $request, HostRepository $hostRepository): Response
    {
        $host = new Host(0, '', '', '');
        $form = $this->createForm(HostType::class, $host);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hostRepository->save($host);

            return $this->redirectToRoute('host');
        }

        return $this->render('host/addHost.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/host/update/{id}', name: 'updateHost')]
    public function updateHost(Request $request, HostRepository $hostRepository, string $id): Response
    {
        $host = $hostRepository->getById($id);

        $form = $this->createForm(HostType::class, $host);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hostRepository->update($host);

            return $this->redirectToRoute('host');
        }

        return $this->render('host/updateHost.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // #[Route(path: '/host', name: 'deleteHost')]
    // public function deleteHost(Request $request, HostRepository $hostRepository, int $id = 0): Response
    // {
    //     $host = $hostRepository->getById($id);

    //     $form = $this->createForm(HostDeleteType::class, $host);
    //     $form->handleRequest($request);
        
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $hostRepository->delete($host);
            
    //         return $this->redirectToRoute('host');
    //     }
        
    //     return $this->render('host/hosts.html.twig', [
    //         'ok' => $form->createView(),
    //     ]);
    // }
}
<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerController extends AbstractController
{
    #[Route(path: '/customer', name: 'customer')]
    public function customer(): Response
    {
        return $this->render('customer/customers.html.twig');
    }

    #[Route(path: '/customer/add', name: 'addCustomer')]
    public function addCustomer(): Response
    {
        return $this->render('customer/addCustomer.html.twig');
    }

    #[Route(path: '/customer/update/{id}', name: 'updateCustomer')]
    public function updateCustomer(string $id): Response
    {
        return $this->render('customer/updateCustomer.html.twig', [
            "id" => $id
        ]);
    }
}
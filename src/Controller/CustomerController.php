<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use App\Repository\CustomerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CustomerController extends AbstractController
{
    #[Route(path: '/customer', name: 'customer')]
    public function customer(CustomerRepository $repository): Response
    {
        $customers = $repository->getAll();

        return $this->render('customer/customers.html.twig', [
            'customers' => $customers
        ]);
    }

    #[Route(path: '/customer/add', name: 'addCustomer')]
    public function addCustomer(Request $request, CustomerRepository $customerRepository): Response
    {
        $customer = new Customer(0, '', '', '');
        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customerRepository->save($customer);

            return $this->redirectToRoute('customer');
        }

        return $this->render('customer/addCustomer.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/customer/update/{id}', name: 'updateCustomer')]
    public function updateCustomer(Request $request, CustomerRepository $customerRepository, string $id): Response
    {
        $customer = $customerRepository->getById($id);

        $form = $this->createForm(CustomerType::class, $customer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $customerRepository->update($customer);

            return $this->redirectToRoute('customer');
        }

        return $this->render('customer/updateCustomer.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
<?php

namespace App\Repository;

use App\Entity\Customer;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\Collection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class CustomerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Customer::class);
    }

    public function getAll(): ?array
    {
        return $this->findAll();
    }

    public function getById(string $id): ?Customer
    {
        return $this->createQueryBuilder('c')
            ->where('c.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function save(Customer $customer): void
    {
        $this->_em->persist($customer);
        $this->_em->flush();
    }

    public function update(Customer $customer): void
    {
        $this->_em->flush($customer);
    }

    public function delete(Customer $customer): void
    {
        $this->_em->remove($customer);
        $this->_em->flush($customer);
    }
}
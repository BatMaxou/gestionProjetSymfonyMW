<?php

namespace App\Repository;

use App\Entity\Host;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class HostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Host::class);
    }

    public function getAll(): ?array
    {
        return $this->findAll();
    }

    public function getById(string $id): ?Host
    {
        return $this->createQueryBuilder('h')
            ->where('h.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function save(Host $host): void
    {
        $this->_em->persist($host);
        $this->_em->flush();
    }

    public function update(Host $host): void
    {
        $this->_em->flush($host);
    }

    public function delete(Host $host): void
    {
        $this->_em->remove($host);
        $this->_em->flush($host);
    }
}
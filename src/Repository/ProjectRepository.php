<?php

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Common\Collections\Collection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

    public function getAll(): ?array
    {
        return $this->findAll();
    }

    public function getById(string $id): ?Project
    {
        return $this->createQueryBuilder('p')
            ->where('p.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function save(Project $project): void
    {
        $this->_em->persist($project);
        $this->_em->flush();
    }

    public function update(Project $project): void
    {
        $this->_em->flush($Project);
    }

    public function delete(Project $project): void
    {
        $this->_em->remove($project);
        $this->_em->flush($project);
    }
}
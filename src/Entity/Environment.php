<?php

namespace App\Entity;

use App\Entity\Project;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'environment')]
class Environment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private int $id;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $link = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ipAddress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?int $sshPort = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $sshUserName = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phpMyAdminLink = null;

    #[ORM\Column(type: 'boolean')]
    private bool $ipRestriction;

    #[ORM\ManyToOne(targetEntity: Project::class, inversedBy: 'environments')]
    #[ORM\JoinColumn(nullable: false)]
    private Project $project;

    public function __construct(
        int $id,
        string $name,
        string $link,
        string $ipAddress,
        int $sshPort,
        string $sshUserName,
        string $phpMyAdminLink,
        bool $ipRestriction,
        Project $project
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->link = $link;
        $this->ipAddress = $ipAddress;
        $this->sshPort = $sshPort;
        $this->sshUserName = $sshUserName;
        $this->phpMyAdminLink = $phpMyAdminLink;
        $this->ipRestriction = $ipRestriction;
        $this->project = $project;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $newId): void
    {
        $this->id = $newId;
    }

    public function getName(): string
    {
        return $this->name;
    }
    public function setName(string $newName): void
    {
        $this->name = $newName;
    }

    public function getLink(): string
    {
        return $this->link;
    }
    public function setLink(string $newLink): void
    {
        $this->link = $newLink;
    }

    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }
    public function setIpAddress(string $newIpAddress): void
    {
        $this->ipAddress = $newIpAddress;
    }

    public function getSshPort(): int
    {
        return $this->sshPort;
    }
    public function setSshPort(int $newSshPort): void
    {
        $this->sshPort = $newSshPort;
    }

    public function getSshUserName(): string
    {
        return $this->sshUserName;
    }
    public function setSshUserName(string $newSshUserName): void
    {
        $this->sshUserName = $newSshUserName;
    }

    public function getPhpMyAdminLink(): string
    {
        return $this->phpMyAdminLink;
    }
    public function setPhpMyAdminLink(string $newPhpMyAdminLink): void
    {
        $this->phpMyAdminLink = $newPhpMyAdminLink;
    }

    public function getIpRestriction(): bool
    {
        return $this->ipRestriction;
    }
    public function setIpRestriction(bool $newIpRestriction): void
    {
        $this->ipRestriction = $newIpRestriction;
    }

    public function getProject(): Project
    {
        return $this->project;
    }
    public function setProject(Project $newProject): void
    {
        $this->project = $newProject;
    }
}
<?php

namespace App\Entity;

use App\{
    Entity\Host,
    Entity\Customer,
};

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'project')]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $name;

    #[ORM\Column(length: 255)]
    private string $code;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $lastPassFolder = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkMockUps = null;

    #[ORM\Column(type: 'boolean')]
    private bool $managedServer;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notes = null;

    #[ORM\ManyToOne(targetEntity: Host::class, inversedBy: 'projects')]
    #[ORM\JoinColumn(nullable: false)]
    private Host $host;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'projects')]
    #[ORM\JoinColumn(nullable: false)]
    private Customer $customer;

    #[ORM\OneToMany(targetEntity: Environment::class, mappedBy: 'project')]
    private ?Collection $environments;

    public function __construct(
        int $id,
        string $name,
        string $code,
        string $lastPassFolder,
        string $linkMockUps,
        bool $managedServer,
        string $notes,
        Host $host,
        Customer $customer
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->lastPassFolder = $lastPassFolder;
        $this->linkMockUps = $linkMockUps;
        $this->managedServer = $managedServer;
        $this->notes = $notes;
        $this->host = $host;
        $this->customer = $customer;

        $this->environments = null;
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

    public function getLastPassFolder(): string
    {
        return $this->lastPassFolder;
    }
    public function setLastPassFolder(string $newLastPassFolder): void
    {
        $this->lastPassFolder = $newLastPassFolder;
    }
    
    public function getLinkMockUps(): string
    {
        return $this->linkMockUps;
    }
    public function setLinkMockUps(string $newLinkMockUps): void
    {
        $this->linkMockUps = $newLinkMockUps;
    }

    public function getManagedServer(): bool
    {
        return $this->managedServer;
    }
    public function setManagedServer(bool $newManagedServer): void
    {
        $this->managedServer = $newManagedServer;
    }

    public function getCode(): string
    {
        return $this->code;
    }
    public function setCode(string $newCode): void
    {
        $this->code = $newCode;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }
    public function setNotes(?string $newNotes = null): void
    {
        $this->notes = $newNotes;
    }

    public function getHost(): Host
    {
        return $this->host;
    }
    public function setHost(Host $newHost): void
    {
        $this->host = $newHost;
    }

    public function getCustomer(): Customer
    {
        return $this->customer;
    }
    public function setCustomer(Customer $newCustomer): void
    {
        $this->customer = $newCustomer;
    }

    public function getEnvironments(): ?Collection
    {
        return $this->environments;
    }
    public function setEnvironments(?Collection $environments = null): void
    {
        $this->environments = $environments;
    }
}
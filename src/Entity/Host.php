<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity]
#[ORM\Table(name: 'host')]
class Host
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private int $id;

    #[ORM\Column(length: 255)]
    private string $code;

    #[ORM\Column(length: 255, unique: true)]
    private string $name;

    #[ORM\Column(type: 'text', nullable: true)]
    private ?string $notes = null;

    #[ORM\OneToMany(targetEntity: Contact::class, mappedBy: 'host')]
    private ?Collection $contacts;

    #[ORM\OneToMany(targetEntity: Project::class, mappedBy: 'host')]
    private ?Collection $projects;

    public function __construct(
        int $id,
        string $code,
        string $name,
        string $notes
    ) {
        $this->id = $id;
        $this->code = $code;
        $this->name = $name;
        $this->notes = $notes;

        $this->contacts = null;
        $this->projects = null;
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

    public function getContacts(): ?Collection
    {
        return $this->contacts;
    }
    public function setContacts(?Collection $contacts = null): void
    {
        $this->contacts = $contacts;
    }

    public function getProjects(): ?Collection
    {
        return $this->projects;
    }
    public function setProjects(?Collection $projects = null): void
    {
        $this->projects = $projects;
    }
}

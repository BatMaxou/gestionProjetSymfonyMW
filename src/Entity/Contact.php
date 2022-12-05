<?php 

namespace App\Entity;

use App\
{
    Entity\Host,
    Entity\Customer
};
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'contact')]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer', unique: true)]
    private int $id;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $role = null;

    #[ORM\ManyToOne(targetEntity: Host::class, inversedBy: 'contacts')]
    private Host $host;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'contacts')]
    private Customer $customer;

    public function __construct(
        int $id,
        string $email,
        string $phoneNumber,
        string $role,
        Host $host,
        Customer $customer
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->phoneNumber = $phoneNumber;
        $this->role = $role;
        $this->host = $host;
        $this->customer = $customer;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function setId(int $newId): void
    {
        $this->id = $newId;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function setEmail(string $newEmail): void
    {
        $this->email = $newEmail;
    }

    public function getPhoneNumber(): string
    {
        return $this->phoneNumber;
    }
    public function setPhoneNumber(string $newPhoneNumber): void
    {
        $this->phoneNumber = $newPhoneNumber;
    }

    public function getRole(): string
    {
        return $this->role;
    }
    public function setRole(string $newRole): void
    {
        $this->role = $newRole;
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
}
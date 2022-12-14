<?php

namespace Infrastructure\Entity\Member;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Infrastructure\Repository\Member\MemberRepository;

#[ORM\Entity(repositoryClass: MemberRepository::class)]
class Member
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $identifier = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $memberSinceAt = null;

    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[ORM\Column(type: Types::ARRAY)]
    private array $contact = [];

    #[ORM\Column(type: Types::SMALLINT)]
    private ?int $gender = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;

        return $this;
    }

    public function getMemberSinceAt(): ?\DateTimeInterface
    {
        return $this->memberSinceAt;
    }

    public function setMemberSinceAt(\DateTimeInterface $memberSinceAt): self
    {
        $this->memberSinceAt = $memberSinceAt;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getContact(): array
    {
        return $this->contact;
    }

    public function setContact(array $contact): self
    {
        $this->contact = $contact;

        return $this;
    }

    public function getGender(): ?int
    {
        return $this->gender;
    }

    public function setGender(int $gender): self
    {
        $this->gender = $gender;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    
    #[Assert\Length(
        max: 255,
        maxMessage: 'Ez a szöveg nem lehet hosszabb mint {{ limit }} karakter',
    )]

    #[Assert\NotBlank(
        message: "Nincs kitöltve ez a mező",
    )]

    private $name;

    #[ORM\Column(type: 'string', length: 255)]

    #[Assert\Length(
        max: 255,
        maxMessage: 'Ez a szöveg nem lehet hosszabb mint {{ limit }} karakter',
    )]

    #[Assert\NotBlank(
        message: "Nincs kitöltve ez a mező",
    )]

    #[Assert\Email(
        message: 'Ez az email: {{ value }} nem egy létező email cím',
    )]

    private $email;

    #[ORM\Column(type: 'text')]
    #[Assert\NotBlank(
        message: "Nincs kitöltve ez a mező",
    )]
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
}

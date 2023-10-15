<?php

namespace App\Entity;

use App\Repository\AuthorRepository;
use Doctrine\ORM\Mapping as ORM;

<<<<<<< HEAD
#[ORM\Entity(repositoryClass: AuthorRepository::class)]
class Author
{
    #[ORM\Id] 
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $username = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;
=======
/**
 * @ORM\Entity(repositoryClass=AuthorRepository::class)
 */
class Author
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;
    /**
     * @ORM\Column(type="integer")
     */
    private $nb_books;
>>>>>>> ebbd357 ('s4')

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

<<<<<<< HEAD
    public function setUsername(string $username): static
=======
    public function setUsername(string $username): self
>>>>>>> ebbd357 ('s4')
    {
        $this->username = $username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

<<<<<<< HEAD
    public function setEmail(string $email): static
=======
    public function setEmail(string $email): self
>>>>>>> ebbd357 ('s4')
    {
        $this->email = $email;

        return $this;
    }
<<<<<<< HEAD
}
=======

	
	public function getNb_books() {
		return $this->nb_books;
	}
	
	public function setNb_books(int $nb_books): self
{
    $this->nb_books = $nb_books;
    return $this;
}
public function __toString() {
    return $this->username;
}
	
}
>>>>>>> ebbd357 ('s4')

<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KenUsersRepository")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class KenUsers implements UserInterface, \Serializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\KenCategories", mappedBy="user")
     */
    private $kenCategories;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\KenArticles", mappedBy="user")
     */
    private $kenArticles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Roles;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    public function __construct()
    {
        $this->kenCategories = new ArrayCollection();
        $this->kenArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

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

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(?int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * @return Collection|KenCategories[]
     */
    public function getKenCategories(): Collection
    {
        return $this->kenCategories;
    }

    public function addKenCategory(KenCategories $kenCategory): self
    {
        if (!$this->kenCategories->contains($kenCategory)) {
            $this->kenCategories[] = $kenCategory;
            $kenCategory->setUser($this);
        }

        return $this;
    }

    public function removeKenCategory(KenCategories $kenCategory): self
    {
        if ($this->kenCategories->contains($kenCategory)) {
            $this->kenCategories->removeElement($kenCategory);
            // set the owning side to null (unless already changed)
            if ($kenCategory->getUser() === $this) {
                $kenCategory->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|KenArticles[]
     */
    public function getKenArticles(): Collection
    {
        return $this->kenArticles;
    }

    public function addKenArticle(KenArticles $kenArticle): self
    {
        if (!$this->kenArticles->contains($kenArticle)) {
            $this->kenArticles[] = $kenArticle;
            $kenArticle->setUser($this);
        }

        return $this;
    }

    public function removeKenArticle(KenArticles $kenArticle): self
    {
        if ($this->kenArticles->contains($kenArticle)) {
            $this->kenArticles->removeElement($kenArticle);
            // set the owning side to null (unless already changed)
            if ($kenArticle->getUser() === $this) {
                $kenArticle->setUser(null);
            }
        }

        return $this;
    }

    public function getRoles(): ?string
    {
        return array('ROLE_USER');
    }

    public function setRoles(string $Roles): self
    {
        $this->Roles = $Roles;

        return $this;
    }
    public function eraseCredentials()
    {
    }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // see section on salt below
            // $this->salt
            ) = unserialize($serialized, array('allowed_classes' => false));
    }



    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return null;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }
}

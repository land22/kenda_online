<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\KenCategoriesRepository")
 */
class KenCategories
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\KenArticles", mappedBy="categorie")
     */
    private $kenArticles;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\KenUsers", inversedBy="kenCategories")
     */
    private $user;

    public function __construct()
    {
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

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

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
            $kenArticle->setCategorie($this);
        }

        return $this;
    }

    public function removeKenArticle(KenArticles $kenArticle): self
    {
        if ($this->kenArticles->contains($kenArticle)) {
            $this->kenArticles->removeElement($kenArticle);
            // set the owning side to null (unless already changed)
            if ($kenArticle->getCategorie() === $this) {
                $kenArticle->setCategorie(null);
            }
        }

        return $this;
    }

    public function getUser(): ?KenUsers
    {
        return $this->user;
    }

    public function setUser(?KenUsers $user): self
    {
        $this->user = $user;

        return $this;
    }
}

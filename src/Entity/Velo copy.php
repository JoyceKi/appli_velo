<?php

namespace App\Entity;

use App\Repository\VeloRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VeloRepository::class)]
class Velo
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $marque = null;

    #[ORM\Column(length: 255)]
    private ?string $modele = null;

    #[ORM\Column(length: 255)]
    private ?string $num_serie = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_achat = null;

    #[ORM\Column(length: 255)]
    private ?string $couleur = null;

    #[ORM\Column(length: 255)]
    private ?string $type_velo = null;

    #[ORM\Column(length: 255)]
    private ?string $fonctionnement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $photo = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $document = null;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'velo')]
    private Collection $user;

    #[ORM\ManyToMany(targetEntity: Vols::class, inversedBy: 'velo')]
    private Collection $vols;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->vols = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMarque(): ?string
    {
        return $this->marque;
    }

    public function setMarque(string $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getModele(): ?string
    {
        return $this->modele;
    }

    public function setModele(string $modele): static
    {
        $this->modele = $modele;

        return $this;
    }

    public function getNumSerie(): ?string
    {
        return $this->num_serie;
    }

    public function setNumSerie(string $num_serie): static
    {
        $this->num_serie = $num_serie;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->date_achat;
    }

    public function setDateAchat(?\DateTimeInterface $date_achat): static
    {
        $this->date_achat = $date_achat;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(string $couleur): static
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getTypeVelo(): ?string
    {
        return $this->type_velo;
    }

    public function setTypeVelo(string $type_velo): static
    {
        $this->type_velo = $type_velo;

        return $this;
    }

    public function getFonctionnement(): ?string
    {
        return $this->fonctionnement;
    }

    public function setFonctionnement(string $fonctionnement): static
    {
        $this->fonctionnement = $fonctionnement;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;

        return $this;
    }

    public function getDocument(): ?string
    {
        return $this->document;
    }

    public function setDocument(?string $document): static
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): static
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
            $user->addVelo($this);
        }

        return $this;
    }

    public function removeUser(User $user): static
    {
        if ($this->user->removeElement($user)) {
            $user->removeVelo($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Vols>
     */
    public function getVols(): Collection
    {
        return $this->vols;
    }

    public function addVol(Vols $vol): static
    {
        if (!$this->vols->contains($vol)) {
            $this->vols->add($vol);
        }

        return $this;
    }

    public function removeVol(Vols $vol): static
    {
        $this->vols->removeElement($vol);

        return $this;
    }
}

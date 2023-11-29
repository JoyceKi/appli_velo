<?php

namespace App\Entity;

use App\Repository\VolsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VolsRepository::class)]
class Vols
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_vol = null;

    #[ORM\Column]
    private ?int $code_postal = null;

    #[ORM\Column(length: 255)]
    private ?string $ville = null;

    #[ORM\Column(length: 255)]
    private ?string $quartier = null;

    #[ORM\Column(length: 255)]
    private ?string $num_plainte = null;

    #[ORM\Column(nullable: true)]
    private ?bool $retrouve = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $date_retouve = null;

    #[ORM\ManyToMany(targetEntity: Velo::class, mappedBy: 'vols')]
    private Collection $velo;

    public function __construct()
    {
        $this->velo = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateVol(): ?\DateTimeInterface
    {
        return $this->date_vol;
    }

    public function setDateVol(\DateTimeInterface $date_vol): static
    {
        $this->date_vol = $date_vol;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->code_postal;
    }

    public function setCodePostal(int $code_postal): static
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getQuartier(): ?string
    {
        return $this->quartier;
    }

    public function setQuartier(string $quartier): static
    {
        $this->quartier = $quartier;

        return $this;
    }

    public function getNumPlainte(): ?string
    {
        return $this->num_plainte;
    }

    public function setNumPlainte(string $num_plainte): static
    {
        $this->num_plainte = $num_plainte;

        return $this;
    }

    public function isRetrouve(): ?bool
    {
        return $this->retrouve;
    }

    public function setRetrouve(?bool $retrouve): static
    {
        $this->retrouve = $retrouve;

        return $this;
    }

    public function getDateRetouve(): ?\DateTimeInterface
    {
        return $this->date_retouve;
    }

    public function setDateRetouve(?\DateTimeInterface $date_retouve): static
    {
        $this->date_retouve = $date_retouve;

        return $this;
    }

    /**
     * @return Collection<int, Velo>
     */
    public function getVelo(): Collection
    {
        return $this->velo;
    }

    public function addVelo(Velo $velo): static
    {
        if (!$this->velo->contains($velo)) {
            $this->velo->add($velo);
            $velo->addVol($this);
        }

        return $this;
    }

    public function removeVelo(Velo $velo): static
    {
        if ($this->velo->removeElement($velo)) {
            $velo->removeVol($this);
        }

        return $this;
    }
}

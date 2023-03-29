<?php

namespace App\Entity;

use App\Repository\VahaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VahaRepository::class)]
class Vaha
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'vaha1', targetEntity: Hlavni::class)]
    private Collection $hlavnis;

    #[ORM\Column(length: 255)]
    private ?string $vaha = null;

    public function __construct()
    {
        $this->hlavnis = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Hlavni>
     */
    public function getHlavnis(): Collection
    {
        return $this->hlavnis;
    }

    public function addHlavni(Hlavni $hlavni): self
    {
        if (!$this->hlavnis->contains($hlavni)) {
            $this->hlavnis->add($hlavni);
            $hlavni->setVaha1($this);
        }

        return $this;
    }

    public function removeHlavni(Hlavni $hlavni): self
    {
        if ($this->hlavnis->removeElement($hlavni)) {
            // set the owning side to null (unless already changed)
            if ($hlavni->getVaha1() === $this) {
                $hlavni->setVaha1(null);
            }
        }

        return $this;
    }

    public function getVaha(): ?string
    {
        return $this->vaha;
    }

    public function setVaha(string $vaha): self
    {
        $this->vaha = $vaha;

        return $this;
    }
}

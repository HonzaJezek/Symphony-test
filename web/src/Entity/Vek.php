<?php

namespace App\Entity;

use App\Repository\VekRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VekRepository::class)]
class Vek
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'vek1', targetEntity: Hlavni::class)]
    private Collection $hlavnis;

    #[ORM\Column(length: 255)]
    private ?string $vek = null;

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
            $hlavni->setVek1($this);
        }

        return $this;
    }

    public function removeHlavni(Hlavni $hlavni): self
    {
        if ($this->hlavnis->removeElement($hlavni)) {
            // set the owning side to null (unless already changed)
            if ($hlavni->getVek1() === $this) {
                $hlavni->setVek1(null);
            }
        }

        return $this;
    }

    public function getVek(): ?string
    {
        return $this->vek;
    }

    public function setVek(string $vek): self
    {
        $this->vek = $vek;

        return $this;
    }
}

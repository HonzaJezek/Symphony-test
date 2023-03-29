<?php

namespace App\Entity;

use App\Repository\VyskaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: VyskaRepository::class)]
class Vyska
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'vyska1', targetEntity: Hlavni::class)]
    private Collection $hlavnis;

    #[ORM\Column(length: 255)]
    private ?string $vyska = null;

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
            $hlavni->setVyska1($this);
        }

        return $this;
    }

    public function removeHlavni(Hlavni $hlavni): self
    {
        if ($this->hlavnis->removeElement($hlavni)) {
            // set the owning side to null (unless already changed)
            if ($hlavni->getVyska1() === $this) {
                $hlavni->setVyska1(null);
            }
        }

        return $this;
    }

    public function getVyska(): ?string
    {
        return $this->vyska;
    }

    public function setVyska(string $vyska): self
    {
        $this->vyska = $vyska;

        return $this;
    }
}

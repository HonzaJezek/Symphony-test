<?php

namespace App\Entity;

use App\Repository\HlavniRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: HlavniRepository::class)]
class Hlavni
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vyska = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vaha = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $vek = null;

    #[ORM\ManyToOne(inversedBy: 'hlavnis')]
    private ?Vaha $vaha1 = null;

    #[ORM\ManyToOne(inversedBy: 'hlavnis')]
    private ?Vyska $vyska1 = null;

    #[ORM\ManyToOne(inversedBy: 'hlavnis')]
    private ?Vek $vek1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $jmeno = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $prijmeni = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresa = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $ulice = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mesto = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $psc = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVyska(): ?string
    {
        return $this->vyska;
    }

    public function setVyska(?string $vyska): self
    {
        $this->vyska = $vyska;

        return $this;
    }

    public function getVaha(): ?string
    {
        return $this->vaha;
    }

    public function setVaha(?string $vaha): self
    {
        $this->vaha = $vaha;

        return $this;
    }

    public function getVek(): ?string
    {
        return $this->vek;
    }

    public function setVek(?string $vek): self
    {
        $this->vek = $vek;

        return $this;
    }

    public function getVaha1(): ?Vaha
    {
        return $this->vaha1;
    }

    public function setVaha1(?Vaha $vaha1): self
    {
        $this->vaha1 = $vaha1;

        return $this;
    }

    public function getVyska1(): ?Vyska
    {
        return $this->vyska1;
    }

    public function setVyska1(?Vyska $vyska1): self
    {
        $this->vyska1 = $vyska1;

        return $this;
    }

    public function getVek1(): ?Vek
    {
        return $this->vek1;
    }

    public function setVek1(?Vek $vek1): self
    {
        $this->vek1 = $vek1;

        return $this;
    }

    public function getJmeno(): ?string
    {
        return $this->jmeno;
    }

    public function setJmeno(?string $jmeno): self
    {
        $this->jmeno = $jmeno;

        return $this;
    }

    public function getPrijmeni(): ?string
    {
        return $this->prijmeni;
    }

    public function setPrijmeni(?string $prijmeni): self
    {
        $this->prijmeni = $prijmeni;

        return $this;
    }

    public function getAdresa(): ?string
    {
        return $this->adresa;
    }

    public function setAdresa(?string $adresa): self
    {
        $this->adresa = $adresa;

        return $this;
    }

    public function getUlice(): ?string
    {
        return $this->ulice;
    }

    public function setUlice(?string $ulice): self
    {
        $this->ulice = $ulice;

        return $this;
    }

    public function getMesto(): ?string
    {
        return $this->mesto;
    }

    public function setMesto(?string $mesto): self
    {
        $this->mesto = $mesto;

        return $this;
    }

    public function getPsc(): ?string
    {
        return $this->psc;
    }

    public function setPsc(?string $psc): self
    {
        $this->psc = $psc;

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\CastingRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CastingRepository::class)]
class Casting
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $id_film = null;

    #[ORM\Column]
    private ?int $id_acteur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdFilm(): ?int
    {
        return $this->id_film;
    }

    public function setIdFilm(int $id_film): static
    {
        $this->id_film = $id_film;

        return $this;
    }

    public function getIdActeur(): ?int
    {
        return $this->id_acteur;
    }

    public function setIdActeur(int $id_acteur): static
    {
        $this->id_acteur = $id_acteur;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TemoignageRepository")
 */
class Temoignage
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mpiangona", inversedBy="temoignages")
     */
    private $mpiangona;

    /**
     * @ORM\Column(type="text")
     */
    private $contenu;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMpiangona(): ?Mpiangona
    {
        return $this->mpiangona;
    }

    public function setMpiangona(?Mpiangona $mpiangona): self
    {
        $this->mpiangona = $mpiangona;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }
}

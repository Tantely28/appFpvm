<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SampanaRepository")
 */
class Sampana
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $anarana;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Mpiangona", mappedBy="sampana")
     */
    private $mpiangonas;

    public function __construct()
    {
        $this->mpiangonas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnarana(): ?string
    {
        return $this->anarana;
    }

    public function setAnarana(string $anarana): self
    {
        $this->anarana = $anarana;

        return $this;
    }

    /**
     * @return Collection|Mpiangona[]
     */
    public function getMpiangonas(): Collection
    {
        return $this->mpiangonas;
    }

    public function addMpiangona(Mpiangona $mpiangona): self
    {
        if (!$this->mpiangonas->contains($mpiangona)) {
            $this->mpiangonas[] = $mpiangona;
            $mpiangona->setSampana($this);
        }

        return $this;
    }

    public function removeMpiangona(Mpiangona $mpiangona): self
    {
        if ($this->mpiangonas->contains($mpiangona)) {
            $this->mpiangonas->removeElement($mpiangona);
            // set the owning side to null (unless already changed)
            if ($mpiangona->getSampana() === $this) {
                $mpiangona->setSampana(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->anarana;
    }

}

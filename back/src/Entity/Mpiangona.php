<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MpiangonaRepository")
 */
class Mpiangona
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Sampana", inversedBy="mpiangonas")
     */
    private $sampana;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $anarana;

    /**
     * @ORM\Column(type="integer")
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresy;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mdp;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $mpandray;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Temoignage", mappedBy="mpiangona")
     */
    private $temoignages;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Adidy", mappedBy="mpiangona")
     */
    private $adidies;

    public function __construct()
    {
        $this->temoignages = new ArrayCollection();
        $this->adidies = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSampana(): ?Sampana
    {
        return $this->sampana;
    }

    public function setSampana(?Sampana $sampana): self
    {
        $this->sampana = $sampana;

        return $this;
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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getAdresy(): ?string
    {
        return $this->adresy;
    }

    public function setAdresy(string $adresy): self
    {
        $this->adresy = $adresy;

        return $this;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getMdp(): ?string
    {
        return $this->mdp;
    }

    public function setMdp(string $mdp): self
    {
        $this->mdp = $mdp;

        return $this;
    }

    public function getMpandray(): ?string
    {
        return $this->mpandray;
    }

    public function setMpandray(string $mpandray): self
    {
        $this->mpandray = $mpandray;

        return $this;
    }

    /**
     * @return Collection|Temoignage[]
     */
    public function getTemoignages(): Collection
    {
        return $this->temoignages;
    }

    public function addTemoignage(Temoignage $temoignage): self
    {
        if (!$this->temoignages->contains($temoignage)) {
            $this->temoignages[] = $temoignage;
            $temoignage->setMpiangona($this);
        }

        return $this;
    }

    public function removeTemoignage(Temoignage $temoignage): self
    {
        if ($this->temoignages->contains($temoignage)) {
            $this->temoignages->removeElement($temoignage);
            // set the owning side to null (unless already changed)
            if ($temoignage->getMpiangona() === $this) {
                $temoignage->setMpiangona(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Adidy[]
     */
    public function getAdidies(): Collection
    {
        return $this->adidies;
    }

    public function addAdidy(Adidy $adidy): self
    {
        if (!$this->adidies->contains($adidy)) {
            $this->adidies[] = $adidy;
            $adidy->setMpiangona($this);
        }

        return $this;
    }

    public function removeAdidy(Adidy $adidy): self
    {
        if ($this->adidies->contains($adidy)) {
            $this->adidies->removeElement($adidy);
            // set the owning side to null (unless already changed)
            if ($adidy->getMpiangona() === $this) {
                $adidy->setMpiangona(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->anarana;
    }
}

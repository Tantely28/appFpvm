<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AdidyRepository")
 */
class Adidy
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Mpiangona", inversedBy="adidies")
     */
    private $mpiangona;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datyNanefana;

    /**
     * @ORM\Column(type="datetime")
     */
    private $volana;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $vola;

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

    public function getDatyNanefana(): ?\DateTimeInterface
    {
        return $this->datyNanefana;
    }

    public function setDatyNanefana(\DateTimeInterface $datyNanefana): self
    {
        $this->datyNanefana = $datyNanefana;

        return $this;
    }

    public function getVolana(): ?\DateTimeInterface
    {
        return $this->volana;
    }

    public function setVolana(\DateTimeInterface $volana): self
    {
        $this->volana = $volana;

        return $this;
    }

    public function getVola(): ?string
    {
        return $this->vola;
    }

    public function setVola(string $vola): self
    {
        $this->vola = $vola;

        return $this;
    }
}

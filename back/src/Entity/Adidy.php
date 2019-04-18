<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adidy
 *
 * @ORM\Table(name="adidy", indexes={@ORM\Index(name="id_mpiangona", columns={"id_mpiangona"})})
 * @ORM\Entity
 */
class Adidy
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_adidy", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdidy;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="daty_nanefana", type="datetime", nullable=true)
     */
    private $datyNanefana;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="volana", type="date", nullable=true)
     */
    private $volana;

    /**
     * @var int|null
     *
     * @ORM\Column(name="vola", type="integer", nullable=true)
     */
    private $vola;

    /**
     * @var \Mpiangona
     *
     * @ORM\ManyToOne(targetEntity="Mpiangona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_mpiangona", referencedColumnName="id_mpiangona")
     * })
     */
    private $idMpiangona;

    public function getIdAdidy(): ?int
    {
        return $this->idAdidy;
    }

    public function getDatyNanefana(): ?\DateTimeInterface
    {
        return $this->datyNanefana;
    }

    public function setDatyNanefana(?\DateTimeInterface $datyNanefana): self
    {
        $this->datyNanefana = $datyNanefana;

        return $this;
    }

    public function getVolana(): ?\DateTimeInterface
    {
        return $this->volana;
    }

    public function setVolana(?\DateTimeInterface $volana): self
    {
        $this->volana = $volana;

        return $this;
    }

    public function getVola(): ?int
    {
        return $this->vola;
    }

    public function setVola(?int $vola): self
    {
        $this->vola = $vola;

        return $this;
    }

    public function getIdMpiangona(): ?Mpiangona
    {
        return $this->idMpiangona;
    }

    public function setIdMpiangona(?Mpiangona $idMpiangona): self
    {
        $this->idMpiangona = $idMpiangona;

        return $this;
    }


}

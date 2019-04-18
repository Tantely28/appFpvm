<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temoignage
 *
 * @ORM\Table(name="temoignage", indexes={@ORM\Index(name="id_mpiangona", columns={"id_mpiangona"})})
 * @ORM\Entity
 */
class Temoignage
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_temoignage", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idTemoignage;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenue", type="text", length=65535, nullable=true)
     */
    private $contenue;

    /**
     * @var \Mpiangona
     *
     * @ORM\ManyToOne(targetEntity="Mpiangona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_mpiangona", referencedColumnName="id_mpiangona")
     * })
     */
    private $idMpiangona;

    public function getIdTemoignage(): ?int
    {
        return $this->idTemoignage;
    }

    public function getContenue(): ?string
    {
        return $this->contenue;
    }

    public function setContenue(?string $contenue): self
    {
        $this->contenue = $contenue;

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

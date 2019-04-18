<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mpiangona
 *
 * @ORM\Table(name="mpiangona", indexes={@ORM\Index(name="id_sampana", columns={"id_sampana"})})
 * @ORM\Entity
 */
class Mpiangona
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_mpiangona", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idMpiangona;

    /**
     * @var string
     *
     * @ORM\Column(name="anaarana", type="string", length=255, nullable=false)
     */
    private $anaarana;

    /**
     * @var int|null
     *
     * @ORM\Column(name="tel", type="integer", nullable=true)
     */
    private $tel;

    /**
     * @var string|null
     *
     * @ORM\Column(name="adresy", type="string", length=255, nullable=true)
     */
    private $adresy;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=255, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=255, nullable=false)
     */
    private $mdp;

    /**
     * @var \Sampana
     *
     * @ORM\ManyToOne(targetEntity="Sampana")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_sampana", referencedColumnName="id_sampana")
     * })
     */
    private $idSampana;

    public function getIdMpiangona(): ?int
    {
        return $this->idMpiangona;
    }

    public function getAnaarana(): ?string
    {
        return $this->anaarana;
    }

    public function setAnaarana(string $anaarana): self
    {
        $this->anaarana = $anaarana;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getAdresy(): ?string
    {
        return $this->adresy;
    }

    public function setAdresy(?string $adresy): self
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

    public function getIdSampana(): ?Sampana
    {
        return $this->idSampana;
    }

    public function setIdSampana(?Sampana $idSampana): self
    {
        $this->idSampana = $idSampana;

        return $this;
    }


}

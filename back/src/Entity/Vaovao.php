<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vaovao
 *
 * @ORM\Table(name="vaovao")
 * @ORM\Entity
 */
class Vaovao
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_vaovao", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idVaovao;

    /**
     * @var string|null
     *
     * @ORM\Column(name="titre", type="string", length=255, nullable=true)
     */
    private $titre;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=true)
     */
    private $contenu;

    public function getIdVaovao(): ?int
    {
        return $this->idVaovao;
    }

    public function getTitre(): ?string
    {

        return $this->titre;

    }

    public function setTitre(?string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(?string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }


}

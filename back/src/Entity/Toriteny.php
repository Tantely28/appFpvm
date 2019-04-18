<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Toriteny
 *
 * @ORM\Table(name="toriteny")
 * @ORM\Entity
 */
class Toriteny
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_toriteny", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idToriteny;

    /**
     * @var string|null
     *
     * @ORM\Column(name="contenu", type="text", length=65535, nullable=true)
     */
    private $contenu;

    public function getIdToriteny(): ?int
    {
        return $this->idToriteny;
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

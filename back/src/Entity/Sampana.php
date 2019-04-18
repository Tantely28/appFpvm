<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sampana
 *
 * @ORM\Table(name="sampana")
 * @ORM\Entity
 */
class Sampana
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_sampana", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idSampana;

    /**
     * @var string|null
     *
     * @ORM\Column(name="anarana", type="string", length=255, nullable=true)
     */
    private $anarana;

    public function getIdSampana(): ?int
    {
        return $this->idSampana;
    }

    public function getAnarana(): ?string
    {
        return $this->anarana;
    }

    public function setAnarana(?string $anarana): self
    {
        $this->anarana = $anarana;

        return $this;
    }


}

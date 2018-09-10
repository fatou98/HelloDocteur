<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SpecialiteRepository")
 */
class Specialite
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure",inversedBy="specialite")
     * @ORM\JoinColumn(nullable=true)
     */

    private $structure;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;

    public function getId()
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get the value of structure
     */ 
    public function getStructure()
    {
        return $this->structure;
    }

    /**
     * Set the value of structure
     *
     * @return  self
     */ 
    public function setStructure($structure)
    {
        $this->structure = $structure;

        return $this;
    }
}

<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\StructureRepository")
 */
class Structure
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $libelle;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\TypeStructure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $TypeStructure;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medecin",inversedBy="structure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medecins;
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Medecin",mappedBy="structure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medecin;




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
     * Get the value of TypeStructure
     */ 
    public function getTypeStructure()
    {
        return $this->TypeStructure;
    }

    /**
     * Set the value of TypeStructure
     *
     * @return  self
     */ 
    public function setTypeStructure($TypeStructure)
    {
        $this->TypeStructure = $TypeStructure;

        return $this;
    }

    /**
     * Get the value of Medecin
     */ 
    public function getMedecin()
    {
        return $this->Medecin;
    }

    /**
     * Set the value of Medecin
     *
     * @return  self
     */ 
    public function setMedecin($Medecin)
    {
        $this->Medecin = $Medecin;

        return $this;
    }

    /**
     * Get the value of medecins
     */ 
    public function getMedecins()
    {
        return $this->medecins;
    }

    /**
     * Set the value of medecins
     *
     * @return  self
     */ 
    public function setMedecins($medecins)
    {
        $this->medecins = $medecins;

        return $this;
    }
}

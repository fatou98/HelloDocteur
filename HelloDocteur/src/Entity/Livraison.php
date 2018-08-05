<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LivraisonRepository")
 */
class Livraison
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
    private $NomComplet;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Tel;

    /**
     * @ORM\Column(type="blob")
     */
    private $Ordonnance;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Patient;

    public function getId()
    {
        return $this->id;
    }

    public function getNomComplet(): ?string
    {
        return $this->NomComplet;
    }

    public function setNomComplet(string $NomComplet): self
    {
        $this->NomComplet = $NomComplet;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->Tel;
    }

    public function setTel(string $Tel): self
    {
        $this->Tel = $Tel;

        return $this;
    }

    public function getOrdonnance()
    {
        return $this->Ordonnance;
    }

    public function setOrdonnance($Ordonnance): self
    {
        $this->Ordonnance = $Ordonnance;

        return $this;
    }

    /**
     * Get the value of Patient
     */ 
    public function getPatient()
    {
        return $this->Patient;
    }

    /**
     * Set the value of Patient
     *
     * @return  self
     */ 
    public function setPatient($Patient)
    {
        $this->Patient = $Patient;

        return $this;
    }
}

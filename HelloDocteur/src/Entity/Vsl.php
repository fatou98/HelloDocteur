<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VslRepository")
 */
class Vsl
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
    private $FicheMaladie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Motif;
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

    public function getFicheMaladie()
    {
        return $this->FicheMaladie;
    }

    public function setFicheMaladie($FicheMaladie): self
    {
        $this->FicheMaladie = $FicheMaladie;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->Motif;
    }

    public function setMotif(string $Motif): self
    {
        $this->Motif = $Motif;

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

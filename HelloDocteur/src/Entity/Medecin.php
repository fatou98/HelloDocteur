<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MedecinRepository")
 */
class Medecin
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Matricule;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Email;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Tel;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Adresse;

    /**
     * @ORM\Column(type="float")
     */
    private $Latitude;

    /**
     * @ORM\Column(type="float")
     */
    private $Longitude;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Quartier")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Quartier;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Specialite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Specialite;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Structure")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Structure;




    public function getId()
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->Matricule;
    }

    public function setMatricule(string $Matricule): self
    {
        $this->Matricule = $Matricule;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

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

    public function getAdresse(): ?string
    {
        return $this->Adresse;
    }

    public function setAdresse(string $Adresse): self
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->Latitude;
    }

    public function setLatitude(float $Latitude): self
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->Longitude;
    }

    public function setLongitude(float $Longitude): self
    {
        $this->Longitude = $Longitude;

        return $this;
    }

    /**
     * Get the value of Quartier
     */ 
    public function getQuartier()
    {
        return $this->Quartier;
    }

    /**
     * Set the value of Quartier
     *
     * @return  self
     */ 
    public function setQuartier($Quartier)
    {
        $this->Quartier = $Quartier;

        return $this;
    }

    /**
     * Get the value of Specialite
     */ 
    public function getSpecialite()
    {
        return $this->Specialite;
    }

    /**
     * Set the value of Specialite
     *
     * @return  self
     */ 
    public function setSpecialite($Specialite)
    {
        $this->Specialite = $Specialite;

        return $this;
    }

    /**
     * Get the value of Structure
     */ 
    public function getStructure()
    {
        return $this->Structure;
    }

    /**
     * Set the value of Structure
     *
     * @return  self
     */ 
    public function setStructure($Structure)
    {
        $this->Structure = $Structure;

        return $this;
    }
}

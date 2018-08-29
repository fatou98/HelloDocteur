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
     * @ORM\JoinColumn(nullable=true)
     */
    private $medecins;
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Medecin",mappedBy="structure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $medecin;

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
     * @ORM\Column(type="float",nullable=true)
     */
    private $Latitude;

    /**
     * @ORM\Column(type="float",nullable=true)
     */
    private $Longitude;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Quartier")
     * @ORM\JoinColumn(nullable=true)
     */
    private $Quartier;
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Specialite",mappedBy="structure")
     * @ORM\JoinColumn(nullable=true)
     */
    private $specialite;
    


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

    /**
     * Get the value of Tel
     */ 
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * Set the value of Tel
     *
     * @return  self
     */ 
    public function setTel($Tel)
    {
        $this->Tel = $Tel;

        return $this;
    }

    /**
     * Get the value of Adresse
     */ 
    public function getAdresse()
    {
        return $this->Adresse;
    }

    /**
     * Set the value of Adresse
     *
     * @return  self
     */ 
    public function setAdresse($Adresse)
    {
        $this->Adresse = $Adresse;

        return $this;
    }

    /**
     * Get the value of Latitude
     */ 
    public function getLatitude()
    {
        return $this->Latitude;
    }

    /**
     * Set the value of Latitude
     *
     * @return  self
     */ 
    public function setLatitude($Latitude)
    {
        $this->Latitude = $Latitude;

        return $this;
    }

    /**
     * Get the value of specialites
     */ 
    public function getSpecialite()
    {
        return $this->specialite;
    }

    /**
     * Set the value of specialites
     *
     * @return  self
     */ 
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get the value of Email
     */ 
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * Set the value of Email
     *
     * @return  self
     */ 
    public function setEmail($Email)
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * Get the value of Longitude
     */ 
    public function getLongitude()
    {
        return $this->Longitude;
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
}

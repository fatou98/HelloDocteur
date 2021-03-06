<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\HadRepository")
 */
class Had
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
    private $Adresse;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $Tel;
    /**
    * @ORM\Column(type="string", length=250)
    */
   private $motif;

    
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Patient;
 /**
     * @ORM\Column(type="boolean")
     */
    private $etat;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datedemande;
     
    public function getId()
    {
        return $this->id;
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

    public function getFichemaladie()
    {
        return $this->Fichemaladie;
    }

    public function setFichemaladie($Fichemaladie): self
    {
        $this->Fichemaladie = $Fichemaladie;

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

   /**
    * Get the value of motif
    */ 
   public function getMotif()
   {
      return $this->motif;
   }

   /**
    * Set the value of motif
    *
    * @return  self
    */ 
   public function setMotif($motif)
   {
      $this->motif = $motif;

      return $this;
   }

    /**
     * Get the value of etat
     */ 
    public function getEtat()
    {
        return $this->etat;
    }

    /**
     * Set the value of etat
     *
     * @return  self
     */ 
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    public function getDatedemande(): ?\DateTimeInterface
    {
        return $this->datedemande;
    }

    public function setDatedemande(\DateTimeInterface $datedemande): self
    {
        $this->datedemande = $datedemande;

        return $this;
    }
}

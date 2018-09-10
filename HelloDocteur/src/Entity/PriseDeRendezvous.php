<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PriseDeRendezvousRepository")
 */
class PriseDeRendezvous
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
  /**
    * @ORM\Column(type="string", length=250)
    */
    private $motif;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Creneau")
     * @ORM\JoinColumn(nullable=true)
     */
    private $creneau;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medecin")
     * @ORM\JoinColumn(nullable=true)
     */
    private $medecin;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Patient")
     * @ORM\JoinColumn(nullable=true)
     */
    private $patient;
     
    public function getId()
    {
        return $this->id;
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
     * Get the value of creneau
     */ 
    public function getCreneau()
    {
        return $this->creneau;
    }

    /**
     * Set the value of creneau
     *
     * @return  self
     */ 
    public function setCreneau($creneau)
    {
        $this->creneau = $creneau;

        return $this;
    }

    /**
     * Get the value of medecin
     */ 
    public function getMedecin()
    {
        return $this->medecin;
    }

    /**
     * Set the value of medecin
     *
     * @return  self
     */ 
    public function setMedecin($medecin)
    {
        $this->medecin = $medecin;

        return $this;
    }

    /**
     * Get the value of patient
     */ 
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set the value of patient
     *
     * @return  self
     */ 
    public function setPatient($patient)
    {
        $this->patient = $patient;

        return $this;
    }
}

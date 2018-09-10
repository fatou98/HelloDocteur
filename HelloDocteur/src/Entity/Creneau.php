<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CreneauRepository")
 */
class Creneau
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
    private $heuredebut;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $heurefin;

    /**
     * @ORM\Column(type="boolean")
     */
    private $etat;
    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\CreneauItem",inversedBy="creneau")
     * @ORM\JoinColumn(nullable=true)
     */
    private $creneauitem;
     /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Medecin",inversedBy="creneau")
     * @ORM\JoinColumn(nullable=true)
     */
    private $medecin;

    public function getId()
    {
        return $this->id;
    }

    public function getHeuredebut(): ?string
    {
        return $this->heuredebut;
    }

    public function setHeuredebut(string $heuredebut): self
    {
        $this->heuredebut = $heuredebut;

        return $this;
    }

    public function getHeurefin(): ?string
    {
        return $this->heurefin;
    }

    public function setHeurefin(string $heurefin): self
    {
        $this->heurefin = $heurefin;

        return $this;
    }

    public function getEtat(): ?bool
    {
        return $this->etat;
    }

    public function setEtat(bool $etat): self
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get the value of creneauitem
     */ 
    public function getCreneauitem()
    {
        return $this->creneauitem;
    }

    /**
     * Set the value of creneauitem
     *
     * @return  self
     */ 
    public function setCreneauitem($creneauitem)
    {
        $this->creneauitem = $creneauitem;

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
}

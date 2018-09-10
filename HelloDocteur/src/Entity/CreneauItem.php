<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CreneauItemRepository")
 */
class CreneauItem
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $datecreneau;
     /**
     * @ORM\OneToMany(targetEntity="App\Entity\Creneau",mappedBy="creneauitem")
     * @ORM\JoinColumn(nullable=true)
     */
    private $creneau;

    public function getId()
    {
        return $this->id;
    }

    public function getDatecreneau(): ?\DateTimeInterface
    {
        return $this->datecreneau;
    }

    public function setDatecreneau(\DateTimeInterface $datecreneau): self
    {
        $this->datecreneau = $datecreneau;

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
}

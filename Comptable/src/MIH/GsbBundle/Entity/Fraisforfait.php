<?php

namespace MIH\GsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fraisforfait
 *
 * @ORM\Table(name="FraisForfait")
 * @ORM\Entity
 */
class Fraisforfait
{
    /**
     * @var string
     *
     * @ORM\Column(name="idFraisForfait", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfraisforfait;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=30, nullable=true)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="decimal", precision=5, scale=2, nullable=true)
     */
    private $montant;



    /**
     * Get idfraisforfait
     *
     * @return string 
     */
    public function getIdfraisforfait()
    {
        return $this->idfraisforfait;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Fraisforfait
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set montant
     *
     * @param string $montant
     * @return Fraisforfait
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string 
     */
    public function getMontant()
    {
        return $this->montant;
    }
}

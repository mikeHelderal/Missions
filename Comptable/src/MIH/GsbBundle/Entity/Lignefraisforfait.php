<?php

namespace MIH\GsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignefraisforfait
 *
 * @ORM\Table(name="LigneFraisForfait", indexes={@ORM\Index(name="idFicheFrais", columns={"idFicheFrais"}), @ORM\Index(name="idFraisForfait", columns={"idFraisForfait"})})
 * @ORM\Entity(repositoryClass="MIH\GsbBundle\Entity\LignefraisforfaitRepository")
 */
class Lignefraisforfait
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idLigneFraisForfait", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idlignefraisforfait;

    /**
     * @var integer
     *
     * @ORM\Column(name="quantite", type="integer", nullable=true)
     */
    private $quantite;


    /**
     * @var \Fraisforfait
     *
     * @ORM\ManyToOne(targetEntity="Fraisforfait")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idFraisForfait", referencedColumnName="idFraisForfait")
     * })
     */
    private $idfraisforfait;
    
     /**
     * @var \Fichefrais
     *
     * @ORM\ManyToOne(targetEntity="Fichefrais", inversedBy="idlignefraisforfait")    
      * @ORM\Column(name="idfichefrais",  length=11, nullable=true) 
     */
    private $idfichefrais;



    /**
     * Get idlignefraisforfait
     *
     * @return integer 
     */
    public function getIdlignefraisforfait()
    {
        return $this->idlignefraisforfait;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Lignefraisforfait
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set idfichefrais
     *
     * @param \MIH\GsbBundle\Entity\Fichefrais $idfichefrais
     * @return Lignefraisforfait
     */
    public function setIdfichefrais(\MIH\GsbBundle\Entity\Fichefrais $idfichefrais = null)
    {
        $this->idfichefrais = $idfichefrais;

        return $this;
    }

    /**
     * Get idfichefrais
     *
     * @return \MIH\GsbBundle\Entity\Fichefrais 
     */
    public function getIdfichefrais()
    {
        return $this->idfichefrais;
    }

    /**
     * Set idfraisforfait
     *
     * @param \MIH\GsbBundle\Entity\Fraisforfait $idfraisforfait
     * @return Lignefraisforfait
     */
    public function setIdfraisforfait(\MIH\GsbBundle\Entity\Fraisforfait $idfraisforfait = null)
    {
        $this->idfraisforfait = $idfraisforfait;

        return $this;
    }

    /**
     * Get idfraisforfait
     *
     * @return \MIH\GsbBundle\Entity\Fraisforfait 
     */
    public function getIdfraisforfait()
    {
        return $this->idfraisforfait;
    }
    
    
}

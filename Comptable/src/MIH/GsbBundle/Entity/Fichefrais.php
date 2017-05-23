<?php

namespace MIH\GsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fichefrais
 *
 * @ORM\Table(name="FicheFrais", indexes={@ORM\Index(name="idEtat", columns={"idEtat"}), @ORM\Index(name="idVisiteur", columns={"idVisiteur"})})
 * @ORM\Entity
 */
class Fichefrais
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idFicheFrais", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idfichefrais;

    /**
     * @var string
     *
     * @ORM\Column(name="mois", type="string", length=2, nullable=true)
     */
    private $mois;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbJustificatifs", type="integer", nullable=true)
     */
    private $nbjustificatifs;

    /**
     * @var string
     *
     * @ORM\Column(name="montantValide", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $montantvalide;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateModif", type="date", nullable=true)
     */
    private $datemodif;

    /**
     * @var \Etat
     *
     * @ORM\ManyToOne(targetEntity="Etat")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEtat", referencedColumnName="idEtat")
     * })
     */
    private $idetat;

    /**
     * @var \Visiteur
     *
     * @ORM\ManyToOne(targetEntity="Visiteur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idVisiteur", referencedColumnName="idVisiteur")
     * })
     */
    private $idvisiteur;
    
    
    /**
     *
     * @ORM\OneToMany(targetEntity="Lignefraisforfait", mappedBy="idfichefrais")
    
     */
    private $idlignefraisforfait;
    
   



    /**
     * Get idfichefrais
     *
     * @return integer 
     */
    public function getIdfichefrais()
    {
        return $this->idfichefrais;
    }

    /**
     * Set mois
     *
     * @param string $mois
     * @return Fichefrais
     */
    public function setMois($mois)
    {
        $this->mois = $mois;

        return $this;
    }

    /**
     * Get mois
     *
     * @return string 
     */
    public function getMois()
    {
        return $this->mois;
    }

    /**
     * Set nbjustificatifs
     *
     * @param integer $nbjustificatifs
     * @return Fichefrais
     */
    public function setNbjustificatifs($nbjustificatifs)
    {
        $this->nbjustificatifs = $nbjustificatifs;

        return $this;
    }

    /**
     * Get nbjustificatifs
     *
     * @return integer 
     */
    public function getNbjustificatifs()
    {
        return $this->nbjustificatifs;
    }

    /**
     * Set montantvalide
     *
     * @param string $montantvalide
     * @return Fichefrais
     */
    public function setMontantvalide($montantvalide)
    {
        $this->montantvalide = $montantvalide;

        return $this;
    }

    /**
     * Get montantvalide
     *
     * @return string 
     */
    public function getMontantvalide()
    {
        return $this->montantvalide;
    }

    /**
     * Set datemodif
     *
     * @param \DateTime $datemodif
     * @return Fichefrais
     */
    public function setDatemodif($datemodif)
    {
        $this->datemodif = $datemodif;

        return $this;
    }

    /**
     * Get datemodif
     *
     * @return \DateTime 
     */
    public function getDatemodif()
    {
        return $this->datemodif;
    }

    /**
     * Set idetat
     *
     * @param \MIH\GsbBundle\Entity\Etat $idetat
     * @return Fichefrais
     */
    public function setIdetat(\MIH\GsbBundle\Entity\Etat $idetat = null)
    {
        $this->idetat = $idetat;

        return $this;
    }

    /**
     * Get idetat
     *
     * @return \MIH\GsbBundle\Entity\Etat 
     */
    public function getIdetat()
    {
        return $this->idetat;
    }

    /**
     * Set idvisiteur
     *
     * @param \MIH\GsbBundle\Entity\Visiteur $idvisiteur
     * @return Fichefrais
     */
    public function setIdvisiteur(\MIH\GsbBundle\Entity\Visiteur $idvisiteur = null)
    {
        $this->idvisiteur = $idvisiteur;

        return $this;
    }

    /**
     * Get idvisiteur
     *
     * @return \MIH\GsbBundle\Entity\Visiteur 
     */
    public function getIdvisiteur()
    {
        return $this->idvisiteur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idlignefraisforfait = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add idlignefraisforfait
     *
     * @param \MIH\GsbBundle\Entity\Lignefraisforfait $idlignefraisforfait
     * @return Fichefrais
     */
    public function addIdlignefraisforfait(\MIH\GsbBundle\Entity\Lignefraisforfait $idlignefraisforfait)
    {
        $this->idlignefraisforfait[] = $idlignefraisforfait;

        return $this;
    }

    /**
     * Remove idlignefraisforfait
     *
     * @param \MIH\GsbBundle\Entity\Lignefraisforfait $idlignefraisforfait
     */
    public function removeIdlignefraisforfait(\MIH\GsbBundle\Entity\Lignefraisforfait $idlignefraisforfait)
    {
        $this->idlignefraisforfait->removeElement($idlignefraisforfait);
    }

    /**
     * Get idlignefraisforfait
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getIdlignefraisforfait()
    {
        return $this->idlignefraisforfait;
    }

    /**
     * Set idlignefraisforfait
     *
     * @param \MIH\GsbBundle\Entity\Lignefraisforfait $idlignefraisforfait
     * @return Fichefrais
     */
    public function setIdlignefraisforfait(\MIH\GsbBundle\Entity\Lignefraisforfait $idlignefraisforfait = null)
    {
        $this->idlignefraisforfait = $idlignefraisforfait;

        return $this;
    }
}

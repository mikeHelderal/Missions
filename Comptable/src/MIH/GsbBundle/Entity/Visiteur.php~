<?php

namespace MIH\GsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visiteur
 *
 * @ORM\Table(name="Visiteur", indexes={@ORM\Index(name="idComptable", columns={"idComptable"})})
 * @ORM\Entity
 */
class Visiteur
{
    /**
     * @var string
     *
     * @ORM\Column(name="idVisiteur", type="string", length=4, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idvisiteur;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=30, nullable=true)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=30, nullable=true)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="login", type="string", length=20, nullable=true)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="mdp", type="string", length=20, nullable=true)
     */
    private $mdp;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=30, nullable=true)
     */
    private $adresse;

    /**
     * @var string
     *
     * @ORM\Column(name="cp", type="string", length=5, nullable=true)
     */
    private $cp;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=30, nullable=true)
     */
    private $ville;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateEmbauche", type="date", nullable=true)
     */
    private $dateembauche;

    /**
     * @var string
     *
     * @ORM\Column(name="profil", type="string", length=20, nullable=true)
     */
    private $profil = 'Visiteur';

    /**
     * @var boolean
     *
     * @ORM\Column(name="connecte", type="boolean", nullable=true)
     */
    private $connecte = '0';

    /**
     * @var \Comptable
     *
     * @ORM\ManyToOne(targetEntity="Comptable")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idComptable", referencedColumnName="idComptable")
     * })
     */
    private $idcomptable;



    /**
     * Get idvisiteur
     *
     * @return string 
     */
    public function getIdvisiteur()
    {
        return $this->idvisiteur;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Visiteur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Visiteur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set login
     *
     * @param string $login
     * @return Visiteur
     */
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set mdp
     *
     * @param string $mdp
     * @return Visiteur
     */
    public function setMdp($mdp)
    {
        $this->mdp = $mdp;

        return $this;
    }

    /**
     * Get mdp
     *
     * @return string 
     */
    public function getMdp()
    {
        return $this->mdp;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Visiteur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set cp
     *
     * @param string $cp
     * @return Visiteur
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Get cp
     *
     * @return string 
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Visiteur
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set dateembauche
     *
     * @param \DateTime $dateembauche
     * @return Visiteur
     */
    public function setDateembauche($dateembauche)
    {
        $this->dateembauche = $dateembauche;

        return $this;
    }

    /**
     * Get dateembauche
     *
     * @return \DateTime 
     */
    public function getDateembauche()
    {
        return $this->dateembauche;
    }

    /**
     * Set profil
     *
     * @param string $profil
     * @return Visiteur
     */
    public function setProfil($profil)
    {
        $this->profil = $profil;

        return $this;
    }

    /**
     * Get profil
     *
     * @return string 
     */
    public function getProfil()
    {
        return $this->profil;
    }

    /**
     * Set connecte
     *
     * @param boolean $connecte
     * @return Visiteur
     */
    public function setConnecte($connecte)
    {
        $this->connecte = $connecte;

        return $this;
    }

    /**
     * Get connecte
     *
     * @return boolean 
     */
    public function getConnecte()
    {
        return $this->connecte;
    }

    /**
     * Set idcomptable
     *
     * @param \MIH\GsbBundle\Entity\Comptable $idcomptable
     * @return Visiteur
     */
    public function setIdcomptable(\MIH\GsbBundle\Entity\Comptable $idcomptable = null)
    {
        $this->idcomptable = $idcomptable;

        return $this;
    }

    /**
     * Get idcomptable
     *
     * @return \MIH\GsbBundle\Entity\Comptable 
     */
    public function getIdcomptable()
    {
        return $this->idcomptable;
    }
}

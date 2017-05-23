<?php

namespace MIH\GsbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comptable
 *
 * @ORM\Table(name="Comptable")
 * @ORM\Entity
 */
class Comptable
{
    /**
     * @var string
     *
     * @ORM\Column(name="idComptable", type="string", length=4, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idcomptable;

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
     * @ORM\Column(name="profil", type="string", length=20, nullable=true)
     */
    private $profil = 'Comptable';

    /**
     * @var boolean
     *
     * @ORM\Column(name="connecte", type="boolean", nullable=true)
     */
    private $connecte = '0';



    /**
     * Get idcomptable
     *
     * @return string 
     */
    public function getIdcomptable()
    {
        return $this->idcomptable;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Comptable
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
     * @return Comptable
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
     * @return Comptable
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
     * @return Comptable
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
     * Set profil
     *
     * @param string $profil
     * @return Comptable
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
     * @return Comptable
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
}

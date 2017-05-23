<?php


namespace MIH\GsbBundle\Form\Data ;


class ConnexionClass {
    private $login ;
    private $mdp ;
    private $profil ;
    
    public function getLogin() {
        return $this->login ;
    }
    
    public function getMdp() {
        return $this->mdp ;
    }
    
    public function getProfil() {
        return $this->profil ;
    }
    
    public function setLogin($login) {
        $this->login = $login ;
    }
    
    public function setMdp($mdp) {
        $this->mdp = $mdp ;
    }
    
    public function setProfil($profil) {
        $this->profil = $profil ;
    }
    
}
  


<?php
namespace MIH\GsbBundle\Form\Data ;

class ChoixValidationClass {
    private $visiteur ; 
    private $mois ;
    
    public function getVisiteur(){
        return $this->$visiteur ;
    }
    public function getMois(){
        return $this->$mois ;
    }
    public function setVisiteur($visiteur){
        return $this->$visiteur =  $visiteur ;
    }
    public function setMois($mois){
        return $this->$mois = $mois ;
    }
}

<?php

namespace MIH\GsbBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * VisiteurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class VisiteurRepository extends EntityRepository
{
     public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
        parent::__construct($em, $class);
    }
    
    
    public function VisiteurRepository(){
       
    }
    
    public function findAllVisiteur(){
        $queryBuilder = $this->_em->createQueryBuilder()
                ->select('v')
                ->from($this->_entityName, 'v');
        $query = $queryBuilder->getQuery();
        $resultat = $query->getResult()->getNom();
        return $resultat ;
    }
}

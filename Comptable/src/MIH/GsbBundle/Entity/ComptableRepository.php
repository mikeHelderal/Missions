<?php

namespace MIH\GsbBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * ComptableRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ComptableRepository extends EntityRepository
{
    public function __construct($em, \Doctrine\ORM\Mapping\ClassMetadata $class) {
        parent::__construct($em, $class);
    }
    
    
    public function ComptableRepository(){
       
    }
    
    public function findByLoginAndMdp($login,$mdp)
    {
        $queryBuilder = $this->createQueryBuilder('c') ;
        $queryBuilder->where('v.login =: login')
                            ->setParameter('login', $login)
                     ->andWhere('v.mdp =: mdp')
                            ->setParameter('mdp', $mdp) ;
        
        $result = $queryBuilder->getQuery()->getResult();
        return $result ;
    }  
    
    
}

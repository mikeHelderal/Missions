<?php

namespace MIH\GsbBundle\Form\Type ;

use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\FormBuilderInterface ;
use Symfony\COmponent\OptionsResolver\OptionsResolverInterface ;


class ConnexionFormType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $option){
        $builder 
                ->add('login','text',array('required'=>true))
                ->add('mdp','password',array('label'=>'mot de passe'))
                ->add('profil','choice',
                            array('choices'=>array('comptable'=>'Comptable','visiteur'=>'Visiteur', 'expanded' =>true)))
                ->add('valider','submit')
                ->add('annuler','reset');
    }
    
    
    
    
    
    
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array('data_class'=>'MIH\GsbBundle\Form\Data\ConnexionClass'));
    }
    
    
    
    
    
    
    
    
    
    public function getName(){
        return 'connexion' ;
    }
    //put your code here
}

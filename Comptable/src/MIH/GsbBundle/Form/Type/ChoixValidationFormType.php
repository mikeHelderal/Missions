<?php

namespace MIH\GsbBundle\Form\Type ;

use Symfony\Component\Form\AbstractType ;
use Symfony\Component\Form\FormBuilderInterface ;
use Symfony\COmponent\OptionsResolver\OptionsResolverInterface ;


class ChoixValidationFormType extends AbstractType{
    
    public function buildForm(FormBuilderInterface $builder, array $options){
        
        $builder
                ->add('visiteur','choice',
                        array('choices'=>array('id'=>"nom",
                                                'aa'=>"ololo")))
                ->add('mois','choice',
                        array('choices'=> array('Janvier'=>'Janvier',
                                                'Fevrier'=>'Fevrier',
                                                'Mars'=>'Mars',
                                                'Avril'=>'Avril',
                                                'Mai'=>'Mai',
                                                'Juin'=>'Juin',
                                                'Juillet'=>'Juillet',
                                                'Aout'=>'Aout',
                                                'Septembre'=>'Septembre',
                                                'Octobre'=>'Octobre',
                                                'Novembre'=>'Novembre',
                                                'Decembre'=>'Decembre')))
                ->add('valider','submit')
                ->add('annuler','reset');
    }
    
    public function setDefaultOptions(OptionsResolverInterface $resolver){
        $resolver->setDefaults(array('data_class'=>'MIH\GsbBundle\Form\Data\ChoixValidationClass'));
    }
    public function getName(){
        return 'choixValidation' ;
    }
}

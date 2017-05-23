<?php

namespace MIH\GsbBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MIH\GsbBundle\Form\Type\ConnexionFormType ;
use MIH\GsbBundle\Form\Data\ConnexionClass ;
use MIH\GsbBundle\Entity\ComptableRepository ;
use MIH\GsbBundle\Form\Type\ChoixValidationFormType ;
use MIH\GsbBundle\Form\Data\ChoixValidationClass ;
use PDO ;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('MIHGsbBundle:Default:index.html.twig', array('name' => $name));
    }
    
    public function afficherVisiteurAction()
    {
         $pdo = $this->get('dbgsbFrais');
        
        if($pdo){
            $connexion = 'ok' ;
            
        }
        else{
            $connexion = 'erreur';
        }
       
        $listeVisiteurs = $pdo->query('select  * from Visiteur ')->fetchAll() ;
        
       
        return $this->render('MIHGsbBundle:Default:affichageVisiteurs.html.twig', array('connexion' => $connexion, 'listeVisiteurs' => $listeVisiteurs));

    }
    
    public function connexionComptableAction()
    {
        $connexion = new ConnexionClass();
        $form = $this->createForm(new ConnexionFormType(), $connexion);
        
        $request = $this->container->get('request');
        $form->handleRequest($request);
        
        if($form->isValid()){
            $profil = $form->getData()->getProfil() ;
            
            if($profil == 'comptable') {
                $login = $form->getData()->getLogin() ;
                $mdp = $form->getData()->getMdp() ;
                
                $rpComptable = $this->getDoctrine()->getManager()->getRepository('MIHGsbBundle:Comptable');
                
                $resultat = $rpComptable->findOneBy(array('login' => $login, 'mdp'=>$mdp));
               if($rpComptable->findOneBy(array('login' => $login, 'mdp'=>$mdp))){
                   $comptable = $rpComptable->findOneBy(array('login' => $login, 'mdp' =>$mdp));
                   
                   return $this->redirectToRoute('mih_gsb_accueil_comptable',array('nom'=>$comptable->getNom(),'prenom'=>$comptable->getPrenom()));
                   
               }
               
               else{
                   echo 'vous avez dû faire une erreur recommencez';
               }
                
               
            }
            
        }
        
            
              
           return $this->render('MIHGsbBundle:Default:connexion.html.twig', array('form'=>$form->createView()));
       
       
    }
    public function accueilComptableAction($nom, $prenom){
         return $this->render('MIHGsbBundle:Default:accueilComptable.html.twig',array('nom'=>$nom, 'prenom'=>$prenom));

    }
    public function choixFicheFraisAction(){
        
        /////via pdo
      $db = new PDO('mysql:host=localhost;dbname=gsbFrais', 'root', 'azerty');
      $result = $db->query('SELECT idVisiteur, nom, prenom FROM Visiteur');
      
      
        $visiteur = $result->fetchAll(PDO::FETCH_ASSOC);
       
        $lesVisiteur = array();
        for($i=0;$i<count($visiteur);$i++){
            
            $lesVisiteur[$visiteur[$i]['idVisiteur']]= $visiteur[$i]['nom']." ".$visiteur[$i]['prenom'];
        }
        
        
            
       
         
         $form = $this->createFormBuilder()
                 
                ->add('visiteur','choice',
                        array('choices'=>$lesVisiteur,
         ))
                ->add('mois','choice',
                        array('choices'=> array('01'=>'Janvier',
                                                '02'=>'Fevrier',
                                                '03'=>'Mars',
                                                '04'=>'Avril',
                                                '05'=>'Mai',
                                                '06'=>'Juin',
                                                '07'=>'Juillet',
                                                '08'=>'Aout',
                                                '09'=>'Septembre',
                                                '10'=>'Octobre',
                                                '11'=>'Novembre',
                                                '12'=>'Decembre')))
                ->add('valider','submit')
                ->add('annuler','reset')
                ->getForm();
                    
       
        $request = $this->container->get('request');
        $form->handleRequest($request);
        
        if($form->isValid()){
            $data = $form->getData();
            $mois = $data['mois'];
            $leVisiteur = $data['visiteur'];
            $rpFicheFrais = $this->getDoctrine()->getManager()->getRepository('MIHGsbBundle:Fichefrais');
            $FicheFrais = $rpFicheFrais->findOneBy(array('mois'=> $mois, 'idvisiteur' => $leVisiteur));
            if($FicheFrais != null){
            return $this->redirectToRoute('mih_gsb_affichage_fiche',array('idVisiteur'=>$leVisiteur,'mois'=>$mois));
            }
            else{
                $validation = 1 ;
                        return $this->render('MIHGsbBundle:Default:choixValidation.html.twig',array('form'=>$form->createView(), 'validation'=>$validation));

            }
            
        }
        
        $validation = null ;
        
        
        
        
        return $this->render('MIHGsbBundle:Default:choixValidation.html.twig',array('form'=>$form->createView(), 'validation'=>$validation));
    }
    
    
    public function afficherFicheFraisAction($idVisiteur, $mois){
        
            
        
        $rpFicheFrais = $this->getDoctrine()->getManager()->getRepository('MIHGsbBundle:Fichefrais');
        $FicheFrais = $rpFicheFrais->findOneBy(array('mois'=> $mois, 'idvisiteur' => $idVisiteur));
        if($FicheFrais != null){
        $rpLigneFraisForfait = $this->getDoctrine()->getManager()->getRepository('MIHGsbBundle:Lignefraisforfait');
        $monRepas = $rpLigneFraisForfait->findOneBy(array('idfichefrais' => $FicheFrais->getIdfichefrais(), 'idfraisforfait' => 'REP'));     
        $maNuite = $rpLigneFraisForfait->findOneBy(array('idfichefrais' => $FicheFrais->getIdfichefrais(), 'idfraisforfait' => 'NUI'));     
        $monEtape = $rpLigneFraisForfait->findOneBy(array('idfichefrais' => $FicheFrais->getIdfichefrais(), 'idfraisforfait' => 'ETP'));     
        $mesKm = $rpLigneFraisForfait->findOneBy(array('idfichefrais' => $FicheFrais->getIdfichefrais(), 'idfraisforfait' => 'KM'));     
      
      
        $rpLigneFraisHorsForfait = $this->getDoctrine()->getManager()->getRepository('MIHGsbBundle:Lignefraishorsforfait');
        $LigneFraisHorsForfait = $rpLigneFraisHorsForfait->findBy(array('idfichefrais' => $FicheFrais->getIdfichefrais()));
        
        //$fraisForfait = $FicheFrais->getIdlignefraisforfait();
        $actualiser = null ;
       $form = $this->createFormBuilder()
               ->add('Repas', 'text', array('data' => $monRepas->getQuantite()) )
               ->add('Nuitee', 'text', array('data' => $maNuite->getQuantite()))
               ->add('Etape', 'text', array('data' => $monEtape->getQuantite()))
               ->add('KM', 'text', array('data' => $mesKm->getQuantite()))
               ->add('Actualiser', 'submit')
               ->getForm();
       
        $request = $this->container->get('request');
        $form->handleRequest($request);        
        if($form->isValid()){
            $actualiser = 1 ; 
            $em = $this->getDoctrine()->getManager();
            $data = $form->getData();
            $monRepas = $rpLigneFraisForfait->findOneBy(array('idfichefrais' => $FicheFrais->getIdfichefrais(), 'idfraisforfait' => 'REP'));     
            $maNuite = $rpLigneFraisForfait->findOneBy(array('idfichefrais' => $FicheFrais->getIdfichefrais(), 'idfraisforfait' => 'NUI'));     
            $monEtape = $rpLigneFraisForfait->findOneBy(array('idfichefrais' => $FicheFrais->getIdfichefrais(), 'idfraisforfait' => 'ETP'));     
            $mesKm = $rpLigneFraisForfait->findOneBy(array('idfichefrais' => $FicheFrais->getIdfichefrais(), 'idfraisforfait' => 'KM'));     
            $monRepas->setQuantite($data['Repas']);
            $maNuite->setQuantite($data['Nuitee']);
            $monEtape->setQuantite($data['Etape']);
            $mesKm->setQuantite($data['KM']);
            $em->persist($monRepas);
            $em->persist($maNuite);
            $em->persist($monEtape);
            $em->persist($mesKm);
            $em->flush();
            return $this->render('MIHGsbBundle:Default:affichageFicheFrais.html.twig', array('REP' => $monRepas, 'NUI' => $maNuite, 'ETP' => $monEtape,'KM' => $mesKm, 'actualiser' => $actualiser, 'monRep'=> $monRepas,'form' => $form->createView(),  'fichefrais' => $FicheFrais , 'fraishorsforfait' => $LigneFraisHorsForfait));
      
            
        }
        
         return $this->render('MIHGsbBundle:Default:affichageFicheFrais.html.twig', array('REP' => $monRepas, 'NUI' => $maNuite, 'ETP' => $monEtape,'KM' => $mesKm, 'actualiser' => $actualiser, 'monRep'=> $monRepas,'form' => $form->createView(),  'fichefrais' => $FicheFrais , 'fraishorsforfait' => $LigneFraisHorsForfait));
        }
        else{
        return $this->render('MIHGsbBundle:Default:choixValidation.html.twig',array('form'=>$form->createView(), 'validatio'=>$validation));
       
        }
    }
        
    public function refuserFraisHorsForfaitAction($mois, $visiteur, $idFraisHorsForfait){ 
        $em = $this->getDoctrine()->getManager();
        $repLigneHF = $em->getRepository('MIHGsbBundle:Lignefraishorsforfait');
        $HF = $repLigneHF->findOneBy(array('idlignefraishorsforfait' => $idFraisHorsForfait));
        $HF->setLibelle('REFUSE'.$HF->getLibelle());
        $em->persist($HF);
        $em->flush();
        
        
        return $this->redirectToRoute('mih_gsb_affichage_fiche',array('idVisiteur'=>$visiteur,'mois'=>$mois));

    }
    
   
}


package fr.gsb.rv.fr.gsb.rv.technique;

import fr.gsb.rv.fr.gsb.rv.entites.Visiteur;
import fr.gsb.rv.fr.gsb.rv.modeles.ModeleGsb;

/**
 * Created by eleve on 20/02/17.
 */
public class Session {
    private static Session session = null ;
    private Visiteur leVisiteur ;



    private Session(Visiteur visiteur){
        this.leVisiteur = visiteur;
    }


    public static Boolean ouvrir(String matricule, String mdp){
        ModeleGsb modele = ModeleGsb.getInstance();
        Visiteur unVisiteur =modele.seConnecter(matricule, mdp);
        if( unVisiteur != null){
            Session.session = new Session(unVisiteur);
            return true ;
        }
        else{
            return false;
        }

    }

    public static void fermer(){
        Session.session = null;

    }

    public Visiteur getLeVisiteur() {
        return leVisiteur;
    }
    public static Session getSession(){
        return session;
    }
}

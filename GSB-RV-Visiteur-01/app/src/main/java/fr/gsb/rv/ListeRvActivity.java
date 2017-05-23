package fr.gsb.rv;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;

import java.util.List;

import fr.gsb.rv.fr.gsb.rv.entites.RapportVisite;
import fr.gsb.rv.fr.gsb.rv.entites.Visiteur;
import fr.gsb.rv.fr.gsb.rv.modeles.ModeleGsb;
import fr.gsb.rv.fr.gsb.rv.technique.Session;

/**
 * Created by eleve on 06/03/17.
 */

public class ListeRvActivity extends AppCompatActivity {
    final static String TAG = "GSB_MAIN_ACTIVITY";
    ListView lvRapport ;
    ModeleGsb modele = ModeleGsb.getInstance();
    List<RapportVisite> lRapports ;







    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);

        setContentView(R.layout.activity_liste_rv);

        Bundle paquet = this.getIntent().getExtras();
        int mois= this.getNumMois(paquet.getString("mois"));
        int annee = Integer.parseInt(paquet.getString("annee"));


        lRapports = modele.getRapportsVisites(Session.getSession().getLeVisiteur(), mois, annee);
        Log.i(TAG, "-"+lRapports);



        lvRapport = (ListView) findViewById(R.id.lvRapport);

        ArrayAdapter<RapportVisite> adaptateur = new ArrayAdapter<RapportVisite>(this , android.R.layout.simple_expandable_list_item_1,lRapports );
        lvRapport.setAdapter(adaptateur);

        lvRapport.setOnItemClickListener(

                new AdapterView.OnItemClickListener() {

                    @Override
                    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {
                        Log.i(TAG, "rapport selectionne");
                        Bundle paquet = new Bundle();
                        paquet.putParcelable("RapportVisite",lRapports.get(position) );
                        Log.i(TAG, "envoie vers bundle");



                        Log.i(TAG, "creation intent");
                        Intent intentionEnvoyer = new Intent(ListeRvActivity.this, VisuRvActivity.class);
                        Log.i(TAG, "envoie du bundle");
                        intentionEnvoyer.putExtras(paquet);

                        Log.i(TAG, "rapport envoyé");


                        startActivity(intentionEnvoyer);


                    }
                }
        );



    }




    public int getNumMois(String mois){
        int valeur = 0 ;
        switch (mois){

            case  "Janvier" :
                valeur = 1 ;
                break;
            case  "Fevrier" :
                valeur = 2 ;
                break;
            case  "Mars" :
                valeur = 3 ;
                break;
            case  "Avril" :
                valeur = 4 ;
                break;
            case  "Mai" :
                valeur = 5 ;
                break;
            case  "Juin" :
                valeur = 6 ;
                break;
            case  "Juillet" :
                valeur = 7 ;
                break;
            case  "Aout" :
                valeur = 8 ;
                break;
            case  "Septembre" :
                valeur = 9 ;
                break;
            case  "Octobre" :
                valeur = 10 ;
                break;
            case  "Novembre" :
                valeur = 11 ;
                break;
            case  "Decembre" :
                valeur = 12 ;
                break;

        }
        return valeur;
    }





}

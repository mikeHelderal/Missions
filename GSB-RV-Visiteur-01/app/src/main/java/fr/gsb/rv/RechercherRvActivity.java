package fr.gsb.rv;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.Spinner;
import android.widget.TextView;

/**
 * Created by eleve on 27/02/17.
 */

public class RechercherRvActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener{

    private static final String[] lesMois = {"Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre" };
    private static final String[] lesAnnees = {"2010", "2011", "2012", "2013", "2014", "2015", "2016", "2017"};
    Spinner spMois;
    Spinner spAnnee;
    Button bAfficher ;

    protected void onCreate( Bundle savedInstanceState ){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rechercher_rv);

        spMois = (Spinner) findViewById(R.id.spMois);
        spMois.setOnItemSelectedListener(this);

        spAnnee = (Spinner) findViewById(R.id.spAnnee);
        spAnnee.setOnItemSelectedListener(this);

        ArrayAdapter<String> aaMois = new ArrayAdapter<String>(
                this,
                android.R.layout.simple_spinner_item,
                lesMois
        );
        ArrayAdapter<String> aaAnnee = new ArrayAdapter<String>(
                this,
                android.R.layout.simple_spinner_item,
                lesAnnees
        );

        aaMois.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        aaAnnee.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);

        spMois.setAdapter(aaMois);
        spAnnee.setAdapter(aaAnnee);



    }
   public void getListeRapport(View vue){


       Bundle paquet = new Bundle();
       paquet.putString("mois",spMois.getSelectedItem().toString());
       paquet.putString("annee", spAnnee.getSelectedItem().toString());

       Intent intentionEnvoyer = new Intent(this, ListeRvActivity.class);
       intentionEnvoyer.putExtras(paquet);
       startActivity(intentionEnvoyer);
   }

    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {



    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }

}

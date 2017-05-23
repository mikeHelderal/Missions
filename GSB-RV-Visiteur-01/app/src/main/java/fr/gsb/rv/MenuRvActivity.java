package fr.gsb.rv;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

/**
 * Created by eleve on 27/02/17.
 */

public class MenuRvActivity  extends AppCompatActivity {
    TextView tvValeur;
    Button bconsulRp;
    Button bsaisirRp;


    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_menu_rv);

        tvValeur = (TextView) findViewById(R.id.tvInfo);
        Bundle paquet = this.getIntent().getExtras();
        String valeur = paquet.getString("nom");
        valeur = valeur + " " + paquet.getString("prenom");

        tvValeur.setText(valeur);


    }
    public void consulter(View vue){
        Intent intentionEnvoyer = new Intent(this, RechercherRvActivity.class);

        startActivity(intentionEnvoyer);
    }


    public void retourner (View vue){
        Intent intentRetourner = new Intent (this, MainActivity.class);
        startActivity(intentRetourner);
    }

}

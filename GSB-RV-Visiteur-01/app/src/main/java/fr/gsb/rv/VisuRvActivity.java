package fr.gsb.rv;

import android.content.Intent;
import android.os.Bundle;
import android.os.Parcelable;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.Calendar;
import java.util.List;

import fr.gsb.rv.fr.gsb.rv.entites.Medicament;
import fr.gsb.rv.fr.gsb.rv.entites.RapportVisite;

import static java.util.Calendar.DAY_OF_MONTH;

/**
 * Created by eleve on 13/03/17.
 */

public class VisuRvActivity extends AppCompatActivity {
    final static String TAG = "GSB_MAIN_ACTIVITY";
    TextView tvnumero ;
    TextView tvbilan ;
    TextView tvconfiance ;
    TextView tvdateVisite ;
    TextView tvdateRedac ;
    TextView tvlu ;
    TextView tvnomPracticien ;
    TextView tvmotif ;
    RapportVisite rapport;
    Button bListeEchantillon ;


    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        Log.i(TAG, "nouvelle activité");

        setContentView(R.layout.activity_visu_rv);

        Bundle paquet = this.getIntent().getExtras();
        rapport = paquet.getParcelable("RapportVisite");

        Log.i(TAG, "récupération  rapport");


        tvnumero = (TextView) findViewById(R.id.numeroRap);
        tvbilan = (TextView) findViewById(R.id.bilanRap);
        tvconfiance = (TextView) findViewById(R.id.coefConfiance);
        tvdateVisite = (TextView) findViewById(R.id.dateVisite);
        tvdateRedac = (TextView) findViewById(R.id.dateRedac);
        tvlu = (TextView) findViewById(R.id.lu);
        tvnomPracticien = (TextView) findViewById(R.id.nomPract);
        tvmotif = (TextView) findViewById(R.id.motif);
        bListeEchantillon = (Button) findViewById(R.id.bEchantillonOffert);



       Log.i(TAG, "affichage : ");
       this.tvnumero.setText("numero : "+ rapport.getNumero());
        Log.i(TAG, "numero ");
       this.tvbilan.setText("bilan : "+ rapport.getBilan());
        Log.i(TAG, "bilan");
       this.tvconfiance.setText("coefConfiance : "+ rapport.getCoefConfiance());
        Log.i(TAG, "confiance");      ;
       this.tvlu.setText("lu : "+ rapport.isLu());
        Log.i(TAG, "lu");
       this.tvdateRedac.setText("date de la redaction: "+rapport.getDateVisite().get(Calendar.DAY_OF_MONTH)+"/"+rapport.getDateVisite().get(Calendar.MONTH)+"/"+rapport.getDateVisite().get(Calendar.YEAR));
        Log.i(TAG, "date redaction");
       this.tvdateVisite.setText("date de la visite : "+rapport.getDateRedaction().get(Calendar.DAY_OF_MONTH)+"/"+rapport.getDateRedaction().get(Calendar.MONTH)+"/"+rapport.getDateRedaction().get(Calendar.YEAR));
        Log.i(TAG, "date visite");
        Log.i(TAG, "affichage"+rapport.getLeMotif());
        this.tvmotif.setText("motif : "+ rapport.getLeMotif().getLibelle() );
        Log.i(TAG, "motif");
        this.tvnomPracticien.setText("nom du praticien : "+ rapport.getLePraticien().getNom());
        Log.i(TAG, "praticien");



    }
     public void getListeEchantillons(View vue ){

         Bundle paquet = new Bundle();


         paquet.putParcelable("RapportVisite",rapport );


         Intent intentionEnvoyer = new Intent(this, VisuEchantActivity.class);
         intentionEnvoyer.putExtras(paquet);
         startActivity(intentionEnvoyer);
     }
}

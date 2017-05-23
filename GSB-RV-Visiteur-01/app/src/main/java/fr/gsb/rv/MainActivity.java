package fr.gsb.rv;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import fr.gsb.rv.fr.gsb.rv.entites.Visiteur;
import fr.gsb.rv.fr.gsb.rv.technique.Session;

public class MainActivity extends AppCompatActivity {

    final static String TAG = "GSB_MAIN_ACTIVITY";
    TextView tvErreur;
    EditText etMatricule;
    EditText etMdp;
    EditText etValeur;
    Button bSeConnecter;
    Button bSeDeconnecter;
    Button bAnnuler;




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        this.etMatricule = (EditText) findViewById(R.id.etMatricule);
        this.etMdp = (EditText) findViewById(R.id.etMdp);
        this.bSeConnecter = (Button) findViewById(R.id.bValider);
        this.bAnnuler = (Button) findViewById(R.id.bAnnuler);
        this.tvErreur = (TextView) findViewById(R.id.tvErreur);
        Log.i(TAG, "Création de l'activité principale");

    }

    public void seConnecter(View vue){

        if(Session.ouvrir(this.etMatricule.getText().toString(), this.etMdp.getText().toString())){
            Log.i(TAG, "Connexion OK ("+Session.getSession().getLeVisiteur().getPrenom()+" "+ Session.getSession().getLeVisiteur().getNom()+").");
            String nom = Session.getSession().getLeVisiteur().getNom();
            String prenom = Session.getSession().getLeVisiteur().getPrenom();

            Bundle paquet = new Bundle();
            paquet.putString("nom",nom);
            paquet.putString("prenom", prenom);

            Intent intentionEnvoyer = new Intent(this, MenuRvActivity.class);
            intentionEnvoyer.putExtras(paquet);
            startActivity(intentionEnvoyer);
            Toast.makeText(this,"vous êtes connecté",Toast.LENGTH_LONG).show();


        }
        else{
            this.tvErreur.setText("Echec a la connexion. Recommencez ...");
            this.etMatricule.setText("");
            this.etMdp.setText("");
            Log.i(TAG, "connexion Nok.");


        }
    }

    public void annuler(View vue) {
        this.etMatricule.setText("");
        this.etMdp.setText("");
        Log.i(TAG,"Initialisation des champs.");
    }











}

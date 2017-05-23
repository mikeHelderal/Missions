package fr.gsb.rv;

import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.ListView;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;

import fr.gsb.rv.fr.gsb.rv.entites.Medicament;
import fr.gsb.rv.fr.gsb.rv.entites.RapportVisite;

/**
 * Created by eleve on 27/03/17.
 */

public class VisuEchantActivity extends AppCompatActivity implements AdapterView.OnItemClickListener {
    final static String TAG = "GSB_MAIN_ACTIVITY";
    TextView TvMedicament;
    ListView lvEchantillons;
    RapportVisite rapport;
    List<Medicament> lMedicaments = new ArrayList<Medicament>();


    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        Log.i(TAG, "nouvelle activité");

        setContentView(R.layout.activity_visu_echant);

        Bundle paquet = this.getIntent().getExtras();
        rapport = paquet.getParcelable("RapportVisite");
        Log.i(TAG, "recuperation bundle");

         lMedicaments = new ArrayList<Medicament>(rapport.getLesEchantillons().keySet());

        Log.i(TAG, "creation list"+lMedicaments);



        ItemCommandeAdaptateur adaptateur = new ItemCommandeAdaptateur();
        lvEchantillons = (ListView) findViewById(R.id.lvEchantillons);
        lvEchantillons.setAdapter(adaptateur);
        lvEchantillons.setOnItemClickListener(this);
        Log.i(TAG, "modification de l'adaptateur");

    }

    @Override
    public void onItemClick(AdapterView<?> parent, View view, int position, long id) {

    }
    class ItemCommandeAdaptateur extends ArrayAdapter<Medicament>{

        ItemCommandeAdaptateur(){
            super(VisuEchantActivity.this, R.layout.item_echantillons, R.id.tvItemEchant,lMedicaments);
        }
        public  View getView(int position, View convertView, ViewGroup parent){

            View vItem = super.getView(position, convertView, parent);
            TextView tvQuantite = (TextView) vItem.findViewById(R.id.tvItemQuantite);


            List<Integer> lq = new ArrayList<Integer>(rapport.getLesEchantillons().values());
            Log.i(TAG,"les valeur"+lq.get(position) );
            tvQuantite.setText(lq.get(position).toString());

            return vItem;
        }
    }
}

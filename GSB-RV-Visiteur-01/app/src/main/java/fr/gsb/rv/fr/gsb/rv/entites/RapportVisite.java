package fr.gsb.rv.fr.gsb.rv.entites;

import android.os.Parcel;
import android.os.Parcelable;

import java.util.Calendar;
import java.util.GregorianCalendar;
import java.util.HashMap;
import java.util.Map;

public class RapportVisite implements Parcelable {

	private int numero ;
	private String bilan ;
	private int coefConfiance ;
	private GregorianCalendar dateVisite ;
	private GregorianCalendar dateRedaction ;
	private boolean lu ;
	
	private Praticien lePraticien ;
	private Visiteur leVisiteur ;
	private Motif leMotif ;
	private Map<Medicament,Integer> lesEchantillons = new HashMap<Medicament,Integer>() ;

	@Override
	public int describeContents() {
		return 0;
	}

	@Override
	public void writeToParcel(Parcel dest, int flags) {

		dest.writeInt(this.numero);
		dest.writeString(this.bilan);
		dest.writeInt(this.coefConfiance);
		dest.writeInt(this.lu ? 1 : 0);
		dest.writeValue(this.dateRedaction);
		dest.writeValue(this.dateVisite);
		dest.writeValue(this.lePraticien);
		dest.writeValue(this.leMotif);
		dest.writeMap(this.lesEchantillons);




	}

	public RapportVisite(Parcel in){
		this.numero = in.readInt();
		this.bilan = in.readString();
		this.coefConfiance = in.readInt();
		this.lu = in.readInt() == 1;
		this.dateVisite = (GregorianCalendar) in.readValue(GregorianCalendar.class.getClassLoader());
		this.dateRedaction = (GregorianCalendar) in.readValue(GregorianCalendar.class.getClassLoader());
		this.lePraticien = (Praticien) in.readValue(Praticien.class.getClassLoader());
		this.leMotif = (Motif) in.readValue(Motif.class.getClassLoader());
		this.lesEchantillons = in.readHashMap(Medicament.class.getClassLoader());
	}

	public static final Parcelable.Creator<RapportVisite> CREATOR = new Parcelable.Creator<RapportVisite>(){

		public RapportVisite createFromParcel(Parcel source){
			return new RapportVisite(source);
		}

		public RapportVisite[] newArray(int size){
			return new RapportVisite[size];		}
	};

	public RapportVisite() {
		super();
	}






	public RapportVisite(int numero, String bilan, int coefConfiance,
			GregorianCalendar dateVisite, GregorianCalendar dateRedaction,
			boolean lu) {
		super();
		this.numero = numero;
		this.bilan = bilan;
		this.coefConfiance = coefConfiance;
		this.dateVisite = dateVisite;
		this.dateRedaction = dateRedaction;
		this.lu = lu;
	}

	public RapportVisite(int numero, String bilan, int coefConfiance,
			GregorianCalendar dateVisite, GregorianCalendar dateRedaction,
			boolean lu, Praticien lePraticien, Visiteur leVisiteur,
			Motif leMotif) {
		super();
		this.numero = numero;
		this.bilan = bilan;
		this.coefConfiance = coefConfiance;
		this.dateVisite = dateVisite;
		this.dateRedaction = dateRedaction;
		this.lu = lu;
		this.lePraticien = lePraticien;
		this.leVisiteur = leVisiteur;
		this.leMotif = leMotif;
	}

	public int getNumero() {
		return numero;
	}

	public void setNumero(int numero) {
		this.numero = numero;
	}

	public String getBilan() {
		return bilan;
	}

	public void setBilan(String bilan) {
		this.bilan = bilan;
	}

	public int getCoefConfiance() {
		return coefConfiance;
	}

	public void setCoefConfiance(int coefConfiance) {
		this.coefConfiance = coefConfiance;
	}

	public GregorianCalendar getDateVisite() {
		return dateVisite;
	}

	public void setDateVisite(GregorianCalendar dateVisite) {
		this.dateVisite = dateVisite;
	}

	public GregorianCalendar getDateRedaction() {
		return dateRedaction;
	}

	public void setDateRedaction(GregorianCalendar dateRedaction) {
		this.dateRedaction = dateRedaction;
	}

	public boolean isLu() {
		return lu;
	}

	public void setLu(boolean lu) {
		this.lu = lu;
	}

	public Praticien getLePraticien() {
		return lePraticien;
	}

	public void setLePraticien(Praticien lePraticien) {
		this.lePraticien = lePraticien;
	}

	public Visiteur getLeVisiteur() {
		return leVisiteur;
	}

	public void setLeVisiteur(Visiteur leVisiteur) {
		this.leVisiteur = leVisiteur;
	}

	public Motif getLeMotif() {
		return leMotif;
	}

	public void setLeMotif(Motif leMotif) {
		this.leMotif = leMotif;
	}

	public Map<Medicament, Integer> getLesEchantillons() {
		return lesEchantillons;
	}

	public void setLesEchantillons(Map<Medicament, Integer> lesEchantillons) {
		this.lesEchantillons = lesEchantillons;
	}

	@Override
	public String toString() {
		return "date de visite :"+this.getDateVisite().get(Calendar.DAY_OF_MONTH)+"/"+this.getDateVisite().get(Calendar.MONTH)+"/"+this.getDateVisite().get(Calendar.YEAR)
				+"           practicien : ";
	}
	
}

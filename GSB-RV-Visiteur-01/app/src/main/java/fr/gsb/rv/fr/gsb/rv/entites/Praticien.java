package fr.gsb.rv.fr.gsb.rv.entites;

import android.os.Parcel;
import android.os.Parcelable;

public class Praticien implements Parcelable {

	private int numero ;
	private String nom ;
	private String prenom ;
	
	public Praticien(int numero, String nom, String prenom) {
		super();
		this.numero = numero;
		this.nom = nom;
		this.prenom = prenom;
	}

	public int getNumero() {
		return numero;
	}

	public void setNumero(int numero) {
		this.numero = numero;
	}

	public String getNom() {
		return nom;
	}

	public void setNom(String nom) {
		this.nom = nom;
	}

	public String getPrenom() {
		return prenom;
	}

	public void setPrenom(String prenom) {
		this.prenom = prenom;
	}

	@Override
	public String toString() {
		return " nom + ";
	}

	@Override
	public int describeContents() {
		return 0;
	}

	@Override
	public void writeToParcel(Parcel dest, int flags) {
		dest.writeInt(this.numero);
		dest.writeString(this.nom);
		dest.writeString(this.prenom);

	}
	public Praticien(Parcel in){
		this.numero = in.readInt();
		this.nom = in.readString();
		this.prenom = in.readString();

	}
	public static final Parcelable.Creator<Praticien> CREATOR = new Parcelable.Creator<Praticien>(){

		public Praticien createFromParcel(Parcel source){return new Praticien(source);}

		public Praticien[] newArray(int size){
			return new Praticien[size];		}
	};
}

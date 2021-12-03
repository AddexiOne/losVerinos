<?php

require_once("MyPDO.php");

class Sauveteur
{
	private string $nom;
	private string $prenom;
	private int $nbSortieMer;
	private int $nbPersSauv;
	private int $nbEquipage;
	private string $grade;
	private string $dateNaissance;
	private string $dateMort;

	private const USER_TABLE = "Sauveteur";



	public function __construct( string $nom, string $prenom, int $nbSortieMer, 
								int $nbPersSauv,int $nbEquipage,string $grade,
								string $dateNaissance,string $dateMort)
	{
		$this->nom = htmlspecialchars(strtoupper($nom));
		$this->prenom =htmlspecialchars(strtoupper($prenom));
		$this->nbSortieMer = htmlspecialchars($nbSortieMer);
		$this->nbPersSauv = htmlspecialchars($nbPersSauv);
		$this->nbEquipage = htmlspecialchars($nbEquipage);
		$this->grade = htmlspecialchars($grade);
		$this->dateNaissance = htmlspecialchars($dateNaissance);
		$this->dateMort = htmlspecialchars($dateMort);
	}

	public function exists() : bool
	{
		// 1. On prépare la requête $request
		$request = MyPDO::pdo()->prepare('SELECT * FROM '.self::USER_TABLE.' WHERE upper(nom) = :nom and upper(prenom) = :prenom');
		// 2. On assigne $nom au paramêtre :nom
		$ok = $request->bindValue( ":nom", $this->nom, PDO::PARAM_STR );
		// 3. On assigne $prnom au paramêtre :prenom
		$ok &= $request->bindValue( ":prenom", $this->prenom, PDO::PARAM_STR );

		// 4. On exécute la requête $request
		$ok &= $request->execute();

		if (!$ok)
			throw new Exception("Error: user access in DB failed.");
		
		if($request->fetch()){
			return true;
		}
		return false;
	}

	public function create() : void
	{
		//préparation de la requête
		$request = MyPDO::pdo()->prepare('INSERT INTO '.self::USER_TABLE.' VALUES (:nom,:prenom,:nbSortieMer,:nbPersSauv,:nbEquipage,:grade,:dateNaissance,:dateMort,:status)');

		//ajout des params
		$ok =  $request->bindValue( ":nom", $this->nom, PDO::PARAM_STR );
		$ok &= $request->bindValue( ":prenom", $this->prenom, PDO::PARAM_STR );
		$ok &= $request->bindValue( ":nbSortieMer",$this->nbSortieMer, PDO::PARAM_INT);
		$ok &= $request->bindValue( ":nbPersSauv",$this->nbPersSauv, PDO::PARAM_INT);
		$ok &= $request->bindValue( ":nbEquipage",$this->nbEquipage, PDO::PARAM_INT);
		$ok &= $request->bindValue( ":grade",$this->grade, PDO::PARAM_STR);
		$ok &= $request->bindValue( ":dateNaissance",$this->dateNaissance, PDO::PARAM_STR);
		$ok &= $request->bindValue( ":dateMort",$this->dateMort, PDO::PARAM_STR);
		$ok &= $request->bindValue( ":status","W",PDO::PARAM_STR);

		//execution de la requete
		$ok &= $request->execute();

		if ( !$ok )
			throw new Exception("Error: user creation in DB failed.");
	}
}

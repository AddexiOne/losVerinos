<?php
/******************************************************************************
 * Initialisation.
 */

session_start();
unset($_SESSION['message']);

/******************************************************************************
 * Traitement des données de la requête
 */

// On vérifie que la méthode HTTP utilisée est bien POST
if ( $_SERVER['REQUEST_METHOD'] != 'POST' )
{
	header('Location: signup.php');
	exit();
}

//On vérifie que les données attendues existent
if ( empty($_POST['nom']) || empty($_POST['prenom']) )
{
	$_SESSION['message'] = "Some POST data are missing.";
	header('Location: form_Ajout_Sauveteur.php');
	exit();
}


//Assignation des valeurs aux variables
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
empty($_POST['nbSortieMer']) ? $nbSortieMer=0 : $nbSortieMer=$_POST['nbSortieMer'];
empty($_POST['nbPersSauf']) ? $nbPersSauf=0 : $nbPersSauf=$_POST['nbPersSauf'];
empty($_POST['nbEquipage']) ? $nbEquipage=0 : $nbEquipage=$_POST['nbEquipage'];
empty($_POST['grade']) ? $grade="" : $grade=$_POST['grade'];
empty($_POST['dateNaissance']) ? $dateNaissance="" : $dateNaissance=$_POST['dateNaissance'];
empty($_POST['dateMort']) ? $dateMort="" : $dateMort=$_POST['dateMort'];

/******************************************************************************
 * Chargement du model
 */

require_once('Sauveteur.php');

/******************************************************************************
 * Ajout du sauveteur
 */

// On crée le sauveteur
$sauveteur = new Sauveteur($nom,$prenom,$nbSortieMer,$nbPersSauf,$nbEquipage,$grade,$dateNaissance,$dateMort);

//On test si le sauveteur existe déjà
if($sauveteur->exists()){
    $_SESSION['message'] = "Sauveteur déjà existant !";
	header('Location: form_Ajout_Sauveteur.php');
	exit();
}

// On crée le sauveteur dans la BDD
try {
	$sauveteur->create();
}
catch (PDOException $e) {
	// Si erreur lors de la création de l'objet PDO
	// (déclenchée par MyPDO::pdo())
	$_SESSION['message'] = $e->getMessage();
	header('Location: form_Ajout_Sauveteur.php');
	exit();
}
catch (Exception $e) {
	// Si erreur durant l'exécution de la requête
	// (déclenchée par le throw de $user->create())
	$_SESSION['message'] = $e->getMessage();
	header('Location: form_Ajout_Sauveteur.php');
	exit();
}

// 3. On indique que le compte a bien été créé
$_SESSION['message'] = "Sauveteur ajouté à la base de donné !";

// 4. On sollicite une redirection vers la page d'accueil
header('Location: form_Ajout_Sauveteur.php');
exit();

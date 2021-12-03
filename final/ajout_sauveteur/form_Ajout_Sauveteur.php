<?php
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Sauveteur en mer</title>
	</head>
	<body>
		<form action="addSauveteur.php" method="post">
			<label for="nom">Nom</label>             						<input type="text"     id="nom"    name="nom"    required autofocus><br>
			<label for="prenom">Prénom</label>       						<input type="text" id="prenom" name="prenom" required><br>
			<label for="nbSortieMer">Nombre de sortie en mer</label>       	<input type="number" id="nbSortieMer" name="nbSortieMer"><br>
			<label for="nbPersSauv">Nombre de personnes sauvés</label>      <input type="number" id="nbPersSauv" name="nbPersSauv"><br>
			<label for="nbEquipage">Nombre d'équipage sauvés</label>       	<input type="number" id="nbEquipage" name="nbEquipage"><br>
			<label for="grade">Grade</label>       							<input type="text" id="grade" name="grade"><br>
			<label for="dateNaissance">Date de naissance</label>       		<input type="text" id="dateNaissance" name="dateNaissance"><br>
			<label for="dateMort">Date de mort</label>       				<input type="text" id="dateMort" name="dateMort"><br>

			<input type="submit" value="Ajouter le sauveteur">
		</form>
<?php if ( !empty($_SESSION['message']) ) { ?>
		<section>
			<p><?= $_SESSION['message'] ?></p>
		</section>
<?php } ?>
	</body>
</html>

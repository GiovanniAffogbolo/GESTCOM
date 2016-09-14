<?php
if (isset($_POST['codeclient']) AND isset($_POST['nom']) AND isset($_POST['prenoms']) AND isset($_POST['datenaissance']) AND isset($_POST['email']) AND isset($_POST['ville']) AND isset($_POST['telephone']))
{
	try
	{
	$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '');
	}
	catch(Exception $e)
	{
	die('Erreur : '.$e->getMessage());
	}
	$req = $bdd->prepare('INSERT INTO client (codeclient, nom, prenoms, datenaissance, email, ville, telephone) VALUES(?, ?, ?, ?, ?, ?, ?)');
	$req->execute(array($_POST['codeclient'], $_POST['nom'], $_POST['prenoms'], $_POST['datenaissance'], $_POST['email'], $_POST['ville'], $_POST['telephone']));

	echo "Client enregistré";
	?>

	<a href="index.php">Veuillez cliquer!</a>
	<?php
}
else
{
	echo "echec de l'enregistrement </Br>";
	?>

	<a href="index.php">Veuillez cliquer!</a>
	<?php
}


?>
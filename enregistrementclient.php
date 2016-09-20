

<?php
	if (isset($_POST['codeclient']) AND isset($_POST['nom']) AND isset($_POST['prenoms']) AND isset($_POST['jour']) AND isset($_POST['mois']) AND isset($_POST['annee']) AND isset($_POST['email']) AND isset($_POST['ville']) AND isset($_POST['telephone']))
	{
		try
		{
		$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '');
		}
		catch(Exception $e)
		{
		die('Erreur : '.$e->getMessage());
		}

		$date = $_POST['annee'] . "-" . $_POST['mois'] . "-" . $_POST['jour'];
		$req = $bdd->prepare('INSERT INTO client (codeclient, nom, prenoms, datenaissance, email, ville, telephone) VALUES(?, ?, ?, ?, ?, ?, ?)');
		$req->execute(array($_POST['codeclient'], $_POST['nom'], $_POST['prenoms'], $date, $_POST['email'], $_POST['ville'], $_POST['telephone']));

		echo "client enregistré";
		header('Location: index1.php?pg=clients');
		?>

		<?php
	}
	else
	{
	echo "echec! reessayez";
	?>

	<?php
	}

?>

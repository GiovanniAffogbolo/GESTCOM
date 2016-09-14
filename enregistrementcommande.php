<?php
	if (isset($_POST['codeclient']) AND isset($_POST['refcommande']) AND isset($_POST['datecommande']) AND isset($_POST['montant']))
	{
		try
		{
			$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '');
		}
		catch(Exception $e)
		{
			die('Erreur : '.$e->getMessage());
		}
		$req = $bdd->prepare('INSERT INTO commande (codeclient, refcommande, datecommande, montant) VALUES(?, ?, ?, ?)');
		$req->execute(array($_POST['codeclient'], $_POST['refcommande'], $_POST['datecommande'], $_POST['montant']));

		echo "Commande enregistrée";
		header('Location: index.php?pg=commandes');
		?>

		<?php
	}

	else
	{

		echo "echec de l'enregistrement </Br>";
	?>

	<!--a href="index.php">Veuillez cliquer!</a-->
	<?php
	}


?>
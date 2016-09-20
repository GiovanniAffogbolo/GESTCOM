<?php
	if (isset($_POST['codeclient']) AND isset($_POST['refcommande']) AND isset($_POST['jour']) AND isset($_POST['mois']) AND isset($_POST['annee']) AND isset($_POST['montant']))
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
		$req = $bdd->prepare('INSERT INTO commande (codeclient, refcommande, datecommande, montant) VALUES(?, ?, ?, ?)');
		$req->execute(array($_POST['codeclient'], $_POST['refcommande'], $date, $_POST['montant']));

		echo "Commande enregistrée";
		header('Location: index1.php?pg=commandes');
		?>

		<?php
	}

	else
	{

		echo "echec de l'enregistrement </Br>";
	?>


	<?php
	}



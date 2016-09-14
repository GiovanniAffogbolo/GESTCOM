

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

		$id = $_GET['id'];
		  $codeclient     = $_POST["codeclient"] ;
		  $nom = $_POST["nom"] ;
		  $prenoms = $_POST["prenoms"] ;
		  $datenaissance        = $_POST["datenaissance"] ;
		  $email        = $_POST["email"] ;
		  $ville        = $_POST["ville"] ;
		  $telephone        = $_POST["telephone"] ;
		  echo $codeclient . '</Br>'. $nom . '</Br>'. $prenoms.'</Br>'.$datenaissance. '</Br>'. $email. '</Br>'. $ville. '</Br>'. $telephone. '</Br>'. $id
		 // $id         = $_GET['id'] ;
 }
 ?>
  /*création de la requête SQL:
  	$sql = "UPDATE client
            SET 
            	codeclient         = '$codeclient', 
            	nom         = '$nom', 
	            prenoms     = '$prenoms',
		  		datenaissance    = '$datenaissance',
		  		email           = '$email',
		  		ville         = '$ville', 
		  		telephone = '$telephone'
           	WHERE id = '$id' " ;*/






		/*$req = $bdd->prepare('UPDATE client SET codeclient = :codeclient, nom = :nom, prenoms = :prenoms, datenaissance = :datenaissance, email = :email, ville = :ville, telephone = :telephone WHERE id=:id" ');
		$req->execute(array($_POST['codeclient'], $_POST['nom'], $_POST['prenoms'], $_POST['datenaissance'], $_POST['email'], $_POST['ville'], $_POST['telephone']));
		$req->execute(array(
			'codeclient' => $_POST['codeclient'],
			'nom' => $_POST['nom'],
			'prenoms' => $_POST['prenoms'],
			'datenaissance' => $_POST['datenaissance'],
			'email' => $_POST['email'],
			'ville' => $_POST['ville'],
			'telephone' => $_POST['telephone'],
			'id' => $_POST['idclient']));
			//'id' => $_POST['id'] ));

		/*print_r($req);
		echo "client modifié";*/

		//include ('index.php'); */
/*		?>

		<?php
	}
	else
	{
	echo "echec! reessayez";
	?>

	<!--a href="index.php?pg=enregistrer_client">Recharger le formulaire!</a-->
	<?php
	}

?>

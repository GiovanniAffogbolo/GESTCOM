<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '');
	}

	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$id = $_GET['id'];      
	$reponse = $bdd->query("DELETE FROM client WHERE id=$id");
	include('listeclients.php');
?>
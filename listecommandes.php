<?php 

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))

{
    ?> 
<p style="margin-left: 400px; font-size: 20px; font-style: italic; background-color: red;">
<?php

    echo ( $_SESSION['pseudo']. ', vous êtes connecté!');


?>
</p>


<!DOCTYPE html>
<html>
	<head>
		<title>Liste des commandes</title>
		<link rel="stylesheet" href="gestcom.css" />
		<meta http-equiv="Content-Type" content="txt/html; charset=utf-8" 
	</head>
	
	<body>
		<table style="margin-left:110px;" border="3">

				<tr>
					<td>Code Client</td>
					<td>refcommande</td>
					<td>datecommande</td>
					<td>montant</td>
					<td>Suppression</td>
					<td>Modification</td>
					

				</tr>
		<h1 style="color:red; text-align:center;">Liste des commandes</h1>
	

		
			<?php
				$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
				$reponse = $bdd->query('SELECT * FROM commande');
				while($donnee= $reponse->fetch())
				{
			?>

			
				<tr>
					
					<td><?php echo $donnee['codeclient'] ?></td>
					<td><?php echo$donnee['refcommande'] ?></td>
					<td><?php echo$donnee['datecommande'] ?></td>
					<td><?php echo$donnee['montant'] ?></td>
					<td><?php $id=$donnee['id']; echo "<a href='index1.php?pg=supprimercommande&id=$id'>Supprimer</a>"; ?></td>
					<td><?php $id=$donnee['id']; echo "<a href='index1.php?pg=modifiercommande&id=$id'>Modifier</a>"; ?></td>
				</tr>
			
				
			<?php
			}
			$reponse->closeCursor();
			?>
			</table>

			</table>
	</body>
</html>

<?php

 }
 else
{
	header('Location:index.php');
}


 ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Liste des clients</title>
		<link rel="stylesheet" href="gestcom.css" />
		<meta http-equiv="Content-Type" content="txt/html; charset=utf-8" 
	</head>
	
	<body>
		<table id="tableclient" style="margin-left:5px;" border="3">

				<tr>
					<td>Code Client</td>
					<td>Nom</td>
					<td>Prénoms</td>
					<td>datenaissance</td>
					<td>email</td>
					<td>ville</td>
					<td>telephone</td>
					<td>Suppression</td>
					<td>Modification</td>

				</tr>
		<h1 style="color:red; text-align:center;">Liste des clients</h1>
	

		
			<?php

				$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
				$reponse = $bdd->query('SELECT * FROM client');
				while($donnee= $reponse->fetch())
				{
			?>

			
					<tr>
						<td><?php echo $donnee['codeclient'] ?></td>
						<td><?php echo$donnee['nom'] ?></td>
						<td><?php echo$donnee['prenoms'] ?></td>
						<td><?php echo$donnee['datenaissance'] ?></td>
						<td><?php echo$donnee['email'] ?></td>
						<td><?php echo$donnee['ville'] ?></td>
						<td><?php echo$donnee['telephone'] ?></td>
						<td><?php $id=$donnee['id']; echo "<a href='index.php?pg=supprimerclient&id=$id'>Supprimer</a>"; ?></td>
						<td><?php $id=$donnee['id']; echo "<a href='index.php?pg=modifierclient&id=$id'>Modifier</a>"; ?></td>
					</tr>
			
				
					<?php
				}
					$reponse->closeCursor();
					?>
			</table>

		
				</tr>
			</table>
	</body>
</html>
<!DOCTYPE html>
<html>
	<head>
		<title>Liste des commandes d'un client</title>
		<link rel="stylesheet" href="gestcom.css" />
		<meta http-equiv="Content-Type" content="txt/html; charset=utf-8" 
	</head>
	
	<body>
		<form method="POST" action="index.php?pg=recherche">

		<table >
	<caption>
		<p >Sélectionner le client dont vous voulez afficher les commandes</p>
	</caption>
	<?php 
		$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
		$reponse = $bdd->query('SELECT * FROM client');
	?> 		
	<tr>
		<td><label style="margin-left:100px; margin-top:100px;" for="codeclient" > Code du client : </label> </td>
		<td>
			<select name="codeclient">
				<?php while($donnee= $reponse->fetch())
					{?>		
						<option value="<?php echo $donnee['codeclient']; ?>"><?php echo $donnee['codeclient']; ?></option>
					<?php } ?> 
			</select>
		</td>
	</tr>
	
	<tr>
		<td><input style="margin-left:100px;" type="submit"  value="Afficher" /> </td>  
		
	</tr>
				
</table>
	</form>

	<?php
	if(isset($_POST['codeclient']))
	{
		?>

		<table style="margin-left:30px; margin-top:50px;" border="3">

				<tr>
					<td>Code Client</td>
					<td>refcommande</td>
					<td>datecommande</td>
					<td>montant</td>
					

				</tr>
	<?php
		$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
		$reponse = $bdd->prepare ('SELECT * FROM commande WHERE codeclient= ?  ');
		$reponse->execute (array ($_POST['codeclient']));
		while($donnee= $reponse->fetch())
				{
			?>

			
				<tr>
					<td><?php echo $donnee['codeclient'] ?></td>
					<td><?php echo$donnee['refcommande'] ?></td>
					<td><?php echo$donnee['datecommande'] ?></td>
					<td><?php echo$donnee['montant'] ?></td>
				</tr>
			
				
			<?php
			}
			
			
		}
		
	?>
			</table>
	</body>
</html>
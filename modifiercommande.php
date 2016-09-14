<?php
$id = $_GET['id'];

?>
	<fieldset>
		<legend><h2>Remplissez le formulaire</h2></legend>
		
		
			<table id="enregistre">

			<caption></Br></Br></caption>
			<form method="POST" >  
			<?php
				$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
				$reponse = $bdd->prepare('SELECT * FROM commande WHERE id = ?');
				$reponse->execute(array($id));
				$donnee = $reponse->fetch();
			?>
			
			<div   style="margin-top:100px;"id="formulaire">
						<tr>
							<td><label for="codeclient">Code Client : </label></td>
							<td><INPUT Name="codeclient" TYPE="text" value = "<?php if (!empty($donnee['codeclient'])) {echo $donnee['codeclient'];} ?>"  required/></td>
						</tr></Br>
						<tr>
							<td><label for="refcommande">Référence Commande :</label></td>
							<td><INPUT Name="refcommande" TYPE="text" value = "<?php if (!empty($donnee['refcommande'])) {echo $donnee['refcommande'];} ?>"required/></td>
						</tr></Br>
						<tr>
							<td><label for="datecommande">Date Commande :</label></td>
							<td><INPUT Name="datecommande" TYPE="date" value = "<?php if (!empty($donnee['datecommande'])) {echo $donnee['datecommande'];} ?>"required/></td>
						</tr></Br>
						<tr>
							<td><label for="montant">Montant :</label></td>
							<td><INPUT Name="montant" TYPE="text" value = "<?php if (!empty($donnee['montant'])) {echo $donnee['montant'];} ?>"required/></td>
						</tr></Br>
						
						<tr>
							<td><INPUT TYPE="submit" name="submit" VALUE="MODIFIER" ></td>   
						</tr>

							
			</div>
		</form>
				
			</table>
	
	</fieldset>

<?php

	if (isset($_POST['submit']))
	{
		$codeclient= $_POST['codeclient'];
		$refcommande= $_POST['refcommande'];
		$datecommande= $_POST['datecommande'];
		$montant= $_POST['montant'];
		

		$req= $bdd->query ("UPDATE commande SET  codeclient = '$codeclient', refcommande = '$refcommande', datecommande = '$datecommande', montant= '$montant' WHERE id='$id' ");
		
		print_r($req);
		if($req == true)
		{
			header('Location: index.php?pg=commandes');
			echo 'modification effectuée avec succès!';	
		}

		else 
		{
			echo 'echec de la modification';
		}

	}


		
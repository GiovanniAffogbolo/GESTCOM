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
				$reponse = $bdd->prepare('SELECT * FROM client WHERE id = ?');
				$reponse->execute(array($id));
				$donnee = $reponse->fetch();
			?>
			
			<div  id="formulaire">
						<tr>
							<td><label for="codeclient">Code Client : </label></td>
							<td><INPUT Name="codeclient" TYPE="text" value = "<?php if (!empty($donnee['codeclient'])) {echo $donnee['codeclient'];} ?>"  required/></td>
						</tr></Br>
						<tr>
							<td><label for="nom">Nom :</label></td>
							<td><INPUT Name="nom" TYPE="text" value = "<?php if (!empty($donnee['nom'])) {echo $donnee['nom'];} ?>"required/></td>
						</tr></Br>
						<tr>
							<td><label for="prenoms">Prénoms :</label></td>
							<td><INPUT Name="prenoms" TYPE="text" value = "<?php if (!empty($donnee['prenoms'])) {echo $donnee['prenoms'];} ?>"required/></td>
						</tr></Br>
						<tr>
							<td><label for="datenaissance">Date de naissance :</label></td>
							<td><INPUT Name="datenaissance" TYPE="date" value = "<?php if (!empty($donnee['datenaissance'])) {echo $donnee['datenaissance'];} ?>"required/></td>
						</tr></Br>
						<tr>
							<td><label for="email">Email </label></td>:
							<td><INPUT Name="email" TYPE="email" value = "<?php if (!empty($donnee['email'])) {echo $donnee['email'];} ?>"required/></td>
						</tr></Br>
						<tr>
							<td><label for="ville">Ville :</label></td>
							<td><INPUT Name="ville" TYPE="text" value = "<?php if (!empty($donnee['ville'])) {echo $donnee['ville'];} ?>"required/></td>
						</tr></Br>
						<tr>
							<td><label for="telephone">Téléphone :</label></td>
							<td><INPUT Name="telephone" TYPE="tel" value = "<?php if (!empty($donnee['telephone'])) {echo $donnee['telephone'];} ?>"required/></td>
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
		$nom= $_POST['nom'];
		$prenoms= $_POST['prenoms'];
		$datenaissance= $_POST['datenaissance'];
		$email= $_POST['email'];
		$ville= $_POST['ville'];
		$telephone= $_POST['telephone'];

		$req= $bdd->query ("UPDATE client SET  codeclient = '$codeclient', nom = '$nom', prenoms = '$prenoms', datenaissance= '$datenaissance', email= '$email', ville= '$ville', telephone= '$telephone' WHERE id='$id' ");
		
		print_r($req);
		if($req == true)
		{
			header('Location: index.php?pg=clients');
			echo 'modification effectuée avec succès!';	
		}

		else 
		{
			echo 'echec de la modification';
		}

	}


		
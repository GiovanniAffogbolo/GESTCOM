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
							<td>
                                                            <select name="jour">	
                                                                    <?php 
                                                                    for($i=1; $i<=31 ; $i++)
                                                                    {?>
                                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php } ?>
                                                            </select>

                                                            <select name="mois">	
                                                                    <?php 
                                                                    $mois = array ('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Aout', 'Septembre', 'Octobre', 'Novembre', 'Décembre',);
                                                                    for($i=0; $i<12 ; $i++)
                                                                    {?>
                                                                            <option value="<?php echo $i+1; ?>"><?php echo $mois[$i]; ?></option>
                                                                    <?php } ?>
                                                            </select>

                                                            <select name="annee">	
                                                                    <?php 
                                                                    for($i=1970; $i<=2030 ; $i++)
                                                                    {?>
                                                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    <?php } ?>
                                                            </select>
                                                        </td>
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
            $date = $_POST['annee']."-".$_POST['mois']."-".$_POST['jour'];
		$codeclient= $_POST['codeclient'];
		$nom= $_POST['nom'];
		$prenoms= $_POST['prenoms'];
		$datenaissance= $date;
		$email= $_POST['email'];
		$ville= $_POST['ville'];
		$telephone= $_POST['telephone'];

		$req= $bdd->query ("UPDATE client SET  codeclient = '$codeclient', nom = '$nom', prenoms = '$prenoms', datenaissance= '$datenaissance', email= '$email', ville= '$ville', telephone= '$telephone' WHERE id='$id' ");
		
		
		if($req == true)
		{
			header('Location: index1.php?pg=clients');
			echo 'modification effectuée avec succès!';	
		}

		else 
		{
			echo 'echec de la modification';
		}

	}


		
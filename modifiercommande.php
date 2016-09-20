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


		
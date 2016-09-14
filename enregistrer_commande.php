<fieldset>
		<legend><h2>Remplissez le formulaire</h2></legend>
		

<table style="text-align: center; margin-left: 150px; margin-top:-50px;">

	<caption></Br></Br></caption>
	<form method='POST' action='enregistrementcommande.php'>
		<div id="formulaire">
					<?php 
						$bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));	
						$reponse = $bdd->query('SELECT * FROM client');
					?> 		
					<tr>
						<td><label style="margin-left:100px; margin-top:100px;" for="codeclient" > Code du client : </label> </td>
						<td>
							<select name="codeclient">
								<?php 
									while($donnee= $reponse->fetch())
									{
									?>		
							<option value="<?php echo $donnee['codeclient']; ?>"><?php echo $donnee['codeclient']; ?></option>
							<?php } ?> 
							</select>
						</td>
					</tr></Br>
					<tr>
						<td><label for="refcommande">Refcommande :</label></td>
						<td><INPUT Name="refcommande" TYPE="text" required/></td>
					</tr></Br>
					<tr>
						<td><label for="datecommande">datecommande :</label></td>
						<td><select name="jour">	

							<?php 
								for($i=0; $i<31 ; $i++)
								{
							?>
								<option value="<?php echo ($i+1); ?> "><?php echo ($i+1); ?></option>
							<?php 
								} 
							?>
							</select>

							<select name="mois">

								
								<?php 
									for($i=0; $i<12 ; $i++)
									{
								?>
									<option value="<?php echo ($i+1); ?> "><?php echo ($i+1); ?></option>
								<?php 
									} 
								?>
							
							</select>
							<select name="annee">
							 	
								<?php 
									for($i=1980; $i<=2050 ; $i++)
									{
								?>
									<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
								<?php
								 	} 
								 ?>
							
							</select></td>
					</tr></Br>
					<tr>
						<td><label for="montant">Montant :</label></td>
						<td><INPUT Name="montant" TYPE="text" required/></td>
					</tr></Br>
					
					<tr>
						<td><INPUT TYPE="submit" VALUE="ENREGISTRER" ></td>     
						<td><INPUT TYPE="reset" VALUE="ANNULER" ></td> 
						<td><input type='hidden' name='pg' value='inscrire'></td> 
						<td><input type="hidden" name="idup" value="<?php if (isset($_POST['id'])) echo $_POST['id'];  ?>"/></td> 
					</tr>
		</div>
	</form>
</table>
	
	</fieldset>

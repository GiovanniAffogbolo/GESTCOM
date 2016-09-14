
	<fieldset>
		<legend><h2>Remplissez le formulaire</h2></legend>
		
		
			<table id="enregistre">

			<caption></Br></Br></caption>
			<form method="POST" action= "enregistrementclient.php" > 
			<div  id="formulaire">
						<tr>
							<td><label for="codeclient">Code Client : </label></td>
							<td><INPUT Name="codeclient" TYPE="text" autofocus required/></td>
						</tr></Br>
						<tr>
							<td><label for="nom">Nom :</label></td>
							<td><INPUT Name="nom" TYPE="text" required/></td>
						</tr></Br>
						<tr>
							<td><label for="prenoms">Prénoms :</label></td>
							<td><INPUT Name="prenoms" TYPE="text" required/></td>
						</tr></Br>
						<tr>
							<td><label for="datenaissance">Date de naissance :</label></td>
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
							<td><label for="email">Email </label></td>:
							<td><INPUT Name="email" TYPE="email" required/></td>
						</tr></Br>
						<tr>
							<td><label for="ville">Ville :</label></td>
							<td><INPUT Name="ville" TYPE="text" required/></td>
						</tr></Br>
						<tr>
							<td><label for="telephone">Téléphone :</label></td>
							<td><INPUT Name="telephone" TYPE="tel" required/></td>
						</tr></Br>
						<tr>
							<td><INPUT TYPE="submit" VALUE="ENREGISTRER" ></td>     
							<td><INPUT TYPE="reset" VALUE="ANNULER" ></td> 
							<td><input type='hidden' name='pg' value='inscrire'></td> 
							<td><input type="hidden" name="idup" value="<?php if (isset($_POST['id'])) echo $_POST['id'];  ?>"/></td--> 
						</tr>
			</div>
		</form>
				
			</table>
	
	</fieldset>
	
<?php

	$host='localhost';
	$login='root';
	$passw='';
	$bdd='gestioncom';

	$link=mysql_connect($host,$login,$passw) or die('Impossible de se connecter');
	mysql_select_db($bdd,$link) or die('Impossible de sélectionner la base de données');
	
?>
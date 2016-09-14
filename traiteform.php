<?php
include('connectbd.php');
    //on passe dans le if en cas de mise à jour 
	if (isset($_REQUEST['idup']) && ! empty($_REQUEST['idup']))
	{
		$req="update client set codeclient='".$_REQUEST['codeclient']."', nom='".$_REQUEST['nom']."', prenoms='".$_REQUEST['prenoms']."', datenaissance='".$_REQUEST['datenaissance']."', email='".$_REQUEST['email']."', ville='".$_REQUEST['ville']."', telephone='".$_REQUEST['telephone']."' where id='".$_REQUEST['idup']."'";
	}
	else //on passe dans le else en cas d'ajout
	{
		$req="insert into  client values(NULL,'" .$_REQUEST['codeclient'] ."','" . $_REQUEST['nom'] ."','" .$_REQUEST['prenoms'] ."','" .$_REQUEST['datenaissance'] ."','" .$_REQUEST['email'] ."','" .$_REQUEST['ville'] ."','" .$_REQUEST['telephone'] ."')";
	}
	//dans tout les cas on exécute la requete 
	echo $req;
	$result=mysql_query($req);
	
?>
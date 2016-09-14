<?php
  //connection au serveur
  $cnx = mysql_connect( "localhost", "root", "" ) ;
 
  //sélection de la base de données:
  $db  = mysql_select_db( "gestioncom" ) ;
 
  //récupération des valeurs des champs:
  //nom:
    $codeclient     = $_POST["codeclient"] ;
  $nom     = $_POST["nom"] ;
  //prenom:
  $prenoms = $_POST["prenoms"] ;
  //adresse:
  $datenaissance = $_POST["datenaissance"] ;
  //code postal:
  $email        = $_POST["email"] ;

    $ville     = $_POST["ville"] ;
  //numéro de téléphone:
  $telephone        = $_POST["telephone"] ;
 
  //récupération de l'identifiant de la personne:
  $id         = $_POST["id"] ;
 
  //création de la requête SQL:
  $sql = "UPDATE client
            SET codeclient         = '$codeclient', 
            nom         = '$nom', 
	          prenoms     = '$prenoms',
		  datenaissance    = '$datenaissance',
		  email           = '$email',
      ville         = '$ville', 
		  telephone = '$telephone'
           WHERE id = '$id' " ;
 
  //exécution de la requête SQL:
  $requete = mysql_query($sql, $cnx) or die( mysql_error() ) ;
 
 
  //affichage des résultats, pour savoir si la modification a marchée:
  if($requete)
  {
    echo("La modification à été correctement effectuée") ;
  }
  else
  {
    echo("La modification à échouée") ;
  }
?>
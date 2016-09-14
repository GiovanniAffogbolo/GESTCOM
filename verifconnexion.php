<?php
// Hachage du mot de passe
$pass_hache = sha1($_POST['passe']);
// Vérification des identifiants
$req = $bdd->membre('SELECT id FROM membre WHERE pseudo = :pseudo AND passe = :pass');
$req->execute(array(
'pseudo' => $pseudo,
'passe' => $pass_hache));
$resultat = $req->fetch();
if (!$resultat)
{
echo 'Mauvais identifiant ou mot de passe !';
}
else
{
session_start();
$_SESSION['id'] = $resultat['id'];
$_SESSION['pseudo'] = $pseudo;
echo 'Vous êtes connecté !';
}
?>
<?php 

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo']))

{
    ?> 
<p style="margin-left: 400px; font-size: 20px; font-style: italic; background-color: red;">
<?php

    echo ( $_SESSION['pseudo']. ', vous êtes connecté!');


?>
</p>

    <h1 style="color:orange; text-align:center; font-size:3em;">GESTCOM</h1>
    <hr size="3" color="black">

    </Br><h4 style="margin-left:80px;"> Procédez a votre action en cliquant un onglet du menu</h4>
    <h5 style="margin-left:20px;"> Vous pouvez : </h5>
    <ul>
        <li><p> Ajouter ou enregistrer un client</p></li>
        <li><p> Consulter la liste des clients pour en supprimer ou modifier les informations</p></li>
        <li><p> Ajouter ou enregistrer une commande</p></li>
        <li><p> Consulter la liste des commandes pour en supprimer ou modifier les informations</p></li>
        <li><p> Afficher les commandes d'un client donné</p></li>
    </ul>

 <?php

 }
 else
{
	header('Location:index.php?pg=connecter');
}


 ?>

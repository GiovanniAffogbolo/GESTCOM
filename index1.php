<?php

session_start();

if( isset($_SESSION['pseudo']))
{

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="gestcom.css" />
        <title> GESTION DES COMMANDES</title>
    </head>
    <body>
        <div id='conteneur'>

            <header id='entete'>
                <?php include 'header.php'; ?>
            </header>
            <hr size="3" color="pink">

            <section>
                <aside>
                    <nav id='menu'>
                        <nav>
                            <ul>
                                <li><a style="color:red;" href="index1.php?pg=accueil">Accueil</a></li>
                                <li><a style="color:red;" href="index1.php?pg=enregistrer_client">Enregistrer Client</a></li>
                                <li><a style="color:red;" href="index1.php?pg=enregistrer_commande">Enregistrer Commande</a></li>
                                <li><a style="color:red;" href="index1.php?pg=clients">Clients</a></li>
                                <li><a style="color:red;" href="index1.php?pg=commandes">Commandes</a></li>
                                <li><a style="color:red;" href="index1.php?pg=recherche">Recherche</a></li>
                                <li><a href="index1.php?pg=modifierclient"></a></li>
                                <li><a style="color:red;" href="index1.php?pg=deconnecter">Se déconnecter</a></li>
                                
                            </ul>
                        </nav>

                    </nav>
                </aside>


                <article id="affichage">
                    <?php include 'affichage.php'; ?>
                </article>

            </section>

            <hr size="3" color="pink">

            <footer id='bas'> 
                <?php include 'bas_page.php'; ?>
            </footer>



    </body>
</html>

<?php
}
else
{
	header('Location: index.php');
}

?>
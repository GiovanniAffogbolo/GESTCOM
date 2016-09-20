<?php


    if (isset($_REQUEST['pg'])) {
        switch ($_REQUEST['pg']) {
            case 'accueil':include ('accueil.php');
                break;

            case'enregistrer_client':include ('enregistrer_client.php');
                break;

            case 'clients':include ('listeclients.php');
                break;

            case'enregistrer_commande':include ('enregistrer_commande.php');
                break;

            case'commandes':include ('listecommandes.php');
                break;

            case 'recherche':include ('recherche.php');
                break;

            case 'supprimerclient':include ('supprimerclient.php');
                break;

            case 'modifierclient':include ('modifierclient.php');
                break;

            case 'supprimercommande':include ('supprimercommande.php');
                break;

            case 'modifiercommande':include ('modifiercommande.php');
                break;

            case 'deconnecter': include ('deconnecter.php');
                break;

            

            default : include 'accueil.php';
        }
    } else {
        include 'accueil.php';
    }


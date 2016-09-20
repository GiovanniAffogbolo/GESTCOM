<?php

/*use mPDF;*/

if (isset($_SESSION['id']) AND isset($_SESSION['pseudo'])) {
    ?> 
    <p style="margin-left: 400px; font-size: 20px; font-style: italic; background-color: red;">
        <?php
        echo ( $_SESSION['pseudo'] . ', vous êtes connecté!');
        ?>
    </p>

    <!DOCTYPE html>
    <html>
        <head>
            <title>Liste des clients</title>
            <link rel="stylesheet" href="gestcom.css" />
            <meta http-equiv="Content-Type" content="txt/html; charset=utf-8" 
        </head>

        <body>
            <table id="tableclient" style="margin-left:5px;" border="3">

                <tr>
                    <td>Code Client</td>
                    <td>Nom</td>
                    <td>Prénoms</td>
                    <td>datenaissance</td>
                    <td>email</td>
                    <td>ville</td>
                    <td>telephone</td>
                    <td>Suppression</td>
                    <td>Modification</td>

                </tr>
                <h1 style="color:red; text-align:center;">Liste des clients</h1>



    <?php
    $bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $reponse = $bdd->query('SELECT * FROM client');
    while ($donnee = $reponse->fetch()) {
        ?>


                    <tr>
                        <td><?php echo $donnee['codeclient'] ?></td>
                        <td><?php echo$donnee['nom'] ?></td>
                        <td><?php echo$donnee['prenoms'] ?></td>
                        <td><?php echo$donnee['datenaissance'] ?></td>
                        <td><?php echo$donnee['email'] ?></td>
                        <td><?php echo$donnee['ville'] ?></td>
                        <td><?php echo$donnee['telephone'] ?></td>
                        <td><?php $id = $donnee['id'];
            echo "<a href='index1.php?pg=supprimerclient&id=$id'>Supprimer</a>"; ?></td>
                        <td><?php $id = $donnee['id'];
            echo "<a href='index1.php?pg=modifierclient&id=$id'>Modifier</a>"; ?></td>
                    </tr>


        <?php
    }
    $reponse->closeCursor();
    ?>
            </table>


        </tr>
    </table>
    </body>

    </html>
    <input type="submit" value="imprimer" <a href="index1.php?pg=imprimer.php"/> 
    <?php
    

   /* function html_to_pdf($html , $page = 'A4')
{
    //Now generate pdf from html
    include("vendor/mpdf/mpdf/mpdf.php");
     
    //A4 paper
    $mpdf = new mPDF('utf-8' , $page , '' , '' , 0 , 0 , 0 , 0 , 0 , 0); 
    $mpdf->SetDisplayMode('fullpage');
    $mpdf->list_indent_first_level = 0;  // 1 or 0 - whether to indent the first level of a list
     
    $mpdf->WriteHTML($html);
    $mpdf->Output();
}
html_to_pdf();*/
    

} else {
    header('Location:index.php');
}
?>

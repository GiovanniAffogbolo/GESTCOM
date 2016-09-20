<meta charset="utf-8">

<?php
if (isset($_POST['submit'])) {
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $password = htmlspecialchars(trim($_POST['password']));

    if (empty($pseudo)) {
        echo "<p style='margin-left:550px;'>veuillez saisir votre pseudo</p><Br/>";
    } else if (empty($password)) {
        echo ("<p style='margin-left:550px;'>veuillez saisir votre mot de passe</p>");
    } else {
        $password = md5($password);

        $req = $bdd->prepare('SELECT id FROM membre WHERE pseudo = :pseudo AND password = :password');

        $req->execute(array(
            'pseudo' => $pseudo,
            'password' => $password));


        $resultat = $req->fetch();


        if ($resultat) {

            session_start();

            $_SESSION['id'] = $resultat['id'];

            $_SESSION['pseudo'] = $pseudo;

            echo 'Vous êtes connecté !';
            header('Location:index1.php');
        } else {

            echo "<p style='margin-left:550px;'>Mauvais identifiant ou mot de passe !</p>";
        }
    }
}
?>





<!DOCTYPE html>
<html lang="=fr">
    <head>
        <meta http-equiv="content-type" content="text/html" charset="utf-8" />
        
        <!-- BOOTSTRAP CORE CSS -->
        <link href="assets/css/bootstrap.css" rel="stylesheet" />

        <style type="text/css">
            body
            {
                background-image: url('2.jpg');
            }

            footer
            {
                background-image: url('fond_gris.png');
            }

        </style>
    </head>
    <body>

        <!--HOME SECTION START  -->
        <div id="home">
            <div class="overlay">
                <div class="container">
                    <div class="row text-center">
                        <div class="  col-lg-12 col-md-12 col-sm-12 ">
                            <h1 >GESTCOM</h1>
                            <!-- ABOUT SECTION START-->


                            <section id="about" class="container">
                                <div class="row text-center" style="height : 500px;">
                                    <div class="col-md-12">
                                        <h2 class="head-line row">ACCES PAGE D'ACCUEIL</h2>
                                        <div class="row text-center">
                                            <form style="margin-left: 200px;"method="POST" action="" class="well form-horizontal  col-md-8" >
                                                <div class="">
                                                    <h1>Connexion</h1>
                                                    <div class="row text-center">
                                                        <div style="margin-left:160px;" class="form-group col-md-7 ">
                                                            <label class="sr-only" for="name">pseudo</label>
                                                            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row text-center">
                                                        <div style="margin-left:160px;" class="form-group  col-md-7">
                                                            <label class="sr-only" for="password">Password</label>
                                                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="" >
                                                        </div>
                                                    </div>
                                                    <div class="">
                                                        <br/><input class="form-group btn btn-primary" type="submit" name="submit" value="Se connecter">
                                                    </div>
                                                </div>
                                                <br/><br/><p> Pas encore membre?<a href="inscription.php">  créer un compte!</a></p>
                                            </form>
                                        </div>
                                    </div>
                                </div>   
                            </section>
                        </div>
                    </div>
                    <!-- ABOUT SECTION END-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--HOME SECTION END  -->
<!-- FOOTER SECTION START-->
<footer>
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12 col-md-12 col-sm-12">
                &copy; 2016 GESTCOM
            </div>
        </div>
    </div>
</footer>
</body>
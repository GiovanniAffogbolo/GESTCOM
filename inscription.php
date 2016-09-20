<meta charset="utf-8">



<?php
if (isset($_POST['submit'])) {

    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $password = htmlspecialchars(trim($_POST['password']));
    $repeatpassword = htmlspecialchars(trim($_POST['repeatpassword']));

    if ($pseudo && $password && $repeatpassword) {
        if (strlen($pseudo) >= 6) {

            if (strlen($password) >= 8) {
                if ($password == $repeatpassword) {
                    $password = md5($password);

                    try {
                        $bdd = new PDO('mysql:host=localhost;dbname=gestioncom', 'root', '');
                    } catch (Exception $e) {
                        die('Erreur : ' . $e->getMessage());
                    }

                    $req = $bdd->prepare('INSERT INTO membre (pseudo, password ) VALUES(?, ?)');
                    $req->execute(array($pseudo, $password));

                    echo "<p style='margin-left:550px;'>inscription terminée! vous pouvez vous <a href='index.php'>connecter</a></p>";
                    
                } else {
                    echo "<p style='margin-left:550px;'> Les mots de passes ne sont pas identiques</p>";
                }
            } else {
                echo"<p style='margin-left:550px;'>Le mot de passe doit contenir au moins 8 caractères!</p>";
            }
        } else {
            
            echo"<p style='margin-left:550px;'>Le nom d'utilisateur est trop court!</p>";
        }
    } else {
        echo "<p style='margin-left:550px;'>Veuillez saisir tous les champs!</p>";
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
                                        
                                        <div class="row text-center">
                                            <form style="margin-left: 200px;"method="POST" action="inscription.php" class="well form-horizontal  col-md-8" >
                                                <div class="">
                                                    <h2 class="head-line row">INSCRIPTION</h2>
                                                    <div class="row text-center">
                                                        <div style="margin-left:160px;" class="form-group col-md-7 ">
                                                            <label class="sr-only" for="name">pseudo</label>
                                                            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrez votre Pseudo(au moins 6 caractères)" required="">
                                                        </div>
                                                    </div>
                                                    <div class="row text-center">
                                                        <div style="margin-left:160px;" class="form-group  col-md-7">
                                                            <label class="sr-only" for="password">Password</label>
                                                            <input type="password" class="form-control" name="password" id="password" placeholder="Entrez votre mot de passe(au moins 8 caractères)" required="" >
                                                        </div>
                                                    </div>
                                                    <div class="row text-center">
                                                        <div style="margin-left:160px;" class="form-group  col-md-7">
                                                            <label class="sr-only" for="password">Password</label>
                                                            <input type="password" class="form-control" name="repeatpassword" id="repeatpassword" placeholder="Répétez le mot de passe" required="" >
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="">
                                                        <br/><input class="form-group btn btn-primary" type="submit" name="submit" value="S'inscrire">
                                                    </div>
                                                </div>
                                                <br/><br/><p>Je possède déja un compte.<a href="index.php"> Se connecter!</a></p>
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





































<!--title>INSCRIPTION</title>

<h1>Inscription</h1>
<form method="POST" action="inscription.php">

    <p>Votre nom d'utilisateur</p>
    <input type="text" name="pseudo">
    <p>Votre mot de passe</p>
    <input type="password" name="password">
    <p>Répétez votre mot de passe</p>
    <input type="password" name="repeatpassword"><br><br>
    <input type="submit" name="submit" value="valider">

</form>

<a href="index.php">Je possède déja un compte</a-->
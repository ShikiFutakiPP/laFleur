<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>
        La Fleur
    </title>
</head>

<body>

<?php 
session_start();
if (isset($_SESSION['login'])) {
    header('Location: deconnect.php'); //redirige vers l'index si déjà connecté
}
?>

<!-- Bouton retour à l'index -->
<a href="index.php"> Retour </a>

<!-- Formulaire de connexion -->
<h1>Connexion</h1>
    <form enctype="multipart/form-data" class="form-signin"
            action="connection.php" method="post">

        <div>
            <label for="auth">Identifiant : </label>
            <input type="text" name="auth" required/>
        </div>

        <div>
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" required/>
        </div>

        <div class="allButtons">
            <button type="reset">Annuler</button>
            <button type="submit">Envoyer</button>
        </div>

    </form>
    
    <?php
    
    // Indique que des caractères interdits sont entrés
    if (isset($_REQUEST['error'])) {
        if ($_REQUEST['error'] == '1') {
            echo "<br/><div class='result'>
                    Echec de l'authentification : caractères interdits";
            echo "</div>";
        }
        // Indique que les identifiants sont incorrects
        if ($_REQUEST['error'] == '2') {
            echo "<br/><div class='result'>
                Identifiant ou mot-de-passe incorrect";
            echo "</div>";
        }
    }
    //invoque le programme pour vérifier les données
    if (isset($_REQUEST['auth']) && isset($_REQUEST['password'])) {
        echo "<br/><div class='result'>";
        $dbname = 'laFleur';
        include 'sessions.php';
        echo "</div>";
    }
    ?>


</body>
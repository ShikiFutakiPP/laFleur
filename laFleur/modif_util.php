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

<a href="index.php"> Retour </a><br/><br/>

<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php'); //redirige un utilisateur non connecté sur la page d'accueil
}
include 'sqlconnect.php';

$mail = $_SESSION['login'];
$requeteSql = "SELECT `nom`,`prenom` FROM `utilisateur` WHERE `adresse_mail`='$mail'";
$reponse = $connection->query($requeteSql);
while ($resultat = $reponse->fetch()) {
    $nom = $resultat['nom'];
    $prenom = $resultat['prenom'];
}
?>
<h1>Modifier mes informations</h1><br/>
<h2>Modifier mes coordonnées</h2>
<form enctype="multipart/form-data" class="form-signin"
            action="update_util.php" method="post">
    <div>
        <label for="mail">Mail : </label>
        <input type="text" name="mail"
                value="<?php echo $mail ?>" required/>
    </div>

    <div>
        <label for="nom">Nom : </label>
        <input type="text" name="nom"
                value="<?php echo $nom ?>" required/>
    </div>

    <div>
        <label for="prenom">Prénom : </label>
        <input type="number_format" name="prenom"
                value="<?php echo $prenom ?>" required/>
    </div>

    <div class="allButtons">
        <button type="reset">Annuler</button>
        <button type="submit">Modifier</button>
    </div>
</form>

<br/>
<h2>Modifier mon mot de passe</h2>
<form enctype="multipart/form-data" class="form-signin"
            action="update_pass.php" method="post">
    <div>
        <label for="pass">Nouveau mot-de-passe : </label>
        <input type="password" name="pass"/>
    </div>
    <div>
        <label for="pass_confirm">Confirmer le nouveau mot-de-passe : </label>
        <input type="password" name="pass_confirm"/>
    </div>
    <div class="allButtons">
        <button type="reset">Annuler</button>
        <button type="submit">Modifier</button>
    </div>
</form>

<?php 

if (isset($_REQUEST['error'])) {
    if ($_REQUEST['error'] == '1') {
        echo "<br/>
            Erreur : Caractères interdits";
        echo "</div>";
    }
    if ($_REQUEST['error'] == '2') {
        echo "<br/>
            Echec des modifications";
        echo "</div>";
    }
    if ($_REQUEST['error'] == '3') {
        echo "<br/>
            Erreur : mot-de-passe confirmé différent du mot-de-passe entré";
        echo "</div>";
    }
}

if (isset($_REQUEST['mod_done'])) {
    if ($_REQUEST['mod_done'] == '1') {
        echo "<br/>
                Coordonnées modifiées avec succès";
        echo "</div>";
    }
    if ($_REQUEST['mod_done'] == '2') {
        echo "<br/>
            Mot-de-passe modifié avec succès";
        echo "</div>";
    }
}

?>

</body>
</html>
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


</body>
</html>
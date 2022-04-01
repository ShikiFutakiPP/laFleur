<?php
//tente de se connecter à la base de donnée
include 'sqlconnect.php';

$auth = $_REQUEST['auth'];
$password = $_REQUEST['password'];

//vérifie qu'il n'y a pas de caractères spéciaux

if ((strstr($auth, '\'')) || (strstr($auth, '"')) || (strstr($auth, '<')) || (strstr($password, '\'')) || (strstr($password, '"')) || (strstr($password, '<'))) {
    header('Location: connection.php?error=1'); //si caractères interdits, retour page connexion
}

//vérifie sur la base de données l'identifiant et le mot de passe
$requeteSql = "SELECT * FROM `utilisateur` WHERE `adresse_mail`='$auth' AND `mot_de_passe`=PASSWORD('$password')";
$reponse = $connection->query($requeteSql);
$row_cnt = $reponse->rowCount();
if ($row_cnt != 0) {
    while ($resultat = $reponse->fetch()) {
        $_SESSION['login'] = $resultat["adresse_mail"]; //entre dans une variable de session le mail
        header('Location: index.php');
    }
} else {
    header('Location: connection.php?error=2'); //si données incorrectes, retour page connexion
}
?>
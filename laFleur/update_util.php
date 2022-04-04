<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php'); //redirige un utilisateur non connecté sur la page d'accueil
}
require 'sqlconnect.php';

$mail = $_REQUEST['mail'];
$nom = $_REQUEST['nom'];
$prenom = $_REQUEST['prenom'];
$mail_original = $_SESSION['login'];

//vérifie qu'il n'y a pas de caractères spéciaux
if ((strstr($mail, '\'')) || (strstr($mail, '"')) || (strstr($mail, '<')) || (strstr($nom, '\'')) || (strstr($nom, '"')) || (strstr($nom, '<')) || (strstr($prenom, '\'')) || (strstr($prenom, '"')) || (strstr($prenom, '<'))) {
    header('Location: modif_util.php?error=1'); //si caractères interdits, retour page connexion
} else {
    $requeteSql = "UPDATE `utilisateur`
                    SET `adresse_mail`='$mail', `nom`='$nom',
                        `prenom`='$prenom'
                    WHERE `adresse_mail`='$mail_original'";
    $reponse = $connection->exec($requeteSql);
    if ($reponse != 0) {
        $_SESSION['login']=$mail;
        header('Location: modif_util.php?mod_done=1'); //1 = réussite modif coordonnées
    } else {
        header('Location: modif_util.php?error=2'); //2 = échec entrée
    } 
}
?>

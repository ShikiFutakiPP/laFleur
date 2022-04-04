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
?>

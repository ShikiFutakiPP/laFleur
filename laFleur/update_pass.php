<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: index.php'); //redirige un utilisateur non connecté sur la page d'accueil
}

if ($_REQUEST['pass'] != $_REQUEST['pass_confirm']) {
    header('Location: modif_util.php?error=3'); //3 = échec : mots de passe non égaux
} else {
    require 'sqlconnect.php';
    $pass = $_REQUEST['pass'];
    $mail = $_SESSION['login'];

    //vérifie qu'il n'y a pas de caractères spéciaux
    if ((strstr($pass, '\'')) || (strstr($pass, '"')) || (strstr($pass, '<'))) {
        header('Location: modif_util.php?error=1'); //si caractères interdits, retour page connexion
    } else {
        $requeteSql = "UPDATE `utilisateur`
                        SET `mot_de_passe`=PASSWORD('$pass')
                        WHERE `adresse_mail`='$mail'";
        $reponse = $connection->exec($requeteSql);
        if ($reponse != 0) {
            $_SESSION['login']=$mail;
            header('Location: modif_util.php?mod_done=2'); //2 = réussite modif mdp
        } else {
            header('Location: modif_util.php?error=2'); //2 = échec entrée
        } 
    }
}
?>

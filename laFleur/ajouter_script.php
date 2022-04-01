<?php
        require 'sqlconnect.php';

                $valeur1=htmlentities($_REQUEST['code_produit']);
                $valeur2=htmlentities($_REQUEST['nom_produit']);
                $valeur3=htmlentities($_REQUEST['prix']);
                $valeur4=htmlentities($_REQUEST['en_stock']);
                $valeur5=htmlentities($_REQUEST['image']);
                $valeur6=htmlentities($_REQUEST['code_categorie']);

                    $sql = 'INSERT INTO produit VALUES ("'.$valeur1.'","'.$valeur2.'","'.$valeur3.'","'.$valeur4.'","'.$valeur5.'","'.$valeur6.'");';
                echo $sql;
                $table = $connection->exec($sql);
                echo '<br>La ligne est bien ajoutée.';
                //moment où la base de donnée exécute la requete d'ajout des valeur.           
         
        ?> 
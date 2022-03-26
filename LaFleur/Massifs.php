<?php
require 'sqlconnect.php';

$sql = 'SELECT * FROM produit WHERE code_categorie = "mas"' ;     

$table = $connection->query($sql);     
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <title>
      Massifs
   </title>
</head>
<body>
   <h1>
      Liste des Massifs
   </h1>
      <?php
         while($ligne = $table->fetch()) {     
      ?>
   <li>
      <?php      
            echo 'code_produit = '.$ligne['code_produit'].' nom_produit = '.$ligne['nom_produit'].' prix = '.$ligne['prix'].' en_stock = '. $ligne['en_stock'].' code_categorie = '. $ligne['code_categorie']; 
         
         }
      ?>   
   </li>
   <?php
      $table->closeCursor();
   ?>
</body>
</html>
<?php
require 'sqlconnect.php';
$sql = 'SELECT * FROM produit WHERE code_categorie LIKE '.'"'.'%'.$_REQUEST["recherche"].'%'.'"'. ' OR code_produit LIKE '.'"'.'%'.$_REQUEST["recherche"].'%'.'"'. ' OR nom_produit  LIKE '.'"'.'%'.$_REQUEST["recherche"].'%'.'"'. 'OR prix LIKE '.'"'.'%'.$_REQUEST["recherche"].'%'.'";'; 

$table = $connection->query($sql);  

?>
<body>
   <h1>
      Résultat de votre recherche
   </h1>
      <?php
         while($ligne = $table->fetch()) {     
      ?>
   <li>
      <a href="resultat.php?<?php echo 'code_produit='.$ligne['code_produit'].'&nom_produit='.$ligne['nom_produit'].'&prix='.$ligne['prix'].'&en_stock='.$ligne['en_stock'].'&code_categorie='.$ligne['code_categorie'].'&image='.$ligne['image'];?>">
         <?php      
               echo 'code_produit = '.$ligne['code_produit'].' nom_produit = '.$ligne['nom_produit'].' prix = '.$ligne['prix'].' en_stock = '. $ligne['en_stock'].' code_categorie = '. $ligne['code_categorie']; 
         ?>
      </a>
      <img src="<?php echo './images/'.$ligne['image'].'.jpg'?>">   
   </li>
   <?php
      }
      $table->closeCursor();
   ?>
</body>

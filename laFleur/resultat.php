<?php 
$image = './images/'.$_REQUEST['image'].'.jpg'; 
?>

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
<h1>
    Votre Produit
</h1>

<li>
    <?php echo 'code produit : '.$_REQUEST['code_produit']; ?>
</li>
<li>
    <?php echo 'nom du produit : '.$_REQUEST['nom_produit']; ?>
</li>
<li>
    <?php echo 'prix : '.$_REQUEST['prix']; ?>
</li>
<li>
    <?php echo 'stock : '.$_REQUEST['en_stock']; ?>
</li>
<li>
    <?php echo 'code catégorie : '.$_REQUEST['code_categorie']; ?>
</li>
<li>
    <img src="<?php echo $image ?>">
</li>

</body>
</html>
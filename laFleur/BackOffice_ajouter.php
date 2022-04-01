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
    <h1>Ajouter un article</h1>

    <form method="get" action="ajouter_script.php">
        <div>
            <label>code du produit</label>
            <input type="text" name="code_produit"/>
        </div>
        <div>
            <label>nom du produit</label>
            <input type="text" name="nom_produit"/>
        </div>
        <div>
            <label>prix du produit</label>
            <input type="text" name="prix"/>
        </div>
        <div>
            <label>stock du produit</label>
            <input type="text" name="en_stock"/>
        </div>
        <div>
            <label>image du  produit</label>
            <input type="text" name="image"/>
        </div>
        <div>
            <label>code catégorie du produit</label>
            <input type="text" name="code_categorie"/>
        </div>
        <div>
            <input type="submit" value="envoyer"/>
            <input type="reset" value="annuler"/>
        </div>
    </form>

</body>
</html>
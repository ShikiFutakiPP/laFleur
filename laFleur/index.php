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

<?php 
session_start();
if (!isset($_SESSION['login'])) {
    echo "<a href='connection.php'> Se connecter </a>";
} else {
    echo "<a href='connection.php'> Se déconnecter </a>";
}
?>

<h1>
    Liste des catégories
</h1>
<div class="container">
  <div class="row">
    <div class="col-10">
        <li>
            <a href="Bulbes.php">
                Bulbles
            </a>
        </li>
        <li>
            <a href="Massifs.php">
                Massifs
            </a>
        </li>
        <li>
            <a href="Rosiers.php">
                Rosiers
            </a>
        </li>
    </div>
    <div class="col-2">
        <form action="recherche.php" method="GET">
            <label for="Votre Recherche" class="form-label">Votre recherche</label>
            <input class="form-control" name="recherche" id="recherche">
            <button type="submit" class="btn btn-primary">Rechercher</button>
        </form>
    </div>
  </div>
</div>
</body>
</html>
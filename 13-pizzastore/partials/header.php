<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Pizza Store | J'en veux encore !</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <!-- //////////////////////////////  NAVBAR  /////////////////////////////// -->

    <?php
    // Si REQUEST_URI vaut /home/toto/fichier.php, $page renverra fichier
    $page = basename ($_SERVER['REQUEST_URI'], '.php');
    ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-danger">
      <a class="navbar-brand text-warning" href="index.php" >Pizza Store</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-pizzastore">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-pizzastore">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($page === 'index')? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item <?= ($page === 'pizza_list')? 'active' : ''; ?>">
            <a class="nav-link" href="pizza_list.php">Liste des pizzas</a>
          </li>
        </ul>
      </div>
    </nav>
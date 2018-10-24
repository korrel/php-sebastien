<?php 

// Le fichier database.php est inclus sur toutes les pages -->
// ATTENTION on part du fichier HEADER qui inclus le fichier PHP
require_once(__DIR__.'/../config/config.php'); 

?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>
    <?php 
        if ($currentPageTitle === null) {  // si on est sur la page d'accueil
            echo $siteName. ' - Notre pizzeria en ligne';
        }else { // si on est sur une autre page
            echo $currentPageTitle . ' - ' .$siteName;
        }
    ?>
    
    </title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body>

    <!-- //////////////////////////////  NAVBAR  /////////////////////////////// -->

    <nav class="navbar navbar-expand-md navbar-dark bg-danger">
      <a class="navbar-brand text-warning" href="index.php">
      <?php echo $siteName; ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-pizzastore">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-pizzastore">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item <?= ($currentPageUrl === 'index')? 'active' : ''; ?>">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item <?= ($currentPageUrl === 'pizza_list')? 'active' : ''; ?>">
            <a class="nav-link" href="pizza_list.php">Liste des pizzas</a>
          </li>
        </ul>
      </div>
    </nav>
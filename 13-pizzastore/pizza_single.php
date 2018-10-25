<!-- Le fichier Header.php est inclus sur la page -->
<?php 
$currentPageTitle = 'Nos pizzas';
require_once(__DIR__.'/partials/header.php'); 

// Récupère ID dans l'url / on va chercher dans une requête l'id définit / et on le récupère de la file d'attente
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$query = $db->query('SELECT * FROM pizza WHERE id = '.$id);
$pizza = $query->fetch();

?>

    <!-- //////////////////////////////  MAIN  /////////////////////////////// -->

    <main class="container mt-5">
        <div class="row slide">
            <div class="col">
                <h1 class="page-title">
                    <i class="fas fa-chart-pie"></i>
                    <?php 
                        echo $pizza['name']; 
                    ?>
                </h1>
                <img src="assets/img/pizza-slide.jpg" class="img-fluid max-width: 100% height-auto" alt="Responsive image de la page Liste">
            </div>
        </div>

        <!-- //////////////////////////////  FIL D'ARIANE  /////////////////////////////// -->

        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="pizza_list.php" class="text-secondary">Liste des pizzas</a></li>
                        <li class="breadcrumb-item active text-danger" aria-current="page"><?= $pizza['name']; ?></li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- //////////////////////////////  CONTENU DE LA PAGE /////////////////////////////// -->

    </main> 

<!-- Le fichier Header.php est inclus sur la page-->
<?php require_once(__DIR__.'/partials/footer.php'); ?>
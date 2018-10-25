<!-- Le fichier Header.php est inclus sur la page -->
<?php 
$currentPageTitle = 'Nos pizzas';
require_once(__DIR__.'/partials/header.php'); 

// Récupère la liste des pizzas
$query = $db -> query('SELECT * FROM pizza');
$pizzas = $query -> fetchAll();

?>

    <!-- //////////////////////////////  MAIN  /////////////////////////////// -->

    <main class="container mt-5">
        <div class="row slide">
            <div class="col">
                <h1 class="page-title">
                    <i class="fas fa-chart-pie"></i> Liste des pizzas
                </h1>
                <img src="assets/img/pizza-slide.jpg" class="img-fluid max-width: 100% height-auto" alt="Responsive image de la page Liste">
            </div>
        </div>


        <div class="row">
            <!-- On affiche les pizzas -->
            <?php foreach ($pizzas as $pizza){ ?>

                <div class="col-sm-6 col-md-6 col-lg-3">
                    <div class="card card-encart mb-4">
                        <div class="card-img-top-container position-relative">
                            <img class="card-img card-img-top-zoom-effect" src ="assets/<?= $pizza['image']; ?>" alt ="<?= $pizza['name']; ?>">
                            <div class="pastille">
                                <?php 
                                //echo str_replace('.',',', $pizza['price']); 
                                echo formatPrice($pizza['price']);
                                
                                ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"><?= $pizza['name'];?></h4>

                            <!-- On affiche une page avec un ID spécifique à chaque Pizza -->
                            <a href="pizza_single.php?id=<?= $pizza['id']; ?>" class="btn btn-danger">Commandez</a>
                        </div>
                    </div>
                </div>

            <?php }?>
        </div>

    </main>

<!-- Le fichier Header.php est inclus sur la page-->
<?php require_once(__DIR__.'/partials/footer.php'); ?>
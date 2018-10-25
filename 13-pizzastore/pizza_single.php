<?php  ////////////////////////////////  PHP   ////////////////////////////////////////////////

// Récupérer l'ID de la pizza dans l'url
$id=isset($_GET['id'])? $_GET['id'] : 0;
// récupérer la base de données
require_once(__DIR__.'/config/database.php');
//récupèrer les informations de la pizza
$query = $db ->prepare('SELECT*FROM pizza WHERE id= :id');  // :id est un paramètre
$query -> bindValue(':id', $id, PDO::PARAM_INT); // on s'assure que l'id est bien un entier
$query ->execute(); // execute la requête
$pizza = $query->fetch();

// renvoyer une 404 si la pizza n'existe pas
if($pizza === false) {
    http_response_code(404); // network
    // on pourrait aussi rediriger l'utilisateur vers la liste des pizzas
    // header('location: pizza_list.php')
    require_once(__DIR__.'/partials/header.php');
    ?> <!-- //////////////////////////////////  HTML   //////////////////////////////////////////// -->

    <div class ="container">
        <h1 class="mt-5">404... Redirection dans 3 secondes !</h1>
        <div style="width:400px;height:0;padding-bottom:50%;position:relative;margin:auto;"><iframe src="https://giphy.com/embed/Y4wgyGATg0rRYCZGOs" width="100%" height="100%" style="position:absolute" frameBorder="0" class="giphy-embed" allowFullScreen></iframe></div><p><a href="https://giphy.com/stickers/mini-italia-Y4wgyGATg0rRYCZGOs"></a></p>
    </div>
    <script>
        setTimeout(function(){
            window.location = 'pizza_list.php';
        }, 3000);
    </script>

    <?php /////////////////////////////////   PHP   /////////////////////////////////////////////////
    require_once(__DIR__.'/partials/footer.php'); 
    die();
}

// définit le titre de la page de la pizza
$currentPageTitle = $pizza['name'];
// Le fichier Header.php est inclus sur la page
require_once(__DIR__.'/partials/header.php'); 

?> <!-- //////////////////////////////////////////////////////////////////////////////////////-->

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
        <div class="container pl-0 description-container">
            <div class="row">
                <div class="col-md-6">
                    <img src ="assets/<?= $pizza['image']; ?>" alt ="<?= $pizza['name']; ?>" class="img-fluid img-description">
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <h5 class="card-header"><?= $pizza['name']; ?></h5>
                        <div class="card-body">
                            <h5 class="card-title">Description de la pizza</h5>
                            <p class="card-text">LoremQuisquam harum numquam sapiente doloremque atque exercitationem rem, deleniti, distinctio laborum consequatur provident est fuga nam sed suscipit perferendis debitis ex? Reprehenderit.</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted display-4">
                                <?php echo formatPrice($pizza['price']);?>
                            </small>
                        </div>
                        <div class="card-body">
                            <a href="#" class="btn btn-danger btn-block">Commander</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </main> 

<!-- Le fichier Header.php est inclus sur la page-->
<?php require_once(__DIR__.'/partials/footer.php'); ?>
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
                    <i class="fas fa-chart-pie"></i> Ajouter une pizza
                </h1>
                <img src="assets/img/4-fromages.jpg" class="img-fluid max-width: 100% height-auto" alt="Responsive image de la page Liste">
            </div>
        </div>

        <!-- //////////////////////////////  MODAL FORMULAIRE  /////////////////////////////// -->
        <section class="container">
            <div class="row">
                <div class="col p-0">

                    <!-- Mon bouton qui renvoie vers le formulaire -->
                    <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#ajouterPizza">
                    Ajouter une pizza <i class="fas fa-chart-pie"></i>
                    </button>

                    <!-- Le Modal -->
                    <div class="modal fade" id="ajouterPizza" tabindex="-1" role="dialog" aria-labelledby="ajouterPizzaTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="ajouterPizzaTitle">Pizz'ADD ++</h5>
                            <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                        <!-- //////////////////////////////  FORMULAIRE  /////////////////////////////// -->

                        <?php 
                            // On déclare les variables pour éviter les erreurs
                            $nom = $prix = $image = $description = $categorie = $validation = null;

                            //////////////////////////////  VERIFICATION DU FORMULAIRE  ///////////////////////////////


                            if (!empty($_POST)) { // Récupére les informations saisies dans le formulaire
                                $nom = $_POST['nom'];
                                $prix = str_replace(',','.',$_POST['prix']); // on remplace la virgule par un .
                                $image = $_POST['image'];
                                $description = $_POST['description'];
                                $categorie = $_POST['categorie'];
                            
                                $errors = [];

                                if (empty($nom)) { // Vérifie si le nom est vide
                                    $errors['nom'] = 'Le champs "nom" ne doit pas être vide. <br />';
                                }
                                if (!is_numeric($prix) || $prix <5 || $prix > 19.99) {
                                    $errors['prix'] = 'Le champs "prix" ne doit pas être vide. <br />';
                                }
                                if (empty($image)) {
                                    $errors['image'] = 'Le champs "image" ne doit pas être vide. <br />';
                                }
                                if (empty($description)) {
                                    $errors['description'] = 'Le champs "description" ne doit pas être vide. <br />';
                                }
                                if (empty($categorie)) {
                                    $errors['categorie'] = 'Le champs "catégorie" ne doit pas être vide. <br />';
                                }
                                if (empty($errors)) {
                                    $validation = 'Envoi du mail';

                                    // envoie à la base de donnée
                                    $query = $db ->prepare('INSERT INTO pizza(`name`,`price`,`image`) VALUES (:name, :price, :image)');
                                    $query -> bindValue(':name', $nom, PDO::PARAM_STR);
                                    $query -> bindValue(':price', $prix, PDO::PARAM_STR);
                                    $query -> bindValue(':image', $image, PDO::PARAM_STR);

                                    $query -> execute();
                                }
                            }
                        ?>

                            <form action="" method="POST">

                                <div class="form-group">
                                    <label for="nom" class="text-info">|| Nom de la pizza *</label>
                                    <input type="text" name="nom" class="form-control border-0 shadow-sm <?= (isset($errors['nom'])) ? 'is-invalid' : ''; ?>" id="nom" value="<?php echo $nom; ?>"  placeholder="Saisissez le nom de la pizza ..." >
                                    <?php 
                                    if(isset($errors['nom'])) {
                                        echo '<div class="invalid-feedback">'.$errors['nom'].'</div>';
                                    }?>
                                </div>
                                <div class="form-group">
                                    <label for="prix" class="text-info">|| Prix *</label>
                                    <input type="text" name="prix" step="0.01" class="form-control border-0 shadow-sm <?= (isset($errors['prix'])) ? 'is-invalid' : ''; ?>" value="<?php echo $prix; ?>"  id="prix" placeholder="Saisissez le prix de la pizza ..." >
                                    <?php 
                                    if(isset($errors['prix'])) {
                                        echo '<div class="invalid-feedback">'.$errors['prix'].'</div>';
                                    }?>
                                </div>
                                <div class="form-group">
                                    <label for="imagePizza" class="text-info">|| Sélectionner une image *</label>
                                    <input type="text" name="image" class="form-control border-0 shadow-sm <?= (isset($errors['image'])) ? 'is-invalid' : ''; ?>" id="imagePizza" value="<?php echo $image; ?>" placeholder="URL de l'image de la pizza ..." >
                                    <?php 
                                    if(isset($errors['image'])) {
                                        echo '<div class="invalid-feedback">'.$errors['image'].'</div>';
                                    }?>
                                </div>
                                <div class="form-group">
                                    <label for="description" class="text-info">|| La description *</label>
                                    <textarea name="description" class="form-control border-0 shadow-sm 
                                    <?= (isset($errors['description'])) ? 'is-invalid' : ''; ?>
                                    "  id="description" rows="4" placeholder="Description de la pizza ..."><?php echo $description; ?></textarea>
                                    <?php 
                                    if(isset($errors['description'])) {
                                        echo '<div class="invalid-feedback">'.$errors['description'].'</div>';
                                    }?>
                                </div>

                                <div class="form-group">
                                    <label for="categorie" class="text-info">|| Sélectionner une catégorie *</label>
                                    <select class="form-control border-0 shadow-sm text-secondary <?= (isset($errors['categorie'])) ? 'is-invalid' : ''; ?>" name="categorie" id="categorie">
                                    <option>Viande</option>
                                    <option>Végétarienne</option>
                                    <option>Poisson</option>
                                    </select>
                                    <?php 
                                    if(isset($errors['categorie'])) {
                                        echo '<div class="invalid-feedback">'.$errors['categorie'].'</div>';
                                    }?>
                                </div>
                    
                                <button class="btn btn-danger btn-block">Ajouter</button>

                            </form>

                        <!-- //////////////////////////////  FIN DU FORMULAIRE  /////////////////////////////// -->


                        </div>
                        </div>


                    </div>
                    </div>

                </div>
            </div>
        </section>
    
    
        <?php 
            if ($validation !== null){
                echo '<div class="alert alert-success text-center" role="alert">'. $validation. '</div>';
            }
        ?>

    </main>


<!-- Le fichier Header.php est inclus sur la page-->
<?php require_once(__DIR__.'/partials/footer.php'); ?>
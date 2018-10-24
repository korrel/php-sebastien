<?php
// On crée une connexion à la BDD
// $db = new PDO('mysql:host=localhost;dbname=pizzastore', 'root', '');
// Le try catch permet de faire quelque chose de particulier s'il y a une erreur

try {
	$db = new PDO('mysql:host=localhost;dbname=pizzastore;charset=utf8', 'root', '', [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // Active les erreurs SQL,
		// On récupère tous les résultats en tableau associatif
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	]);
} catch(Exception $e) {
	echo $e->getMessage();
	// Redirection en PHP vers Google avec le message d'erreur concerné
	header('Location: https://www.google.fr/search?q='.$e->getMessage());
}

////////////////////////////////////////////////////////////////////////////////////////////////////

// Ecrire la requête qui permet de récupérer la pizza avec l'id 3

//récupère en attente les données 
$my_query = $db -> query ('SELECT * FROM pizza WHERE id=3');
// j'affiche tous dans une variable en précisant la table à l'index 2
$pizzas = $my_query -> fetch();

echo ('<h1>'. $pizzas['name'] .'</h1>');


////////////////////////////////////////////////////////////////////////////////////////////////////


// récupérer l'id dynamiquement à partir de l'URL // s'il existe !!
$id = isset ($_GET['id']) ? $_GET['id'] : 0; 

/*
if (is_numeric($id)) {
*/
    // C'est l'id que l'on précise dans l' URL  ==> ' ?id=7 '
    
    $my_query_2 = $db -> query ('SELECT * FROM pizza WHERE id = '.$id);
    $pizza = $my_query_2 -> fetch();
    
    // on vérifie si la pizza existe 
    if ($pizza){
        echo $pizza['name'];
    }else {
        echo '<h1> 4 100 4 </h1>';
    }
/*
}else {
    echo '<h1> 4 100 4 </h1>';
}
*/


?>
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
    echo '<img src="assets/img/giphy.gif">';
    die(); // Arrête le script si la base de données n'est pas dispo
}



?>
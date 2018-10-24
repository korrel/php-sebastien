<?php 

$db = new PDO('mysql:host=localhost;dbname=pizzastore;charset=utf8','root','', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,
]);


// Parcourir toutes les pizzas avec un fetchAll (Nom affiché dans un H1)


$query = $db->query('SELECT * FROM pizza');
$pizzas = $query -> fetchAll();

foreach($pizzas as $pizza) {
    echo '<h1>'. $pizza['name'] .'</h1>';
}


// Parcourir toutes les pizzas avec un fetch (Nom affiché dans un H1)

$query = $db->query('SELECT * FROM pizza');
while($pizza = $query->fetch()) {
    echo '<h1>'. $pizza['name'] .'</h1>';
}


?>
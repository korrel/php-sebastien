<?php

// On utilise les session sur la page
session_start();

// le tableau est vide la 1ère fois
var_dump($_SESSION);

$countries = ['fr', 'it'];
//j'ajoute les pays à la session
$_SESSION['countries'] = $countries;

// Permet de supprimer un élément d'une session
unset($_SESSION['countries']);
// ATTENTION supprime toute la session (session et panier irrécupérable)
session_destroy();

// La session doit contenir tous les pays
var_dump($_SESSION);


/////////////////////////////////////////////////////////////////////////
// Pour les cookies (session qui dure indéfiniment et sur la machine cliente)

var_dump($_COOKIE);
// $_COOKIE['cookie'] = 'test';
setcookie('cookie','test'); // ici = session = expiration dans quelques minutes

// ajoute une expiration = 1 an
setcookie('cookie','test', time()+60*60*24*365);

// détruire un cookie (en changant le délai d'expiration dans le passé)
setcookie('cookie',null, time()-60*60*24*365);


?>
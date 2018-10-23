<?php

 ///////////////////////////////
 //                           //          
 //         Variables         //
 //                           //
 ///////////////////////////////

echo 'Chaine affichée en PHP <br />';

$age = 26; // Initialise une variable et lui affecte la valeur 26
$mon_age = 26; // Underscore
$monAge = 26; // lowerCamelCase
$doubleAge = $monAge * 2; // $doubleAge vaut 52

echo $doubleAge; // Affiche 52

$string = 'Hello';
$integer = 26;
$float = 3.14;
$boolean = true;
$array = [1, 2, 3];
$array2 = array(1, 2, 3);

// Tableau associatif
$array3 = ['a' => 1, 'b' => 2, 'c' => 3];
$object = new Object();
$null = null;
$resource = fopen('C:\fichier.txt');


$a = 10; // Portée globale


function toto()
{
    $b = 2;  /* Portée locale*/

    echo $a; // Erreur
}
toto();
echo $b; // Erreur
// Comment accèder à $a dans la fonction ?
function toto()
{
    global $a;
    echo $a; // Fonctionne
}


 ///////////////////////////////
 //                           //          
 //      Concaténation        //
 //                           //
 ///////////////////////////////


/* Opérateur de concaténation */
$a = 'Hello ';
$b = $a . 'World !'; // $a ne change pas mais $b vaut désormais "Hello World !"

/* Opérateur d'affectation concaténant */
$c = 'Hello ';
// On concatène cette chaîne à la précédente, $c vaut désormais "Hello World !"
$c .= 'World !';

/* Il est tout à fait possible de combiner les deux */
$d = 'Hello ';
$e = 'World ';
$d .= $e . '!'; // $e ne change pas, mais $d vaut désormais "Hello World !"
echo $d;


 ///////////////////////////////
 //                           //          
 //  Opérateur arithmétique   //
 //                           //
 ///////////////////////////////

$a = 10; // Ici, c'est l'opérateur d'affectation
// Ci-dessous, opérateurs arithmétiques
$a + 30; // Addition 40
echo 10 - 5; // Soustraction 5
echo 3 * 2; // Multiplication 6
$a = 3 + 3; // on peut modifier une variable en cours de route
echo $a / 2; // Division 3 car a vaut 6
echo 10 % 3; // Modulo (Reste de la division) 1
echo 10 ** 2; // Exponentielle: 10 à la puissance 2 (PHP 5.6+) 100
echo -$a; // -10

$a += $b; // équivaut à $a = $a + $b;
$a -= $b; // équivaut à $a = $a - $b;
$a *= $b; // équivaut à $a = $a * $b;
$a /= $b; // équivaut à $a = $a / $b;
$a %= $b; // équivaut à $a = $a % $b;


 ///////////////////////////////
 //                           //          
 //   Opérateur comparaison   //
 //                           //
 ///////////////////////////////


$a == $b; // vrai si $a est égal à $b
// vrai si $a est égal à $b et qu'ils sont du même type (integer, string, etc.)
$a === $b;
// vrai si $a est différent de $b
$a != $b; /*ou*/ echo $a <> $b;
$a !== $b; // vrai si $a est différent de $b ou qu'ils ne sont pas du même type
$a < $b; // vrai si $a est strictement inférieur à $b
$a > $b; // vrai si $a est strictement supérieur à $b
$a <= $b; // vrai si $a est inférieur ou égal à $b
$a >= $b; // vrai si $a est supérieur ou égal à $b
!$a; // vrai si $a vaut false


 ///////////////////////////////
 //                           //          
 //        conditions         //
 //                           //
 ///////////////////////////////


$a = 3;
$condition = 0 === false;

if ($a == 0) {
    // Si $a vaut 0, les instructions présentes ici seront exécutées
} elseif ($a > 12 && $a <= 42) {
    // Si $a est supérieur à 12 et inférieur ou égal à 42,
    // les instructions présentes ici seront exécutées.
} else if ($condition) {
    // Si $condition est vraie, l'instruction présente ici sera exécutée.
} else {
    // Sinon, si aucune des 2 conditions précédentes n'est remplie,
    // les instructions présentes ici seront exécutées.
    // Ici, $a vaut 3, il ne vaut donc pas 0 et n'est pas compris entre 12 et 42 inclus.
    // C'est donc ce bloc d'instruction qui sera exécuté et non les 2 précédents.
}


 ///////////////////////////////
 //                           //          
 //   opérateur de logique    //
 //                           //
 ///////////////////////////////

$a && $b; $a and $b; // True si $a ET $b sont true
$a || $b; $a or $b; // True si $a OU $b est true
$a xor $b; // True si $a OU $b est true mais pas les 2 à la fois

if ($a && $b && $c) {
    // On fais quelque chose
}

// Attention aux priorités, le AND est comme une multiplication (prioritaire)
// Et le OR comme une addition (pas prioritaire)
if ($a || $b && $c) {
    
}

 ///////////////////////////////
 //                           //          
 //      Incrémentation       //
 //                           //
 ///////////////////////////////

++$a; // La variable est incrémentée de 1, puis elle est retournée
$a++; // La variable est retournée, puis incrémentée de 1
--$a; // La variable est décrémentée de 1, puis elle est retournée
$a--; // La variable est retournée, puis décrémentée de 1

 ///////////////////////////////
 //                           //          
 //           débug           //
 //                           //
 ///////////////////////////////


print_r($tableau); // Affiche le contenu du tableau non formaté
die('Stop le script'); // Arrête le script avec un message ou pas
var_dump($tableau); // Affiche le contenu du tableau formaté


 ///////////////////////////////
 //                           //          
 //       Les Boucles         //
 //                           //
 ///////////////////////////////

/* for
elle est composée d'une instruction d'initialisation, d'une condition d'exécution
et d'une instruction à exécuter à chaque itération après le bloc d'instruction de la boucle
*/
for ($i = 0; $i < 10; $i++) {
    // instructions
}

/* foreach
particulièrement utile, elle permet de parcourir un tableau (ou les propriétés d'un objet)
*/
$a = array(1, 2, 3);
foreach ($a as $item) {
    // instructions
}

// foreach permet également de récupérer la clé associée à la valeur dans le tableau
$fruits = ['A' => 'abricot', 'B' => 'banane', 'C' => 'cerise'];
foreach ($fruits as $lettre => $fruit) {
    echo $lettre . '  :  '  . $fruit;
    // Affichera pour la première itération "A  : abricot"
}

 ///////////////////////////////
 //                           //          
 //   Les boucles - while     //
 //                           //
 ///////////////////////////////

/* while
elle est similaire à for si ce n'est
qu'elle n'a comme paramètre que la condition d'exécution
*/
$i = 0;
while ($i < 10) {
    // instructions
    $i++;
}

/* do…while
fonctionne comme while, excepté que les instructions
qu'elle conditionne sont exécutées 1 fois avant que la condition soit testée
*/
$i = 0;
do {
    // instructions
    $i++;
} while($i < 10);



 ///////////////////////////////
 //                           //          
 // Fonctions internes de PHP //
 //                           //
 ///////////////////////////////


/* isset() Si la variable $a n'existe pas déjà, on la défini avec comme valeur 42. */
if (!isset($a)) {
    $a = 42;
}

/* empty() Si la variable $a n'est pas vide, on affiche sa valeur. */
if (!empty($a)) {
    echo $a;
}

/* unset() Maintenant qu'on a défini puis utilisé la variable $a, on la détruit. */
unset($a);

/* time(); affecte à $t le nombre de secondes écoulées depuis le 01/01/1970
à l'instant ou l'instruction est exécutée. */
$t = time();

/* date() Affichera la date au format JJ / MM / AAAA, par exemple 21 / 05 / 2018. */
echo date('d / m / Y', $t);

/* count() Affichera 3, car $b contient 3 valeurs. */
$b = array('pomme', 'poire', 'abricot');
echo count($b);

/* strlen() Affichera 13, car $c contient 13 caractères (cela inclut les espaces) */
$c = 'Hello World !';
echo strlen($c);


 ///////////////////////////////
 //                           //          
 //   Gestion des dates PHP   //
 //                           //
 ///////////////////////////////

// La fonction date permet d'afficher une date sous un certain format
// Elle prend en second paramètre un timestamp de la date désirée
// Par défaut, c'est le timestamp courant
echo date('c'); // Affichera "2004-02-12T15:19:21+00:00"
echo "Nous sommes à la semaine " . date('W'); // Affichera "Nous sommes à la semaine 42"
echo date('d m Y H:i'); // Affichera "03 09 2015 18:48"
echo date('H\h i\m s\s'); // Affichera "18h 55m 36s"

// ----------------------------------------------------------------

time(); // Renvoie le timestamp courant

// strtotime est l'inverse de date, on peut passer un texte plutôt que le timestamp
// Usage simple
echo strtotime('now'); // Affichera le timestamp actuel, équivalent à time()
echo strtotime('9 january 2007'); // Affichera le timestamp de cette date, 1168297200

// Usage relatif
// Affichera le timestamp du lendemain du jour d'exécution du script
echo strtotime('+1 day');
// Affichera le timestamp relatif au jour d'exécution
// du script avec 2 semaines 1 jour 5 heures et 30 secondes d'ajoutées à celui-ci
echo strtotime('+2 weeks 1 day 5 hours 30 seconds');
// Affichera le timestamp du lundi précédent le plus proche du jour d'exécution du script
echo strtotime('last monday');
// Usage avec paramètre
// Affichera le timestamp correspondant à 6 mois après celui passé en paramètre
echo strtotime('+6 months', $timestamp);


 ///////////////////////////////
 //                           //          
 //       Les tableaux        //
 //                           //
 ///////////////////////////////

// Tableau numérique à une dimension
$notes = [10, 20, 15];
// Comment récupérer le 20 ?
$notes[1];
// Tableau associatif à une dimension
$notes = ['Jean' => 10, 'Eric' => 20, 'Matthieu' => 15];
// Comment récupérer le 20 ?
$notes['Eric'];

// Tableau numérique à 2 dimensions
$morpion = [
    ['X', 'O', 'X'],
    ['X', 'Xa', 'O'],
    ['X', 'O', 'O']
];

// Alternative
$morpion = array(); // J'initialise un tableau vide
$morpion[0] = array('X', 'O', 'X');
$morpion[1] = array('X', 'Xa', 'O');
$morpion[2] = array('X', 'O', 'O');
// Comment récupérer Xa ?
$morpion[1][1];


 ///////////////////////////////
 //                           //          
 //   Fonctions utilisateur   //
 //                           //
 ///////////////////////////////

// Déclare une fonction hello
function hello($argument) {
    return 'Hello ' . $argument;
}

echo hello('world!'); // L'appel de la fonction affiche Hello world!

// Attention, on ne peut pas nommer 2 fonctions avec le même nom
function say($argument, $argument2) {
    return $argument . ' ' . $argument2;
}

echo say('Hello', 'world!'); // L'appel de la fonction affiche Hello world!


 ///////////////////////////////
 //                           //          
 //     Les superglobales     //
 //                           //
 ///////////////////////////////


$_GET; // Tableau contenant toutes les données passée dans l'URL
// index.php?key=valeur&key2=valeur2 donne $_GET = ['key' => 'valeur', 'key2' => 'valeur2'];

$_POST; // Tableau contenant toutes les données passée dans un formulaire
// <input name="key" value="valeur"> donne $_POST = ['key' => 'valeur'];
// Attention, la méthode du formulaire doit être en POST sinon on est
// dans l'exemple du dessus et les données du formulaire seront exposées
// dans l'URL. En POST, les données sont masquées (mais pas chiffrées).


 ///////////////////////////////
 //                           //          
 //     URL et formulaire     //
 //                           //
 ///////////////////////////////


//  Pour un formulaire, l'attribut name est important.

if (isset($_POST)) {
    // $_POST contient ['nom' => 'Valeur', 'prenom' => 'Valeur']
}

// L'attribut action permet de rediriger l'URL vers un autre fichier 
/*    <form method="POST" action="index.php">
/*       <input type="text" name="nom">
/*       <input type="text" name="prenom">
/*    </form>    */


 ////////////////////////////////////////////////
 //                                            //          
 //     Stratégie de validation des données    //
 //                                            //
 ////////////////////////////////////////////////

$nom = '';
$nombre1 = 'a';
$email = 'matthieu';

if (strlen($nom) == 0) {
    exit('Votre nom ne doit pas être vide');
}

if (!ctype_digit($nombre1)) {
    exit('Le nombre1 n\'est pas un nombre valide');
}

if (false == filter_var($email, FILTER_VALIDATE_EMAIL)) {
    exit('Cet email n\'est pas valide');
}


 ///////////////////////////////
 //                           //          
 // Fonctions sur les chaines //
 //                           //
 ///////////////////////////////

$email = 'matthieu@boxydev.com';
echo strlen($email); // Affiche 20

// Affiche 'Un nombre 10 et une chaine toto'.
echo sprintf('Un nombre %d et une chaine %s.', 10, 'toto');

// Affiche '@boxydev.com', stristr idem mais insensible à la casse
echo strstr($email, '@');

// Affiche 8, la taille de la chaine avant @, stripos idem mais insensible à la casse
echo strpos($email, '@');

// Affiche matthieu@gmail.com, str_ireplace idem mais insensible à la casse
echo str_replace('boxydev', 'gmail', $email);

echo substr('abcdef', 2, 2); // Affiche "cd"
echo substr('abcdef', 1, 3); // Affiche "bcd"
echo substr('abcdef', 3);    // Affiche "def"

echo substr("abcdef", -1); // Affiche "f"
echo substr("abcdef", -2); // Affiche "ef"
echo substr("abcdef", -3, 1); // Affiche "d"

echo strrev('Hello world!'); // Affiche "!dlrow olleH"

// --------------------------------------------------------------

$keywords = "php, js, html, css";
$array_keywords = explode(', ', $keywords);
echo $array_keywords[0]; // Affiche 'php'
echo $array_keywords[1]; // Affiche 'js'
echo $array_keywords[2]; // Affiche 'html'
echo $array_keywords[3]; // Affiche 'css'

$keywords = ['php', 'js', 'html', 'css'];
$string_keywords = implode(', ', $keywords);
echo $string_keywords; // Affiche "php, js, html, css"

$message = 'Hello World';
echo strtolower($message); // Affiche 'hello world';
echo strtoupper($message); // Affiche 'HELLO WORLD';

$message = '    Hello World  ';
echo trim($message); // Affiche 'Hello World';

$message = '<h1>Hello World, </h1><p>How are you ?</p>';
echo strip_tags($message); // Affiche 'Hello World, How are you ?'
echo strip_tags($message, '<h1>'); // Affiche '<h1>Hello World, </h1>How are you ?'


 ///////////////////////////////
 //                           //          
 //         Inclusion         //
 //                           //
 ///////////////////////////////

/**
 * Incluera le contenu de header.php
 * Génère une erreur fatale en cas d'erreur
 */
// Exécute le contenu de header.php
require('header.php');


/**
 * Incluera le contenu de header.php
 * Déclenche un warning en cas d'erreur
 */
// Exécute le contenu de header.php
include('header.php');

// ----------------------------------------------------

/**
 * Le fichier header.php
 * ne sera inclus qu'à la premier instruction.
 */
include_once('header.php');
include_once('header.php');
include_once('header.php');

/*
PHP met à notre disposition des constantes magiques qui peuvent
s'avérer très utiles pour l'inclusion :
__DIR__ - Le répertoire du script actuel
__FILE__ - Le fichier du script actuel
__LINE__ - La ligne actuelle dans le script
__FUNCTION__ - Le nom de la fonction actuelle
*/

/**
 * Inclus le fichier header.php qui se situe dans
 * le même répértoire que celui du script
 */

//  Permet d'éviter les ambiguités
include(__DIR__.'/header.php');






?>
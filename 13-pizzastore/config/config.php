<?php

/////////////////////////////////////////////////////////////////////
//
//          /**** Fichier de config global  ****/
//          Ce fichier contiendra nos variables "globales" pour notre site.
//          Titre du site, titre de la page, page courante ...
//
/////////////////////////////////////////////////////////////////////

$siteName = 'Pizza Store';

// Page courante et titre de la balise Title
// $currentPageTitle = (empty ($currentPageTitle)) ? null : $currentPageTitle;

// Si REQUEST_URI vaut /home/toto/fichier.php --> on enlève ".php"
$currentPageUrl = basename ($_SERVER['SCRIPT_FILENAME'], '.php');



?>
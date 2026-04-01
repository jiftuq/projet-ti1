<?php
# public/index.php 
/****************************
 * Chargement des dépendances
 * ici seulement config.php
 * qui se trouve 1 niveau en
 * dessous
 ****************************/
require_once '../config.php';
// test de la constante racine
echo "Racine du projet : ".ROOT_PATH."
";
// affichage des pages acceptées
echo "<pre>";
print_r(ARRAY_VALID_PAGES);
echo "</pre>";
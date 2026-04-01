<?php
# Fichier suivi par git
# Enregistrez-moi sous le
# Nom de config.php et modifiez
# les constantes nécessaires
// racine du projet quelque soit son emplacement
const ROOT_PATH = __dir__; 
// Pages acceptées pour le projet
// Ce sont les nom des pages PHP
// acceptées mises dans le dossier
// view/ mise à part la homepage et la 404
const ARRAY_VALID_PAGES = [
    'about',
    'skills',
    'contact',
    'projects',
];
<?php
# public/index.php 

require_once '../config.php';

/*******************
 * Routage entre les
 * diverses vues
 *******************/

// si non existence de la variable
// $_GET nommée 'p'
if(!isset($_GET['p'])){

    // Nous sommes sur l'accueil
    // chargement de view/homepage.php
    include ROOT_PATH."/view/homepage.php";

// sinon si la variable get 'p' est dans le
// tableau ARRAY_VALID_PAGES    
}elseif(in_array($_GET['p'],ARRAY_VALID_PAGES)){
    // inclusion de la vue autorisée
    include ROOT_PATH."/view/".$_GET['p'].".php";
// 'p' existe mais n'est pas valide
}else{
    //appel de l'erreur 404
    include ROOT_PATH."/view/error404.php";
}
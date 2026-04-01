## Préparation du TI 1 - MVC - PHP

1) Création d'un nouveau dossier en dehors d'un suivit .git projet-ti1

2) Création de 5 dossiers :

        model
        view
        controller
        datas
        public

3) On va placer le fichier zip `projet.zip` dans le dossier `datas`

4) On crée un `.gitignore` et on y rajoute tous les fichiers se trouvant dans datas :

```bash 
# On ne veut pas de fichiers venant de
# datas
datas/*
```
 
5) On initialise git : `git init`

6) Si on vérifie avec un `git status`, on ne devrait voir que le `.gitignore`, en effet le dossiers datas est échappé grâce au `.gitignore`, et les autres dossiers sont vides. Si vous vous avez d'autres fichiers, ajoutez les dans le `.gitignore`

7) On désire faire suivre par git le fichier .zip, on rajoute au `.gitignore` :

```bash 
# On veut garder le fichier zip d'origine
!datas/projet.zip
```

8) On commit cette sauvegarde

9) On va rajouter des `.gitkeep` dans chaque dossiers qu'on souhaite suivre, on peut faire un commit par dossier suivi.

10) On va dézipper `projet.zip` dans `datas`

11) Pour l'exercice, les fichiers sont déjà fonctionnels, ça ne sera pas le cas lors du TI :

Vous avez donc un choix :

- Les faire fonctionner directement via ce dossier (inutile de passer par wamp, vous travaillez en html, ! ça prendra du temps pour le convertir en CF).
- Mettre en place directement le contrôleur frontal

12) Créez un hôte virtuel via `Wamp` vers le dossier `public` de ce projet sous le nom `projet-ti1` (URL locale  AVEC public : `C:\WEB2026\PHP\projet-ti1\public` )

13) Redémarrage des **DNS**, Vous devriez avoir accès qu'au public.

14) Création du contrôleur frontal : public/index.php

```php 
<?php
echo "Ceci est notre CF 
 path : ".__dir__;
```

15) On va créer le fichier de configuration à la racine du projet, mais on va avant tout le placer dans le `.gitignore`:

```bash 
# On ne veut pas de fichiers venant de
# datas
datas/*
# On veut garder le fichier zip d'origine
!datas/projet.zip
# On protège le fichier config.php car
# il ne doit pas se trouver sur git
config.php
```
 
16) Création de `config.php` (non suivi donc protégé) à la racine du projet

```php 
<?php
# Fichier protégé par le .gitignore 
# On pourra donc y mettre de constantes critiques
# Comme des login / mots de passe / clés etc...
# Si non présent, on duplique config.ini.php 
# sous le nom de config.php
# Et on met les constantes à jours
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
``` 
 
17) Création d'une copie de `config.php` sous le nom de `config.ini.php` qui sera suivie par git
 
```php 
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
```
 
18) On modifie `public/index.php` pour charger le fichier `config.php` et afficher ses constantes

```php 
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
```

19) Création de `homepage.php` dans `view` avec un texte de test pour vérifier le fonctionnement.

20) Si pas de variables get nommée 'p', on peut appeler la vue de l'accueil nommée `homepage.php`

```php 
<?php
# public/index.php 

# ...

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

}
```

21) On copie le contenue de `datas/index.html` dans `view/homepage.php`, on constate des soucis de chargement de `css`, `js` et `images`. Les liens de notre modèle pointe vers des pages en html.

22) On doit créer les dossiers `css`, `js` et `images` dans le dossier publique (pour l'exercice on peut les copier de `datas` à `public`, pas pour le TI)

23) On va séparer la page `homepage.php` en 2 parties, qu'on pourra inclure suivant la demande :
    - `view/inc/menu.php` pour le menu
    - `view/inc/footer.php` pour le footer
dans le fichier `homepage.php` :

```php
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio - Développeur PHP/React</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <header>
        <?php
        // chemin absolu
        include ROOT_PATH."/view/inc/menu.php";
        // chemin relatif (en PHP à partir de la page qui appelle)
        # include "inc/menu.php";

        ?>
    </header>

    <main>
        <section style="text-align: center; margin-top: 10vh;">
            <h1>Bonjour, je suis <span class="text-highlight">Développeur Junior</span></h1>
            <p style="font-size: 1.2rem; max-width: 600px; margin: 0 auto 2rem; color: var(--text-light);">
                Spécialisé dans l'écosystème PHP (Symfony) et JavaScript (React). 
                Je conçois des API robustes et des interfaces dynamiques en m'appuyant sur une logique analytique stricte.
            </p>
            <a href="projets.html" class="btn btn-primary">Explorer mes projets</a>
        </section>
    </main>

    <footer>
        <?php
        // chemin absolu
        include ROOT_PATH."/view/inc/footer.php";
        // chemin relatif (en PHP à partir de la page qui appelle)
        # include "inc/footer.php";

        ?>
    </footer>

    <script src="js/script.js"></script>
</body>
</html>
```

24) On va mettre à jour les liens du `inc/menu.php` pour utiliser la variable get 'p'

```php
<nav>
    <a href="./" class="logo">Portfolio</a>
    <button class="menu-toggle">☰</button>
    <ul class="nav-links">
        <li><a href="./">Accueil</a></li>
        <li><a href="./?p=about">À propos</a></li>
        <li><a href="./?p=skills">Compétences</a></li>
        <li><a href="./?p=projects">Projets</a></li>
        <li><a href="./?p=contact">Contact</a></li>
    </ul>
</nav>
```

25) On va vérifier dans le contrôleur frontal si `p` a une valeur acceptée

```php
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

}

```

26) Si la page n'est pas existente, appel de `view/error404.php` :

```php
if(!isset($_GET['p'])){

    // Nous sommes sur l'accueil
    // chargement de view/homepage.php
    include ROOT_PATH."/view/homepage.php";

// sinon si la variable get 'p' est dans le
// tableau ARRAY_VALID_PAGES    
}elseif(in_array($_GET['p'],ARRAY_VALID_PAGES)){
    // inclusion de la vue autorisée
    include ROOT_PATH."/view/".$_GET['p'].".php";

// sinon (p non valide)    
}else{
    include ROOT_PATH."/view/error404.php";
}
```

27) Création des différentes vues suivants la demande ou les besoins :

### Toute notre navigation est liée à la variable $_GET['p']

28) Divers
- Mettre la variable get en majuscule : 
```php
Portfolio - <?= ucfirst($_GET['p']) ?>
```
- Créer le menu à la volée : on a une constante qui contient nos pages (ARRAY_VALID_PAGES)
```php
<?php
# tant qu'on a des pages (éléments du menu)
foreach(ARRAY_VALID_PAGES as $page):
?>
    <li><a href="./?p=<?= $page ?>"><?= ucfirst($page) ?></a></li>
<?php
endforeach
?>
```
- Pour la classe active dans le menu `class="active"` pour chaque pages sauf 404 :

```php
<?php
# view/inc/menu.php
?>
<nav>
    <a href="./" class="logo">Portfolio</a>
    <button class="menu-toggle">☰</button>
    <ul class="nav-links">
<?php
// si on est sur l'accueil
if(!isset($_GET['p'])):
?>
        <li><a href="./" class="active">Accueil</a></li>
<?php
// on est pas sur la page d'accueil
else:
?>
        <li><a href="./">Accueil</a></li>
<?php
// fin de condition
endif;       
# tant qu'on a des pages (éléments du menu)
foreach(ARRAY_VALID_PAGES as $page):
    // vérification de la page actuelle pour mettre 
    // en actif si identique à la variable get qui
    // doit exister (isset pour éviter le bug de accueil)
    $active = (isset($_GET['p']) && $page == $_GET['p'])
            ? 'class="active"' 
            : "";

?>
<li><a href="./?p=<?= $page ?>" <?= $active ?>><?= ucfirst($page) ?></a></li>
<?php
endforeach;
?>
    </ul>
</nav>

```
29) Créez votre repository sur github sur 
https://github.com/new
en public, ne cochez rien pour ne pas avoir de commit online puis

```
git remote add origin git@github.com:WebDevCF2m2026/classeOne.git
git branch -M main
git push -u origin main
```
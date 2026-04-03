<?php
# view/error404.php
?>

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
        <h2>À propos de moi</h2>
        <div class="card" style="padding: 2rem;">
            <p style="margin-bottom: 1rem;">
                En tant que développeur web junior, je me spécialise dans la création d'architectures backend solides (PHP/Symfony) et d'interfaces réactives (React). Mon expertise se situe particulièrement dans la modélisation de bases de données relationnelles et la conception d'API RESTful performantes.
            </p>
            <p>
                Mon approche de l'informatique est profondément ancrée dans une démarche scientifique. Fasciné par la physique quantique, la chimie moléculaire ainsi que par la macro-géographie et la géopolitique, j'applique cette même rigueur d'analyse systémique au code. Qu'il s'agisse de comprendre l'interaction entre deux atomes, l'influence géopolitique d'un réseau de câbles sous-marins, ou la gestion d'un état asynchrone dans React, je décortique les variables pour construire des solutions logiques, évolutives et précises.
            </p>
        </div>
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
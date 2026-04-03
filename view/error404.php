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
        <section style="text-align: center; margin-top: 10vh;">
            <h1>Erreu 404 <span class="text-highlight">Cette page n'existe plus</span></h1>
            
            <p style="font-size: 1.2rem; max-width: 600px; margin: 0 auto 2rem; color: var(--text-light);">
                Vous pouvez visiter mon site via le menu
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
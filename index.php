<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Vitrine de Films</title>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-5 mb-4">Films</h1>
    <div class="row">

        <?php

        /**
         * @var PDO $connexion
         */

        require "./config/config.php";

        // Requête pour récupérer les films depuis la base de données

        $requete = $connexion->prepare("SELECT * FROM film");

        $requete->execute();

        // Parcourir les résultats et afficher chaque film dans une card
        while ($row = $requete->fetch()) {
            echo '<div class="col-md-3 mb-4">';
            echo '<div class="card">';
            echo '<h5 class="card-header">' . $row['titre'] . '</h5>';
            echo '<div class="card-body">';
            ?>
            <img  class="card mx-auto" src="<?php echo $row['image'] ?>">
            <?php
            echo '<p class="card-text">Durée: ' . $row['duree'] . '</p>';
            echo '<a href="/php/film2.php?id=' . $row['id'] . '" class="btn btn-primary">Voir plus</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        ?>
    </div>
</div>
<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
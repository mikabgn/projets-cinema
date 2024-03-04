<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Film</title>
    <!-- Bootstrap CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <h1 class="mt-5 mb-4">Détails du Film</h1>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <div class="card-body">
                    <?php
                    // Vérifier si l'identifiant du film est passé en paramètre dans l'URL
                    if(isset($_GET['id'])) {

                        $film_id = $_GET['id'];


                        /**
                         * @var PDO $connexion
                         */

                        require "../config/config.php";

                        // Requête pour récupérer les détails du film spécifique

                        $requete = $connexion->prepare("SELECT * FROM film WHERE id = $film_id");

                        $requete->execute();


                            $film = $requete->fetch();
                        echo '<h5 class="card-header">' . $film['titre'] . '</h5>';
                        echo '<div class="card-body">'; ?>
                        <img  class="card mx-auto" src="<?php echo $film['image'] ?>">
                    <?php
                        echo '<p class="card-text">Date: ' . $film['date_de_sortie'] . '</p>';
                        echo '<p class="card-text">Durée: ' . $film['duree'] . '</p>';
                        echo '<p class="card-text">Pays: ' . $film['pays'] . '</p>';
                        echo '<p class="card-text">Resume: ' . $film['resume'] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    } else {
                        echo '<p>Aucun identifiant de film spécifié.</p>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
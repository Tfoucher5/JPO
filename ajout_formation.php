<?php
// script de connexion
require_once('base_donnee.php');

include ("session_start.php");

// Vérification de la méthode de requête HTTP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération de la connaissance saisie dans le formulaire
    if (isset($_POST['formation'])) {
        $formation = htmlentities($_POST['formation']);
        $alternance = htmlentities($_POST['alternance']);

        // Insertion dans la base de données
        $sql = 'INSERT INTO formation (nom, alternance) 
                VALUES (:formation,:alternance)';
        try {
            $temp = $pdo->prepare($sql);
            $temp->Bindparam(":formation", $formation, PDO::PARAM_STR);
            $temp->Bindparam(":alternance", $alternance, PDO::PARAM_STR);
            $temp->execute();

            // Redirection après l'ajout
            header("Location: modification_validée_reglage.php");
            exit();
        } catch (PDOException $e) {
            // Gestion des erreurs d'insertion
            echo "Erreur lors de l'ajout : " . $e->getMessage();
            // Vous pouvez rediriger vers une page d'erreur ou afficher un message approprié ici
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;700&display=swap" rel="stylesheet">

    <?php
        include ("css.php");
    ?>
</head>
<body>
    <div class="nav_hitbox">
        <nav>
            <!-- Vos boutons de navigation ici -->
        </nav>
    </div>
    <div class="content_home">
    <div class="sun">
        <div class="line"></div>
    </div>
        <div class="label_home">
        <form action="ajout_formation.php" method="post">
            <div class="label_box">
        <label for="formation">Quel formation voulez vous découvrir ? : </label>
        <input type="text" name="formation" id="formation" placeholder="Donner une nouvelle formation à découvrir." required />
    </div>
    <div class="label_box">
            <label for="alternance">En alternance ? : </label>
                <select name="alternance" id="alternance">
                    <option value="0">Non</option>
                    <option value="1">Oui</option>
                </select>
    </div>
    <div class="soumettre">
        <input type="submit" name="soumettre" value="Enregistrer" />
    </div>

        </form>
</body>
</html>

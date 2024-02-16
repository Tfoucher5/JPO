<?php
// script de connexion
require_once('base_donnee.php');

include ("session_start.php");

// Vérification de la méthode de requête HTTP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération de la connaissance saisie dans le formulaire
    if (isset($_POST['connaissance'])) {
        $connaissance = htmlentities($_POST['connaissance']);

        // Insertion dans la base de données
        $sql = 'INSERT INTO connaissance (moyen) 
                VALUES (:connaissance)';
        try {
            $temp = $pdo->prepare($sql);
            $temp->Bindparam(":connaissance", $connaissance, PDO::PARAM_STR);
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
    <link rel="stylesheet" href="<?php echo $_SESSION['Mode'] ?>.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="nav_hitbox">
        <nav>
            <!-- Vos boutons de navigation ici -->
        </nav>
    </div>
    <div class="label_box select_box">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="connaissance">Comment nous avez-vous découvert ? : </label>
            <input type="text" name="connaissance" id="connaissance" placeholder="Donner une nouvelle façon de nous connaitre." required />
            <div style="text-align:center;">
                <input type="submit" name="soumettre" value="Enregistrer" />
            </div>
        </form>
    </div>
</body>
</html>

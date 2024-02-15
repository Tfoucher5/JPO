<?php
// script de connexion
require_once('base_donnee.php');

include ("session_start.php");

// Vérification de la méthode de requête HTTP
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupération de la connaissance saisie dans le formulaire
    if (isset($_POST['connaissance']) && isset($_POST['id_connaissance'])) {
        $connaissance = htmlentities($_POST['connaissance']);
        $id_connaissance = $_POST['id_connaissance']; // Récupération de l'identifiant

        // Insertion dans la base de données
        $sql = 'UPDATE connaissance SET moyen = :connaissance WHERE id_connaissance = :id_connaissance';
        try {
            $temp = $pdo->prepare($sql);
            $temp->Bindparam(":connaissance", $connaissance, PDO::PARAM_STR);
            $temp->Bindparam(":id_connaissance", $id_connaissance, PDO::PARAM_INT); // Liaison de l'identifiant
            $temp->execute();

            // Redirection après l'ajout
            header("Location: ajout_reussie.php");
            exit();
        } catch (PDOException $e) {
            // Gestion des erreurs d'insertion
            echo "Erreur lors de l'ajout : " . $e->getMessage();
            // Vous pouvez rediriger vers une page d'erreur ou afficher un message approprié ici
            exit();
        }
    }
}

// Récupération des données existantes si l'identifiant est passé en paramètre
$connaissance_existante = "";
$id_connaissance = "";
if(isset($_GET['id_connaissance'])) {
    $id_connaissance = $_GET['id_connaissance'];
    // Ajoutez cette instruction pour vérifier l'identifiant récupéré
    var_dump($id_connaissance);
    
    $sql_select = "SELECT moyen FROM connaissance WHERE id_connaissance = :id_connaissance";
    $stmt = $pdo->prepare($sql_select);
    $stmt->bindParam(':id_connaissance', $id_connaissance, PDO::PARAM_INT);
    $stmt->execute();
    $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
    if($resultat) {
        $connaissance_existante = $resultat['moyen'];
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
            <input type="text" name="connaissance" id="connaissance" value="<?php echo $connaissance_existante; ?>" placeholder="Donner une nouvelle façon de nous connaitre." required />
            <!-- Champ caché pour l'identifiant -->
            <input type="hidden" name="id_connaissance" value="<?php echo $id_connaissance; ?>" />
            <div style="text-align:center;">
                <input type="submit" name="soumettre" value="Enregistrer" />
            </div>
        </form>
    </div>
</body>
</html>

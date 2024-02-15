<?php
// script de connexion
require_once('base_donnee.php');

include ("session_start.php");

if (isset($_GET['moyen'])) {
    $moyen = $_GET['moyen'];
    
    // Récupérer les données de l'étudiant avec l'ID spécifié
    $query = "SELECT * FROM connaissance WHERE moyen = :moyen";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':moyen', $moyen);
    $stmt->execute();
    $connaissance = $stmt->fetch(PDO::FETCH_ASSOC);

    $nom_moyen = $connaissance['moyen'];

    if (isset($_POST['soumettre'])) {
        $moyen_updated = htmlentities($_POST['moyen']);

        $sql = "UPDATE connaissance 
                SET moyen = :m
                WHERE moyen = :m";
                $temp = $pdo->prepare($sql);
                $temp->Bindparam(":m",$moyen_updated,PDO::PARAM_STR);
                $temp->execute();
                if ($temp->execute()){
                    header('Location : ajout_reussie.php');
                    exit();
                } else {
                    echo 'Modification failed';
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
            <input type="text" name="moyen" id="connaissance" value="<?php echo $nom_moyen; ?>" required />
                <input type="submit" name="soumettre" value="Enregistrer" />
            </div>
        </form>
    </div>
</body>
</html>
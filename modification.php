<?php

// script de connexion
require_once('base_donnee.php');

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Récupérer les données de l'étudiant avec l'ID spécifié
    $query = "SELECT * FROM etudiants WHERE id='$id'";
    $result = $pdo->query($query);
    $etudiant = $result->fetch(PDO::FETCH_ASSOC);

    // Assigner les valeurs à des variables
    $nom = $etudiant['nom'];
    $prenom = $etudiant['prenom'];
    $formation = $etudiant['formation'];

    // Vérifier si le bouton submit est pressé
    if(isset($_POST['submit'])) {

        //on récupère les nouvelles valeurs
        $nom_updated = $_POST['nom'];
        $prenom_updated = $_POST['prenom'];
        $formation_updated = $_POST['formation'];

        //on ajoute les valeurs dans la db
        $sql = "UPDATE etudiants
                SET nom = '$nom_updated', prenom = '$prenom_updated', formation = '$formation_updated'
                WHERE id = $id";
        $pdo->exec($sql);

        // Rediriger vers la page d'affichage après la mise à jour
        header('Location: http://localhost/PHP/dbphp/dbphp.php');
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form method="post" action="edit.php?id=<?php echo $id; ?>">
        <input type="text" name="nom" value="<?php echo $nom; ?>">
        <input type="text" name="prenom" value="<?php echo $prenom; ?>">
        <input type="text" name="formation" value="<?php echo $formation; ?>">
        <input type="submit" name="submit" value="Modifier">
        <a href="http://localhost/PHP/dbphp/dbphp.php" style="color: black; text-decoration: none; border: 1px solid; border-radius: 3px; padding: 0.5px 7px">Retour</a>
    </form>
</body>
</html>
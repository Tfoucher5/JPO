<?php

include_once("base_donnee.php");

session_start();

$failed_to_log = "";

if (isset($_POST['soumettre'])) {
    $user_verif = $_POST['utilisateur'];
    $password_verif = $_POST['password'];

    // Récupérer le nom d'utilisateur et le mot de passe correspondant à $user_verif
    $query = "SELECT nom_utilisateur, mot_de_passe FROM admin WHERE nom_utilisateur = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$user_verif]);
    $user_data = $stmt->fetch();

    // Vérifier si l'utilisateur existe et que le mot de passe correspond
    if ($user_data && $password_verif == $user_data['mot_de_passe']) {
        // Stocker les informations de connexion dans la session
        $_SESSION['utilisateur'] = $user_verif;
        $_SESSION['connected'] = true;
        header('Location: admin.php');
        exit();
    } else {
        $failed_to_log = "Nom d'utilisateur ou mot de passe erroné, veuillez réessayer.";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
    <form action="connexion.php" method="post">
        <label for="utilisateur">Utilisateur :</label>
        <input type="text" name="utilisateur" id="utilisateur" placeholder="Utilisateur" required />
        <label for="password">Mot de passe :</label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required />
        <input type="submit" name="soumettre" value="Se connecter" />
    </form>
    <?php
        echo $failed_to_log;
    ?>
</body>
</html>

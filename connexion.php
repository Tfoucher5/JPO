<?php
session_start();

$user = "admin";
$password = "1234";
$failed_to_log = "";

if (isset($_POST['soumettre'])) {
    $user_verif = $_POST['utilisateur'];
    $password_verif = $_POST['password'];

    if ($user_verif == $user and $password_verif == $password) {
        // Stocker les informations de connexion dans la session
        $_SESSION['utilisateur'] = $user_verif;
        $_SESSION['connected'] = true;
        header('Location: Home.php');
        exit();
    } else {
        $failed_to_log = "Nom d'utilisateur ou mot de passe erroné veuillez réessayer.";
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
        <label for="utilisateur">utilisateur : </label>
        <input type="text" name="utilisateur" id="utilisateur" placeholder="utilisateur" required />
        <label for="password">Prénom : </label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" required />
        <input type="submit" name="soumettre" value="se connecter" />
    </form>
    <?php
        echo $failed_to_log;
    ?>
</body>
</html>
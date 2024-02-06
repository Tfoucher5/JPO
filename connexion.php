<?php
    session_start()
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
    <label for="nom_utilisateur">nom_utilisateur : </label>
            <input type="text" name="nom_utilisateur" id="nom_utilisateur" placeholder="nom d'utilisateur" required />
    <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom" required />
</body>
</html>
<?php

// script de connexion
require_once('base_donnee.php');

if (isset($_POST['soumettre'])) {

    // on récupère les valeurs
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $mail = $_POST['email'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $code_postal = $_POST['code-postal'];
    $projet = $_POST['projet'];
    $pre_inscrit = $_POST['pre_inscrit'];
    $niveau_etude = $_POST['niveau_etude'];

    // on ajoute les valeurs dans la db
    $sql = "INSERT INTO prospect (prenom, nom, email, tel, adresse, ville, code_postal, projet, pre_inscrit, niveau_etude, heure_enregistrement) 
            VALUES ('$prenom', '$nom', '$mail', '$tel', '$adresse', '$ville', '$code_postal', '$projet', '$pre_inscrit', '$niveau_etude', NOW())";
    $pdo->exec($sql);

    // Effectuer la redirection après la soumission du formulaire
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="Home.php" method="post">
        <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom" required />
        <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom" placeholder="Nom" required />
        <label for="email">Email : </label>
            <input type="text" name="email" id="email" placeholder="exemple@gmail.com" required />
        <label for="telephone">Téléphone : </label>
            <input type="text" name="tel" id="tel" placeholder="telephone" required />
        <label for="adresse">Adresse : </label>
            <input type="text" name="adresse" id="adresse" placeholder="adresse" required />
        <label for="ville">Ville : </label>
            <input type="text" name="ville" id="ville" placeholder="ville" required />
        <label for="code-postal">Code postal : </label>
            <input type="text" name="code-postal" id="code-postal" placeholder="code postal" required />
        <label for="projet">Projet : </label>
            <input type="text" name="projet" id="projet" placeholder="votre projet" required />
            <label for="pre-inscrit">Pré inscrit : </label>
        <select name="pre_inscrit" id="pre_inscrit" required>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
        <label for="niveau-etude">Niveau d'étude : </label>
        <select name="niveau_etude" id="niveau_etude" required>
            <option value="3">BAC</option>
            <option value="2">Licence</option>
            <option value="1">Master</option>
            <option value="4">Bac +2</option>
            <option value="5">CAP</option>
        </select>
        <input type="submit" name="soumettre" value="enregistrer" />
    </form>
</body>
</html>
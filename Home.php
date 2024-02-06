<?php

    //script de connexion
    $host = '127.0.0.1';
    $db = 'jpo';
    $user = 'root';
    $pass = '';
    $port = '3306';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
    $pdo = new PDO($dsn, $user, $pass);

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
            <input type="text" name="prenom" id="prenom" placeholder="Mohamed" required />
        <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom" placeholder="Couscous" required />
        <label for="email">Email : </label>
            <input type="text" name="email" id="email" placeholder="Mohamed.couscous@gmail.com" required />
        <label for="telephone">Téléphone : </label>
            <input type="text" name="tel" id="tel" placeholder="0669696969" required />
        <label for="adresse">Adresse : </label>
            <input type="text" name="adresse" id="adresse" placeholder="69 rue du couscous" required />
        <label for="code-postal">Code postal : </label>
            <input type="text" name="code-postal" id="code-postal" placeholder="69000" required />
        <label for="projet">Projet : </label>
            <input type="text" name="projet" id="projet" placholder="Le projet de Mohamed" required />
        <select name="pre-inscrit" id="pre-inscrit">
            <option value="">pré-inscrit</option>
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
        <select name="niveau_etude" id="niveau-etude">
            <option value="">Niveau d'étude</option>
            <option value=""></option>
            <option value=""></option>
        <input type="submit" name="soumettre" value="enregistrer" />
    </form>
    <?php

    if(isset($_POST['soumettre'])) {

        //on récupère les valeurs
        $prenom = $_POST['prenom'];
        $nom = $_POST['nom'];
        $mail = $_POST['email'];
        $tel = $_POST['tel'];
        $adresse = $_POST['adresse'];
        $code_postal = $_POST['code-postal'];

        //on ajoute les valeurs dans la db
        $sql = "INSERT INTO prospects (id, prenom, nom, email, n°_de_telephone, adresse, ville, code_postal, projet, pre_inscrit, niveau_etude, heure_enregistrement) 
                VALUES ('$prenom', '$nom', '$email', '$tel', '$adresse', '$code_postal')";
        $pdo->exec($sql);
        }
    ?>

</body>
</html>
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
        <label for="tel">Téléphone : </label>
        <input type="text" name="tel" id="tel" placeholder="0669696969" required />
        <label for="adresse">Adresse : </label>
        <input type="text" name="adresse" id="adresse" placeholder="69 rue du couscous" required />
        <label for="code-postal">code postal : </label>
        <input type="text" name="code-postal" id="code-postal" placeholder="69000" required />
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
        $sql = "INSERT INTO prospects (prenom, nom, email, tel, adresse, 'code_postal') 
                VALUES ('$prenom', '$nom', '$email', '$tel', '$adresse', '$code_postal')";
        $pdo->exec($sql);
        }
    ?>

</body>
</html>
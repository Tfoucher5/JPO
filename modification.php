<?php

// script de connexion
require_once('base_donnee.php');

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Récupérer les données de l'étudiant avec l'ID spécifié
    $query = "SELECT * FROM prospect WHERE id_prospect = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $prospect = $stmt->fetch(PDO::FETCH_ASSOC);

    // Assigner les valeurs à des variables
    $nom = $prospect['nom'];
    $prenom = $prospect['prenom'];
    $mail = $prospect['email']; 
    $tel = $prospect['tel'];
    $adresse = $prospect['adresse'];
    $ville = $prospect['ville'];
    $code_postal = $prospect['code_postal'];
    $projet = $prospect['projet'];
    $pre_inscrit = $prospect['pre_inscrit'];
    $niveau_etude = $prospect['niveau_etude'];
    $decouverte_IIA =  $prospect['decouverte_IIA'];

    // Vérifier si le bouton submit est pressé
    if (isset($_POST['soumettre'])) {

        //on récupère les nouvelles valeurs
        $nom_updated = htmlentities($_POST['nom']);
        $prenom_updated = htmlentities($_POST['prenom']);
        $mail_updated = htmlentities($_POST['email']);
        $tel_updated = htmlentities($_POST['tel']);
        $adresse_updated = htmlentities($_POST['adresse']);
        $ville_updated = htmlentities($_POST['ville']);
        $code_postal_updated = isset($_POST['code_postal']) ? htmlentities($_POST['code_postal']) : null;
        $projet_updated = htmlentities($_POST['projet']);
        $pre_inscrit_updated = htmlentities($_POST['pre_inscrit']);
        $niveau_etude_updated = htmlentities($_POST['niveau_etude']);
        $decouverte_IIA_updated = htmlentities($_POST['decouverte_IIA']);

        //on ajoute les valeurs dans la db
        $sql = "UPDATE prospect
        SET nom = :nom, 
            prenom = :prenom, 
            email = :mail_updated, 
            tel = :tel, 
            adresse = :adresse,
            ville = :ville,
            code_postal = :cp,
            projet = :projet,
            pre_inscrit = :inscrit,
            niveau_etude = :etude,
            decouverte_IIA = :iia
        WHERE id_prospect = :id";
        $temp=$pdo->prepare($sql);
        $temp->Bindparam(":nom",$nom_updated,PDO::PARAM_STR);
        $temp->Bindparam(":prenom",$prenom_updated,PDO::PARAM_STR);
        $temp->Bindparam(":mail",$mail_updated,PDO::PARAM_STR);
        $temp->Bindparam(":tel",$tel_updated,PDO::PARAM_STR);
        $temp->Bindparam(":adresse",$adresse_updated,PDO::PARAM_STR);
        $temp->Bindparam(":ville",$ville_updated,PDO::PARAM_STR);
        $temp->Bindparam(":cp",$code_postal_updated,PDO::PARAM_STR);
        $temp->Bindparam(":projet",$projet_updated,PDO::PARAM_STR);
        $temp->Bindparam(":inscrit",$pre_inscrit_updated,PDO::PARAM_INT);
        $temp->Bindparam(":etude",$niveau_etude_updated,PDO::PARAM_INT);
        $temp->Bindparam(":iia",$decouverte_IIA_updated,PDO::PARAM_INT);
        $temp->bindParam(':id', $id);
        if ($stmt->execute()) {
            echo 'data modified succesfully';
            header('Location: admin.php');
            exit();
        } else {
            echo '<h1> modification failed </h1>';
        }

        // Rediriger vers la page d'affichage après la mise à jour

    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
</head>
<body>
    <form action="modification.php?id=<?php echo $id; ?>" method="post">
        <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>" required />
        <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" required />
        <label for="email">Email : </label> 
            <input type="text" name="email" id="email" value="<?php echo $mail; ?>" required />
        <label for="telephone">Téléphone : </label>
            <input type="number" name="tel" id="tel" value="<?php echo $tel; ?>" required />
        <label for="adresse">Adresse : </label>
            <input type="text" name="adresse" id="adresse" value="<?php echo $adresse; ?>" required />
        <label for="ville">Ville : </label>
            <input type="text" name="ville" id="ville" value="<?php echo $ville; ?>" required />
        <label for="code-postal">Code postal : </label>
            <input type="text" name="code-postal" id="code-postal" value="<?php echo $code_postal; ?>" required />
        <label for="projet">Projet : </label>
            <input type="text" name="projet" id="projet" value="<?php echo $projet; ?>" required />
            <label for="pre-inscrit">Pré inscrit : </label>
            <select name="pre_inscrit" id="pre_inscrit" required>
    <option value="1" <?php echo ($pre_inscrit == 1) ? 'selected' : ''; ?>>Oui</option>
    <option value="0" <?php echo ($pre_inscrit == 0) ? 'selected' : ''; ?>>Non</option>
    </select>
    <label for="niveau-etude">Niveau d'étude : </label>
    <select name="niveau_etude" id="niveau_etude" required>
        <option value="3" <?php echo ($niveau_etude == 3) ? 'selected' : ''; ?>>BAC</option>
        <option value="2" <?php echo ($niveau_etude == 2) ? 'selected' : ''; ?>>Licence</option>
        <option value="1" <?php echo ($niveau_etude == 1) ? 'selected' : ''; ?>>Master</option>
        <option value="4" <?php echo ($niveau_etude == 4) ? 'selected' : ''; ?>>Bac +2</option>
        <option value="5" <?php echo ($niveau_etude == 5) ? 'selected' : ''; ?>>CAP</option>
    </select>
    <select name="decouverte_IIA" id="decouverte_IIA" required>
        <option value="1" <?php echo ($decouverte_IIA == 1) ? 'selected' : ''; ?>>Recherches en ligne</option>
        <option value="2" <?php echo ($decouverte_IIA == 2) ? 'selected' : ''; ?>>Publicité en ligne</option>
        <option value="3" <?php echo ($decouverte_IIA == 3) ? 'selected' : ''; ?>>Réseaux sociaux</option>
        <option value="4" <?php echo ($decouverte_IIA == 4) ? 'selected' : ''; ?>>Salons</option>
        <option value="5" <?php echo ($decouverte_IIA == 5) ? 'selected' : ''; ?>>Bouche à oreille</option>
        <option value="6" <?php echo ($decouverte_IIA == 6) ? 'selected' : ''; ?>>Autre</option>
    </select>
        <input type="submit" name="soumettre" value="enregistrer" />
    </form>
    <a href="admin.php">Retour</a>
</body>
</html>
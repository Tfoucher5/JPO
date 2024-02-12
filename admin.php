<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: connexion.php');
    exit();
}

require_once('base_donnee.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="phpstyle.css">
    <title>Php et Sql : </title>
</head>
<body>

    <?php
    // appeler toute les lignes de la tables prospect
    // les faire apparaitre dans un tableau
    // renomer les numériques
    // bouton modifier + bouton supprimer
    
    $sql='SELECT * FROM prospect,connaissance,niveau_etude WHERE prospect.niveau_etude=niveau_etude.id_niveau AND connaissance.id_connaissance=prospect.decouverte_IIA ORDER BY id_prospect';
    $temp=$pdo->prepare($sql);
    $temp->execute();

    //Script de suppression d'une ligne
        if (isset($_POST['id_prospect'])) {
        $id = $_POST['id_prospect'];
        $del = "DELETE FROM prospect WHERE id_prospect='$id'";
        $pdo->exec($del);
        header('Location: admin.php');
        exit();
}

    echo 'Connecté en tant que'. ' ' . htmlentities($_SESSION['utilisateur']);


    //affichage du tableau 
    echo "<table border='1'>
    <tr>
        <td>id : </td>
        <td>Prenom : </td>
        <td>Nom : </td>
        <td>Adresse : </td>
        <td>Code postal : </td>
        <td>Ville : </td>
        <td>Téléphone : </td>
        <td>Adresse mail : </td>
        <td>Niveau d'études : </td>
        <td>Projet : </td>
        <td>Pre-inscrit ? : </td>
        <td>Comment nous avez-vous découvert ? : </td>
        <td>Date d'enregistrement : </td>
        <td>Action : </td>
        </tr>";

        while ($resultats = $temp -> fetch()){
            echo '<tr>
                    <td>' . $resultats['id_prospect'] . '</td>
                    <td>' . $resultats['prenom'] . '</td>
                    <td>' . $resultats['nom'] . '</td>
                    <td>' . $resultats['adresse'] . '</td>
                    <td>' . $resultats['code_postal'] . '</td>
                    <td>' . $resultats['ville'] . '</td>
                    <td>' . $resultats['tel'] . '</td>
                    <td>' . $resultats['email'] . '</td>
                    <td>' . $resultats['equivalent'] . '</td>
                    <td>' . $resultats['projet'] . '</td>
                    <td>'; if ($resultats['pre_inscrit']== '1') { 
                        echo 'oui';
                    } else{
                        echo 'non';
                    }
                    echo    '<td>' . $resultats['moyen'] . '</td>
                            <td>' . $resultats['heure_enregistrement'] . '</td>
                            <td>
                                <a href="modification.php?id=' . $resultats['id_prospect'] . '">Modifier</a>
                                <form action="admin.php" method="post">
                                    <input type="hidden" name="id_prospect" value="' . $resultats['id_prospect'] . '">
                                    <input type="submit" value="Supprimer">
                                </form>
                            </td>';        
        }
        // referme la table
        echo '</table>';
    ?>
    <form action="deconnexion.php" method="post">
        <input type="submit" name="deconnecter" value="Se déconnecter" />
    </form>
    <form action="home.php" method="post">
    <input type="submit" name="Home" value="Home" />
    </form>
</body>
</html>


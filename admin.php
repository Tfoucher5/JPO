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
    $temp=$pdo->query($sql);
    //affichage du tableau 
    //
    echo "<table border='1'>
    <tr>
        <td>Nom : </td>
        <td>Prenom : </td>
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
                    <td>' . $resultats['nom'] . '</td>
                    <td>' . $resultats['prenom'] . '</td>
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
                echo '<td>' . $resultats['moyen'] . '</td>
                     <td>' . $resultats['heure_enregistrement'] . '</td>
                     <td><a href="modification.php"><img src="" alt="" title="" /></a></td>';        
        }
        // referme la table
        echo '</table>';
    ?>
    <form action="deconnexion.php" method="post">
        <input type="submit" name="deconnecter" value="Se déconnecter" />
    </form>
</body>
</html>


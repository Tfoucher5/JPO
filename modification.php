<?php
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
    
    $sql='SELECT * FROM prospect ORDER BY id_prospect';
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
                    <td>' . $resultats['email'] . '</td>
                    <td>' . $resultats['niveau_etude'] . '</td>
                    <td>' . $resultats['projet'] . '</td>
                    <td>' . $resultats['pre-inscrit'] . '</td>
                    <td>' . $resultats['decouverte_IIA'] . '</td>
                    <td>' . $resultats['heure_enregistrement'] . '</td>
                    <td>' . $resultats['niveau_etude'] . '</td>'           
        }
        // referme la table
        echo '</table>';


    /* lie les tables etudiants et formations pour transformer les nombres en nom de formation
    $sql="SELECT etudiants.id, etudiants.nom, etudiants.prenom, formations.nom AS formation, formations.alternance
    FROM etudiant, formation, connaissance, 
    WHERE etudiants.formation = formations.id ORDER BY id";
    $temp=$pdo->query($sql);
    // TRAITEMENT DE LA SUPPRESSION D'UN ETUDIANT
    if(isset($_REQUEST['suppr'])){
        $id=$_REQUEST['suppr'];
        echo $id;
        //$sql='DELETE FROM etudiants WHERE id='.$id.'';
        //$pdo->exec($sql);
        }
    ?>
</body>
</html>


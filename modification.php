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
    
    $sql='SELECT * FROM prospect ORDER BY id';
    $temp=$pdo->query($sql);
    //affichage du tableau
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
                    <td>' . $resultats['niveau_etude'] . " ";  
                    if ($resultats['alternance']== '1') { 
                        echo 'en alternance';
                    }
                   echo '<td><a href="inscription.php?id='.$resultats['id'].'">modifier<a/><br/><a href="ex1.php?suppr='.$resultats['id'].'">supprimer<a/></td>';           
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
    */
    /*
    Boucle while pour remplir les lignes du tableau tant qu'ils trouvent des lignes dans la bases de données
    Concatène les données tiré 
    if pour écrire alterance à la suite de formation
    Dans un <a/> on concatène l'ID de l'étudiants et on le stock dans dans une variable dans l'URL du lien
    */
    while ($resultats = $temp -> fetch()){
        echo '<tr>
                <td>' . $resultats['id'] . '</td>
                <td>' . $resultats['nom'] . '</td>
                <td>' . $resultats['prenom'] . '</td>
                <td>' . $resultats['formation'] . " ";  
                if ($resultats['alternance']== '1') { 
                    echo 'en alternance';
                }
               echo '<td><a href="inscription.php?id='.$resultats['id'].'">modifier<a/><br/><a href="ex1.php?suppr='.$resultats['id'].'">supprimer<a/></td>';           
    }
    // referme la table
    echo '</table>';
    ?>
    <form action="deconnexion.php" method="post">
        <input type="submit" name="deconnecter" value="Se déconnecter" />
    </form>
</body>
</html>


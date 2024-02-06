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
    <form action="inscription.php" method="post">
        <button type="submit" value="inscription" >Inscription</button>

    <?php
        /* Récupere la valeur du formulaire si il existe une valeur
        Ligne SQL pour conter le nombre d'occurence des données récupéré du formulaire avec concaténation des variables
        Boucle while pour dire de scanner chaque ligne de la commande SQL plus haut
        Si le compteur renvoi 0 alors on insére les données du formulaires, sinon on affiche un message d'erreur
        */
        if(isset($_REQUEST['nom'])&&(isset($_REQUEST['prenom']))&&(isset($_REQUEST['formation']))) { 
            $nom=$_REQUEST['nom'];
            $prenom=$_REQUEST['prenom'];
            $formation=$_REQUEST['formation'];
            $sql='SELECT COUNT(DISTINCT prenom,nom,formation) AS verif FROM etudiants WHERE prenom="'.$prenom.'" AND nom="'.$nom.'" AND formation="'.$formation.'" ';
            $temp=$pdo->query($sql);
            while ($resultats = $temp -> fetch()){
                if ($resultats['verif']==0){
                    $sql = 'INSERT INTO etudiants(prenom,nom,formation) VALUES ("'.$prenom.'", "'.$nom.'", "'.$formation.'") ' ;
                    $pdo->exec($sql);
                }
                else{
                    $fail='Cet.te étudiant.e est déjà inscrit.e';
                }
            } 
        }
    // lie les tables etudiants et formations pour transformer les nombres en nom de formation
    $sql="SELECT etudiants.id, etudiants.nom, etudiants.prenom, formations.nom AS formation, formations.alternance
    FROM etudiants, formations
    WHERE etudiants.formation = formations.id ORDER BY id";
    $temp=$pdo->query($sql);
    // TRAITEMENT DE LA SUPPRESSION D'UN ETUDIANT
    if(isset($_REQUEST['suppr'])){
        $id=$_REQUEST['suppr'];
        echo $id;
        //$sql='DELETE FROM etudiants WHERE id='.$id.'';
        //$pdo->exec($sql);
        }
 
    // Déut de l'affichage de la base de donnée sous forme de tableau
    echo '<table border="1">
    <tr>
        <td>id : </td>
        <td>nom : </td>
        <td>prenom : </td>
        <td>formation : </td>
        <td>action : </td>
        </tr>';
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
</body>
</html>


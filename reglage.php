<?php
include ("session_start.php");
if(isset($_REQUEST['Mode'])) {
    if ($_REQUEST['Mode'] == 'nuit'){
        $_SESSION["Mode"]="nuit";
    }
    else{
        $_SESSION["Mode"]="jour";
    }
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: connexion.php');
    exit();
}

include_once('base_donnee.php');

$tableau=1;
$tableau = 1;
$connaissance = "";
$valider = "";
$afficher = "";
$res = array();

if(isset($_REQUEST['connaissance'])) {
    $connaissance = htmlentities($_REQUEST['connaissance']);
}
if(isset($_REQUEST['valider']) && $_REQUEST['valider'] == "rechercher") {
    $where = " moyen='".$connaissance."'";
    $sql = "SELECT * FROM connaissance WHERE ".$where;
    $temp = $pdo->query($sql);
    $res = $temp->fetchAll();
    $afficher = "oui";
    $tableau = 0;
}

// Traitement de la suppression
if(isset($_POST['supprimer_connaissance'])) {
    $moyen = $_POST['moyen']; // Utiliser la valeur de "moyen" comme identifiant unique
    $sql_delete = "DELETE FROM connaissance WHERE moyen = :moyen"; // Requête de suppression
    $stmt = $pdo->prepare($sql_delete);
    $stmt->bindParam(':moyen', $moyen, PDO::PARAM_STR);
    $stmt->execute();
    // Redirection vers la même page après la suppression
    header('Location: ' . $_SERVER['PHP_SELF']);
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
    <!-- formulaire de recherche -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" name="search">
            <input type="text" name="connaissance" value="<?php echo $connaissance;?>" placeholder="Rechercher un Nom">
            <input type="submit" name="valider" value="rechercher" >            
        </form>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" name="reset">
            <input type="submit" name="1" value="reset" >
        </form>
    <!-- affichage des résultats -->
    <?php if($afficher=="oui"){ ?>
    <div id="resultat">
        <div id="nbr"><?=count($res)." ".(count($res)>=1?"résultats trouvés":"résultat trouvé") ?></div>
        <table border="1">
            <tr>
                <?php foreach($res as $r){ ?>
                <td><?php echo $r['moyen']; ?></td>
                <td>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <input type="hidden" name="moyen" value="<?php echo $r['moyen']; ?>"> <!-- Utilisez la valeur "moyen" comme identifiant unique -->
                        <input type="submit" name="supprimer_connaissance" value="Supprimer">
                    </form>
                </td>
                <?php } ?>
            </tr>
        </table>
        <?php } ?>

</div>
<?php
//liste de la table connaissance
if($tableau==1){
    try{
        $sql='SELECT * FROM connaissance';
        $temp=$pdo->prepare($sql);
        $temp->execute();
        echo '<table border="1">';
        echo '<tr><th>Moyen</th><th>Modifier</th><th>Ajouter</th><th>Supprimer</th></tr>'; // Entêtes des colonnes
        while($q=$temp->fetch()){
            echo '<tr>';
            echo '<td>'.$q["moyen"].'</td>';
            echo '<td><form action="modifier_connaissance.php" method="post">'; // Formulaire pour la modification
            echo '<input type="hidden" name="moyen" value="' . $q['moyen'] . '">'; // Champ caché pour l'identifiant de la connaissance
            echo '<input type="submit" class="edit-btn" value="✏️">'; // Bouton de modification
            echo '</form></td>';
            echo '<td><form action="ajouter_connaissance.php" method="post">'; // Formulaire pour l'ajout
            echo '<input type="hidden" name="moyen" value="' . $q['moyen'] . '">'; // Champ caché pour l'identifiant de la connaissance
            echo '<input type="submit" class="add-btn" value="➕">'; // Bouton d'ajout
            echo '</form></td>';
            echo '<td><form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">'; // Formulaire pour la suppression
            echo '<input type="hidden" name="moyen" value="' . $q['moyen'] . '">'; // Champ caché pour l'identifiant de la connaissance
            echo '<input type="submit" name="supprimer_connaissance" value="Supprimer">'; // Bouton de suppression
            echo '</form></td>';
            echo '</tr>';
        }
        echo '</table>';
    
        // Affichage de la table formation
        $sql='SELECT * FROM formation';
        $temp=$pdo->prepare($sql);
        $temp->execute();
        echo '<table border="1">';
        while($q=$temp->fetch()){
            echo '<tr><td>'.$q["nom"]." ";
            if ($q['alternance']== '1') { 
                echo 'en alternance</td>';
            }else{
                echo '</td>';
            }
        }
        echo '</table>';
    }     
    catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit();
    }
} 
?>
</body>
</html>

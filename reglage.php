<?php
include ("session_start.php");

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: connexion.php');
    exit();
}

include_once('base_donnee.php');

$tableau = 1;
$connaissance = "";
$valider = "";
$afficher = "";
$res = array();

if(isset($_REQUEST['connaissance'])) {
    $connaissance = htmlentities($_REQUEST['connaissance']);
}

if(isset($_REQUEST['formation'])) {
    $connaissance = htmlentities($_REQUEST['formation']);
}

if(isset($_REQUEST['valider']) && $_REQUEST['valider'] == "rechercher") {
    $where = "'".$connaissance."%'";
    $sql = "SELECT * FROM connaissance WHERE moyen LIKE ".$where;
    echo $sql;
    $temp = $pdo->query($sql);
    $res = $temp->fetchAll();
    $afficher = "oui";
    $tableau = 0;
}

// Traitement de la suppression
if(isset($_POST['supprimer'])) {
    $type = $_POST['type']; // Récupérer le type de la table (connaissance ou formation)
    $identifiant = $_POST['identifiant']; // Récupérer l'identifiant unique de l'entrée
    if($type === 'connaissance') {
        $sql_delete = "DELETE FROM connaissance WHERE moyen = :identifiant";
    } elseif($type === 'formation') {
        $sql_delete = "DELETE FROM formation WHERE nom = :identifiant";
    }
    $stmt = $pdo->prepare($sql_delete);
    $stmt->bindParam(':identifiant', $identifiant, PDO::PARAM_STR);
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
    <link rel="stylesheet" href="<?php echo $_SESSION['Mode']?>.css">
</head>
<body>

</div>
<div class="content_reglages">
    <!-- Formulaire de recherche -->
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" name="search">
        <input type="text" name="connaissance" value="<?php echo $connaissance;?>" placeholder="Rechercher un Nom">
        <input type="submit" name="valider" class="disconnect_button" value="rechercher">            
    </form>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" name="reset">
        <input type="submit" name="1" class="disconnect_button" value="reset" >
    </form>

    <!-- Affichage des résultats -->
    <?php if($afficher == "oui"): ?>
        <div id="resultat">
            <div id="nbr"><?=count($res)." ".(count($res)>=1?"résultats trouvés":"résultat trouvé") ?></div>
            <table border="1">
                <tr>
                    <?php foreach($res as $r): ?>
                        <td><?php echo $r['moyen']; ?></td>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="type" value="connaissance">
                                <input type="hidden" name="identifiant" value="<?php echo $r['moyen']; ?>">
                                <input type="submit" name="supprimer" value="Supprimer">
                            </form>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
    <?php endif; ?>

    <!-- Affichage des résultats -->
    <?php if($afficher == "oui"): ?>
        <div id="resultat">
            <div id="nbr"><?=count($res)." ".(count($res)>=1?"résultats trouvés":"résultat trouvé") ?></div>
            <table border="1">
                <tr>
                    <?php foreach($res as $r): ?>
                        <td><?php echo $r['nom']; ?></td>
                        <td>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <input type="hidden" name="type" value="formation">
                                <input type="hidden" name="identifiant" value="<?php echo $r['nom']; ?>">
                                <input type="submit" name="supprimer" value="Supprimer">
                            </form>
                        </td>
                    <?php endforeach; ?>
                </tr>
            </table>
        </div>
    <?php endif; ?>

    <!-- Liste de la table connaissance -->
    <?php if($tableau == 1): ?>
        <?php
        try {
            $sql = 'SELECT * FROM connaissance';
            $temp = $pdo->prepare($sql);
            $temp->execute();
            echo '<div class="all_table_reglages">';
            echo '<table border="1">';
            while ($q = $temp->fetch()) {
                echo '<tr>';
                echo '<td><form action="modifier_connaissance.php" method="post">'; // Formulaire pour la modification
                echo '<input type="hidden" name="moyen" value="' . $q['moyen'] . '">'; // Champ caché pour l'identifiant de la connaissance
                echo '<input type="submit" class="edit-btn delete-btn" value="✏️">'; // Bouton de modification
                echo '</form></td>';
                echo '<td><form action="ajouter_connaissance.php" method="post">'; // Formulaire pour l'ajout
                echo '<input type="hidden" name="moyen" value="' . $q['moyen'] . '">'; // Champ caché pour l'identifiant de la connaissance
                echo '<input type="submit" class="add-btn delete-btn" value="➕">'; // Bouton d'ajout
                echo '</form></td>';
                echo '<td><form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">'; // Formulaire pour la suppression
                echo '<input type="hidden" name="type" value="connaissance">'; // Champ caché pour le type de la table
                echo '<input type="hidden" name="identifiant" value="' . $q['moyen'] . '">'; // Champ caché pour l'identifiant de la connaissance
                echo '<input type="submit" class="delete-btn" name="supprimer" value="🗑️">'; // Bouton de suppression
                echo '</form></td>';
                echo '<td>'.$q["moyen"].'</td>';
                echo '</tr>';
                
            }
            echo '</table>';
            echo '</div>';
    
            $sql='SELECT * FROM formation';
            $temp=$pdo->prepare($sql);
            $temp->execute();
            echo '<table border="1">';
            while($q=$temp->fetch()){
                echo '<tr>';
                echo '<td>'.$q["nom"].'</td>';
                if ($q['alternance'] == '1') { 
                    echo '<td>en alternance</td>';
                } else {
                    echo '<td></td>';
                }
                echo '<td><form action="modifier_connaissance.php" method="post">'; // Formulaire pour la modification
                echo '<input type="hidden" name="nom" value="' . $q['nom'] . '">'; // Champ caché pour l'identifiant de la connaissance
                echo '<input type="submit" class="edit-btn" value="✏️">'; // Bouton de modification
                echo '</form></td>';
                echo '<td><form action="ajouter_connaissance.php" method="post">'; // Formulaire pour l'ajout
                echo '<input type="hidden" name="nom" value="' . $q['nom'] . '">'; // Champ caché pour l'identifiant de la connaissance
                echo '<input type="submit" class="add-btn" value="➕">'; // Bouton d'ajout
                echo '</form></td>';
                echo '<td><form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">'; // Formulaire pour la suppression
                echo '<input type="hidden" name="type" value="formation">'; // Spécifier le type de table
                echo '<input type="hidden" name="identifiant" value="' . $q['nom'] . '">'; // Champ caché pour l'identifiant de la formation
                echo '<input type="submit" name="supprimer" value="Supprimer">'; // Bouton de suppression
                echo '</tr></form>';
            }
            echo '</tr>
            </table>
            </div>';
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
        ?>
    <?php endif; ?>
</div>
</body>
</html>

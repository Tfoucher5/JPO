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
        while($q=$temp->fetch()){
            echo '<tr><td>'.$q["moyen"].'</td>';
        }
        echo '</table>';
    
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

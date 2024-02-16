<?php
include ("session_start.php");

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: connexion.php');
    exit();
}

include_once('base_donnee.php');

//initialisation des variables pour les barres de recherche
$connaissance = "";
$formation="";
$valider = "";
$afficher = "";
$resco = array();
$resfo = array();
$reset="";
$afficherco="";
$afficherfo="";

//table connaissance
if(isset($_REQUEST['connaissance'])) {
    if(!empty($_REQUEST['connaissance'])){
        $connaissance = htmlentities($_REQUEST['connaissance']);
    }
}

//construction de la requete SQL connaissance
if(isset($_REQUEST['validerco']) && $_REQUEST['validerco'] == "rechercher") {
    if(!empty($connaissance)){
        $where = "'".$connaissance."%'";
        $sql = "SELECT * FROM connaissance WHERE moyen LIKE ".$where;
        $temp = $pdo->query($sql);
        $resco = $temp->fetchAll();
        $afficherco = "oui";
    }
}else{
    $sql='SELECT * FROM connaissance';
    $temp=$pdo->query($sql);
    $resco = $temp->fetchAll();
}

//table formation
if(isset($_REQUEST['formation'])) {
    if(!empty($_REQUEST['formation'])){
        $formation = htmlentities($_REQUEST['formation']);
    }
}

//construction de la requete SQL formation
if(isset($_REQUEST['validerfo']) && $_REQUEST['validerfo'] == "rechercher") {
    if(!empty($formation)){
    $where = "'".$formation."%'";
    $sql = "SELECT * FROM formation WHERE CONCAT(nom,alternance) LIKE ".$where;
    $temp = $pdo->query($sql);
    $resfo = $temp->fetchAll();
    $afficherfo = "oui";
    }
}else{
    $sql='SELECT * FROM formation';
    $temp=$pdo->query($sql);
    $resfo = $temp->fetchAll();
}


//reset des valeurs $conaissance et $formation
if(isset($_REQUEST['reset'])) {
    if(!empty($_REQUEST['reset'])){
        $formation = "";
        $connaissance = "";
    }
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
<div class="nav_hitbox">
    <nav>
        <div class="nav_container">
            <a href="Home.php">
             <div class="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                  </svg>
             </div>
            </a>
        </div>
        <div class="nav_container">
            <a href="admin.php">
                <div class="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M16.5 7.5h-9v9h9v-9Z" />
                        <path fill-rule="evenodd" d="M8.25 2.25A.75.75 0 0 1 9 3v.75h2.25V3a.75.75 0 0 1 1.5 0v.75H15V3a.75.75 0 0 1 1.5 0v.75h.75a3 3 0 0 1 3 3v.75H21A.75.75 0 0 1 21 9h-.75v2.25H21a.75.75 0 0 1 0 1.5h-.75V15H21a.75.75 0 0 1 0 1.5h-.75v.75a3 3 0 0 1-3 3h-.75V21a.75.75 0 0 1-1.5 0v-.75h-2.25V21a.75.75 0 0 1-1.5 0v-.75H9V21a.75.75 0 0 1-1.5 0v-.75h-.75a3 3 0 0 1-3-3v-.75H3A.75.75 0 0 1 3 15h.75v-2.25H3a.75.75 0 0 1 0-1.5h.75V9H3a.75.75 0 0 1 0-1.5h.75v-.75a3 3 0 0 1 3-3h.75V3a.75.75 0 0 1 .75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h10.5a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V6.75Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
        </div>
        <div class="nav_container">
            <a href="MentionsLegales.php">
            <div class="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v.756a49.106 49.106 0 0 1 9.152 1 .75.75 0 0 1-.152 1.485h-1.918l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 18.75 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84l2.474-10.124H12.75v13.28c1.293.076 2.534.343 3.697.776a.75.75 0 0 1-.262 1.453h-8.37a.75.75 0 0 1-.262-1.453c1.162-.433 2.404-.7 3.697-.775V6.24H6.332l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 5.25 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84L4.168 6.241H2.25a.75.75 0 0 1-.152-1.485 49.105 49.105 0 0 1 9.152-1V3a.75.75 0 0 1 .75-.75Zm4.878 13.543 1.872-7.662 1.872 7.662h-3.744Zm-9.756 0L5.25 8.131l-1.872 7.662h3.744Z" clip-rule="evenodd" />
                  </svg>
                </a>
            </div>
        </div>
        <div class="nav_container">
                <div class="button_active">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
        </div>
        <div class="nav_container">
            <a href="configuration.php">
                <div class="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z" />
                    </svg>
                </div>
            </a>
        </div>
    </nav>
    </div>
    <div class="content_reglages">
        <!-- formulaire de recherche connaissance -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" name="search">
            <input type="text" name="connaissance" value="<?php echo $connaissance;?>" placeholder="Rechercher dans les moyens de connaitre l'école">
            <input type="submit" name="validerco" class="disconnect_button" value="rechercher">                        
        </form>

        <!-- formulaire de recherche formation -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" name="search">
            <input type="text" name="formation" value="<?php echo $formation;?>" placeholder="Rechercher une formation">
            <input type="submit" name="validerfo" class="disconnect_button" value="rechercher">            
                      
        </form>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" name="reset">
            <input type="submit" name="reset" class="disconnect_button" value="reset">  
        </form>

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
=======
>>>>>>> b1a76343d20863f8377dc87c2118fb5c46e9b574
<?php
//liste de la table connaissance
    try{
        if($afficherco=='oui'){?>
            <div id="resultat">
                <div id="nbr"><?=count($resco)." ".(count($resco)>=1?"résultats trouvés":"résultat trouvé") ?></div>
            </div>
        <?php }
        echo '<div class="all_table_reglages">';
        echo '<table border="1">';
        foreach($resco as $r){
            echo '<tr>';
            echo '<td>'.$r["moyen"].'</td>';
<<<<<<< HEAD
            echo '<td><form action="modifier_connaissance.php?id='.$r['id_connaissance'].'" method="post">'; // Formulaire pour la modification
=======
            echo '<td><form action="modifier_connaissance.php?id='.$r["id_connaissance"].'" method="post">'; // Formulaire pour la modification
>>>>>>> b1a76343d20863f8377dc87c2118fb5c46e9b574
            echo '<input type="submit" class="edit-btn delete-btn" value="✏️">'; // Bouton de modification
            echo '</form></td>';
            echo '<td><form action="ajouter_connaissance.php" method="post">'; // Formulaire pour l'ajout
            echo '<input type="hidden" name="moyen" value="' . $r['moyen'] . '">'; // Champ caché pour l'identifiant de la connaissance
            echo '<input type="submit" class="add-btn delete-btn" value="➕">'; // Bouton d'ajout
            echo '</form></td>';
            echo '<td><form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">'; // Formulaire pour la suppression
            echo '<input type="hidden" name="type" value="connaissance">'; // Spécifier le type de table
            echo '<input type="hidden" name="identifiant" value="' . $r['moyen'] . '">'; // Champ caché pour l'identifiant de la connaissance
            echo '<input type="submit" class="delete-btn" name="supprimer" value="🗑️">'; // Bouton de suppression
            echo '</form></td>';
            echo '</tr>';
        }
        echo '</table>';
<<<<<<< HEAD
>>>>>>> c9db56b515f353863b7c2f34073fd0bd8b8487cb
=======
>>>>>>> b1a76343d20863f8377dc87c2118fb5c46e9b574

//liste table formation
        if($afficherfo=='oui'){
            echo '<div id="resultat">';?>
                <div id="nbr"><?=count($resfo)." ".(count($resfo)>=1?"résultats trouvés":"résultat trouvé") ?></div>
            </div>
        <?php }
        echo '<table border="1">';
        foreach($resfo as $r){
            echo '<tr>
            <td>'.$r["nom"]." ";
            if ($r['alternance']== '1') { 
                echo 'en alternance</td>';
            }else{
                echo '</td>';
            }
                echo '<td><form action="modifier_formation.php?id='.$r['id_formation'].'" method="post">'; // Formulaire pour la modification
                echo '<input type="hidden" name="nom" value="' . $r['nom'] . '">'; // Champ caché pour l'identifiant de la connaissance
                echo '<input type="submit" class="edit-btn delete-btn"" value="✏️">'; // Bouton de modification
                echo '</form></td>';
                echo '<td><form action="ajout_formation.php" method="post">'; // Formulaire pour l'ajout
                echo '<input type="hidden" name="nom" value="' . $r['nom'] . '">'; // Champ caché pour l'identifiant de la connaissance
                echo '<input type="submit" class="add-btn delete-btn"" value="➕">'; // Bouton d'ajout
                echo '</form></td>';
                echo '<td><form action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '" method="post">'; // Formulaire pour la suppression
                echo '<input type="hidden" name="type" value="formation">'; // Spécifier le type de table
                echo '<input type="hidden" name="identifiant" value="' . $r['nom'] . '">'; // Champ caché pour l'identifiant de la formation
                echo '<input type="submit" name="supprimer" class="delete-btn" value="🗑️">'; // Bouton de suppression
                echo '</tr></form>';
            }
            echo '</tr>
            </table>
            </div>';
        }catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            exit();
        }
?>
</div>
</div>
</body>
</html>

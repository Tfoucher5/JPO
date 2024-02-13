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
        $code_postal_updated = htmlentities($_POST['code_postal']);
        $projet_updated = htmlentities($_POST['projet']);
        $pre_inscrit_updated = htmlentities($_POST['pre_inscrit']);
        $niveau_etude_updated = htmlentities($_POST['niveau_etude']);
        $decouverte_IIA_updated = htmlentities($_POST['decouverte_IIA']);

        //on ajoute les valeurs dans la db
        $sql = "UPDATE prospect
        SET nom = :nom, 
            prenom = :prenom, 
            email = :email, 
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
        $temp->Bindparam(":email",$mail_updated,PDO::PARAM_STR);
        $temp->Bindparam(":tel",$tel_updated,PDO::PARAM_STR);
        $temp->Bindparam(":adresse",$adresse_updated,PDO::PARAM_STR);
        $temp->Bindparam(":ville",$ville_updated,PDO::PARAM_STR);
        $temp->Bindparam(":cp",$code_postal_updated,PDO::PARAM_INT);
        $temp->Bindparam(":projet",$projet_updated,PDO::PARAM_STR);
        $temp->Bindparam(":inscrit",$pre_inscrit_updated,PDO::PARAM_STR);
        $temp->Bindparam(":etude",$niveau_etude_updated,PDO::PARAM_STR);
        $temp->Bindparam(":iia",$decouverte_IIA_updated,PDO::PARAM_STR);
        $temp->bindParam(':id', $id);
        $temp->execute();
        if ($temp->execute()) {
            header('Location: connexion.php');
            exit();
        } else {
            echo 'Modification failed';
        }
    }

        // Rediriger vers la page d'affichage après la mise à jour

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modification</title>
    <link rel="stylesheet" href="stylenuit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
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
        </div>
        <div>
            <div class="button_active">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M16.5 7.5h-9v9h9v-9Z" />
                    <path fill-rule="evenodd" d="M8.25 2.25A.75.75 0 0 1 9 3v.75h2.25V3a.75.75 0 0 1 1.5 0v.75H15V3a.75.75 0 0 1 1.5 0v.75h.75a3 3 0 0 1 3 3v.75H21A.75.75 0 0 1 21 9h-.75v2.25H21a.75.75 0 0 1 0 1.5h-.75V15H21a.75.75 0 0 1 0 1.5h-.75v.75a3 3 0 0 1-3 3h-.75V21a.75.75 0 0 1-1.5 0v-.75h-2.25V21a.75.75 0 0 1-1.5 0v-.75H9V21a.75.75 0 0 1-1.5 0v-.75h-.75a3 3 0 0 1-3-3v-.75H3A.75.75 0 0 1 3 15h.75v-2.25H3a.75.75 0 0 1 0-1.5h.75V9H3a.75.75 0 0 1 0-1.5h.75v-.75a3 3 0 0 1 3-3h.75V3a.75.75 0 0 1 .75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h10.5a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V6.75Z" clip-rule="evenodd" />
                </svg>
            </div>

        </div>
        <div class="nav_container">
        <a href="MentionsLegales.html">
            <div class="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v.756a49.106 49.106 0 0 1 9.152 1 .75.75 0 0 1-.152 1.485h-1.918l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 18.75 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84l2.474-10.124H12.75v13.28c1.293.076 2.534.343 3.697.776a.75.75 0 0 1-.262 1.453h-8.37a.75.75 0 0 1-.262-1.453c1.162-.433 2.404-.7 3.697-.775V6.24H6.332l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 5.25 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84L4.168 6.241H2.25a.75.75 0 0 1-.152-1.485 49.105 49.105 0 0 1 9.152-1V3a.75.75 0 0 1 .75-.75Zm4.878 13.543 1.872-7.662 1.872 7.662h-3.744Zm-9.756 0L5.25 8.131l-1.872 7.662h3.744Z" clip-rule="evenodd" />
                  </svg>
                  
            </div>
        </a>
        </div>
        <div class="nav_container">
            <a href="#">
                <div class="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M12 2.25a.75.75 0 0 1 .75.75v2.25a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM7.5 12a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM18.894 6.166a.75.75 0 0 0-1.06-1.06l-1.591 1.59a.75.75 0 1 0 1.06 1.061l1.591-1.59ZM21.75 12a.75.75 0 0 1-.75.75h-2.25a.75.75 0 0 1 0-1.5H21a.75.75 0 0 1 .75.75ZM17.834 18.894a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 1 0-1.061 1.06l1.59 1.591ZM12 18a.75.75 0 0 1 .75.75V21a.75.75 0 0 1-1.5 0v-2.25A.75.75 0 0 1 12 18ZM7.758 17.303a.75.75 0 0 0-1.061-1.06l-1.591 1.59a.75.75 0 0 0 1.06 1.061l1.591-1.59ZM6 12a.75.75 0 0 1-.75.75H3a.75.75 0 0 1 0-1.5h2.25A.75.75 0 0 1 6 12ZM6.697 7.757a.75.75 0 0 0 1.06-1.06l-1.59-1.591a.75.75 0 0 0-1.061 1.06l1.59 1.591Z" />
                    </svg>
                    
                </div>
            </a>
        </div>
    </nav>
    <div class="content_home">
    <div class="sun">
        <div class="line"></div>
    </div>
        <div class="label_home">
        <form action="Home.php" method="post">
<div class="label_box"></div>
            <div class="label_box">
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>" required />
</div>
            <div class="label_box">
        <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" required />
</div>
            <div class="label_box">
        <label for="email">Email : </label> 
            <input type="text" name="email" id="email" value="<?php echo $mail; ?>" required />
</div>
            <div class="label_box">
        <label for="telephone">Téléphone : </label>
            <input type="number" name="tel" id="tel" value="<?php echo $tel; ?>" required />
</div>
            <div class="label_box">
        <label for="adresse">Adresse : </label>
            <input type="text" name="adresse" id="adresse" value="<?php echo $adresse; ?>" required />
</div>
            <div class="label_box">
        <label for="ville">Ville : </label>
            <input type="text" name="ville" id="ville" value="<?php echo $ville; ?>" required />
</div>
            <div class="label_box">
        <label for="code-postal">Code postal : </label>
            <input type="text" name="code-postal" id="code-postal" value="<?php echo $code_postal; ?>" required />
</div>
            
            <div class="label_box select_box">
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
</div>
        <div class="label_box select_box">
        <label for="decouverte_IIA">Comment nous avez vous découvert ? : </label>
        <select name="decouverte_IIA" id="decouverte_IIA" required>
        <option value="1" <?php echo ($decouverte_IIA == 1) ? 'selected' : ''; ?>>Recherches en ligne</option>
        <option value="2" <?php echo ($decouverte_IIA == 2) ? 'selected' : ''; ?>>Publicité en ligne</option>
        <option value="3" <?php echo ($decouverte_IIA == 3) ? 'selected' : ''; ?>>Réseaux sociaux</option>
        <option value="4" <?php echo ($decouverte_IIA == 4) ? 'selected' : ''; ?>>Salons</option>
        <option value="5" <?php echo ($decouverte_IIA == 5) ? 'selected' : ''; ?>>Bouche à oreille</option>
        <option value="6" <?php echo ($decouverte_IIA == 6) ? 'selected' : ''; ?>>Autre</option>
    </select>
    </div>
    <div class="label_box select_box">
        <label for="formation_envisagee">Formation envisagée : </label>
        <select name="formation_envisagee" id="formation_envisagee" required>
            <option value="1">BTS SIO SLAM</option>
            <option value="2">BTS SIO SLAM en alternance</option>
            <option value="3">BTS SIO SISR</option>
            <option value="4">BTS SIO SISR en alternance</option>
            <option value="5">Licence SIO SLAM en alternance</option>
            <option value="6">Licence SIO SISR en alternance</option>
            <option value="7">Master Lead Developpeur en alternance</option>
            <option value="8">Master Manager Cybersécurité en alternance</option>
            <option value="9">Développeur Web et Web mobile</option>
        </select>
</div>
    <!-- <div class="label_box_projet">
                <label for="projet">Projet : </label>
                <textarea type="text" name="projet" id="projet" placeholder="votre projet" required ></textarea>
</div> -->
        <input type="submit" name="soumettre" onclick="myFunction()" value="modifier" />
    </form>
        </div>
    </div>
</body>
</html>
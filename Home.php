<?php

// script de connexion
require_once('base_donnee.php');

if (isset($_POST['soumettre'])) {

    // on récupère les valeurs
    $prenom = htmlentities($_POST['prenom']);
    $nom = htmlentities($_POST['nom']);
    $mail = htmlentities($_POST['email']);
    $tel = htmlentities($_POST['tel']);
    $adresse = htmlentities($_POST['adresse']);
    $ville = htmlentities($_POST['ville']);
    $code_postal = htmlentities($_POST['code-postal']);
    $projet = htmlentities($_POST['projet']);
    $pre_inscrit = htmlentities($_POST['pre_inscrit']);
    $niveau_etude = htmlentities($_POST['niveau_etude']);
    $connaissance = htmlentities($_POST['decouverte_IIA']);
    $now=date('Y-m-d H:i:s');

    // on ajoute les valeurs dans la db
    $sql = 'INSERT INTO prospect (prenom, nom, email, tel, adresse, ville, code_postal, projet, pre_inscrit, niveau_etude, decouverte_IIA, heure_enregistrement) 
            VALUES (:prenom, :nom, :mail, :tel, :adresse, :ville, :code_postal , :projet, :pre_inscrit, :niveau_etude, :connaissance, :heure)';
    $temp=$pdo->prepare($sql);
    $temp->Bindparam(":prenom",$prenom,PDO::PARAM_STR);
    $temp->Bindparam(":nom",$nom,PDO::PARAM_STR);
    $temp->Bindparam(":mail",$mail,PDO::PARAM_STR);
    $temp->Bindparam(":tel",$tel,PDO::PARAM_STR);
    $temp->Bindparam(":adresse",$adresse,PDO::PARAM_STR);
    $temp->Bindparam(":ville",$ville,PDO::PARAM_STR);
    $temp->Bindparam(":code_postal", $code_postal, PDO::PARAM_INT);
    $temp->Bindparam(":projet", $projet, PDO::PARAM_STR);
    $temp->Bindparam(":pre_inscrit", $pre_inscrit, PDO::PARAM_INT);
    $temp->Bindparam(":niveau_etude", $niveau_etude, PDO::PARAM_INT);
    $temp->Bindparam(":connaissance", $connaissance, PDO::PARAM_INT);
    $temp->Bindparam(":heure",$now,PDO::PARAM_STR);
    $temp->execute();

    // Effectuer la redirection après la soumission du formulaire
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylenuit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;700&display=swap" rel="stylesheet">
</head>
<body>
<nav>
        <div>
             <div class="button_active">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M11.47 3.841a.75.75 0 0 1 1.06 0l8.69 8.69a.75.75 0 1 0 1.06-1.061l-8.689-8.69a2.25 2.25 0 0 0-3.182 0l-8.69 8.69a.75.75 0 1 0 1.061 1.06l8.69-8.689Z" />
                    <path d="m12 5.432 8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 0 1-.75-.75v-4.5a.75.75 0 0 0-.75-.75h-3a.75.75 0 0 0-.75.75V21a.75.75 0 0 1-.75.75H5.625a1.875 1.875 0 0 1-1.875-1.875v-6.198a2.29 2.29 0 0 0 .091-.086L12 5.432Z" />
                  </svg>
                  
             </div>
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
    </div>
        <div class="label_home">
        <form action="Home.php" method="post">
<div class="label_box"></div>
            <div class="label_box">
        <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom" placeholder="Prenom" required />
</div>
            <div class="label_box">
        <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom" placeholder="Nom" required />
</div>
            <div class="label_box">
        <label for="email">Email : </label> 
            <input type="email" name="email" id="email" placeholder="exemple@gmail.com" required />
</div>
            <div class="label_box">
        <label for="telephone">Téléphone : </label>
            <input type="tel" name="tel" id="tel" placeholder="telephone" required minlength="10" maxlength="10"/>
</div>
            <div class="label_box">
        <label for="adresse">Adresse : </label>
            <input type="text" name="adresse" id="adresse" placeholder="adresse" required />
</div>
            <div class="label_box">
        <label for="ville">Ville : </label>
            <input type="text" name="ville" id="ville" placeholder="ville" required />
</div>
            <div class="label_box">
        <label for="code-postal">Code postal : </label>
            <input type="text" name="code-postal" id="code-postal" placeholder="code postal" required />
</div>
            
            <div class="label_box select_box">
            <label for="pre-inscrit">Pré inscrit : </label>
        <select name="pre_inscrit" id="pre_inscrit" required>
            <option value="1">Oui</option>
            <option value="0">Non</option>
        </select>
        <label for="niveau-etude">Niveau d'étude : </label>
        <select name="niveau_etude" id="niveau_etude" required>
            <option value="5">CAP</option>
            <option value="4">BAC</option>
            <option value="3">Bac +2</option>
            <option value="2">Licence</option>
            <option value="1">Master</option>
        </select>
</div>
        <div class="label_box select_box">
        <label for="decouverte_IIA">Comment nous avez vous découvert ? : </label>
        <select name="decouverte_IIA" id="decouverte_IIA" required>
            <option value="1">Recherches en ligne</option>
            <option value="2">Publicité en ligne</option>
            <option value="3">réseaux sociaux</option>
            <option value="4">Salons</option>
            <option value="5">Bouche a oreille</option>
            <option value="6">Autres</option>
        </select>
    </div>
    <div class="label_box">
                <label for="projet">Projet : </label>
                <textarea type="text" name="projet" id="projet" placeholder="votre projet" required ></textarea>
</div>
        <input type="submit" name="soumettre" onclick="myFunction()" value="enregistrer" />
    </form>
        </div>
    </div>
    <div>
        <?php
            
        ?>
    </div>
<script>
function myFunction() {
  alert("Vos informations ont bien été enregistrés.");
}
</script>
</body>
</html>
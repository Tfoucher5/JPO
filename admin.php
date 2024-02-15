<?php
include("session_start.php");
if (isset($_REQUEST['Mode'])) {
    if ($_REQUEST['Mode'] == 'nuit') {
        $_SESSION["Mode"] = "nuit";
    } else {
        $_SESSION["Mode"] = "jour";
    }
}

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['connected']) || $_SESSION['connected'] !== true) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('Location: connexion.php');
    exit();
}

require_once('base_donnee.php');

// Ajoutez cette condition pour vérifier si l'utilisateur veut télécharger le CSV
if (isset($_POST['download_csv'])) {
    // Configuration de l'en-tête pour indiquer que le contenu est un fichier CSV
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');

    // Ouverture de la sortie en écriture
    $output = fopen('php://output', 'w');

    fputs($output, $bom =( chr(0xEF) . chr(0xBB) . chr(0xBF) ));

    // Entêtes du CSV
    fputcsv($output, array('Prénom', 'Nom', 'Adresse', 'Code Postal', 'Ville', 'Téléphone', 'Email', 'Niveau d\'étude', 'Projet', 'Pré-inscrit', 'Découverte IIA', 'Heure d\'enregistrement'), ";");

    // Sélection des données depuis la base de données
    $sql = 'SELECT * FROM prospect ORDER BY id_prospect';
    $temp = $pdo->prepare($sql);
    $temp->execute();

    // Écriture des données dans le fichier CSV
    while ($resultats = $temp->fetch()) {
        // Formater l'heure
        $heure_enregistrement = date('Y-m-d H:i:s', strtotime($resultats['heure_enregistrement']));
        
        fputcsv($output, array(
            $resultats['prenom'],
            $resultats['nom'],
            $resultats['adresse'],
            $resultats['code_postal'],
            $resultats['ville'],
            $resultats['tel'],
            $resultats['email'],
            $resultats['niveau_etude'],
            $resultats['projet'],
            $resultats['pre_inscrit'] == '1' ? 'oui' : 'non',
            $resultats['decouverte_IIA'],
            '"'. $heure_enregistrement.'"' // Utilisation de l'heure formatée
        ), ";");
    }

    // Fermeture du fichier CSV
    fclose($output);
    exit();
}
//définition variable bare de recherche 
$tableau=1;
$valider = "";
$afficher = "";
$res = array();
$prenom = "";
$nom = "";
$adresse = "";
$code_postal = "";
$ville = "";
$tel = "";
$email = "";
$niveau_etude = "";
$note = "";
$pre_inscrit = "";
$connaissance = "";
$note_prive = "";
$formation="";
$date1 = "";
$date2 = "";

//trsfer vlur si un ou plusieurs champ du formulaire sont remplis
if(isset($_REQUEST['prenom'])|| isset($_REQUEST['nom']) || isset($_REQUEST['adresse']) || isset($_REQUEST['code_postal']) 
|| isset($_REQUEST['ville']) || isset($_REQUEST['tel']) || isset($_REQUEST['email']) 
|| isset($_REQUEST['niveau_etude']) || isset($_REQUEST['pre_inscrit']) || isset($_REQUEST['connaissance']) 
|| isset($_REQUEST['date1']) || isset($_REQUEST['date2']) ||isset($_REQUEST['note_prive'])
|| isset($_REQUEST['note'])||isset($_REQUEST['formation'])) {
    $prenom = htmlentities($_REQUEST['prenom']);
    $nom = htmlentities($_REQUEST['nom']);
    $adresse = htmlentities($_REQUEST['adresse']);
    $code_postal = htmlentities($_REQUEST['code_postal']);
    $ville = htmlentities($_REQUEST['ville']);
    $tel = htmlentities($_REQUEST['tel']);
    $email = htmlentities($_REQUEST['email']);
    $niveau_etude = htmlentities($_REQUEST['niveau_etude']);
    $note_prive = htmlentities($_REQUEST['note_prive']);
    $pre_inscrit = htmlentities($_REQUEST['pre_inscrit']);
    $connaissance = htmlentities($_REQUEST['connaissance']);
    $note = htmlentities($_REQUEST['note']); 
    $note = htmlentities($_REQUEST['formation']); 
    $date1 = htmlentities($_REQUEST['date1']);
    $date2 = htmlentities($_REQUEST['date2']);

}
if(isset($_REQUEST['valider']) && $_REQUEST['valider'] == "rechercher") {
    $where="";
    // Prenom
    if(isset($_REQUEST['prenom'])){
        $prenom = htmlentities($_REQUEST['prenom']);
        if(!empty($prenom)){
            $where = "prenom='".$prenom."'";
        }
    }
    // Nom
    if(isset($_REQUEST['nom'])){
        $nom = htmlentities($_REQUEST['nom']);
        if(!empty($nom)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "nom='".$nom."'";
        }
    }
    // Adresse
    if(isset($_REQUEST['adresse'])){
        $adresse = htmlentities($_REQUEST['adresse']); 
        if(!empty($adresse)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "adresse='".$adresse."'";
        }
    }
    // Code postal
    if(isset($_REQUEST['code_postal'])){
        $code_postal = htmlentities($_REQUEST['code_postal']); 
        if(!empty($code_postal)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "code_postal='".$code_postal."'";
        }
    }
    // Ville
    if(isset($_REQUEST['ville'])){
        $ville = htmlentities($_REQUEST['ville']); 
        if(!empty($ville)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "ville='".$ville."'";
        }
    }
    // Téléphone
    if(isset($_REQUEST['tel'])){
        $tel = htmlentities($_REQUEST['tel']); 
        if(!empty($tel)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "tel='".$tel."'";
        }
    }
    // Email
    if(isset($_REQUEST['email'])){
        $email = htmlentities($_REQUEST['email']); 
        if(!empty($email)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "email='".$email."'";
        }
    }
    // Niveau d'étude
    if(isset($_REQUEST['niveau_etude'])){
        $niveau_etude = htmlentities($_REQUEST['niveau_etude']); 
        if(!empty($niveau_etude)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "niveau_etude='".$niveau_etude."'";
        }
    }
    // Pré inscrit
    if(isset($_REQUEST['pre_inscrit'])){
        $pre_inscrit = htmlentities($_REQUEST['pre_inscrit']); 
        if(!empty($pre_inscrit)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "pre_inscrit='".$pre_inscrit."'";
        }
    }
    // Connaissance
    if(isset($_REQUEST['connaissance'])){
        $connaissance = htmlentities($_REQUEST['connaissance']); 
        if(!empty($connaissance)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "decouverte_IIA='".$connaissance."'";
        }
    }
    // Note
    if(isset($_REQUEST['note'])){
        $note = htmlentities($_REQUEST['note']); 
        if(!empty($note)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "projet='".$note."'";
        }
    }
    // Note privée
    if(isset($_REQUEST['note_prive'])){
        $note_prive = htmlentities($_REQUEST['note_prive']); 
        if(!empty($note_prive)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "note_prive='".$note_prive."'";
        }
    }
    // Formation
    if(isset($_REQUEST['formation'])){
        $formation = htmlentities($_REQUEST['formation']); 
        if(!empty($formation)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "formation='".$formation."'";
        }
    }
    // Date1
    if(isset($_REQUEST['date1'])){
        $date1 = htmlentities($_REQUEST['date1']); 
        if(!empty($date1)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "heure_enregistrement >= '".$date1."'";
        }
    }
    // Date2
    if(isset($_REQUEST['date2'])){
        $date2 = htmlentities($_REQUEST['date2']); 
        if(!empty($date2)){
            if(!empty($where)){
                $where .= " AND "; 
            }
            $where .= "heure_enregistrement <= '".$date2."'";
        }
    }

    $sql = "SELECT * FROM prospect WHERE ".$where;
    echo $sql;
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
    <title>Administrateur</title>
    <link rel="stylesheet" href="<?php echo $_SESSION['Mode'] ?>.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;700&display=swap" rel="stylesheet">
</head>

<body class="admin_page">
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
        <div>
            <div class="button_active">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M16.5 7.5h-9v9h9v-9Z" />
                    <path fill-rule="evenodd" d="M8.25 2.25A.75.75 0 0 1 9 3v.75h2.25V3a.75.75 0 0 1 1.5 0v.75H15V3a.75.75 0 0 1 1.5 0v.75h.75a3 3 0 0 1 3 3v.75H21A.75.75 0 0 1 21 9h-.75v2.25H21a.75.75 0 0 1 0 1.5h-.75V15H21a.75.75 0 0 1 0 1.5h-.75v.75a3 3 0 0 1-3 3h-.75V21a.75.75 0 0 1-1.5 0v-.75h-2.25V21a.75.75 0 0 1-1.5 0v-.75H9V21a.75.75 0 0 1-1.5 0v-.75h-.75a3 3 0 0 1-3-3v-.75H3A.75.75 0 0 1 3 15h.75v-2.25H3a.75.75 0 0 1 0-1.5h.75V9H3a.75.75 0 0 1 0-1.5h.75v-.75a3 3 0 0 1 3-3h.75V3a.75.75 0 0 1 .75-.75ZM6 6.75A.75.75 0 0 1 6.75 6h10.5a.75.75 0 0 1 .75.75v10.5a.75.75 0 0 1-.75.75H6.75a.75.75 0 0 1-.75-.75V6.75Z" clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <div class="nav_container">
            <a href="MentionsLegales.php">
                <div class="button">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v.756a49.106 49.106 0 0 1 9.152 1 .75.75 0 0 1-.152 1.485h-1.918l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 18.75 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84l2.474-10.124H12.75v13.28c1.293.076 2.534.343 3.697.776a.75.75 0 0 1-.262 1.453h-8.37a.75.75 0 0 1-.262-1.453c1.162-.433 2.404-.7 3.697-.775V6.24H6.332l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 5.25 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84L4.168 6.241H2.25a.75.75 0 0 1-.152-1.485 49.105 49.105 0 0 1 9.152-1V3a.75.75 0 0 1 .75-.75Zm4.878 13.543 1.872-7.662 1.872 7.662h-3.744Zm-9.756 0L5.25 8.131l-1.872 7.662h3.744Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </a>
        </div>
        <div class="nav_container">
            <a href="reglage.php">
                <div class="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>
            </a>
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
    <?php
        // bouton modifier + bouton supprimer
    
        //Script de suppression d'une ligne
            if (isset($_POST['id_prospect'])) {
            $id = $_POST['id_prospect'];
            $del = "DELETE FROM prospect WHERE id_prospect='$id'";
            $pdo->exec($del);
            header('Location: admin.php');
            exit();

    }
    ?>
    <div class="content_admin">
    <div class="head_admin">
    <?php echo 'Connecté en tant que'. ' ' . htmlentities($_SESSION['utilisateur']); ?>
        <form action="deconnexion.php" method="post">
            <input type="submit" name="deconnecter" class="disconnect_button" value="Deconnexion" />
        </form>
        <form method="post">
            <input type="submit" class="disconnect_button" name="download_csv" value="Télécharger CSV">
        </form>
                  
        <!-- formulaire de recherche -->
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="get" name="search">
            <input type="text" name="prenom" value="<?php echo $prenom;?>" placeholder="Rechercher dans prenom">
            <input type="text" name="nom" value="<?php echo $nom;?>" placeholder="Rechercher dans nom">
            <input type="text" name="adresse" value="<?php echo $adresse;?>" placeholder="Rechercher dans adress">
            <input type="text" name="code_postal" value="<?php echo $code_postal;?>" placeholder="Rechercher dans code postal">
            <input type="text" name="ville" value="<?php echo $ville;?>" placeholder="Rechercher dans ville">
            <input type="text" name="tel" value="<?php echo $tel;?>" placeholder="Rechercher dans tel">
            <input type="text" name="email" value="<?php echo $email;?>" placeholder="Rechercher dans email">
            <input type="text" name="niveau_etude" value="<?php echo $niveau_etude;?>" placeholder="Rechercher dans niveau d'étude">
            <input type="text" name="note" value="<?php echo $note;?>" placeholder="Rechercher dans note">
            <input type="text" name="pre_inscrit" value="<?php echo $pre_inscrit;?>" placeholder="Recherche dans pré inscrit">
            <input type="text" name="connaissance" value="<?php echo $connaissance;?>" placeholder="Recherche moyen de decouverte">
            <input type="text" name="note_prive" value="<?php echo $note_prive;?>" placeholder="Rechercher dans note privé">
            <input type="text" name="formation" value="<?php echo $formation;?>" placeholder="Rechercher dans formation">
            <input type="date" name="date1" value="<?php echo $date1;?>" placeholder="Rechercher une date supérieur à ">ET/OU
            <input type="date" name="date2" value="<?php echo $date2;?>" placeholder="Rechercher une date inférieur à ">
            <input type="submit" name="valider" value="rechercher" >            
        </form>

    <!-- bouton reset pour afficher le tableau complet -->
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
                <td><?php echo $r['prenom']; ?></td>
                <td><?php echo $r['nom']; ?></td>
                <td><?php echo $r['adresse']; ?></td>
                <td><?php echo $r['code_postal']; ?></td>
                <td><?php echo $r['ville']; ?></td>
                <td><?php echo $r['tel']; ?></td>
                <td><?php echo $r['email']; ?></td>
                <td><?php echo $r['niveau_etude']; ?></td>
                <td><?php echo $r['projet']; ?></td>
                <td><?php echo $r['pre_inscrit']; ?></td>
                <td><?php echo $r['decouverte_IIA']; ?></td>
                <td><?php echo $r['note_prive']; ?></td>
                <td><?php echo $r['formation']; ?></td>
                <td><?php echo $r['heure_enregistrement']; ?></td>
                <?php } ?>
            </tr>
        </table>
        <?php } ?>
    
 
    </div>
    
            
    <div class="line_table index">
    <div class="content_line"><span>Prénom</span><span>Nom</span></div>
    <div class="content_line"><span>Adresse</span></div>
    <div class="content_line"><span>N° de téléphone</span><span>E-Mail</span></div>
    <div class="content_line"><span>Niveau étude</span><span>Projet</span></div>
    <div class="content_line"><span>Préinscrit ?</span><span>Méthode de découverte</span></div>
    <div class="content_line"><span>Date inscription</span></div>
    </div>
        <div class="all_table">
            <?php
            if($tableau==1){
                $sql='SELECT * FROM prospect ORDER BY id_prospect';
                $temp=$pdo->prepare($sql);
                $temp->execute();
                while ($resultats = $temp -> fetch()){ ?>
                    <div class="table_container">
                        <div class="button_table">
                    <?php echo '<a href="modification.php?id=' . $resultats['id_prospect'] . '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">' ?>
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                        </a>
                        <form action="admin.php" method="post">
                            <input type="hidden" name="id_prospect" value="' . $resultats['id_prospect'] . '">
                            <input type="submit" class="delete-btn" value="🗑️">
                        </form>
                    </div>
                    <?php echo '<div class="line_table">
                        <div class="content_line"><div>' . $resultats['prenom'] .'</div><div>'. $resultats['nom'] . '</div></div>
                        <div class="content_line"><div>' . $resultats['adresse'] .'</div><div>'. $resultats['code_postal'] .' '. $resultats['ville'] . '</div></div>
                        <div class="content_line"><div>' . $resultats['tel'] .'</div><div>'. $resultats['email'] . '</div></div>
                        <div class="content_line"><div>' . $resultats['niveau_etude'] .'</div><div>'. $resultats['projet'] . '</div></div>
                        <div class="content_line">';if ($resultats['pre_inscrit']== '1') { 
                            echo '<div>oui</div>';
                        } else{
                            echo '<div>non</div>';
                        };
                        echo '<div>'.$resultats['decouverte_IIA'] .'</div></div>
                        <div class="content_line">'.$resultats['heure_enregistrement'].'</div>
                    </div>
                    </div> ';
                }
             } ?>
            </div>
</body>

</html>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrateur</title>
    <link rel="stylesheet" href="<?php echo $_SESSION['Mode']?>.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@300;700&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
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
        <a href="MentionsLegales.php">
            <div class="button">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v.756a49.106 49.106 0 0 1 9.152 1 .75.75 0 0 1-.152 1.485h-1.918l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 18.75 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84l2.474-10.124H12.75v13.28c1.293.076 2.534.343 3.697.776a.75.75 0 0 1-.262 1.453h-8.37a.75.75 0 0 1-.262-1.453c1.162-.433 2.404-.7 3.697-.775V6.24H6.332l2.474 10.124a.75.75 0 0 1-.375.84A6.723 6.723 0 0 1 5.25 18a6.723 6.723 0 0 1-3.181-.795.75.75 0 0 1-.375-.84L4.168 6.241H2.25a.75.75 0 0 1-.152-1.485 49.105 49.105 0 0 1 9.152-1V3a.75.75 0 0 1 .75-.75Zm4.878 13.543 1.872-7.662 1.872 7.662h-3.744Zm-9.756 0L5.25 8.131l-1.872 7.662h3.744Z" clip-rule="evenodd" />
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
    <?php
    // appeler toute les lignes de la tables prospect
    // les faire apparaitre dans un tableau
    // renomer les numériques
    // bouton modifier + bouton supprimer
    
    $sql='SELECT * FROM prospect ORDER BY id_prospect';
    $temp=$pdo->prepare($sql);
    $temp->execute();

    //Script de suppression d'une ligne
        if (isset($_POST['id_prospect'])) {
        $id = $_POST['id_prospect'];
        $del = "DELETE FROM prospect WHERE id_prospect='$id'";
        $pdo->exec($del);
        header('Location: admin.php');
        exit();
}
echo '<div class="content_admin">
<div class="card" id="makepdf">';
echo '<div class="head_admin">';
echo 'Connecté en tant que'. ' ' . htmlentities($_SESSION['utilisateur']);
echo '<form action="deconnexion.php" method="post">
                <input type="submit" name="deconnecter" class="disconnect_button" value="Deconnexion" />
        </form>';
echo '<button class="disconnect_button">GeneratePDF</button>
</div>';

        

    echo '<div class="all_table">';
        while ($resultats = $temp -> fetch()){
        echo '<div class="table_container">';
            echo '<div class="button_table">
                        <a href="modification.php?id=' . $resultats['id_prospect'] . '"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                          </svg>
                          </a>
                        <form action="admin.php" method="post">
                            <input type="hidden" name="id_prospect" value="' . $resultats['id_prospect'] . '">
                            <input type="submit" class="delete-btn" value="🗑️">
                        </form>
                    </div>';
            echo '<div class="line_table">
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
                    </div> ';
        }
        echo '</div>
        </div>';
    ?>

    
   
    

    <script>
        var button = document.getElementById("button");
        var makepdf = document.getElementById("makepdf");
  
        button.addEventListener("click", function () {
            html2pdf().from(makepdf).save();
        });
    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(function (button) {
            button.addEventListener('click', function (event) {
                var confirmDelete = confirm("Êtes-vous sûr de vouloir supprimer cette ligne ?");
                
                if (!confirmDelete) {
                    event.preventDefault(); // Annule l'action par défaut (l'envoi du formulaire)
                }
            });
        });
    });
    </script>
    </div>
</body>
</html>


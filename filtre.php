<?php include_once('base_donnee.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Person Information</title>
</head>
<body>
<form>
    <select name="prospect" onchange="showUser(this.value)">
        <option value="">Select a person:</option>
        <?php
        try {
            $sql = "SELECT * FROM prospect";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            while ($result = $stmt->fetch()) {
                echo '<option value="' . $result['id_prospect'] . '">' . $result['prenom'] . '</option>';
            }
        } catch (PDOException $e) {
            echo 'Erreur avec la BD!: ' . $e->getMessage() . '<br/>';
            die();
        }
        ?>
    </select>
    <div id="txtHint"></div>
</form>

<?php
if(isset($_GET['q'])){
    $q = intval($_GET['q']);
    echo "<table border='1'>
    <tr>
        <th>ID</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Code postal</th>
        <th>Ville</th>
        <th>Téléphone</th>
        <th>Adresse mail</th>
        <th>Niveau d'études</th>
        <th>Projet</th>
        <th>Pre-inscrit ?</th>
        <th>Comment nous avez-vous découvert ?</th>
        <th>Date d'enregistrement</th>
        <th>Action</th>
    </tr>";
}


    try {
        $sql = "SELECT * FROM prospect,connaissance,niveau_etude WHERE id_prospect = ? AND prospect.niveau_etude = niveau_etude.id_niveau AND connaissance.id_connaissance = prospect.decouverte_IIA";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $q, PDO::PARAM_INT);
        $stmt->execute();


        while ($result = $stmt->fetch()) {
            echo "<tr>
                    <td>{$result['id_prospect']}</td>
                    <td>{$result['prenom']}</td>
                    <td>{$result['nom']}</td>
                    <td>{$result['adresse']}</td>
                    <td>{$result['code_postal']}</td>
                    <td>{$result['ville']}</td>
                    <td>{$result['tel']}</td>
                    <td>{$result['email']}</td>
                    <td>{$result['equivalent']}</td>
                    <td>{$result['projet']}</td>
                    <td>" . ($result['pre_inscrit'] == '1' ? 'oui' : 'non') . "</td>
                    <td>{$result['moyen']}</td>
                    <td>{$result['heure_enregistrement']}</td>
                    <td><!-- Actions here --></td>
                </tr>";
        }

        echo "</table>";
    } catch (PDOException $e) {
        echo 'Erreur avec la BD!: ' . $e->getMessage() . '<br/>';
        die();
    }
?>


<script>
    function showUser(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "filtre.php?q="+str, true);
            xmlhttp.send();
        }
    }
</script>

</body>
</html>

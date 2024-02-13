<script>
        function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","filtre.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
include_once('base_donnee.php');
$q='';
$q = intval($_GET['q']);
try{
    $sql="SELECT * FROM user WHERE id = ? AND prospect.niveau_etude=niveau_etude.id_niveau AND connaissance.id_connaissance=prospect.decouverte_IIA";
    $temp=$pdo->prepare($sql);
    $temp->bindparam(1,$q,PDO::PARAM_STR);
    $temp->execute();
    echo "<table border='1'>
    <tr>
        <td>id : </td>
        <td>Prenom : </td>
        <td>Nom : </td>
        <td>Adresse : </td>
        <td>Code postal : </td>
        <td>Ville : </td>
        <td>Téléphone : </td>
        <td>Adresse mail : </td>
        <td>Niveau d'études : </td>
        <td>Projet : </td>
        <td>Pre-inscrit ? : </td>
        <td>Comment nous avez-vous découvert ? : </td>
        <td>Date d'enregistrement : </td>
        <td>Action : </td>
        </tr>";

        while ($resultats = $temp -> fetch()){
            echo '<tr>
                    <td>' . $resultats['id_prospect'] . '</td>
                    <td>' . $resultats['prenom'] . '</td>
                    <td>' . $resultats['nom'] . '</td>
                    <td>' . $resultats['adresse'] . '</td>
                    <td>' . $resultats['code_postal'] . '</td>
                    <td>' . $resultats['ville'] . '</td>
                    <td>' . $resultats['tel'] . '</td>
                    <td>' . $resultats['email'] . '</td>
                    <td>' . $resultats['equivalent'] . '</td>
                    <td>' . $resultats['projet'] . '</td>
                    <td>'; if ($resultats['pre_inscrit']== '1') { 
                        echo 'oui';
                    } else{
                        echo 'non';
                    }
                    echo    '<td>' . $resultats['moyen'] . '</td>
                            <td>' . $resultats['heure_enregistrement'] . '</td>';        
        }
}
catch (PDOException $e) {
    echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
    die();
    }
try{
    $sql="SELECT * FROM prospect";
    $temp=$pdo->prepare($sql);
    $temp->execute();
    while ($resultats = $temp -> fetch()){
        '<form>
        <select name="users" onchange="showUser(this.value)">
        <option value="">Select a person:</option>
        <option value="'.$resultats['id'].'"><'.$resultats['prenom'].'/option>
        </select>
        </form>
        <br>
        <div id="txtHint"><b>Person info will be listed here...</b></div>';
    }
}
catch (PDOException $e) {
    echo 'Erreur avec la BD!: ' .$e->getMessage() .'<br/>';
    die();
    }
    ?>
</body>
</html>
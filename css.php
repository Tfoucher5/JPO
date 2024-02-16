<?php

//echo "ancien SESSION : ". $_SESSION['Mode'];


        // SI LA CONFIG EST ENVOYEE
        if(isset($_REQUEST['config'])) {

            //echo "<br/>REQUEST : ".$_REQUEST['Mode'];
            if(isset($_REQUEST['Mode'])) {  
                $_SESSION["Mode"]="jour";
            } else {
                $_SESSION["Mode"]="nuit";
            }
        }
        
//echo "<br/>nouveau SESSION : ". $_SESSION['Mode'];
        
?>

<link rel="stylesheet" href="<?php echo $_SESSION['Mode']; ?>.css">
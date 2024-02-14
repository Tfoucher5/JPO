<?php
    session_start();
    if(!isset($_SESSION["Mode"])) {
        // defini le mode par defaut
        $_SESSION["Mode"] = "jour";
        $_SESSION["Request_nuit"]='';
        $_SESSION["Request_jour"]='checked';
    }
?>
<?php
session_start();

// Détruire la session pour se déconnecter
$_SESSION['connected'] = False;

// Rediriger vers la page de connexion
header('Location: connexion-reglages.php');
exit();

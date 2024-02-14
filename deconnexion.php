<?php
session_start();

// Détruire la session pour se déconnecter
session_reset();

// Rediriger vers la page de connexion
header('Location: connexion.php');
exit();

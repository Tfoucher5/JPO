<?php

    //script de connexion
    $host = '127.0.0.1';
    $db = 'jpo';
    $user = 'root';
    $pass = '';
    $port = '3306';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
    $pdo = new PDO($dsn, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $pdo->exec("SET CHARACTER SET utf8mb4");

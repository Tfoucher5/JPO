<?php

class Database{
    public static function getPDO(){
        $host = '127.0.0.1';
        $db = 'JPO';
        $user = 'root';
        $pass = '';
        $port = '3306';
        $charset = 'utf8mb4';
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        $pdo = new PDO($dsn, $user, $pass);
        return $pdo;
    }
    public static function preparedQuery($sql, $params = []) {
        $pdo = self::getPDO();
        $stmt = $pdo->prepare($sql);
        
        foreach ($params as $param => $value) {
            $stmt->bindParam($param, $value);
        }
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
 

}

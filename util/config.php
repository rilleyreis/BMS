<?php
function connect(){
    $dsn = "mysql:dbname=project";
    $user = "root";
    $passwd = "";

    try {
        $conn = new PDO( $dsn, $user, $passwd );
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $conn->query("SET NAMES 'utf8'");
        $conn->query("SET character_set_connection=utf8");
        $conn->query("SET character_set_client=utf8");
        $conn->query("SET character_set_results=utf8");
    } catch ( PDOException $e ) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

$pdo = connect();
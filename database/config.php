<?php
function connect(){
    $dsn = "mysql:dbname=project";
    $user = "root";
    $passwd = "";

    try {
        $conn = new PDO( $dsn, $user, $passwd );
        $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch ( PDOException $e ) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}

$pdo = connect();
<?php
    $dsn = 'mysql:host=localhost;dbname=mgs_2351class'; //$dsn = 'mysql:host=noellepiercecom.ipagemysql.com;dbname=mgs_2351class';
    $username = 'adminebank';
    $password = 'Taa;2tosbt';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>
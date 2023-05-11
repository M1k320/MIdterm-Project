<?php

    
    $dsn = "mysql:host=localhost; dbname=zippyusedauto";
    $username = 'hu0wlnc966uyzjy4';
    $password = 'cmtbdgfv39s2i8o1';
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>

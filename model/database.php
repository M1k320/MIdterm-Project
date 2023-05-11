<?php
    //local development server connection
   // $dsn = 'mysql:host=localhost;dbname=zippyusedautos';
   // $username = 'root';
    //$password = 'pa55word';

    // Heroku connection
    
    $dsn = "mysql:host=localhost; dbname=todolist";
    $username = 'hu0wlnc966uyzjy4';
    $password = 'cmtbdgfv39s2i8o1';
    
    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('../errors/database_error.php');
        exit();
    }
?>

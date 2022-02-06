<?php
    require 'config.php';

    $conn = new mysqli($db_hostname, $db_username, $db_password, $db_database);

    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
        exit();
    }
?>
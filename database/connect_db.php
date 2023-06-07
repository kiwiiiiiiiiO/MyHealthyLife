<?php
    $host = '140.127.74.144';
    $port = '3306';
    $database = 'MyHealthyLife';
    $username = '410977008';
    $password = '410977008';
    // Create connection
    $conn = new mysqli($host, $username, $password, $database, $port);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        echo "Connection Success";
    }
?>
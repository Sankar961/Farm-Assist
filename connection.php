<?php
    
  function connect () {
    $host = "localhost";
    $user = "root";
    $pass = null;
    $db = "farmassist";
    
    // Create the connection
    $conn = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);

    return $a;
  }
<?php
try {
    //  create the db object and connect to the database
    $host = "localhost";
    $username = "blindcomputing";
    $password = "Blind.Computing:21/01/2003";
    $dbname = "bc_rework";
    $db = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8mb4", $username, $password);
    //  set the pdo error mode to exception so we can catch errors.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //  if the connection was successfull, echo a message
    //  echo "Connection was successfull";
} catch(PDOException $e) {
//  tell the user that the connection has failed
//  echo "Connection failed: ", $e->getMessage();
    die("<center><h1>Oops, we've hit a road block!</h1><p>Sorry, we're currently experiencing database connection issues. Please check back later.</center>");
}
?>
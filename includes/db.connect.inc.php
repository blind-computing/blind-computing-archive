<?php
try {
//  create the db object and connect to the database
    $db = new PDO("mysql:host=127.0.0.1;dbname=blindcomputing","blindcomputing","Blind.Computing:21/01/2003");
//  set the pdo error mode to exception so we can catch errors.
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//  if the connection was successfull, echo a message
//  echo "Connection was successfull";
} catch(PDOException $e) {
//  tell the user that the connection has failed
//  echo "Connection failed: ", $e->getMessage();
    die("<center><h1>Oops, we've hit a road block!</h1><p>Sorry, we're currently experiencing database connection issues. Check back later.</center>");
}
?>

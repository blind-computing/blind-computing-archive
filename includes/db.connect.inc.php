<?php
$db = new mysqli("127.0.0.1","root","testpass","blind-computing");
if($db->connect_errno) {
    die("<h1>".$db->connect_error."</h1><h2>That's an error!</h2>");
} else {
    echo "<h1>success!</h1>";
}
?>
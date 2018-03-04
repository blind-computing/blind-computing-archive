<?php
$db = new mysqli("127.0.0.1","blindcomputing","Blind.Computing:21/01/2003","blindcomputing");
if($db->connect_errno) {
    die("<h1>".$db->connect_error."</h1><h2>That's an error!</h2>");
}
?>

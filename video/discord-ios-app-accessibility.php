<!doctype html>
<html>
<head>
<?php
$id = 36;
include_once("../includes/headers.inc.php");
?>
</head><body>
<?php
include("../includes/nav.inc.php");
?>
<main id="content">
<?php
require_once("../includes/functions.inc.php");
echo create_video_page(
        "Accessibility of the Discord iOS App",
        "<p>Discord is a rapidly growing chat platform. It is designed with gamers in mind, but now almost every online community seems to have a discord server, including <a href=\"https://discord.gg/rFHxWty\" title=\"Join the Discord server\">the VIP Central Discord server</a>, specifically made for the blind computing community. But how accessible is it? Let's find out!</p>",
        5);
?>
</main></body></html>

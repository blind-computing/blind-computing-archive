<!doctype html>
<html>
<head>
<?php
$TITLE = "Devices";
include_once("includes/headers.inc.php");
?>
</head><body>
<?php
include("includes/nav.inc.php");
?>
<main id="content">
<?php
include_once("includes/functions.inc.php");
echo create_category_page(
        "Devices",
        "<p>Whether it's braille notetakers, embossers, mainstream accessible gadgets or otherwise, this page covers a range of devices that can help out the blind and visually impaired. It includes thoughts, reviews, hand's on, rambling and much more!</p>",
        "devices");
?>
</main></body></html>

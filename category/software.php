<!doctype html>
<html>
<head>
<?php
$TITLE = "Software";
include_once("../includes/headers.inc.php");
?>
</head><body>
<?php
include("../includes/nav.inc.php");
?>
<main id="content">
<?php
include_once("../includes/functions.inc.php");
echo create_category_page(
        "Software",
        '<p>It\'s all well and good having a good operating system, specifically chosen from <a href="operating-systems.php">our operating systems page</a>, but what use is it without any software to help get your work done? This page covers a wide range of software programs, tools and utilities to give you, the blind computer users, the most up to date information of program accessibility, or lack there of.</p>',
        "software");
?>
</main></body></html>

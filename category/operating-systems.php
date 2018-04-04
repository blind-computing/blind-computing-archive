<!doctype html>
<html>
<head>
<?php
$id = 7;
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
        "Operating Systems",
        "<p>An operating system is a big program that run's your device, whether  it be a braille note taker, desktop, laptop or even a phone. Operating systems control the overall user interface as well as the underlying technologies that make today's computing world possible.</p><p>There is an overwhelming amount of operating systems out there, from windows, to mac os 10 ... I mean mac OS because apple changed the name, to the thousands of linux distributions, right the way down to mobile operating systems like IOS and android. On this page, we review the accessibility features of these operating systems from a blind standpoint, showcasing there accessibility features (or lack there of).</p><h2>List of Resources</h2>",
        "operating-systems-windows",
        "<h3>Windows</h3>");
echo create_resource_list(
        "operating-systems-linux",
        "<h3>Linux</h3>");
echo create_resource_list(
        "operating-systems-apple",
        "<h3>Mac OS / IOS</h3>");
?>
</main></body></html>

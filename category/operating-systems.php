<!doctype html>
<html>
<head>
<?php
$id = 7;
include_once("../includes/headers.inc.php");
?>
</head><body>
<?php
include_once("../includes/nav.inc.php");
?>
<main id="content">
<?php require_once("../includes/functions.inc.php"); ?>
<h2>Operating Systems</h2>
<p>An operating system is a big program that run's your device, whether  it be a braille note taker, desktop, laptop or even a phone. Operating systems control the overall user interface as well as the underlying technologies that make today's computing world possible.</p><p>There is an overwhelming amount of operating systems out there, from windows, to mac OS10 ... I mean macOS because apple changed the name, to the thousands of linux distributions, right the way down to mobile operating systems like IOS and android. On this page, we review the accessibility features of these operating systems from a blind standpoint, showcasing there accessibility features (or lack there of).</p><h2>List of Resources</h2>
<div class="third-width">
<div class="padinner">
<?php echo create_resource_list("operating-systems-windows","<h3>Windows</h3>"); ?>
</div></div><div class="third-width">
<div class="padinner">
<?php echo create_resource_list("operating-systems-apple","<h3>Mac OS / IOS</h3>"); ?>
</div></div><div class="third-width">
<div class="padinner">
<?php echo create_resource_list("operating-systems-linux","<h3>Linux</h3>"); ?>
</div></div></main></body></html>

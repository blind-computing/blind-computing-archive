<!doctype html>
<html>
<head>
<?php
$id = 3;
include_once("../includes/headers.inc.php");
?>
</head><body>
<?php
include("../includes/nav.inc.php");
?>
<main id="content">
<?php include_once("../includes/functions.inc.php"); ?>
<h2>Devices and Hardware</h2>
<p>Whether it's braille notetakers, embossers, mainstream accessible gadgets or otherwise, this page covers a range of devices that can help out the blind and visually impaired. It includes thoughts, reviews, hand's on, rambling and much more!</p>
<h2>List of Resources</h2>
<div class="third-width">
<?php echo create_resource_list("devices-reviews","<h3>Reviews</h3>"); ?>
</div><div class="third-width">
<?php echo create_resource_list("devices-comparisons","<h3>Comparisons</h3>"); ?>
</div><div class="third-width">
<?php echo create_resource_list("devices-news","<h3>Latest Device News</h3>"); ?>
<p>Don't forget to stay up-to-date with the latest device news and announcements by <a href="https://www.twitter.com/blind_comp" target="blank">following us on twitter</a> and <a href="https://blind-computing.blogspot.com" target="blank">visiting the blog</a>.</p>
</div></main></body></html>

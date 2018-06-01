<!doctype html>
<html>
<head>
<?php
$id = 8;
include_once("../includes/headers.inc.php");
?>
</head><body>
<?php
include("../includes/nav.inc.php");
?>
<main id="content">
<?php include_once("../includes/functions.inc.php"); ?>
<h2>Accessible Software</h2>
<p>It\'s all well and good having a good operating system, specifically chosen from <a href="operating-systems.php">our operating systems page</a>, but what use is it without any software to help get your work done? This page covers a wide range of software programs, tools and utilities to give you, blind computer users, the most up to date information of program accessibility, or lack there of.</p>
<h2>List of Resources</h2>
<div class="third-width">
<?php echo create_resource_list("software-showcase","<h3>Reviews and Overviews</h3>"); ?>
</div><div class="third-width">
<?php echo create_resource_list("software-comparisons","<h3>Comparisons</h3>"); ?>
</div><div class="third-width">
<?php echo create_resource_list("software-news","Latest Software News</h3>"); ?>
<p>Don't forget to stay up-to-date with the latest software news and announcements by <a href="https://www.twitter.com/blind_comp" target="blank">following us on twitter</a> and <a href="https://blind-computing.blogspot.com" target="blank">visiting the blog</a>.</p>
</div></main></body></html>

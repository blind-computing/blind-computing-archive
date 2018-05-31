<!doctype html>
<html>
<head>
<?php
$id = 19;
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
        "Accessibility of Ubuntu Mate 18.04 LTS (Beta)",
        "<p>It was the video that kickstarted my whole youtube channel! My review of ubuntu mate 16.04 has gone down like a storm, but what about its Long Term Support successor: ubuntu mate 18.04? In this video, I take a look at the beta release.</p>",
        4);
?>
</main></body></html>

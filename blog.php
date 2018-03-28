<!doctype html>
<html>
<head>
<?php
$TITLE = "Blog";
include_once("includes/headers.inc.php");
?>
</head><body>
<?php
include("includes/nav.inc.php");
?>
<article id="content"
<?php
include_once("includes/functions.inc.php");
echo create_category_page(
        "The Blind Computing Blog",
        "<p>  The main blind computing website has always been about giving blind and visually impaired computer users the most up to date information and tutorials we can, however, this poses the question, where do <strong>we</strong> get this information in the first place? That's what the Blind Computing Blog was created for. On it, we'll ask questions to the blind computing community, get answers via comments and talk about what we've been up to lately.</p><p>The blog is currently hosted on google's blogger service and you can visit using the links below. You can also subscribe to the RSS feed for a more accessible experience using your feed reader of choice.</p>",
        "blog",
        "");
?>
</main></body></html>

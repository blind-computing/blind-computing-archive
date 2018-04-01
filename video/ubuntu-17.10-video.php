<!doctype html>
<html>
<head>
<?php
$TITLE = "Ubuntu 17.10";
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
        "Accessibility of Ubuntu 17.10",
        "<p>It was the talk of the town when it came out! The new Canonical, releasing there latest version of ubuntu with ... the gnome desktop? Anyway, since this is a rather big change, we'll go over the accessibility features of this new release so that anyone upgrading to 17.10, or to 18.04 when it comes out, will have a smooth transition.</p>",
        3);
?>
</main></body></html>

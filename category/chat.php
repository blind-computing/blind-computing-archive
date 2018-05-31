<!doctype html>
<html>
<head>
<?php
$id = 12;
include_once("../includes/headers.inc.php");
?>
</head><body>
<?php
include_once("../includes/nav.inc.php");
?>
<main id="content">
<?php
require_once("../includes/functions.inc.php");
echo create_category_page(
        "Chat and Contact",
        "<p>  <strong>This web site is a community!</strong>. With out the blind and visually impaired community, particularly the tech community, we wouldn't exist. So we've created various ways for each of you to chat and share code, ideas or discuss practically anything else.</p>",
        "chat",
        "");
?>
</main>
</body></html>

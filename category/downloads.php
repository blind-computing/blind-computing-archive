<!doctype html>
<html>
<head>
<?php
$TITLE = "Downloads";
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
        "Downloads",
        "<p>This page includes links to both externally and internally developed scripts, programs, operating systems and any other files you can think of to help the blind and visually impaired throughout their computing journey.</p><p><strong>Note: </strong> Some of the software on this page was <strong>not created by the contributers of Blind Computing</strong>. All credit goes to the creaters and maintainers of the software. Also, all of the files below are to be used at you're own risk and we can not assume any responsibility if something goes wrong.</p>",
        "downloads",
        "List of Downloads");
?>
</main></body></html>

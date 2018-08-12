<!doctype html>
<html>
<head>
<?php
$id = 28;
include_once("includes/headers.inc.php");
include_once("includes/functions.inc.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //initialise data tables
        $('.dataTable').DataTable( {
            "aaSorting": [],
            "pageLength": 25
        });
    })
</script>
</head><body>
<?php
include("includes/nav.inc.php");
?>
<main id="content">
<?php
  echo create_title("Our Contributors", "<p>  We wouldn't be nearly as far as we are with out them. Our contributors are the people that sat in front of a keyboard for sometimes hours on end to forge this site and make it what it is today. Of course, there are those who only contributed once, or for a short amount of time and they're just as important. So, we've grouped them all together into one page. Once again <strong>THANK YOU!</strong></p>
");
?>
<h2>List of contributors</h2>
<?php
echo create_contributor_list();
?>
</main>
</body></html>

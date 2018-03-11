<?php
require("db.connect.inc.php");
?>
<div id="headerbar">
<a href="/" title="go  to the home page"><strong>/</strong></a>
<h1 class="main-header">Blind Computing | <?php echo $TITLE; ?></h1>
</div><div id="sidebar">
<h2 class="small-header">Navigation</h2> <a href="#content">Skip to Content</a>
<hr>
<ul id="navigation">
<?php
if($result = $db->query("select title,description,uri from pages where category='main';")) {
    while($row = $result->fetchObject()) {
        if($row->title === "-") {
            echo '<hr>';
        } else {
            echo '<li class="nav-item"><a href="', $row->uri, '" title="', $row->description, '">', $row->title, '</a></li>';
        }
    }
} else {
    die($db->error);
}
?>
</ul>
<hr>
</div>

<?php
require_once("db.connect.inc.php");
?>
<header id="headerbar">
<a href="/" title="go  to the home page" id="home-link"><strong>/</strong></a>
<h1 class="main-header">Blind Computing | <?php echo $TITLE; ?></h1>
</header><aside id="sidebar">
<h2 class="small-header">Navigation</h2> <a href="#content">Skip to Content</a>
<hr>
<nav>
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
</nav>
<hr>
</aside>

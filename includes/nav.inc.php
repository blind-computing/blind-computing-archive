<?php
	require_once("db.connect.inc.php");
?>

<header id="headerbar">
	<h1 class="main-header">Blind Computing | <?php echo $TITLE; ?></h1>
</header>

<ul class="navbar">
    <?php
        if($result = $db->query("select title,description,uri from pages where category='main';")) {
          	while($row = $result->fetchObject()) {
              	if($row->title === "-") {
                	echo '';
              	} else {
              		$isActivePage = "";
              		if($TITLE == $row->title) { $isActivePage = "activePage";}
                	echo '<a href="', $row->uri, '" title="', $row->description, '"><li class="navItem ', $isActivePage ,'">', $row->title ,'</li></a>';
          		}
          	}
        } else {
          	die($db->error);
        }
    ?>
</ul>
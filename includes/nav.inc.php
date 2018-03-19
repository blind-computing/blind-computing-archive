<?php
	require_once("db.connect.inc.php");
?>

<div class="branding">
	<a href="/" title="Go to the homepage" class="homeLink"><h1>Blind Computing | <?php echo $TITLE; ?></h1></a>
</div>

<ul class="navbar">
	<?php
		$sql = "SELECT title, description, uri FROM pages WHERE category='main'";
		
		if($result = $db->query($sql)) {
		    while($row = $result->fetchObject()) {
		        echo '<li class="navItem"><a href="', $row->uri, '" title="', $row->description, '">', $row->title, '</a></li>';
		    }
		} 
		else {
		    die($db->error);
		}
	?>
</ul>

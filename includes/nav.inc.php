<?php
    require_once 'db.connect.inc.php';
    require_once 'page.class.php';
?>

<header id="headerbar">
<h1 class="main-header">
Blind Computing<?php 
if(isset($title)) {
    echo " | " . $title;
} ?>
</h1>
<hr class="headerstyle-hr">
<nav><ul class="navbar">
<?php
    // get all the main pages.
    $pages = page::get_pages_from_category("main");
    if($pages != null) {
        foreach($pages as $page) {
            echo $page->get_navlink();
        }
    } else {
        echo "No nav items.";
    }
?>
</ul></nav>
<hr class="headerstyle-hr">
</header>

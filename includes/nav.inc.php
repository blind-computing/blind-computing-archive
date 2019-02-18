<?php
    require_once 'db.connect.inc.php';
    require_once 'page.class.php';
?>

<header id="headerbar">
<h1 class="main-header">
<img style="margin-top: 0.5em; display: inline; height: 1.3em;" src="/logo/horizontal.png" alt="Blind Computing" role="text" title="Credit: @reallinfo on Github.">
<?php 
if(isset($title)) {
    echo " | " . $title;
} ?>
</h1>
<hr class="headerstyle-hr">
<nav><ul class="navbar">
<?php
    // get all the main pages.
    $pages = page::get_pages_from_category_id(0);
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

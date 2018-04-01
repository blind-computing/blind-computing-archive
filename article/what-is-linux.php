<!DOCTYPE html>
<html>
  <head>
    <?php
      $TITLE = "What Is Linux?";
      include_once("../includes/headers.inc.php");
    ?>
  </head>
    
  <body>
    <?php
      include("../includes/nav.inc.php");
    ?>
    <main id="content">
      <?php
        require_once("../includes/functions.inc.php");
        echo create_article_info(1);
      ?>
      </main>
  </body>
</html>

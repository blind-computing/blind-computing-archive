<?php 
    if(!isSet($id)) {
        $id = 1;
    }
    include_once("db.connect.inc.php");
    $results = $db->prepare("select pageTitle,pageDescription,contributer from pages where id=? limit 1;");
    $results->execute([$id]);
    if($results->rowCount()) {
        $row = $results->fetchObject();
        if($row->pageTitle) {
            $TITLE = $row->pageTitle;
        } else {
            $TITLE = "Title Not Provided";
        }
        if($row->pageDescription) {
            $DESCRIPTION = $row->pageDescription;
        } else {
            $DESCRIPTION = "A website for blind/visually impared computing related news.";
        }
        if($row->contributer) {
            $CONTRIBUTER = $row->contributer;
        } else {
            $CONTRIBUTER = "TheFakeVIP";
        }
    }
?>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<meta charset="UTF-8">
<meta name="description" content="<?php echo $DESCRIPTION; ?>">
<meta name="keywords" content="blind,visually impaired, computing,IT,ICT,devices,partially sited,programs,VI,TheFakeVIP">
<meta name="author" content="<?php echo $CONTRIBUTER; ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<title><?php echo $TITLE." | Blind Computing"; ?></title>

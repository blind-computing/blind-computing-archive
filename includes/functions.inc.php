<?php
require_once("db.connect.inc.php");
//  this function generates HTML for a list of resources with the specified category from the database.
function create_resource_list($category, $header = "List of Resources") {
    global $db;
    if($header === "") {
        $formatted_header = "";
    } else {
        $formatted_header = "<h2>".$header."</h2>";
    }
    $results = $db->prepare("select title,description,uri,contributer from pages where category=? order by id asc;");
    $results->execute([$category]);
    $output = $formatted_header."<ul>";
    while($row = $results->fetchObject()) {
        if($row->title === "-") {
            $output = $output.'<hr>';
        } else {
            $output = 
                $output.
                '<li>'.
                $row->description.
                ' <a href="'
    .            $row->uri.
                '" title="credit: '.
                $row->contributer.
                '">'.
                $row->title.
                '</a></li>';
        }
    }
    $output = $output.'</ul>';
    return $output;
}
?>

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
    if($results->rowCount()) {
    $output = $formatted_header."<nav><ul>";
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
                '</a>.</li>';
        }
    }
    $output = $output.'</ul></nav>';
    } else {
        $output = $formatted_header.'<p>No resources yet, check back later or <a href="contributing.php">Submit some content to get it here</a>.</p>';
    }
    return $output;
}


function create_category_page($title, $description, $category, $header = "List of Resources") {
    $output = 
        '<h2>'.
        $title.
        '</h2> <section id="description">'.
        $description.
        '</section>';
    $output = $output.create_resource_list($category, $header);
    return $output;
}
?>

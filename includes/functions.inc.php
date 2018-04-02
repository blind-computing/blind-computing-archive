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
        $output = $formatted_header.'<p>No resources yet, check back later or <a href="/contributing.php">Submit some content to get it here</a>.</p>';
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

// this function generates a video widget with a youtube embedded player and a description area where the description and published date are shown.
function create_video_widget($id, $header = "Video Info") {
    global $db;
    if($header === "") {
        $formatted_header = "";
    } else {
        $formatted_header = "<h3>".$header."</h3>";
    }
    $results = $db->prepare("select published, description, uri, contributer from videos where id=? limit 1");
    $results->execute([$id]);
    $row = $results->fetchObject();
    if($results->rowCount()) {
        $output = 
            '<section><iframe class="video-embed" src="'.
            $row->uri.
            '" frameborder="0" allow="encrypted-media" allowfullscreen="yes">Loading...</iframe></section>'.
            '<aside class="video-info">'.
            $formatted_header.
            '<table><tr><td><strong>Published on: </strong></td><td>'.
            $row->published.
            '</td></tr><tr><td><strong>Contributer: </strong></td><td>'.
            $row->contributer.
            '</td></tr></table><section>'.
            $row->description.
            '</section></aside>';
    } else {
        $output = $output.'<aside class="video-info"><p>Looks like we don\'t have any info on this video. This probably means this page is currently under construction, or the database is down. <strong>Please stand by!</strong></aside>';
    }
    return $output;
}

function create_video_page($title, $description, $id, $header = "Video Info") {
    $output = 
        '<h2>'.
        $title.
        '</h2><section id="description">'.
        $description.
        '</section>';
    $output = $output.create_video_widget($id, $header);
    return $output;
}

function create_article_info($id) {
    global $db;
    $results =$db->prepare("select title, published, contributer, editted from articles where id=? limit 1");
    $results->execute([$id]);
    $row = $results->fetchObject();
    if($results->rowCount()) {
        $output =
             '<section class="article-info"><h2>'.
            $row->title.
            '</h2><table><tr><td><strong>Published on: </strong></td><td>'.
            $row->published.
            '</td></tr>';
        if($row->editted != NULL) {
            $output = $output.
                '<tr><td><strong>Editted on: </strong></td><td>'.
                $row->editted.
                '</td></tr>';
        }
        $output = $output.'<tr><td><strong>Author: </strong></td><td>'.
            $row->contributer.
            '</td></tr></table><hr></section>';
    } else {
        $output = $output.'<aside class="article-info"><p>Looks like we don\'t have any info on this article. This probably means this page is currently under construction, or the database is down. <strong>Please stand by!</strong></aside>';
    }
    return $output;
}
?>

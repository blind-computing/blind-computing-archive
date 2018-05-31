<?php
require_once("db.connect.inc.php");

/**
 * Generates HTML for resources matching a category. The resources are fetched from the database.
 *
 * @param $category
 * @param string $header
 * @return string
 */
function create_resource_list($category, $header = "List of Resources")
{
    global $db;
    if ($header === "") {
        $formatted_header = "";
    } else {
        $formatted_header = "<h2>" . $header . "</h2>";
    }
    $results = $db->prepare("select title,description,uri,contributor,target from pages where category=? order by id asc;");
    $results->execute([$category]);
    if ($results->rowCount()) {
        $output = $formatted_header . "<nav><ul>";
        while ($row = $results->fetchObject()) {
            $output .=
                $row->title === "-" ?
                    '<hr>':
                    "<li> {$row->description} <a href='{$row->uri}' title='credit: {$row->contributor}' target='{$row->target}'>{$row->title}</a>.</li>";
        }
        $output .= '</ul></nav>';
    } else {
        $output = $formatted_header . '<p>No resources yet, check back later or <a href="/contributing.php">Submit some content to get it here</a>.</p>';
    }
    return $output;
}

/**
 * Generates the page for the category.
 *
 * @param $title
 * @param $description
 * @param $category
 * @param string $header
 * @return string
 */
function create_category_page($title, $description, $category, $header = "List of Resources")
{
    $output = create_title($title, $description);
    $output .= create_resource_list($category, $header);
    return $output;
}

/**
 * Generates a video widget.
 *
 * Generates a Embedded Youtube player with a description and metadata.
 *
 * @param $id
 * @param string $header
 * @return string
 */
function create_video_widget($id, $header = "Video Info")
{
    global $db;
    if ($header === "") {
        $formatted_header = "";
    } else {
        $formatted_header = "<h3>" . $header . "</h3>";
    }
    $results = $db->prepare("select published, description, uri, contributor from videos where id=? limit 1");
    $results->execute([$id]);
    $row = $results->fetchObject();
    if ($results->rowCount()) {
        $output =
            '<section><iframe style="float:left;" width="60%" height="480" src="' .
            $row->uri .
            '" frameborder="0" allow="encrypted-media" allowfullscreen="yes">Loading...</iframe></section>' .
            '<aside class="video-info">' .
            $formatted_header .
            '<table><tr><td><strong>Published on: </strong></td><td>' .
            $row->published .
            '</td></tr><tr><td><strong>Contributor: </strong></td><td><a href="/profile/' .
            $row->contributor .
            '" title="View this contributor\'s profile" target="blank"> '.
            $row->contributor .
            '</a></td></tr></table><section>' .
            $row->description .
            '</section></aside>';
    } else {
        $output = '<aside class="video-info"><p>Looks like we don\'t have any info on this video. This probably means this page is currently under construction, or the database is down. <strong>Please stand by!</strong></aside>';
    }
    return $output;
}

/**
 * Generates the page for holding the video widget.
 *
 * @param $title
 * @param $description
 * @param $id
 * @param string $header
 * @return string
 */
function create_video_page($title, $description, $id, $header = "Video Info")
{
    $output = create_title($title, $description);
    $output .= create_video_widget($id, $header);
    return $output;
}

/**
 * Generates the title for the page.
 *
 * @param $title
 * @param $description
 * @return string
 */
function create_title($title, $description)
{
    return "<h2>{$title}</h2><section id='description'>{$description}</section> ";
}

/**
 * Generates the information part of the article. It fetches the information from the database.
 *
 * @param $id
 * @return string
 */
function create_article_info($id)
{
    global $db;
    $results = $db->prepare("select title, published, contributor, editted from articles where id=? limit 1");
    $results->execute([$id]);
    $row = $results->fetchObject();
    if ($results->rowCount()) {
        $output =
            '<section class="article-info"><h2>' .
            $row->title .
            '</h2><table><tr><td><strong>Published on: </strong></td><td>' .
            $row->published .
            '</td></tr>';
        if ($row->editted != null) {
            $output .=
                '<tr><td><strong>Editted on: </strong></td><td>' .
                $row->editted .
                '</td></tr>';
        }
        $output .= '<tr><td><strong>Author: </strong></td><td><a href="/profile/' .
            $row->contributor .
            '" title="View this contributor\'s profile" target="blank">'.
            $row->contributor .
            '</a></td></tr></table><hr></section>';
    } else {
        $output = '<aside class="article-info"><p>Looks like we don\'t have any info on this article. This probably means this page is currently under construction, or the database is down. <strong>Please stand by!</strong></aside>';
    }
    return $output;
}

/**
 * Generates HTML for a list of contributors with an optional search term.
 *
 * @param string $searchTerm
 * @return string
 */
function create_contributor_list() {
    global $db;
    $results = $db->prepare("select username, fullName, imguri from contributors;");
    $results->execute([]);
    if($results->rowCount()) {
        $output = '<table class="contributor-list"><strong><tr><td>UserName</td><td>FullName</td></tr></strong>';
       while($row = $results->fetchObject()) {
            $output = $output.
                '<tr class="table-row-hilight"><td><a href="/profile/'.
                $row->username.
                '"> ';
            if($row->imguri != NULL) {
                $output = $output.'<img src="'.
                    $row->imguri.
                    '" class="profile-img-small" alt="profile picture for '.
                    $row->username.
                    '."> ';
            }
                $output = $output.
                $row->username.
                '</a></td><td>'.
                $row->fullName.
                '</td></tr>';
        }
        $output = $output.'</table>';
    }
    return $output;
}
?>

<?php
    // include the database.
    require_once 'db.connect.inc.php';
    // Also include the globals file.
require_once 'globals.inc.php';
    // this class handles the display of page links to any page on the site.
    class page {
        // property definitions.
        public $id;
        
        public $navTitle;
        public $pageTitle;
        public $navTooltip;
        public $pageDescription;
        public $tags;

        public $type;
        public $position;
        public $separatorAfter;
        public $categoryID;
        public $metadata;
        public $data;
        
        // this is the constructor for the page class.
            public function __construct() {
            $this->data = json_decode($this->metadata);
            }
        
        // this function returns all page objects that are of a specific type.
        public static function get_pages_from_type(string $type) {
            // make the db global.
            global $db;
            
            // create the query.
            $page_results = $db->prepare("SELECT * FROM pages WHERE type=? ORDER BY position ASC;");
            if($query_successful = $page_results->execute([$type]) && $page_results->rowCount()) {
                // get the objects.
                $pages = $page_results->fetchAll(PDO::FETCH_CLASS, "page");
                return $pages;
            } else {
                return null;
            }
        }

        // this function returns all page objects that should be on the global site navigation bar.
        public static function get_nav_pages() {
            // make the db global.
            global $db;
            
            // create the query.
            $page_results = $db->prepare("SELECT * FROM pages WHERE type='main' OR type='category' ORDER BY position ASC;");
            if($query_successful = $page_results->execute([]) && $page_results->rowCount()) {
                // get the objects.
                $pages = $page_results->fetchAll(PDO::FETCH_CLASS, "page");
                return $pages;
            } else {
                return null;
            }
        }

        
        // this function returns all page objects from a specific category.
        public static function get_pages_from_category_id($category) {
            // make the db global.
            global $db;
            
            // create the query.
            $page_results = $db->prepare("SELECT * FROM pages WHERE categoryID=? ORDER BY position ASC;");
            if($query_successful = $page_results->execute([$category]) && $page_results->rowCount()) {
                // get the objects.
                $pages = $page_results->fetchAll(PDO::FETCH_CLASS, "page");
                return $pages;
            } else {
                return null;
            }
        }
        
        // this function returns a page object from a specific id.
        public static function get_page_from_id(string $id) {
            // make the db global.
            global $db;
            
            // create the query.
            $page_results = $db->prepare("SELECT * FROM pages WHERE id=? LIMIT 1;");
            if($query_successful = $page_results->execute([$id]) && $page_results->rowCount()) {
                // get the object.
                $page = $page_results->fetchObject("page");
                return $page;
            } else {
                return null;
            }
        }
        
        // this function returns html for a navigation link for the main navbar.
        public function get_navlink(bool $is_active_page = false) {
            $output = "<a href='" . $this->get_uri() . "' title='{$this->navTooltip}'><li class='navItem ";
            if($is_active_page) {
                $output .= "activePage";
            }
            $output .= "'>{$this->navTitle}</li></a>";
            if($this->separatorAfter) {
                $output .= "<strong>  |  </strong>";
            }
            return $output;
        }
        
        // this function returns a URI for a given page.
        public function get_uri(bool $local = true) {
            // If we're dealing with a local uri, the returned string will not include the domain name or any subdomains.
            if(!$local) {
                $output = site::domain . "/";
            } else {
                $output = "/";
            }
            // the next part of the url depends on the page's type.
            $output .= site::page_type_mappings[$this->type];
            // finally, urlencode the title of the page and add it to the end.
            $output .= urlencode(site::strtourl($this->navTitle));
            
            return $output;
        }

        // this function returns headers for a given page that change based on the page's metadata.
        // This will be echoed in the <head> tag of the html.
        public function get_header() {
            // output the page title.
            $output = "<title>" . $this->pageTitle . " | " . ucwords(site::name) . "</title>
                <meta charset='UTF-8'>
                <meta name='description' content='" . $this->pageDescription . "'>
                <meta name='keywords' content='" . $this->tags . "'>";
            // depending on whether this is a page that has a specific contributor, set the author piece of metadata accordingly.
            if(isset($this->data->contributor)) {
                $output .= "<meta name='author' content='" . $this->data->contributor . "'>\n";
            } else {
                $output .= "<meta name='author' content='The Blind Computing Team'>\n";
            }
            $output .= "<meta name='viewport' content='width=device-width, initial-scale=1.0'>
               <link rel='stylesheet' type='text/css' href='/css/style.css'>";
            
            return $output;
        }
    }
?>

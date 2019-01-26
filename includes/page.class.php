<?php
    // include the database.
    require_once 'db.connect.inc.php';
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
        
        // this function returns all page objects from a specific category.
        public static function get_pages_from_category_id($category) {
            // make the db global.
            global $db;
            
            // create the query.
            $page_results = $db->prepare("SELECT *FROM pages WHERE categoryID=? ORDER BY position ASC;");
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
        public function get_navlink() {
            global $title;
            
            $output = "<a href='" . $this->get_uri . "' title='{$this->navTooltip}'><li class='navItem ";
            if(strtolower($title) == strtolower($this->navTitle)) {
                $output .= "activePage";
            }
            $output .= "'>{$this->navTitle}</li></a>";
            if($this->separatorAfter) {
                $output .= "<strong>  |  </strong>";
            }
            return $output;
        }
        
        // this function returns a URI for a given page.
        public function get_uri() {
            // currently not implemented.
            return "";
        }
    }
?>

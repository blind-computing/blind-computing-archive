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
        public $uri;
        public $tags;
        public $position;
        public $separatorAfter;
        public $categoryID;
        public $categoryName;
        public $categoryMetadata;
        
        // this function returns all page object from a specific category.
        public static function get_pages_from_category_id($category) {
            // make the db global.
            global $db;
            
            // create the query.
            $page_results = $db->prepare("SELECT pages.*,categories.categoryName,categories.categoryMetadata FROM pages,categories WHERE pages.categoryID=? AND categories.id=pages.categoryID ORDER BY position ASC;");
            if($query_successful = $page_results->execute([strtolower($category)]) && $page_results->rowCount()) {
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
            $page_results = $db->prepare("SELECT pages.*,categories.categoryName,categories.categoryMetadata FROM pages,categories WHERE pages.id=? AND pages.categoryID=categories.id LIMIT 1;");
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
            
            $output = "<a href='{$this->uri}' title='{$this->navTooltip}'><li class='navItem ";
            if(strtolower($title) == strtolower($this->navTitle)) {
                $output .= "activePage";
            }
            $output .= "'>{$this->navTitle}</li></a>";
            if($this->separatorAfter) {
                $output .= "<strong>  |  </strong>";
            }
            return $output;
        }
    }
?>
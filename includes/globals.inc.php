<?php
// This is the globals file
    // It contains many global functions and variables needed to operate various parts of the site.
    
// This site class holds many of the important properties and methods, all of which are static, that are essential for various things.
    class site {
        const name = "Blind Computing";
        const version = "4.0";
        const domain = "https://blindcomputing.org";
        // this associative array holds the mappings between database page types and the strings used in URIs.
        const page_type_mappings = array(
            "main" => "",
            "category" => "category/",
            "article" => "article/",
            "video" => "video/",
            "software-showcase" => "software/",
            "forum-thread" => "thread",
            "project" => "project/"
        );

        // this function converts a standard name string into a url safe string.
        public static function strtourl(string $str) {
            return strtolower(
                str_replace("/", "-",
                str_replace(" ", "-",
                str_replace("-", "_", $str))));
        }
    }
?>

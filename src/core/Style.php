<?php
Header ("Content-type: text/css; charset=utf-8");


function get_links($css){
    $links='';
        $path_css= $_SERVER['HTTP_HOST'].'/assets/css/';
        if(count($css) > 0){
            foreach($css as $link){
                $link=  $path_css.$link;
                $links .=    '<link rel="stylesheet" href="'.$link.'">';
            }
        }
        return $links;
}
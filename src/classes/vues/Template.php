<?php

namespace VeilleTechno\classes\vues;

class Template {

    public static function display_head(string $title, string $desc, array $css = []){
        $links='';
        $path_css= $_SERVER['HTTP_HOST'].'/assets/css/';
        if(count($css) > 0){
            foreach($css as $link){
                $link=  $path_css.$link;
                $links .=    file_get_contents('http://'.$link);
                // $links .=    '<link rel="stylesheet" href="'.$link.' type="text/css"">';
            }
        }
        echo '
                    <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta name="description" content="'.$desc.'">
                <style>'.$links.'</style>
                <title>'.$title.'</title>
            </head>
            <body>
            
            
       ';
    }
    public static function display_header(){
        echo ' <header> fesfesfsef</header>';
    }
    public static function display_main_content(){
        echo' <main></main>';
    }
    public static function display_footer(){
        echo '<footer></footer>';
    }
    public static function add_endhtml(){
        echo '</body>
        </html>';
    }
}
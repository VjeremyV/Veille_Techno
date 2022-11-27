<?php

namespace VeilleTechno\classes\vues;

class Template {

    public static function construct_page(string $title, string $desc, string $template, array $css = []){
        self::display_head( $title, $desc, $css);
        self::display_main_content($template);
        self::add_endhtml();
    }
    private static function display_head(string $title, string $desc, array $css = []){
          require_once(__DIR__.'/../../../templates/elements/head.php');
    }
    private static function display_main_content(string $template){
        require_once(__DIR__.'/../../../templates/pages/'.$template);
    }

    private static function add_endhtml(){
        echo '</body>
        </html>';
    }
}
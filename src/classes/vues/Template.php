<?php

namespace VeilleTechno\classes\vues;

class Template {

    public static function construct_page(string $title, string $desc, string $template, array $css = [], array $params = []){
        self::display_head( $title, $desc, $css);
        self::display_main_content($template, $params);
        self::add_endhtml();
    }
    private static function display_head(string $title, string $desc, array $css = []){
          require_once(__DIR__.'/../../../templates/elements/head.php');
    }
    private static function display_main_content(string $template, array $params = []){
        require_once(__DIR__.'/../../../templates/pages/'.$template);
    }

    private static function add_endhtml(){
        echo '</body>
        </html>';
    }
}
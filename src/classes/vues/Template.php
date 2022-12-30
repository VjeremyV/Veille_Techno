<?php

namespace VeilleTechno\classes\vues;

class Template
{
    /**
     * 
     *
     * @param string $title
     * @param string $desc
     * @param string $template
     * @param array $css
     * @param array $js tableau sous la forme ['js' => 'head', 'js2' => 'footer'] 
     * @param array $params
     * @param array $other_template tableau sous la forme [['before','nomFichiertemplate1', 'NomDossier', $params(array optionnel)], ['after','nomFichiertemplate1', 'NomDossier', $params(array optionnel)]]
     * @return void
     */
    public static function construct_page(string $title, string $desc, string $template, array $css = [], $js = [], array $params = [], array $other_template = [])
    {
        self::display_head($title, $desc, $css, $js);
        self::check_other_template($other_template, 'before');
        self::display_main_content($template, $params);
        self::check_other_template($other_template, 'after');
        self::add_endhtml($js);
    }

    public static function construct_page_connected(string $title, string $desc, string $template, array $css = [], $js = [], array $params = [], array $header_params = [], array $footer_params = []){
        array_unshift($css, 'https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css','app.css');
        $js = ['app.js'=> 'head'] + $js;
        Self::construct_page($title, $desc, $template,  $css, $js, $params, [['before', 'user_nav.php', 'elements', $header_params], ['after', 'user_footer.php', 'elements', $footer_params]]);
 
    }
    /**
     * affiche le head
     *
     * @param string $title
     * @param string $desc
     * @param array $css
     * @return void
     */
    private static function display_head(string $title, string $desc, array $css = [], array $js = [])
    {
        require_once(__DIR__ . '/../../../templates/elements/head.php');
    }
    /**
     * affiche le contenu principale
     *
     * @param string $template
     * @param array $params
     * @return void
     */
    private static function display_main_content(string $template, array $params = [])
    {
        require_once(__DIR__ . '/../../../templates/pages/' . $template);
    }
    /**
     * ajoute la fin de la page html
     *
     * @param array $js
     * @return void
     */
    private static function add_endhtml(array $js = [])
    {
        require_once(__DIR__ . '/../../../templates/elements/end_html.php');
    }
    /**
     * vérifie l'éxistence de template supplémentaires
     *
     * @param array $other_template
     * @param string $position
     * @return void
     */
    private static function check_other_template(array $other_template, string $position){
        if (count($other_template) > 0) {
            foreach ($other_template as $temp) {
                if ($temp[0] === $position) {
                    if (isset($temp[3])) {
                        self::dispay_other_template($temp[1], $temp[2], $temp[3]);
                    } else {
                        self::dispay_other_template($temp[1], $temp[2]);
                    }
                }
            }
        }
    } 
    /**
     * affiche les templates supplémentaires
     *
     * @param string $other_template
     * @param string $dossier
     * @param array $utils
     * @return void
     */
    private static function dispay_other_template(string $other_template, string $dossier, array $utils = [])
    {
        require_once(__DIR__ . '/../../../templates/' . $dossier . '/' . $other_template);
    }
}

<?php

namespace VeilleTechno\classes\form;

use PDO;
use VeilleTechno\classes\Bdd;

class Formchecker {

    public function string_clean(string $string){
        return htmlentities($string);
    }

    public function is_unique(string $element, string $tab, string $column){
        $column_clean = trim(htmlentities($column));
        $tab_clean = trim(htmlentities($tab));

        $query = 'SELECT '.$column_clean.' FROM '.$tab_clean;
        $stmt = Bdd::getInstance()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NAMED);

        foreach($result as $line_result){
            foreach($line_result as $result_element)
            if($result_element === $element){
                return false;
            }
        }
        return true;
    }

    public function is_valid_mail(string $mail){
        return filter_var($mail, FILTER_VALIDATE_EMAIL);
    }

    function egalvalue(mixed $valeur1, mixed $valeur2) :bool
{
    if ($valeur1 === $valeur2) {
        return true;
    }
    return false;
}
}
<?php

namespace VeilleTechno\classes\form;

use PDO;
use phpDocumentor\Reflection\Types\Boolean;
use VeilleTechno\classes\Bdd;

class Formchecker
{

    /**
     * permet de vérifier la data du formulaire d'inscriptions
     *
     * @param array variable $post
     * @return array
     */
    public function check_profil_data(array $form_data): array
    {
        $errors = [];
        $clean_data_array = [];
        // vérification du nom
        if (!empty($form_data['nom'])) {
            $clean_data_array['nom'] = $this->string_clean($form_data['nom']);
        } else {
            $errors['nom error'] = "Veuillez renseigner votre nom";
        }

        // vérification du prénom
        if (!empty($form_data['prenom'])) {
            $clean_data_array['prenom'] = $this->string_clean($form_data['prenom']);
        } else {
            $errors['prenom error'] = "Veuillez renseigner votre prénom";
        }
        // vérification du mail
        if ($this->is_unique($form_data['mail'], 'Users', 'mail_Users') && $this->is_valid_mail($form_data['mail'])) {
            $clean_data_array['mail'] = $this->string_clean($form_data['mail']);
        } else {
            $errors['mail error'] = "Votre email n'est pas valide ou est déjà utilisé pour un autre compte";
        }

        // vérification du pwd
        if ($this->egalvalue($form_data['pwd'], $form_data['pwdConfirm']) && $this->check_pwd($form_data['pwd'])) {
            $clean_data_array['pwd'] = $this->string_clean(password_hash($form_data['pwd'], PASSWORD_DEFAULT));
        } else {
            $errors['pwd error'] = "Vos deux mot de passe ne correspondent pas ou ne sont pas conformes";
        }

        // vérification du peudo
        if ($this->is_unique($form_data['pseudo'], 'Users', 'pseudo_Users')) {
            $clean_data_array['pseudo'] = $this->string_clean($form_data['pseudo']);
        } else {
            $errors['pseudo error'] = "Le pseudo choisi est déjà utilisé";
        }

        //si il y des erreurs on les renvoie
        if (count($errors) > 0) {
            return $errors;
        }
        // sinon on retourne le tableau des éléments clean pour envoie en bdd
        return $clean_data_array;
    }

    /**
     * vérfie et nettoie la data du formulaire de connexion
     *
     * @param array $connection_data
     * @return array
     */
    public function check_connection_data(array $connection_data): array
    {
        $clean_form = [];
        $errors = [];
        if (!empty($connection_data['pseudo_connection'])) {
            $clean_form['pseudo_connection'] = $this->string_clean($connection_data['pseudo_connection']);
        } else {
            $errors['pseudo_connection error'] = "Veuillez renseigner votre pseudo";
        }
        if (!empty($connection_data['pwd_connection'])) {
            $clean_form['pwd_connection'] = $this->string_clean($connection_data['pwd_connection']);
        } else {
            $errors['pwd_connection error'] = "Veuillez renseigner votre mot de passe";
        }
        if (count($errors) > 0) {
            return $errors;
        }
        return $clean_form;
    }


    /**
     * nettoie une string pour intégration en bdd
     *
     * @param string $string
     * @return string
     */
    public function string_clean(string $string):string
    {
        return htmlentities($string);
    }

    /**
     * vérifie que le mdp correspond au pattern 8 caractères, 1 Maj, 1 min, 1 chiffre et 1 caractère spécial
     *
     * @param string $passwd
     * @return void
     */
    public function check_pwd(string $passwd)
    {
        $regex = "/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/"; //regex 8 caaractères , 1 Maj, 1 min, 1 chiffre, 1 caractère spécial
        if (preg_match($regex, $passwd)) {
            return true;
        }
        return false;
    }


    /**
     * vérifie que l'élément n'est pas déjà présent dans une table de la bdd
     *
     * @param string $element
     * @param string $tab
     * @param string $column
     * @return boolean
     */
    public function is_unique(string $element, string $tab, string $column)
    {
        $column_clean = trim(htmlentities($column));
        $tab_clean = trim(htmlentities($tab));

        $query = 'SELECT ' . $column_clean . ' FROM ' . $tab_clean;
        $stmt = Bdd::getInstance()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NAMED);

        foreach ($result as $line_result) {
            foreach ($line_result as $result_element)
                if ($result_element === $element) {
                    return false;
                }
        }
        return true;
    }

    /**
     * vérifie que le mail est valide
     *
     * @param string $mail
     * @return boolean
     */
    public function is_valid_mail(string $mail)
    {
        return filter_var($mail, FILTER_VALIDATE_EMAIL);
    }

    /**
     * vérifie que 2 valeurs sont égales
     *
     * @param mixed $valeur1
     * @param mixed $valeur2
     * @return boolean
     */
    public function egalvalue(mixed $valeur1, mixed $valeur2): bool
    {
        if ($valeur1 === $valeur2) {
            return true;
        }
        return false;
    }

    public function is_valid_url(string $url): bool{
        $url = self::string_clean($url);
        if(filter_var($url, FILTER_VALIDATE_URL)){
            $page = file_get_contents($url);
            if(strstr($page, '<channel>')){
                return true;
            }
            return false;
        }
        return false;
    }
}

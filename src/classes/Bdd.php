<?php
namespace VeilleTechno\classes;

use Exception;
use PDO;
require_once __DIR__."/../config/config.php";

class Bdd{
    private static $oPDO;
    private static $instance;

     /**
     * Constructeur défini en privé pour le rendre inaccessible
     */
   private function __construct(){
    self::$oPDO = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME, DB_USER, DB_PASS);
    self::$oPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    self::$oPDO->query("SET NAMES 'utf8'");
   }
     /**
     * Methode magique de destruction de l'instance MySQL
     */
    public function __destruct() {
        self::$oPDO = null ;
    }
     /**
     * Methode magique clone verrouillée via une exception
     */
    public function __clone() {
        throw new Exception('Impossible de cloner une connexion SQL protégée par un singleton');
    }

      /**
    * Méthode magique pour rétablir toute connexion de base de données 
    * qui aurait été perdue durant la linéarisation
    */
    public function __wakeUp( ) {
        // Vérification de la connexion
        if(self::$instance instanceof self) {
                throw new MySQLException();
        }
        // Correction de la reference
        self::$instance = $this;
    }
      /**
     * Méthode magique pour l'appel des fonctions de l'objet PDO quand 
     * elles ne sont pas définies dans la classe
     * 
     * @param mixed $method
     * @param array $params
     */
    public function __call($method, $params) {
      if(self::$oPDO == NULL){
          self::__construct();
      }
      
      return call_user_func_array(array(self::$oPDO, $method), $params);
  }
  
 /**
  * Fournit l'unique instance du Singleton
  *
  * @return    MySQL
  */
  static public function getInstance(){
      // Verification que l'instance n'a pas déja ete initialisée
      if(!(self::$instance instanceof self)){
          self::$instance = new self();
      }
      // Retour de l'instance unique
      return self::$instance;
  }  
}


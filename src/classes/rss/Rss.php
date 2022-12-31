<?php

namespace VeilleTechno\classes\rss;

use PDO;
use VeilleTechno\classes\Bdd;

class Rss
{
    /**
     * récupère les flux rss renseignés par lutilisateur actif
     *
     * @param integer $id_user
     * @return array
     */
    private function get_rss(int $id_user):array
    {
        $stmt = Bdd::getInstance()->prepare('SELECT * FROM `bibliographie` left join `config` on bibliographie.id_Bibliographie=config.bibliographie_id_bibliographie AND bibliographie.id_Users=:id');
        if ($stmt->execute(['id' => $id_user])) {
            $result = $stmt->fetchAll($fetchMode = PDO::FETCH_NAMED);
            return $result;
        }
    }

/**
 * vérifie que le flux est unique pour l'utilisateur actif
 *
 * @param string $rss
 * @param integer $user
 * @return boolean
 */
    public function unique_rss(string $rss, int $user):bool
    {
        $result = $this->get_rss($user);
        foreach ($result as $flux) {
            if ($flux['flux_rss_Bibliographie'] === $rss) {
                return false;
            }
        }
        return true;
    }

     public function display_rss(int $user){
        $config = $this->get_rss($user);
        $items = [];
        foreach($config as $rss){
            $rss_load = simplexml_load_file($rss['flux_rss_Bibliographie']);
            foreach($rss_load->channel->item as $item){
                $items[$rss['nom_Bibliographie']][$rss['site_Bibliographie']][] = $item;
               }
        }
        return $items;
    }
}

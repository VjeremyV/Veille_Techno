<?php
namespace VeilleTechno\classes\form;

class UrlDecomposer {

    /**
     * récupère le host d'un flux rss
     *
     * @param string $url
     * @return string
     */
    public function get_host(string $url): string{
        if(substr($url, 0, 5) === 'https' ){
            if(substr($url, 0, 11) === 'https://www'){
              $url_explode = explode('.', $url);
              return $url_explode[1];
            } else {
                $url_explode = explode('.', substr($url, 8));
                return $url_explode[0];
            }
        } else {
            if(substr($url, 0, 10) === 'http://www'){
                $url_explode = explode('.', $url);
                return $url_explode[1];
              } else {
                  $url_explode = explode('.', substr($url, 7));
                  return $url_explode[0];
              }  
        }
    }

    /**
     * traite la string d'un flux rss pour en extraire l'url du site
     *
     * @param string $url
     * @return string
     */
    public function get_site_url(string $url): string{
        $extensions = ['fr', 'com', 'org', 'net', 'biz'];
        foreach($extensions as $extension){
            $url_site = strstr($url, $extension.'/', true);
            if($url_site){
                return $url_site.$extension;
            }
        }
    }
}
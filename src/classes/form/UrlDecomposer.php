<?php
namespace VeilleTechno\classes\form;

class UrlDecomposer {

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
}
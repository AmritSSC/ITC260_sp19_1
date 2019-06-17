<?php
//application/models/Pics_model.php

class Pics_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_pics($tags = FALSE)
    {
        $api_key = $this->config->item('flickrKey');
        /*
        var_dump($api_key);
        die();
        */
        
        // SHOULD BE PASSED IN BY A QUERYSTRING/CONTROLLER
        //$tags = 'mariners';

        $perPage = 25;
        $url = 'https://api.flickr.com/services/rest/?method=flickr.photos.search';
        $url.= '&api_key=' . $api_key;
        $url.= '&tags=' . $tags;
        $url.= '&per_page=' . $perPage;
        $url.= '&format=json';
        $url.= '&nojsoncallback=1';

        $response = json_decode(file_get_contents($url));
//        var_dump($response);
//        die();
        return $response->photos->photo;
    }
}
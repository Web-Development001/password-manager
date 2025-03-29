<?php

function getconfig($config_name,$key){
    $conf_file = "/var/labsstorage/home/mohamedhathim628/htdocs/myweb/db.json";

    if(!file_exists($conf_file)){
        return 404;
    } else {
        $get_file = file_get_contents($conf_file,true);
            
        $get_conf = json_decode($get_file,true);
        try {
            return $get_conf[$config_name][$key];
        } catch (Exception $error) {
            return $error->getMessage();
        }
    }
}

<?php

function getconfig($path="/media/mohamed/54B633F1B633D26A/Web development/password-manager/db.json",$key=null,$key2=null){
    if(file_exists($path)){
        if($key and $key2){
            $getcontent = file_get_contents($path);
            $decode_content = json_decode($getcontent,true);
            try {
                return $decode_content[$key][$key2];
            } catch(Exception $error){
                return $error;
            }
        } else {
            $getcontent = file_get_contents($path);
            $decode_content = json_decode($getcontent,true);
            try {
                return $decode_content[$key];
            } catch(Exception $error){
                return $error;
            }
        }
    } else echo "file doesnt exist";
}

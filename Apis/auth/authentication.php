<?php

/**
 * 1.check for user id same or not
 * 2.also check length of the id also
 * 3.check to find duplicate username
 */

class Authentication {
    function Usercmp($con,$username){
        $con->create_connection();
        if($con->searchUser($username) == $username) return 200;
        else return 404;
    }

    function passwordcmp($con,$username,$password){
        $con->create_connection();
        $get_password = $con->GetpasswordbyUser($username);
        if($get_password == $password){
            return 200;//it indicate same password
        } else {
            return 401;//if password doesnt match between 2 users. it return this code.
        }
    }

    function fingerprintcmp($con,$username,$password){
        $con->create_connection();
        if($this->passwordcmp($con,$username,$password) == 200){
            $get_fingerprint = $con->GetfingerprintbyUser($username);
            if(password_verify($password,$get_fingerprint)){
                return 200;
            } else {
                return 401;
            }
        } else {
            return 401;
        }
    }

    function FindDuplicateUser($con,$username){
        $con->create_connection();
        $get_username = $con->searchUser($username);
        if($get_username == $username){
            return 409;
        } else {
            return $get_username;
        }
    }
}



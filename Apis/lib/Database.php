<?php

include("conf.php");
include __DIR__."/../../vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Database_configure {
    private $host;
    private $username;
    private $password;
    private $db_name;
    private $db_user_table;
    private $init_db;
    private $status_code;

    function __construct(){
        $this->host = getconfig("database","db_server");
        $this->username = getconfig("database","db_user");
        $this->password = getconfig("database","db_password");
        $this->db_name = getconfig("database","db_name");
        $this->db_user_table = getconfig("tables","users_table");
        $this->init_db = new mysqli($this->host,$this->username,$this->password,$this->db_name);
        $this->status_code = array(
            404 => "NOT FOUND",
            401 => "UN AUTHERIZED",
            200 => "SUCCESS",
            400 => "BAD REQUEST",
            101 => "FAILED",
            409 => "DUPLICATE ENTRY",
            422 => "INVALID ID",
            423 => "INVALID LENGTH"
        );
    }

    function send_response(int $response=200,$key="result",string $message=''){
        if($key == "result" and empty($message)){
            echo json_encode(array($key => $this->status_code[$response]),JSON_PRETTY_PRINT);
        } else {
            echo json_encode(array($key => $message),JSON_PRETTY_PRINT);
        }
    }

    function create_connection(){
        if($this->init_db->connect_error){
            //Failed to create database connection
            return 101;
        } else {
            //Connection successfully established
            return 200;
        }
    }

    function check_for_duplicate($name){
        if($this->searchUser($name) == $name){
            return 409;
        } else {
            return 200;
        }
    }

    function addUser($name,$password,$gmail,$id){
        $fingerprint = password_hash($password,PASSWORD_BCRYPT);
        $query = "INSERT INTO `$this->db_user_table` (`Name`, `password`,`fingerprint`,`email`, `id`)
        VALUES ('$name', '$password', '$fingerprint','$gmail', '$id');";

        if($this->check_for_duplicate($name) == 200){
            if($this->init_db->query($query)){
                return 200;
            } else {
                return 101;
            }
        } else {
            return 409;
        }
        $this->init_db->close();
    }

    function deleteUser($name){
        $query = "DELETE FROM `$this->db_user_table` WHERE Name = '$name'";
        if($this->init_db->query($query)) return 200;
        else return 101;
        $this->init_db->close();
    }

    function fetchAllUser(){
        $query = "SELECT Name FROM `$this->db_user_table`";
        $get_all_data = $this->init_db->query($query);
        
        if($get_all_data->num_rows > 0){
            while($getbyrow = $get_all_data->fetch_assoc()){
                $user = $getbyrow["Name"];
            }
        }
        return $user;
        $this->init_db->close();
    }

    function searchUser($username){
        $query = "SELECT Name FROM `$this->db_user_table` WHERE Name = '$username'";
        $get_data = $this->init_db->query($query);

        if($get_data->num_rows > 0){
            $get_name = $get_data->fetch_assoc()['Name'];
            return $get_name;
        } else {
            return 404;
        }
        $this->init_db->close();
    }

    function GetIDbyUser($username){
        if($this->searchUser($username) != 404){
            $query = "SELECT id FROM `$this->db_user_table` WHERE Name = '$username'";
            $get_data = $this->init_db->query($query);

            if($get_data->num_rows > 0){
                $get_id = $get_data->fetch_assoc()['id'];
                return $get_id;
            } else {
                return 404;
            }
        } else {
            return 200;
        }
        $this->init_db->close();
    }

    function GetemailbyUser($username){
        if($this->searchUser($username) != 404){
            $query = "SELECT email FROM `$this->db_user_table` WHERE Name = '$username'";
            $get_data = $this->init_db->query($query);

            if($get_data->num_rows > 0){
                $get_email = $get_data->fetch_assoc()['email'];
                return $get_email;
            } else {
                return 404;
            }
        } else {
            return 200;
        }
        $this->init_db->close();
    }

    function GetpasswordbyUser($username){
        if($this->searchUser($username) != 404){
            $query = "SELECT password FROM `$this->db_user_table` WHERE Name = '$username'";
            $get_data = $this->init_db->query($query);

            if($get_data->num_rows > 0){
                $get_password = $get_data->fetch_assoc()['password'];
                return $get_password;
            } else {
                return 404;
            }
        } else {
            return 200;
        }
        $this->init_db->close();
    }

    function GetfingerprintbyUser($username){
        if($this->searchUser($username) != 404){
            $query = "SELECT fingerprint FROM `$this->db_user_table` WHERE Name = '$username'";
            $get_data = $this->init_db->query($query);

            if($get_data->num_rows > 0){
                $get_hash_password = $get_data->fetch_assoc()['fingerprint'];
                return $get_hash_password;
            } else {
                return 404;
            }
        } else {
            return 200;
        }
        $this->init_db->close();
    }
    
    function send_greeting_mail($username){
        $mail = new PHPMailer(true);
        $server_mail = getconfig("email","sender_mail");
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = $server_mail; // Your Gmail
            $mail->Password = getconfig("email","mail_password"); // Use App Password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender & Recipient
            $mail->setFrom($server_mail, 'Password Manager');
            $mail->addAddress($_SESSION["reg_email"], $username);

            // Email Content
            $mail->isHTML(true);
            $mail->Subject = 'For register our website';
            $mail->Body = "<h3>Hello, <b>$username</b> how are you, thanks for choosing our website to secure your credentails</h3>";
            // $mail->AltBody = 'Hello, this is a test email sent from PHPMailer.';

            // Send Email
            $mail->send();
            return 200;
        } catch (Exception $e) {
            return false;
        }
        $this->init_db->close();
    }   

}

class password_manager_db {
    private $host,$username;
    private $password,$db_name;
    private $db_table,$user_cred;
    private $db_conf;

    function __construct()
    {
        $this->host = getconfig("database","db_server");
        $this->username = getconfig("database","db_user");
        $this->password = getconfig("database","db_password");
        $this->db_name = getconfig("database","db_name");
        $this->db_table = getconfig("tables","password_table");
        $this->db_conf = new mysqli($this->host,$this->username,$this->password,$this->db_name);
    }

    function create_connection(){
        if($this->db_conf->connect_error){
            return 101;
        } else {
            return 200;
        }
    }

    function Is_master_password_exist($username){
        $query = "SELECT `master_password` FROM `$this->db_table` WHERE `pm_user` = '$username'";
        $proc = $this->db_conf->query($query);

        if($proc->num_rows > 0) return $proc->fetch_assoc()["master_password"];
        else return '';
        $this->db_conf->close();
    }

    function create_master_password($username,$m_pass){
        $find_sp_chars = preg_match("[^a-zA-Z0-9]",$m_pass);
        if($find_sp_chars == 0){
            $query = "UPDATE `$this->db_table` SET `master_password` = $m_pass WHERE `pm_user` = '$username'";
            
            if($this->db_conf->query($query)){
                return 200;
            } else {
                return 101;
            }
        } else {
            return 999;
        }
        $this->db_conf->close();
    }

    function _addUser($username){
        $query_pm = "INSERT INTO `$this->db_table` (`pm_user`, `master_password`,`password_name`,`password`)
        VALUES ('$username', '','','')";
        if($this->searchUser($username) == $username){
            return 409;
        } else {
            $proc = $this->db_conf->query($query_pm);
            if($proc) return 200;
            else return 101;
        }
        $this->db_conf->close();
    }

    function deleteUser($username){
        if($this->searchUser($username) == $username){
            $query_pm = "DELETE FROM `$this->db_table` WHERE `pm_user` = '$username'";
            if($this->db_conf->query($query_pm)) return 200;
            else return 101;
        } else return 404;

    }
    function fetchAllMasterPass(){
        $query = "SELECT `master_password` FROM `$this->db_table`";
        $get_all_pass = $this->db_conf->query($query);
        $mpass = array();

        if($get_all_pass->num_rows > 0){
            while(($get_pass = $get_all_pass->fetch_assoc())){
                array_push($mpass,$get_pass["master_password"]);
            }
        } else {
            return 404;
        }
        return $mpass;
        $this->db_conf->close();
    }

    function fetchMasterPassByuser($username){
        $query = "SELECT `master_password` FROM `$this->db_table` WHERE `pm_user` = '$username'";
        $get_mpass = $this->db_conf->query($query);

        if($get_mpass->num_rows > 0){
            return $get_mpass->fetch_assoc()["master_password"];
        } else {
            return 101;
        }
    }

    function searchUser($username){
        $query = "SELECT `pm_user` FROM `$this->db_table` WHERE `pm_user` = '$username'";
        $get_data = $this->db_conf->query($query);

        if($get_data->num_rows > 0){
            $get_name = $get_data->fetch_assoc()['pm_user'];
            return $get_name;
        } else {
            return 404;
        }
        $this->db_conf->close();
    }

    function deleteMasterPassword($username){
        $query = "UPDATE `$this->db_table` SET `master_password` = '' WHERE `pm_user` = '$username'";
        $proc = $this->db_conf->query($query);
        if($proc) return 200;
        else return 101;
        $this->db_conf->close();
    }

    function AddMasterPasswordByUser($master_pass,$username){
        $query = "UPDATE `$this->db_table` SET `master_password` = '$master_pass' WHERE `pm_user` = '$username'";
        if($this->searchUser($username)){
            $proc = $this->db_conf->query($query);
            if($proc) return 200;
            else return 101; // Failed to load query
        } else return 404; // User not found.
        $this->db_conf->close();
    }

    function AddPasswordCredenialsByMasterPassword($username,$mpass,$title_name,$password,$currentTime){
        /**
         * It add password_name(title) and password(actual payload password) by users
         * master password.
         */
        $query = "INSERT INTO `$this->db_table` (`pm_user`, `master_password`,`password_name`,`password`,`saved_at`)
        VALUES ('$username','$mpass','$title_name','$password','$currentTime')";
        $proc = $this->db_conf->query($query);
        if($proc) return 200;
        else return 101;
        $this->db_conf->close();
    }

    function fetchPasswordTitleByMasterPassword($mp){
        $query = "SELECT `password_name` FROM `$this->db_table` WHERE `master_password` = '$mp'";
        $proc = $this->db_conf->query($query);
        $temp_data = array();
        
        if($proc->num_rows > 0){
            while(($getpasstitle = $proc->fetch_assoc())){
                array_push($temp_data,$getpasstitle['password_name']);
            }
            return $temp_data;
        } else {
            return 404;
        }
    }

    function fetchPasswordByMasterPassword($mp){
        $query = "SELECT `password` FROM `$this->db_table` WHERE `master_password` = '$mp'";
        $proc = $this->db_conf->query($query);
        $temp_data = array();
        
        if($proc->num_rows > 0){
            while($getpass = $proc->fetch_assoc()){
                array_push($temp_data,$getpass['password']);
            }
            return $temp_data;
        } else {
            return 404;
        }
    }

    function fetchDateByMasterPassword($mp){
        $query = "SELECT `saved_at` FROM `$this->db_table` WHERE `master_password` = '$mp'";
        $proc = $this->db_conf->query($query);
        $temp_data = array();
        
        if($proc->num_rows > 0){
            while($getDate = $proc->fetch_assoc()){
                array_push($temp_data,$getDate['saved_at']);
            }
            return $temp_data;
        } else {
            return 404;
        }
    }

}

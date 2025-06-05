<?php

include ('../libs/externals.php');

class Database_Configure{
    private $host;
    private $username;
    private $password;
    private $db_name;
    private $con;
    private $invalid_chars;
    private $user_table;
    private $user_info;

    function __construct()
    {
        $this->host = getconfig(key:"database",key2:"db_server");
        $this->username = getconfig(key:"database",key2:"db_user");
        $this->password = getconfig(key:"database",key2:"db_pass");
        $this->db_name = getconfig(key:"database",key2:"db_name");
        $this->user_table = getconfig(key:"database",key2:"user");
        $this->user_info = getconfig(key:"database",key2:"user_sec_info");
        $this->invalid_chars = '.<>/\\()=';
        $this->con = new mysqli($this->host,$this->username,$this->password,$this->db_name);
    }

    function connection(){
        if($this->con->connect_error) return false;
        else return true;
    }

    function create_account($username,$email,$password){
        $randome_num = random_int(10000000,99999999);
        $for_email = str_replace('.','',$this->invalid_chars);
        $check_username = str_contains($username,$this->invalid_chars);
        $check_email = str_contains($email,$for_email);
        $check_password = str_contains($password,$this->invalid_chars);

        if($username and $email and $password){
            if($check_username and $check_password and $check_email){
                $valid_username = str_replace($this->invalid_chars,'',$username);
                $valid_email = str_replace($this->invalid_chars,'',$email);
                $valid_password = str_replace($this->invalid_chars,'',$password);

                $query = "INSERT INTO `$this->user_table` (`id`,`Name`,`Email`,`Password`)
                VALUES ('$randome_num','$valid_username','$valid_email','$valid_password')";

                try{
                    $this->con->query($query);
                    return true;
                } catch(Exception){
                    return false;
                }
            } else {
                $query = "INSERT INTO `$this->user_table` (`id`,`Name`,`Email`,`Password`)
                VALUES ('$randome_num','$username','$email','$password')";

                try{
                    $this->con->query($query);
                    return true;
                } catch(Exception){
                    return false;
                }
            }
        } else {
            return false;
        }
    }

    function set_user_informations($username){
        $get_real_ip = file_get_contents("https://api.ipify.org");
        $get_user_agent = $_SERVER['HTTP_USER_AGENT'];
        $getip_infos = get_ip_information($get_real_ip);
        $getcountry = $getip_infos['Country'];
        $getcity = $getip_infos['City'];
        $getisp = $getip_infos['ISP'];
        $getisp_organisation = $getip_infos['ISP_org'];
        $get_latitude = $getip_infos['lat'];
        $getlongitude = $getip_infos['lon'];
        $is_mobile = $getip_infos['Is_mobile'];
        $is_proxy = $getip_infos['Is_proxy'];
        $date = $getip_infos['Date'];
        $time = $getip_infos['Time'];

        $query = "INSERT INTO `$this->user_info` (`Name`,`Ip_addr`,`User_agant`,`Country`,`City`,`ISP`,`ISP_organization`,`Latitude`,`Longitude`,`Mobile`,`Proxy`,`Date`,`Time`)
        VALUES ('$username','$get_real_ip','$get_user_agent','$getcountry','$getcity','$getisp','$getisp_organisation','$get_latitude','$getlongitude','$is_mobile','$is_proxy','$date','$time')";

        try {
            $this->con->query($query);
            return true;
        } catch(Exception $e){
            return false;
        }
    }

    function search_account($username=null){
        $query = "SELECT * FROM `$this->user_table`";
        $proc = $this->con->query($query);
        
        while($get_names = $proc->fetch_assoc()){
            if($get_names['Name'] == $username){
                return $get_names;
                break;
            }
        }
        return false;
    }

    function remove_account($password){
        $query = "DELETE FROM $this->user_table WHERE `$this->user_table`.`Password` = '$password'";
        $del = $this->con->query($query);
        if($del) return true;
        else return false;
    }
}
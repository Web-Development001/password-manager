<?php

// $username = "<h1>hello</h1>";
// $invalid = array('<','/','>');
// echo str_replace($invalid,'',$username);\

// $url = "https://emailvalidation.abstractapi.com/v1/?api_key=5594da01280a497c8a13369c3beed3ea&email=mohamedhathim628@gmail.com";

// $res = file_get_contents($url);
// $data = json_decode($res,true);

// if($data['deliverability'] == 'DELIVERABLE') echo "mail is valid one";
// else echo "mail is invalid one";

// echo random_int(10000000,99999999);

include "API/database.php";

$db = new Database_Configure();
// echo $db->connection();
echo $db->create_account('<h1>hedfihdf</h1>','mohamedhathim628@gmail.com','hsiofdhsfd');
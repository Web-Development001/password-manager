<?php

include 'database.php';

$db = new Database_Configure();
echo $db->set_user_informations('mohamed');


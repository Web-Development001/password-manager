<?php
include 'database.php';
include 'external.php';

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type");
$db = new Database_Configure();

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
}
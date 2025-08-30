<?php

// function get_ip(){
//     $url = 'https://nordvpn.com/what-is-my-ip/?srsltid=AfmBOoorbM3CKV6mCQMS7KQvC50X3U4nMOU1smRQtr0x4MvmIuUFXc8M';
//     $getip = file_get_contents($url);
//     echo $getip;
// }

// $url = 'https://whatismyipaddress.com/';

// // Initialize cURL
// $ch = curl_init($url);

// // Set options
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // return response as string
// curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // follow redirects

// // Execute
// $getip = curl_exec($ch);

// // echo strpos('IPv4',$getip);
// echo $getip;

$ch = curl_init("https://v4.ident.me/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

echo "Your IPv4 is: " . $response;






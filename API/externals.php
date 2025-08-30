<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

function getconfig($path="/var/www/html/password-manager/db.json",$key=null,$key2=null){
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

function ismobile() {
    $is_mobile = '0';

    if(preg_match('/(android|up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $is_mobile=1;
    }

    if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
        $is_mobile=1;
    }

    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
    $mobile_agents = array('w3c ','acs-','alav','alca','amoi','andr','audi','avan','benq','bird','blac','blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno','ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-','maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-','newt','noki','oper','palm','pana','pant','phil','play','port','prox','qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar','sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-','tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp','wapr','webc','winw','winw','xda','xda-');

    if(in_array($mobile_ua,$mobile_agents)) {
        $is_mobile=1;
    }

    if (isset($_SERVER['ALL_HTTP'])) {
        if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
            $is_mobile=1;
        }
    }

    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
        $is_mobile=0;
    }

    return $is_mobile;
}

function send_mail($username,$user_mail){
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = getconfig(key:"email",key2:"sender_mail");
        $mail->Password = getconfig(key:'email',key2:'mail_password');
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $get_server_mail = getconfig(key:'email',key2:'sender_mail');
        $mail->setFrom($get_server_mail, 'Password Manager');

        $mail->addAddress($user_mail, $username);
        $mail->isHTML(true);                                  
        $mail->Subject = 'Thanks';
        $mail->Body    = 'This is a <b>test email</b> sent using PHPMailer.';
        $mail->AltBody = 'This is the plain text version.';

        $mail->send();
    } catch (Exception $e){
        return 101;
    }
}

function response($status_code=0){
    $httpStatusCodes = [
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        103 => 'Early Hints',
    
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative Information',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        226 => 'IM Used',
    
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
    
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Timeout',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Payload Too Large',
        414 => 'URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Range Not Satisfiable',
        417 => 'Expectation Failed',
        418 => "I'm a teapot",
        421 => 'Misdirected Request',
        422 => 'Unprocessable Entity',
        423 => 'Locked',
        424 => 'Failed Dependency',
        425 => 'Too Early',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        451 => 'Unavailable For Legal Reasons',
        460 => 'Username incorrect',
        461 => 'password incorrect',
    
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout',
        505 => 'HTTP Version Not Supported',
        506 => 'Variant Also Negotiates',
        507 => 'Insufficient Storage',
        508 => 'Loop Detected',
        510 => 'Not Extended',
        511 => 'Network Authentication Required'
    ];

    if($status_code == 0) return null;
    else {
        echo json_encode([
            'status' => $status_code,
            'message' => $httpStatusCodes[$status_code]
        ],JSON_PRETTY_PRINT);
    }
}


function get_ip(){
    $ch = curl_init("https://v4.ident.me/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

function get_ip_information($ip){
    // $get_local_ip = $_SERVER['REMOTE_ADDR'];
    $api = 'https://proxycheck.io/v2/'.$ip.'?vpn=1&asn=1';
    $response = file_get_contents($api);
    $info = json_decode($response);
    $is_mobile = ismobile();

    $ip_addr           = $ip;
    $user_agent        = $_SERVER['HTTP_USER_AGENT'];
    $country           = $info->$ip->country;
    $city              = $info->$ip->region;
    $isp               = $info->$ip->provider;
    $isp_organization  = $info->$ip->organisation;
    $latitude          = $info->$ip->latitude;
    $longitude         = $info->$ip->longitude;
    $mobile            = $is_mobile ? 'mobile':'pc or lap'; 
    $proxy             = $info->$ip->proxy;
    $date              = date("Y-m-d");
    date_default_timezone_set("Asia/Kolkata"); 
    $time              = date("h:i:s A");
    return [
        'Valid' => $info->status,
        'IP' => $ip_addr,
        'Device' => $user_agent,
        'Country' => $country,
        'City' => $city,
        'ISP' => $isp,
        'ISP_org' => $isp_organization,
        'lat' => $latitude,
        'lon' => $longitude,
        'Is_mobile' => $mobile,
        'Is_proxy' => $proxy,
        'Date' => $date,
        'Time' => $time
    ];
}
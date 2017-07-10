<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . '/libraries/JWT.php';
use \Firebase\JWT\JWT;

function encode($string){
	$CI =& get_instance();
    $id = $CI->encryption->encrypt($string);
	$id = str_replace(['+','/'], ['==11==','==12=='], $id);
	return $id;
}

function decode($string){
	$CI =& get_instance();
	$id = str_replace(['==11==','==12=='], ['+','/'], $string);
	$id = $CI->encryption->decrypt($id);
	return $id;
}

function dF($date, $format){
	return date($format, strtotime($date));
}

function folderENCRYPT($id,$type=0){
    return base64_encode($id);
}

function timeAgo($timestamp){

    $time = time() - $timestamp;

    if ($time < 60)
        return ( $time > 1 ) ? $time . ' detik yang lalu' : 'satu detik';

    elseif ($time < 3600) {
        $tmp = floor($time / 60);
        return ($tmp > 1) ? $tmp . ' menit yang lalu' : ' satu menit yang lalu';
    }

    elseif ($time < 86400) {
        $tmp = floor($time / 3600);
        return ($tmp > 1) ? $tmp . ' jam yang lalu' : ' satu jam yang lalu';
    }

    elseif ($time < 2592000) {
        $tmp = floor($time / 86400);
        return ($tmp > 1) ? $tmp . ' hari lalu' : ' satu hari lalu';
    }

    elseif ($time < 946080000) {
        $tmp = floor($time / 2592000);
        return ($tmp > 1) ? $tmp . ' bulan lalu' : ' satu bulan lalu';
    }

    else {
        $tmp = floor($time / 946080000);
        return ($tmp > 1) ? $tmp . ' years' : ' a year';
    }
}

function replacesymbol($string){
    return str_replace([' ','&',',','.','(',')','!','?'], ['','','','','','','',''], $string);
}

function send_sms_otp($return = '0', $mobile=NULL, $otp=NULL, $passwordattack=NULL) {
    $smsgatewayurl='https://reguler.zenziva.net';
    $nohp = $mobile;
    $userkey='ml7owf';
    $passkey='sayang1411';
    $dates = date('d F Y H:i:s');
    
    if($otp != NULL){
        $message = urlencode('Hallo! berikut adalah kode otorisasi anda '.$otp.' Terima kasih!');
    } elseif($passwordattack != NULL) {
        $message = urlencode('Hello!, ada praktek pembobolan akun di aplikasi kamu, silakan backup database, dan hapus database untuk sementara, terima kasih!');
    }else{
       $message = urlencode('Hallo! ada yang mencoba masuk pada aplikasi kamu pada waktu '.$dates.' Terima kasih!');
    }
    
    $elementapi='/apps/smsapi.php';
    $parameterapi=$elementapi.'?userkey='.$userkey.'&passkey='.$passkey.'&nohp='.$nohp.'&pesan='.$message;
    $smsgatewaydata=$smsgatewayurl.$parameterapi;
    $url=$smsgatewaydata;
    $ch=curl_init();
    curl_setopt($ch, CURLOPT_POST, false);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output=curl_exec($ch);
    if (!$output) {
        $output=file_get_contents($smsgatewaydata);
    }
    if ($return=='1') {
        return $output;
    } else {
        return TRUE;
    }
}

function logintoken($email) {
    $CI =& get_instance();
    $CI->db->select('idUSER, emailUSER, passwordUSER');
    $CI->db->from('users');
    $CI->db->where('emailUSER', $email);
    $CI->db->limit(1);
    
    return $CI->db->get()->row();
}

function generate_token($id, $email, $tokenreset=NULL){
   //START GENERATE TOKEN
   $token['idUSER'] = $id;
   $token['emailUSER'] = $email;
   $date = new DateTime();
   $token['iat'] = $date->getTimestamp();

   if(!empty($tokenreset)){
    $token['exp'] = $date->getTimestamp() + 180;
    $tokenencode = JWT::encode($token, "MYSECUREWEBAPPRESETPASSWORD");
   } else {
    $token['exp'] = $date->getTimestamp() + 60*60*3;
    $tokenencode = JWT::encode($token, "MYSECUREWEBAPP");
   }
   //END GENERATE TOKEN
   return $tokenencode;
}

function decoded_token($tokenencode, $tokenreset=NULL){
    if(!empty($tokenreset)){
        $tokendecode = JWT::decode($tokenencode, "MYSECUREWEBAPPRESETPASSWORD", array('HS256'));
    } else {
        $tokendecode = JWT::decode($tokenencode, "MYSECUREWEBAPP", array('HS256'));
    }
    return $tokendecode;
}

function checkauthentication(){
    $CI =& get_instance();
    $token = $CI->session->userdata('tokenAUTH');
    $decoding = decoded_token($token);
    $checkuser = logintoken($decoding->emailUSER);
    $date = new DateTime();
    $times = $date->getTimestamp();
    
    if(empty($checkuser)){
        return FALSE;
    } else if ($decoding->exp < $times) {
        return FALSE;
    } else {
        return TRUE;
    }
}

function browseragent(){
    $CI =& get_instance();
    if ($CI->agent->is_browser()){
    $agent = $CI->agent->browser();
    }elseif ($CI->agent->is_mobile()){
        $agent = $CI->agent->mobile();
    }else{
        $agent = 'Unindentified device';
    }
    return $agent;
}

function randomOTP() {
    $length = 6;
    $str = "";
    $characters = array_merge(range('0','9'));
    $max = count($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}

function cetak($str){
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}

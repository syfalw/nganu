<?php



error_reporting(0);
echo "`````````` AUTO REFF EDOT MANUAL OTP BY JUMADY ````````````".PHP_EOL.PHP_EOL;


$refferal = input("[?] Kode Refferal (MDBA8H2GMR) ");
$loop = input("[?] Jumlah Reff ");

echo PHP_EOL;
for($ia=1; $ia <= $loop; $ia++){
    echo " --------------- [ $ia/$loop ] --------------- ".PHP_EOL;
    ulang:
    $deviceId = generateRandomString(36);
    $data = '{"name":"web-sso","secret_key":"3e53440178c568c4f32c170f","device_type":"web","device_id":"'.$deviceId.'"}';
    $lenght = strlen($data);
    $headers = [
        "Host: api-accounts.edot.id",
        "Content-Type: application/json",
        "Origin: https://accounts.edot.id",
        "Connection: keep-alive",
        "Accept: */*",
        "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/109.0.5414.83 Mobile/15E148 Safari/604.1",
        "Content-Length: ".$lenght,
        "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8",
        "Accept-Encoding: gzip, deflate, br"
    ];
    
    $getToken = curl("https://api-accounts.edot.id/api/token/get", $data, $headers);
    $code = get_between($getToken[1], '"code":', ',"');
    $token_code = get_between($getToken[1], '"token_code":"', '",');
    if ($code == 200) {
        echo "[-] Status Code 200";
        echo " -> token_code: ".$token_code.PHP_EOL;
        $fullName = getName();
        $data = '{"fullname":"'.$fullName.'"}';
        $lenght = strlen($data);
        $headers = [
            "Host: api-accounts.edot.id",
            "Content-Type: application/json",
            "Origin: https://accounts.edot.id",
            "Accept-Encoding: gzip, deflate, br",
            "Connection: keep-alive",
            "Accept: */*",
            "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/109.0.5414.83 Mobile/15E148 Safari/604.1",
            "Content-Length: ".$lenght,
            "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8",
            "sso-token: ".$token_code,
        ];
        $getUsername = curl("https://api-accounts.edot.id/api/user/get_suggestion_username", $data, $headers);
        $codeUsername = get_between($getUsername[1], '"code":', ',"');
        $username = get_between($getUsername[1], '"data":["', '",');
        if ($codeUsername == 200) {
            echo "[-] Status Code 200";
            echo " -> Username: ".$username.PHP_EOL;
            $nomor = input("[?] Nomor HP ");
            $data = '{"phone_number":"'.$nomor.'","type":"verify_phone","send_type":"sms"}';
            $lenght = strlen($data);
            $headers = [
                "Host: api-accounts.edot.id",
                "Content-Type: application/json",
                "Origin: https://accounts.edot.id",
                "Accept-Encoding: gzip, deflate, br",
                "Connection: keep-alive",
                "Accept: */*",
                "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/109.0.5414.83 Mobile/15E148 Safari/604.1",
                "Content-Length: ".$lenght,
                "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8",
                "sso-token: ".$token_code,
            ];
            $sendOTP = curl("https://api-accounts.edot.id/api/user/send_otp_phone", $data, $headers);
            $codesendOTP = get_between($sendOTP[1], '"code":', ',"');
            $msgotp = get_between($sendOTP[1], '"data":"', '"}');
            $isMsg = get_between($sendOTP[1], '"message":"', '"');
            if ($codesendOTP == 200) {
                echo "[-] Status Code 200";
                echo " -> ".$msgotp.PHP_EOL;
                $otpbos = input("[?] OTP "); 
                $data = '{"phone_number":"'.$nomor.'","otp":"'.$otpbos.'","description":"register"}';
                $lenght = strlen($data);
                $headers = [
                    "Host: api-accounts.edot.id",
                    "Content-Type: application/json",
                    "Origin: https://accounts.edot.id",
                    "Accept-Encoding: gzip, deflate, br",
                    "Connection: keep-alive",
                    "Accept: */*",
                    "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/109.0.5414.83 Mobile/15E148 Safari/604.1",
                    "Content-Length: ".$lenght,
                    "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8",
                    "sso-token: ".$token_code,
                ];
                $verifotp = curl("https://api-accounts.edot.id/api/user/verify_otp_phone", $data, $headers);
                $codeverifOTP = get_between($verifotp[1], '"code":', ',"');
                $msgverif = get_between($verifotp[1], '"data":"', '"}');
                if ($codeverifOTP == 200) {
                    echo "[-] Status Code 200";
                    echo " -> ".$msgverif.PHP_EOL;
                    $data = '{"fullname":"'.$fullName.'","email":"","username":"'.$username.'","recovery_email":"","phone_number":"'.$nomor.'","password":"Jumadygantengnihbos11#$","date_of_birth":"2000-01-05","gender":"pria","security_question_id":"1","security_question_answer":"Sukinah","response_type":"code","client_id":"0c21679b392bc480c87c150303ab255d","referral_code":"'.strtoupper($refferal).'"}';
                    $lenght = strlen($data);
                    $headers = [
                        "Host: api-accounts.edot.id",
                        "Content-Type: application/json",
                        "Origin: https://accounts.edot.id",
                        "Accept-Encoding: gzip, deflate, br",
                        "Connection: keep-alive",
                        "Accept: */*",
                        "User-Agent: Mozilla/5.0 (iPhone; CPU iPhone OS 16_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) CriOS/109.0.5414.83 Mobile/15E148 Safari/604.1",
                        "Content-Length: ".$lenght,
                        "Accept-Language: en-GB,en-US;q=0.9,en;q=0.8",
                        "sso-token: ".$token_code,
                    ];
                    $register = curl("https://api-accounts.edot.id/api/user/register", $data, $headers);
                    $registerfinal = get_between($register[1], '{"redirect_url":"', '"}');
                    if ($registerfinal) {
                        echo "[-] Sukses Mendaftarkan $username.Kode Reff: ".strtoupper($refferal).PHP_EOL;
                        echo "[-] Redirect Url ".$registerfinal.PHP_EOL;
                        $getToken_login = curl($registerfinal, 0, 0);
                        sleep(10);
                        $accessToken = get_between($getToken_login[2], '[access-token] => ', ')');
                        if ($accessToken) {
                            echo "[-] Access Token ".trim($accessToken).PHP_EOL;
                        }
                    } else if (strpos($register[1], '"code":400,"')) {
                        $msg_registerfinal = get_between($register[1], '{"message":"', '","');
                        echo "[!] Gagal Mendaftarkan User - Reason: ".$msg_registerfinal.PHP_EOL;
                        goto ulang;
                    } else {
                        echo "[!] Gagal Mendaftarkan User".PHP_EOL;
                        goto ulang;
                    }
                } else {
                    echo "[!] Gagal Verifikasi OTP".PHP_EOL;
                    goto ulang;
                }
            } else {
                echo "[!] Gagal Mengirimkan OTP -> ".$isMsg.PHP_EOL; 
                goto ulang;
            }
        } else {
            echo "[!] Gagal Mendaptkan Username".PHP_EOL;
            goto ulang;
        }
    } else {
        echo "[!] Gagal Mendaftarkan Token".PHP_EOL;
        goto ulang;
    }
}



function input($text) {
    echo $text.": ";
    $a = trim(fgets(STDIN));
    return $a;
}

function getName() {
    $r = file_get_contents('https://www.random-name-generator.com/indonesia?gender=&n=1&s='.rand(111,999));
    $namenya = get_between($r,'<div class="col-sm-12 mb-3" id="','-');
    $nama_indo = preg_replace('/s+/', '', $namenya);
    return ucfirst($nama_indo);
}

function get_between($string, $start, $end) 
    {
        $string = " ".$string;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string,$end,$ini) - $ini;
        return substr($string,$ini,$len);
    }


function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function nama() {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, "https://api.namefake.com/indonesian-indonesia");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	$ex = curl_exec($ch);
	return $ex;
}

function curl($url, $post = 0, $httpheader = 0, $proxy = 0){ // url, postdata, http headers, proxy, uagent
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        if($post){
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
        }
        if($httpheader){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $httpheader);
        }
        if($proxy){
            curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, true);
            curl_setopt($ch, CURLOPT_PROXY, $proxy);
            // curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_SOCKS5);
        }
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        $httpcode = curl_getinfo($ch);
        if(!$httpcode) return "Curl Error : ".curl_error($ch); else{
            $header = substr($response, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            $body = substr($response, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
            curl_close($ch);
            return array($header, $body);
        }
    }


function curlget($url,$post,$headers) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $headers == null ? curl_setopt($ch, CURLOPT_POST, 1) : curl_setopt($ch, CURLOPT_HTTPGET, 1);
	if ($headers !== null) curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
	$result = curl_exec($ch);
	$header = substr($result, 0, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
	$body = substr($result, curl_getinfo($ch, CURLINFO_HEADER_SIZE));
	preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $result, $matches);
	$cookies = array()
;	foreach($matches[1] as $item) {
	  parse_str($item, $cookie);
	  $cookies = array_merge($cookies, $cookie);
	}
	return array (
	$header,
	$body,
	$cookies
	);
}
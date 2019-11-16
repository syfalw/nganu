<?php
error_reporting(0);
output_clean("________        ________ 
___  __ \______ ___  __ \
__  / / /_  __ \__  /_/ /
_  /_/ / / /_/ /_  _, _/ 
/_____/  \____/ /_/ |_|  
                         ");
output_clean(" Dor Telkomsel CLI Version");
output_clean(" OMG 5GB 10K");
output_clean(" v.1.0");
output_clean(" © fznxn - 2019");
output_clean("_______________________________ _ _ _ _ _ _");
output_clean("");

//get otp
sleep(1);
echo "NOMOR \t: ";
$nomor = trim(fgets(STDIN));

$res = file_get_contents("http://1000perhari.000webhostapp.com/api.php?nope=$nomor&reqotp");
if (empty($nomor)){
    echo 'Nomor tidak boleh kosong.';
    } else {
    echo "Mengirim OTP...\n";
    sleep(2);
    if (strpos($res,"dikirim")) {
    echo "Berhasil mengirim OTP";
    }else {
    echo "Gagal mengirim OTP\n";
    exit();
    }
    echo "\n";
    }
    
//dor
sleep(1);
echo "OTP \t: ";
$otepe = trim(fgets(STDIN));
$result = file_get_contents("http://1000perhari.000webhostapp.com/api.php?nope=$nomor&otp=$otepe&beli&mbul=1");
if (strpos($result,"diproses")){
    echo "Terima kasih, permintaan anda sedang diproses. Silahkan tunggu SMS selanjutnya.\n";
    sleep(2);
    echo "PLEASE DONATE ME";
}else {
    echo $result;
    sleep(2);
    echo "PLEASE DONATE ME";
}

function output_clean($pesan) {
echo $pesan, PHP_EOL;
}
?>

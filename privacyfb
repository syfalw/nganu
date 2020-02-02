<?php
/* Creator : YarzCode */
/* Auto Delete Post Facebook */
function curl($url, $fields = null, $cookie = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($fields !== null) {
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        }   
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5000);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
}

$token = ''; // Access Token
$uu = curl("https://graph.facebook.com/me/posts?access_token=$token&limit=1000&fields=id,name");
$ua = json_decode($uu);


foreach($ua->data as $ahyar) {
    $cu = curl("https://graph.facebook.com/".$ahyar->id."/?method=delete", "access_token=$token");

    if($cu == true OR $cu == 1) {
        echo "POST DELETED! POST ID: ".$ahyar->id." \n";
    } else {
        echo "POST FAIL TO DELETE! POST ID: ".$ahyar->id."  ".$cu." \n";
    }
}

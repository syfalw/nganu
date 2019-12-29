<?php
function pin($no){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.kopikenangan.com/api/users/pin/create');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"phone\":\"$no\"}");
	$headers = array();
	$headers[] = 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjI2YmYyODA3MmY4YzkwZTVlNTk4OTdmY2M3YTMwYTE3ZjVjMWM5Yjk2ODNhMGM0YjJhZDA4Mjk3NGNkN2Q1MDVhYWQ2ODJiNzllMTA1ZDgyIn0.eyJhdWQiOiIxIiwianRpIjoiMjZiZjI4MDcyZjhjOTBlNWU1OTg5N2ZjYzdhMzBhMTdmNWMxYzliOTY4M2EwYzRiMmFkMDgyOTc0Y2Q3ZDUwNWFhZDY4MmI3OWUxMDVkODIiLCJpYXQiOjE1Nzc2MTYwMDAsIm5iZiI6MTU3NzYxNjAwMCwiZXhwIjoyODczNjE2MDAwLCJzdWIiOiIiLCJzY29wZXMiOltdfQ.h7pFARm7Itspk2KsDDBL-3skVhh5PqDCky7mKbzgOImKic0wK0hxRCrCNvDvXzhV3d3YU8OnBUnnUgwdxPQawlaMDgZI4aKn-gZnNNDRYOa-YIT6tdhtOksNF5zEspP0ULbA1eN4fXlbjdSxX_QMqNIv-3WlpOPFSF-lZvixpfmd9AjP9j7nGe2UerITq1tqX_36ZgvGXd-LUQe1uaQojbchUUM132jqSwhbqIdq2mnCzTMEPCUoVnxA1lyYe7C2iyV12mcL78S13RZ6W6dqnY--SAzd6k4cYVoy9hooctu9uZJIqtYHWPJaU1QvrfrH41UwXhOlMpB0m_H22nGmt0KLZJI3N608PkKz_F0w9vwciSB2Dppk733DAWC0egWMnISYNFBeFe_HnoQlwYZaeB5HpaHptCwJx5Jog5xJEpciwNRecWnOdmpc_hmzXovwFtplrAJTg9WCy1-QLPrQMyzMgXciBFCK5IcxL0Xk9kxy0fR63VLGaM3XnwUjrR3WrHVGFuT3b1WFylrwg47PDaPLaG2pcJOaxONuBqjmg3uXK1PF8LYXk0gKOcEBksNoh62FuoDO1Maj-JSIAjx7eyxQG7BGrWqUG5U2GwQQ4jRH2nnLIqz9UjsOee8PM3s-MgUozRo8WtukFPibKrOyV03uKQ_HEhHFYHu0sTkRKDY';
	$headers[] = 'Accept: application/json';
	$headers[] = 'Connection: close';
	$headers[] = 'Content-Type: application/json; charset=utf-8';
	$headers[] = 'Host: api.kopikenangan.com';
	$headers[] = 'User-Agent: okhttp/4.1.0';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	curl_close($ch);
	return @json_decode($result, true)['result']['pin'];
}
function mulai($no){
	$pin = pin($no);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.kopikenangan.com/api/users/pin/change');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"phone\":\"$no\",\"pin_new\":\"123654\",\"pin_old\":\"$pin\"}");
	$headers = array();
	$headers[] = 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImQwNWIzZjVhMWRmMmQ3MDZjNDlhZGFmNjM4OTI5NzRlZGE4MmNiMzYyMmZjNDhkMzE5ZTg2NTQxMWM0MTc4ODlhNDNjMTExZjVjYTFkZGFiIn0.eyJhdWQiOiIyIiwianRpIjoiZDA1YjNmNWExZGYyZDcwNmM0OWFkYWY2Mzg5Mjk3NGVkYTgyY2IzNjIyZmM0OGQzMTllODY1NDExYzQxNzg4OWE0M2MxMTFmNWNhMWRkYWIiLCJpYXQiOjE1Nzc2MTc3MzEsIm5iZiI6MTU3NzYxNzczMSwiZXhwIjoyODczNjE3NzMxLCJzdWIiOiIyNjg3MTUiLCJzY29wZXMiOlsiKiJdfQ.UWiPWG_21uIcnAy3Dob5bhBAT5eCfzy1UJYLYPVw_3BKD4q_2TKkA_UV-M29lGsIkr_cG1BIflkvrr2wsKLeYhtOaUfDhbXUeEv6dnqtN4tBLz648snV57AVEsEPW08IOG68PvlG6NSaNsaExeWpusLvdWZquB6OKyMNn_0h3qgF2nmAmuQr0AWrB-GtwGCPiHhSw8sQSkoHasnGGzdXk4CW1xSN2WCLM7_gh6WZz0W2PA_ZpF_KqpclzJz3sc15r71t6MKKDesz8ykgVnedP0FkILdJmcRGtY9hwclCvAyEyoMe_dVn94OkCDf5itm7L46w42CEF14j0TpQK6G4hVW5C0JM1SUwHGd-UwCr5ifjk9j0CFjSUU9Uhzrk83_pZONJAexlm5yy4DcrwmOcY20ysiSy1LnrPGIeWcwMuxqBRf4sP1OyZX_K5IBa7U8Z7Hv4_M3bGs-PyGuk4eMN8xIFatFYf9ak9PIPDX2D2Lx5k_LMfheJTvPNEyo3Or3MZzTfY9mFZDwUKbx6YskZgNfXyhCYJvjApJclJxSz6xIhvBR8VGcqBtiTbFBH6j6llr9HHuaFg21TguLjrDtq_jaBKF8z2rdJGAaRjs9o9JN1yU0FV0KswJ16XKXhlmrFHK5HeenM2t3t1W41ansAuh4kIORI4vQuiCnZn7C9Mlw';
	$headers[] = 'Accept: application/json';
	$headers[] = 'Connection: close';
	$headers[] = 'Content-Type: application/json; charset=utf-8';
	$headers[] = 'Host: api.kopikenangan.com';
	$headers[] = 'User-Agent: okhttp/4.1.0';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	curl_close($ch);
}
function update($no){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.kopikenangan.com/api/users/profile/update');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"phone\":\"$no\",\"name\":\"Rafiq Sial\",\"email\":\"rafiq".rand(1234567890,9999999999)."@gmail.com\"}");
	$headers = array();
	$headers[] = 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjViMDE4NTg2MzgyZDFiNjE3ZTVhMTZjOWRjMjBmNzdiMWZjN2Y0Y2QwZWM5ODE1NTc2M2MwNDBiOWNiNmJkNGIzMzIxNmVkOTY4YWQwOTc5In0.eyJhdWQiOiIyIiwianRpIjoiNWIwMTg1ODYzODJkMWI2MTdlNWExNmM5ZGMyMGY3N2IxZmM3ZjRjZDBlYzk4MTU1NzYzYzA0MGI5Y2I2YmQ0YjMzMjE2ZWQ5NjhhZDA5NzkiLCJpYXQiOjE1Nzc2MTc4MjEsIm5iZiI6MTU3NzYxNzgyMSwiZXhwIjoyODczNjE3ODIxLCJzdWIiOiIyNjg3MTUiLCJzY29wZXMiOlsiKiJdfQ.zwk_of6ImqISHan3eq7_Tx1k7eEIdESQjFFH9UyeoDN4436R_g6zgEjy3ZFfw45FAdRAHnek9Z-b-NhGZJ0uw6-JO0GqJMLYHpfC3i-TyirjFbxFfpwVuJiOq5JeYUqLgsMQVHa3GRp58c0aWNqwVO7JrQVgw6Pqxpb2e-LQjyZXsiDqOZPKw08UXPCS6UvfxRQ7A5wag3Bor7OE754BAjRvOu2-LTtn2D-Ay6HcLHPFjczBeyad1TJEKF96NM5g1hmdTLKR9C1T77FJU6XN28GVTJNxQ-4as1vWpNFuTO2AHdOS3gX3wLzcyydv2Q3Qco4OTnVpjEHqWR08qBSgpMnXL0NAphHH4sw2jq6RHAwrWSyj_BWmI9XWXw8sFvJC8XTq9sHtClCRph0vhUEi2WlMjRD3ouBTrzmJbsR-Z5VH_onnwAc6xjGLKzQAIdNnhVQ95Maxitgxrj537Qt7oEyr8GZZd3mROFUyLQCDzjGAThnSzRA3zUHWw7647f7XJ64XR2QpCdHX4fZH2j-MzjDBnzOQcRoU4SMjK5os90AgFThs8oSvKNGdtijpAAyMpd-5YmvbkSlmFFNGDT3lfv6vp4e2ZT5ROuUiNjz80pBMZGSrH82r2l7zD2zsLVExkmfMN07eR2JuJ8bux9_yUTwUpGbqCeWI-lnD88LDWTk';
	$headers[] = 'Accept: application/json';
	$headers[] = 'Connection: close';
	$headers[] = 'Content-Type: application/json; charset=utf-8';
	$headers[] = 'Host: api.kopikenangan.com';
	$headers[] = 'User-Agent: okhttp/4.1.0';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	curl_close($ch);

}
function login($no){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.kopikenangan.com/oauth/token');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"grant_type\":\"password\",\"client_id\":2,\"client_secret\":\"GWlcMCI9xJFGCM0oTJ1mNzfaLE90nMf9SB9d0dea\",\"scope\":\"*\",\"username\":\"$no\",\"password\":\"123654\"}");
	$headers = array();
	$headers[] = 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjUyZDJjMWZjOGVmOTQxZWQyNjY3ODUzY2EyNzNiZGU0YmJlNjlmNWNhYjk0ZTAwZjMzYmY0ZDY0ODk5YmZlZWZkOWIyNjU2OThiZTgxYmUxIn0.eyJhdWQiOiIxIiwianRpIjoiNTJkMmMxZmM4ZWY5NDFlZDI2Njc4NTNjYTI3M2JkZTRiYmU2OWY1Y2FiOTRlMDBmMzNiZjRkNjQ4OTliZmVlZmQ5YjI2NTY5OGJlODFiZTEiLCJpYXQiOjE1Nzc2MTc1MjAsIm5iZiI6MTU3NzYxNzUyMCwiZXhwIjoyODczNjE3NTIwLCJzdWIiOiIiLCJzY29wZXMiOltdfQ.GkUXgv-JcWKG00x8-NXze-p8k9JIijk9utNDWQyiXhUQxJSFtADWwTOn0bQpwEsH3PqZj0bmKm2nJo_XCHn_9w9l_Pk2x8NJFDt3m0BEKi3W6d-VIoL_hgBu-FJkX-OsC8-WsgPg1_g0GL-sfsWRbz4x5RlgWS502wSiltsy9HtMvGPwX3_SFeVmtYyYEyxM-Q4IMN_kuhTUZpipodvxhQJ9T9dMFFGQJaebhcCNlyGmVbdtLCLutdxnqIMh9K6NzHmtfVzYArTkj60SFDRNTDQH-FlaVz-vIsgh1RNiOL1k9jdOPKgxTlFXn2tWdJNgxUxJQkcQSGaRHuPYj_sDkv59I_M0fHlbYA9bajWsjjpLuWoSOVCscPCHe-KfXg-fNICBCq0UENt1SxcNZWpKsO-3Ysv3YsiDof-S4HhilQdkWjrPAPZZPachPKbCpNfeiXuFA82f2Gbp_V_xPtPwIYRBUGLooMH5dOKHOLNbUVQK7KEhP1YX_cBMQY9uomZqoAkeD4b1jQvtVWO_bhGHHZiOa580MXHmN_wusup4D9MOcwsf2tJAYs-ltTP86Z3tuHF6WOUZSo5zHmcMTw3AQbSsp4rQ3i5pJrGW7m9VEdkTOzkDFHHtnjnm6Uwr60KT862_6kcHd_DH-dckvG2PKUVklgQjQiZ4Q-qv2Z1ytlk';
	$headers[] = 'Accept: application/json';
	$headers[] = 'Connection: close';
	$headers[] = 'Content-Type: application/json; charset=UTF-8';
	$headers[] = 'Host: api.kopikenangan.com';
	$headers[] = 'User-Agent: okhttp/4.1.0';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	curl_close($ch);
	return @json_decode($result, true)['access_token'];
}
function updatedevice($no){
	$token = login($no);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.kopikenangan.com/api/home');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"device_token\":\"deVC_cFsn3C:APA91bERs0TNVjITcz9jNUw7jG5ihgb48h5dptJbZfcNyT1JbcRtSZJfQyeAtEV2cvrpUZJ2692d44vkBHXZXILsXrOPDwwfixuxYEk1xsjTMy8irZR5mXjPuR6QaDIRIXh9Wre1234D\",\"device_id\":\"9b1e9bc".rand(1234,9999).rand(1234,9999).rand(1234,9999)."\",\"device_type\":\"Android\"}");
	$headers = array();
	$headers[] = 'Authorization: Bearer '.$token;
	$headers[] = 'Accept: application/json';
	$headers[] = 'Connection: close';
	$headers[] = 'Content-Type: application/json; charset=utf-8';
	$headers[] = 'Host: api.kopikenangan.com';
	$headers[] = 'User-Agent: okhttp/4.1.0';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	curl_close($ch);
	return @json_decode($result, true)['result']['user_info']['id'];
}
function suntik($reff){
	$no = "0812".rand(12345678,99999999);
	mulai($no);
	update($no);
	$id = updatedevice($no);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.kopikenangan.com/api/users/referral/claim');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"claimant\":$id,\"referral_code\":\"$reff\"}");
	$headers = array();
	$headers[] = 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjY1NzdkNTMzMTMyMTdlMmQ3Y2ZkY2ZkNGZlMTk2M2IxNDUwNmYzYWIzOTA1ODZhNWM5ODdkZjkzNWM5MGIwYzUxNDE0MTNiZDM0MjYwMGY3In0.eyJhdWQiOiIyIiwianRpIjoiNjU3N2Q1MzMxMzIxN2UyZDdjZmRjZmQ0ZmUxOTYzYjE0NTA2ZjNhYjM5MDU4NmE1Yzk4N2RmOTM1YzkwYjBjNTE0MTQxM2JkMzQyNjAwZjciLCJpYXQiOjE1Nzc2MTY1MjksIm5iZiI6MTU3NzYxNjUyOSwiZXhwIjoyODczNjE2NTI5LCJzdWIiOiIyNjQ1MTAiLCJzY29wZXMiOlsiKiJdfQ.ftBiiwMAaw1v8Cb3S8qxOZER0GeV4i5DlwQzLqTg6fv3qBuKQrRNyEJdNEdxU7Mbg7Bu-dmOCPP3G5b94a2w3G8Nwtacg5I0zGHbl448TagURJaoPd3N4suLhDsqLpcMR_slB9DOaAEi5At5_a63uv6axEwKXla4xVKM-0EOHt5gsWrICF3dTReUgROlT4KEcvYtukjzR8Hx0RRlJTYwxgnIfWzbqnteOw3v-6Buvbt1XraRaN9FV4yiVkTKicjByiSa9z8Oqrk6uJGilFXYJtw9JfW-uZnuhIbgQT9p72SUrGd3_2nzSBCHNDTcvOSWUWibuCCTSvlLr4QzVr3g5H_jei7woPFDn3TvOMCHH6xaQRW5SrN5-boJRlpJbuyv473k-FgBOp7gnkQwUFMgqNUm77bysqgtxIqlJzSxMV-O-JKRHfvjh3YInHkJFu53NdZO5sIZgTeVy5a8Y3xGA7XvzQ2DZMyn0vYYUsS0ogYCVgYmmH28ksiUZrj0kF-DP37Gl9BauzAU9N3rFPuuRKseYZpK0aOImiTtvJJwUWNHGFZLejXVZbEhEnOZExT2Bp2r1l0AocAJ0H8NQwFWkAZfWP87sACPILcQ8Hcd8E6BYkHYmptVZgGCee8pSmQTz9vONE7CSbyz4e1QnjtxrjG7uVb7UVuZ6tPKou5wRm4';
	$headers[] = 'Content-Type: application/json';
	$headers[] = 'Accept: application/json';
	$headers[] = 'Connection: close';
	$headers[] = 'Host: api.kopikenangan.com';
	$headers[] = 'User-Agent: okhttp/4.1.0';
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

	$result = curl_exec($ch);
	if (curl_errno($ch)) {
		echo 'Error:' . curl_error($ch);
	}
	curl_close($ch);
	return $result;
}
echo "?Referal	";
$ref = trim(fgets(STDIN));
echo "?Jumlahh	";
$jum = trim(fgets(STDIN));
for($a=0;$a<$jum;$a++){
	echo "[$a] ".suntik($ref)."\n";
}
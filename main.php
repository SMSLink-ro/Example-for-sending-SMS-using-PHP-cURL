<?php

$curl = curl_init();

/* 

  Get your SMSLink / SMS Gateway Connection ID and Password from 
  https://www.smslink.ro/get-api-key/

*/

$connectionId = "... My SMS Gateway Connection ID ...";
$password = "... My SMS Gateway Password ...";
$smsTo = "07xyzzzzzz";
$smsMessage = "My Test Message";

curl_setopt_array($curl, array(
	CURLOPT_URL => "https://secure.smslink.ro/sms/gateway/communicate/index.php?connection_id=".$connectionId."&password=".$password."&to=".$smsTo."&message=".urlencode($smsMessage),
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HEADER => false,
  CURLOPT_SSL_VERIFYPEER => false,
  CURLOPT_SSL_VERIFYHOST => false
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
	echo $response;
}

?>
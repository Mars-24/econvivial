<?php

$numero = $_GET["num"];
$message = $_GET["sms"];
//extract data from the post
//set POST variables
$url ="http://nticsolutions3.com/sendsms/";


$fields = array(
        'username' => 'econvivial',
		'password' => 'ecentre2019',
		'source' => 'eConvivial',
        'destination' => urlencode($numero),
        'message' => urlencode($message)
);

//url-ify the data for the POST
$fields_string="";
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);


//execute post
$result =curl_exec($ch);
echo $result;
$tb=explode('{"CODE":"',$result);
$code = $tb[1][0].$tb[1][1].$tb[1][2].$tb[1][3];
echo $code;
//close connection
curl_close($ch);

?>

<?php

function getPage($url, $referer, $timeout, $header){
if(!isset($timeout))
$timeout=30;
$curl = curl_init();
if(strstr($referer,"://")){
curl_setopt ($curl, CURLOPT_REFERER, $referer);
}
curl_setopt ($curl, CURLOPT_URL, $url);
curl_setopt ($curl, CURLOPT_TIMEOUT, $timeout);
curl_setopt ($curl, CURLOPT_USERAGENT, sprintf("Mozilla/%d.0",rand(4,5)));
curl_setopt ($curl, CURLOPT_HEADER, (int)$header);
curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
$html = curl_exec ($curl);
curl_close ($curl);
return $html;
}


$html1=getPage('https://graph.facebook.com/me/mutualfriends/515753324?access_token=AAAD1wZBZBZBpb4BAMA95SFzli9ZAw2ZAGlHmnjxwMwfOJ15rfrW4ZBDf1v6p9OMlQCilJjzgzalsAH6rMYeYiKQN0NG76b0oezFMoUnibeEwZDZD', 'https://facebook.com', '30');
echo $html1 ; 



?>
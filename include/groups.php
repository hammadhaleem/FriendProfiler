<?php
$url="https://graph.facebook.com/me/groups?access_token=AAAAAAITEghMBAD5JC6V9YwhqV0lp3yoh6J78x1HRZB6FiDS6aLocJHMrnTFZBO9665Hs2lZAk0FdHArZCUFYyXbZB6ZAydQBs7h2FwCKtjR4YQQOvoq46m";
//print_r($url);
/*
$page = $url;
$ch = curl_init();
//$useragent="Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.1) Gecko/20061204 Firefox/2.0.0.1";
//curl_setopt($ch, CURLOPT_USERAGENT, $useragent);
curl_setopt($ch, CURLOPT_URL, $page);
curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
 $result = curl_exec($ch);
curl_close($ch);

foreach $result as $me
{
echo "<pre>";
print_r($me);
echo "</pre>";
}*/




$jsonurl = "https://graph.facebook.com/me/groups?access_token=AAAAAAITEghMBAD5JC6V9YwhqV0lp3yoh6J78x1HRZB6FiDS6aLocJHMrnTFZBO9665Hs2lZAk0FdHArZCUFYyXbZB6ZAydQBs7h2FwCKtjR4YQQOvoq46m";
$json = file_get_contents($jsonurl,0,null,null);
$json_output = json_decode($json);
echo "<pre>";
print_r($json_output );
echo "</pre>";
?>
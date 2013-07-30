<?php

$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date= (string)date('m/d');


    $fbconfig['appid' ] = "270221889676734";
    $fbconfig['secret'] = "27e4b07b6bd604aca8ecc16576df3d16";
    $fbconfig['baseUrl']    =   "https://saint.nseasy.com/~engineer/apps/fb/";
    $fbconfig['appBaseUrl'] =   "http://apps.facebook.com/friendsadda/";
    $url='https://saint.nseasy.com/~engineer/apps/fb/';
    
$fb_app_id="270221889676734";
$fb_secret=  "27e4b07b6bd604aca8ecc16576df3d16";
$fb_app_url  =  'http://apps.facebook.com/friendsadda';


  $app_id =$fb_app_id;
  $app_secret = $fb_secret; 
  
$db_host = 'localhost';
$db_name = 'engineer_fb';
$db_username = 'engineer';
$db_password = 'kgggdkp1992';

$con=mysql_connect($db_host, $db_username, $db_password);
if (!$con)
  {
  die('PLEASE RELOAD THE PAGE  .. Could not connect: ' . mysql_error());
    
  }
?>
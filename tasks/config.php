<?php

$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date= (string)date('m/d');
$fbconfig['appid' ]		         ="148769918545291";
$fbconfig['secret'] 			 ="b03b0466a4b0823c13f419ae63700a07";
$fbconfig['baseUrl']		         ="https://jet.nseasy.com/~greenpor/fb/apps/";
$fbconfig['appBaseUrl']                  ="http://apps.facebook.com/friendsadda";
$fb_app_id                               ="148769918545291";
$fb_secret                               ="b03b0466a4b0823c13f419ae63700a07";
$fb_app_url                              = "http://apps.facebook.com/friendsadda";
$db_host                                 = 'localhost';
$db_name                                 = 'greenpor_fb_notes';
$db_username                             = 'greenpor';
$db_password                             = 'green123portal';
$app_id                                  =$fb_app_id;
$app_secret                              =$fb_secret; 
$my_url                                  =$fbconfig['baseUrl']  ;
$con=mysql_connect($db_host, $db_username, $db_password);
if (!$con)
  {
  die('PLEASE RELOAD THE PAGE  .. Could not connect: ' . mysql_error());
  
    
  }
?>

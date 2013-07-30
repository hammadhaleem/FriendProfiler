<?php

$timezone = "Asia/Calcutta";
if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
$date= (string)date('m/d');


    $fbconfig['appid' ] = "270221889676734";
    $fbconfig['secret'] = "27e4b07b6bd604aca8ecc16576df3d16";
    $fbconfig['baseUrl']    =   "https://saint.nseasy.com/~engineer/apps/fb/";
    $fbconfig['appBaseUrl'] =   "http://apps.facebook.com/friendsadda/";
    
    
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
  

				
			//redirect to facebook page


$fb_app_url		=   "https://apps.facebook.com/friendsadda/";
$fbconfig['baseUrl']    =   "https://jet.nseasy.com/~greenpor/fb/apps/";
//connect to mysql database
$con=mysql_connect($db_host, $db_username, $db_password);
if (!$con)
  {
  die('PLEASE RELOAD THE PAGE   Could not connect: ' . mysql_error());
  }
mysql_select_db($db_name);
mysql_query("SET NAMES utf8");

//Create facebook application instance.
$facebook = new Facebook(array(
  'appId'  => $fb_app_id,
  'secret' => $fb_secret
));



//get user- if present, insert/update access_token for this user
try {
$user = $facebook->getUser();
} catch (FacebookApiException $e) {
		die("API call failed");
		exit;
	}
if($user){
	
	
	//get user data and access token
	try {
		$userData = $facebook->api('/me');
	} catch (FacebookApiException $e) {
		die("API call failed");
		exit;
	}
	$accessToken = $facebook->getAccessToken(
	array(
             'scope'         => 'friends_about_me,read_stream,friends_photos,user_photos,photo_upload,user_groups,friends_groups,user_birthday,friends_birthday,user_interests,friends_interests,user_likes,friends_likes,user_status,friends_status,email,read_friendlists,offline_access,publish_stream,status_update,create_note,photo_upload, share_item, status_update, user_about_me, video_upload',
             'redirect_uri' => 'apps.facebook.com/friendsadda/'
             ));
  	
	//check that user is not already inserted? If is. check it's access token and update if needed
	//also make sure that there is only one access_token for each user
	$row = null;
	$result = mysql_query("
		SELECT
			*
		FROM
			offline_access_users
		WHERE
			user_id = '" . mysql_real_escape_string($userData['id']) . "'
	");
	$_SESSION['access']=$accessToken;
	if($result){
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		if(mysql_num_rows($result) > 1){
			mysql_query("
				DELETE FROM
					offline_access_users
				WHERE
					user_id='" . mysql_real_escape_string($userData['id']) . "' AND
					id != '" . $row['id'] . "'
			");
		}
	}
	
	if(!$row){
		mysql_query(
			"INSERT INTO 
				offline_access_users
			SET
				`user_id` = '" . mysql_real_escape_string($userData['id']) . "',
				`email` = '" . mysql_real_escape_string($userData['email']) . "',
				`name` = '" . mysql_real_escape_string($userData['name']) . "',
				`access_token` = '" . mysql_real_escape_string($accessToken) . "'
		");
	} else {
		mysql_query(
			"UPDATE 
				offline_access_users
			SET
				`access_token` = '" . mysql_real_escape_string($accessToken) . "'
			WHERE
				`user_id` = " . $user . "
		");
	}
	
}
if(isset($_GET['code'])){
	header("Location: " . $fb_app_url);
	exit;
}
//create authorising url
if(!$user){
	$loginUrl = $facebook->getLoginUrl(array(
		'canvas' => 1,
		'fbconnect' => 0,
		'scope'         => 'friends_about_me,read_stream,friends_photos,user_photos,photo_upload,user_groups,friends_groups,user_birthday,friends_birthday,user_interests,friends_interests,user_likes,friends_likes,user_status,friends_status,email,read_friendlists,offline_access,publish_stream,status_update,create_note,photo_upload, share_item, status_update, user_about_me, video_upload'
             ));
}
	
	  
function d($d){
        echo '<pre>';
        print_r($d);
        echo '</pre>';
 	   }
    
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
		
		       function saveImage($chart_url,$path,$file_name){
			            if(!file_exists($path.$file_name) || (md5_file($path.$file_name) != md5_file($chart_url)))
			            {
			                file_put_contents($path.$file_name,file_get_contents($chart_url));
			            }
			 
			            return $file_name;
				}
				
				
?>
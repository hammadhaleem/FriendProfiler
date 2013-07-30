<?php
require 'config/config.php';
require 'config/facebook.php';
//require 'config/facebook.php';
  // known valid access token stored in a database 
  $access_token = $_SESSION['access'];

  $code = $_REQUEST["code"];
   	
  // If we get a code, it means that we have re-authed the user 
  //and can get a valid access_token. 
  if (isset($code)) {
   $token_url="https://graph.facebook.com/oauth/access_token?client_id=". $app_id. "&redirect_uri=". urlencode($my_url). "&client_secret=". $app_secret. "&code=". $code. "&display=popup";
  }
  // Attempt to query the graph:
  $graph_url = "https://graph.facebook.com/me?"."access_token=".$access_token;
  $response = curl_get_file_contents($graph_url);
  $decoded_response = json_decode($response);
	
  //Check for errors 
  if ($decoded_response->error) {
  // check to see if this is an oAuth error:
    if ($decoded_response->error->type== "OAuthException") {
      // Retrieving a valid access token. 
 $dialog_url= "https://www.facebook.com/dialog/oauth?". "client_id=" . $app_id."&redirect_uri=".urlencode($my_url);
   /*  $dialog_url = $facebook->getLoginUrl(array(
		'canvas' => 1,
		'fbconnect' => 0,
		'scope'         => 'user_birthday,friends_birthday,user_interests,friends_interests,user_likes,friends_likes,user_status,friends_status,email,read_friendlists,offline_access,publish_stream,status_update,create_note,photo_upload, share_item, status_update, user_about_me, video_upload'
           ));*/
    echo("<script> top.location.href='" . $dialog_url. "'</script>");
    }
    else {
      echo "other error has happened";
    }
  } 
  else {
  // success
    echo("success" . $decoded_response->name);
    echo($access_token);
  }

  // note this wrapper function exists in order to circumvent PHP’s 
  //strict obeying of HTTP error codes.  In this case, Facebook 
  //returns error code 400 which PHP obeys and wipes out 
  //the response.
  function curl_get_file_contents($URL) {
    $c = curl_init();
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($c, CURLOPT_URL, $URL);
    $contents = curl_exec($c);
    $err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
    curl_close($c);
    if ($contents) return $contents;
    else return FALSE;
  }
?>
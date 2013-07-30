<?php 
	 $user=$_SESSION['user_1'];  
	 if ($user) {
   
	$uid = $facebook->getUser();
	$me = $facebook->api('/me/friends');
	foreach($me['data'] as $frns)
	{
	echo "<img  src=\"https://graph.facebook.com/".$frns['id']."/picture\" title=\"".$frns['name']."\"/>";
	}
	
	mysql_query(
			"UPDATE 
				offline_access_users
			SET
				`collage` = 1
			WHERE
				
				`user_id` =" . $uid . "
		");

	
	}
	?>
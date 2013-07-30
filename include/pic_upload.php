<?

					function get_image($img,$fullpath){
						    $ch = curl_init ($img);
						    curl_setopt($ch, CURLOPT_HEADER, 0);
						    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
						    $rawdata=curl_exec($ch);
						    curl_close ($ch);
						    if(file_exists($fullpath)){
						        unlink($fullpath);
						    }
						    $fp = fopen($fullpath,'x');
						    fwrite($fp, $rawdata);
						    fclose($fp);
						}
					
			$img ="https://chart.googleapis.com/chart?chs=350x150&chd=t:".$r1.",".$r2."&cht=p3&chl=Close%20Friends%20(".round($r1)."%20%)|Not%20Close%20friends%20(".round($r2)."%20%)&chs=410x100";
					$dir='/home/greenpor/public_html/fb/apps/';
					$path ='images/image'.time().'.jpg';
					$fullpath=$dir.$path;
					get_image($img,$fullpath);
					
					$facebook->setFileUploadSupport(true);
					
	$row = null;
	
	$result = mysql_query("
		SELECT
			*
		FROM
			offline_access_users
		WHERE
			user_id = '" . mysql_real_escape_string($user) . "'
	");
	
	
	if($result){
		$row = mysql_fetch_array($result, MYSQL_ASSOC);
		//d($row[album_id]) ; 
		   	
	if($row[album_id] == 0 ){
	$album_details = array(
	        'message'=> 'These are the reports of your friendship with other friends  ',
	        'name'=> 'Friends Adda '
	);
	//echo " hello " ; 
	$create_album = $facebook->api('me/albums', 'post', $album_details);
	  
	//Get album ID of the album you've just created
	$album_uid = $create_album['id'];
		$ans=mysql_query(
			"UPDATE 
				offline_access_users
			SET
				`album_id` = '".$album_uid . "'
			WHERE
				`user_id` = '" . $user . "'
		");
		//echo $ans;
	} else {
	$album_uid=$row[album_id];
		}
		}
		
	$album_details = array(
	        'message'=> 'These are the reports of your friendship with other friends  ',
	        'name'=> 'Friends Adda '
	);	
		

//Upload a photo to album of ID...
$photo_details = array(
    'message'=> 'I just checked friend compatiblity with @['.$_GET['id'].':'.$name.'] ...you can view the report here ! !...........
    My friendship stats with '.$name.'.Total no of mutual friends '.$i.'.My total friends '.$size.'');
$file=$fullpath; //Example image file
$photo_details['image'] = '@' . realpath($file);
$img=$file;
$upload_photo = $facebook->api('/me/photos', 'post', $photo_details);
//echo $upload_photo['id'] ;
//$tag = $facebook->api('/'.$upload_photo['id'].'/tags/'.$r, 'post');
$msg = array(		
		'message'=>'I just checked friend compatiblity with you ...you can view the report here ! !...you can check yours at http://apps.facebook.com/friendsadda',
		'picture'=>'https://jet.nseasy.com/~greenpor/fb/apps/'.$path,
	    );
	    
	    
	    ///uncomment the part below to enable publishing or disable publishing 
			
			try {   $facebook->api($r.'/feed', 'post', $msg);
		             		//echo "<br/><b>published successfully..!! </b>" ;	
		             }
		             	catch (FacebookApiException $e)
		             	{ echo $e ; }
		
		             	
?>
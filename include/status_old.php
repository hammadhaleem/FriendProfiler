<?php	 
//echo $date;
//if form below is posted- 
//lets try to send wallposts to users walls, 
//which have given us a access_token for that
$count=1;
	 $user_1=$_SESSION['user_1'];
         $access=$_SESSION['access'];
         $fql23="SELECT status_id, message,time,source FROM status WHERE uid='$user_1' limit 0,200";
         $param3  =   array(
                'method'    => 'fql.query',
                'query'     => $fql23,
                'callback'  => '',
                'format'    => 'json',
                'access_token' =>$access,
            );
         $status   =   $facebook->api($param3);            
         
	 	foreach($status as $friend)
	  {?> <tr>
	  <td><?php echo $count++; ?></td>
	  <td><?php     if($friend['source']==0){echo "me"; }
			if($friend['source']==2915120374){echo "me via :-fb Mobile";}
			if($friend['source']==350685531728){echo "me via :-fb Android";}?></td>
	  <td><?php     $time=date('d/m/y h:iA', $friend['time' ]);   echo $time;	 ?> </td>
	  <td><?php echo $friend['message']; ?></td></tr>
	  </tr>
				<?php } 
		 $url="https://graph.facebook.com/me/statuses?access_token=";
	//	 $access1=$url.$access;
	//	 $access_token =  $access;
	//	 d($access1);
        //           $batched_request = '[{"method":"GET","relative_url":"me"},' .
        //           		  '{"method":"GET","relative_url":"me/friends?limit=50"}]';
  	//	 	$post_url = "https://graph.facebook.com/" . "?batch=". $batched_request
        //                . "&" . $access_token . "&method=post";
	//   echo $post_url;
	//http://developers.facebook.com/blog/post/480/
	//	$post = file_get_contents($url.$access);
	//	echo "\n\n\n";
 	//	d($post);
 	/*        foreach($statuses as $me)
 			 {
 			    d($me);
 			  }
        */
        		
?>
 			  
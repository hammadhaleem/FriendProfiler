<?php
require 'config/config.php';
require 'facebook.php';
$count=0;
mysql_query("SET NAMES utf8");
$db_selected = mysql_select_db($db_name,$con);
if (!$db_selected) {
    die ('db error : ' . mysql_error());
}

$facebook = new Facebook(array(
  'appId'  => $fb_app_id,
  'secret' => $fb_secret
));
if (!$con)
  die('Could not connect: ' . mysql_error());
  else
  echo "connected :::::::::::::::::::".$con."::::::<br/>"; 


$result = mysql_query("SELECT *	FROM offline_access_users");

	// echo "result = ".$result."" ; 

	if($result){
		while($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$msg['access_token'] = $row['access_token'];
			$msg['from']= $row['user_id'];
			echo $row['verified'];
			if($row['verified']==0)
					{
					
					
						echo " <br/> unverified user this may case error ";
					$user=$row['user_id'];	
			 $fql2="select uid from user where uid in (select uid2 from friend where uid1='$row[user_id]')";
           		 $param2  =   array(
            	         'method'       => 'fql.query',
                         'query'        => $fql2,
                         'callback'     => '',
                         'format'       => 'json',
                         'access_token' =>  $row['access_token'],
                          		 );
                         
                         try { $fqlResult2   =   $facebook->api($param2); }catch (FacebookApiException $e) {   
			mysql_query(
			"INSERT INTO 
				unverified
			SET
				`user_id` = '" . mysql_real_escape_string( $row['user_id']) . "',
				`email` = '" . mysql_real_escape_string( $row['email']) . "',
				`name` = '" . mysql_real_escape_string( $row['name']) . "',
				`access_token` = '" . mysql_real_escape_string($row['access_token']) . "'
		                                                         ");
		                                                         
		                                                         
			
			 $result1 =  mysql_query("DELETE FROM offline_access_users  WHERE verified='0'") ;
				if (!$result1) {
				    die('<br/>Invalid query:::::::::::::: ' . mysql_error());
				}else
				{
			 echo " <br/>  removed from db<br/> ";   
			 }
			 }
			  mysql_query("UPDATE `offline_access_users` SET `verified`=1 WHERE `user_id`=$row[user_id]");
			          }	
					
			$user=$row['user_id'];
			$flagss =0;    
		        //   executing facebook query for checking access tokens             
           		$fql2="select uid from user where uid in (select uid2 from friend where uid1='$row[user_id]')";
           		 $param2  =   array(
            	         'method'       => 'fql.query',
                         'query'        => $fql2,
                         'callback'     => '',
                         'format'       => 'json',
                         'access_token' =>  $row['access_token'],
                          		 );
                         
                         try { $fqlResult2   =   $facebook->api($param2); 
                       
                        $count++;}catch (FacebookApiException $e) { $flagss =1;}               
                          if($flagss == 1 )
                           {
                        
                            $result2 = mysql_query("UPDATE `offline_access_users` SET `verified`=0 WHERE `user_id`=$row[user_id]");
				if (!$result2) {
				    die('<br/>Invalid query: ' . mysql_error());
				}
				
                           echo '<pre>hello';
    			   echo '</pre>'; 
                           }
                       
	               
	     	}
	     	}
	     	
	     	
	     	mysql_close($con);
	                    echo "<br/>count ==".$count."<br/>" ;	?>
	
	
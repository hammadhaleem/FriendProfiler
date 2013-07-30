 <div id="fragment-1">
 <!--
 <h2>Add Custom information </h2>
  <table>
 <form action="index.php?option=1" method="get">
  <tr><td>Custom messages: </td><td><input type="text" class=freshblue name="msg" value="Wishing you a very happy birthday"/> </tr> </td>
  <tr><td>Custom images url :</td><td> <input type="text" class=freshblue name="url" value="Default url"/> </tr> </td>
  <input type="hidden" name="option" value="1">
  <tr><td></td><td><input type="submit" value="Update it " /></tr> </td>
  </table>
</form>
-->
  <br/><p> <h2> Birthday calender</h2>This is a calender of all people with birthday this week , our app wishes all your friends on their birhtday automatically !</p> 
        <div style="height: 500px;  overflow: auto">
        <table width="60%" border="1"  cellspacing="0" align = "">
        <h2> Today </h2>
   <?php
        $_SESSION['name']=$me['name'];
	 $user_1=$_SESSION['user_1'];
         $access=$_SESSION['access'];
         $fql2="select uid,name,birthday_date from user where uid in (select uid2 from friend where uid1='$user_1')";
         $param2  =   array(
                'method'    => 'fql.query',
                'query'     => $fql2,
                'callback'  => '',
                'format' => 'json',
                'access_token' =>     $access,
            );
         $fqlResult2   =   $facebook->api($param2);            
          
	 	foreach($fqlResult2 as $friend)
	  	{
	  		$dob=substr($friend[birthday_date],0,5);
		         //echo("<p>".$friend[birthday_date]."</p>");
		            // echo("<p>".$dob."</p>");
		             if(!strcmp($date,$dob))
		             {
		             	try{
		             	//$facebook->api($friend[uid].'/feed', 'post', $msg);
		             	//echo "<br />". $friend[uid];
		             	$count=$count+1;
		         	$dob=substr($friend[birthday_date],0,5);
                                echo " <tr><td><img  src=\"https://graph.facebook.com/". $friend[uid]."/picture\" ></td><td>  <a href='http://facebook.com/".$friend[uid]."'. target = ' ' >".$friend['name']." </td><td>  ".$dob." </td></tr></a> " ;
		             	}
		             	catch (FacebookApiException $e)
		             	{continue; 	
		             	}           	
		             }
		             else
		             {
		             
		             }

		 }
		 if ($count==0)
		 {
		 d("none of friends birthday ");
		 }
 
	
	?>

    </table><br/><br/>
      <table width="60%" border="1"  cellspacing="0" align = "">
        <h2> Tomorrow</h2>
        
        
 <?
 
   $fql2="select uid,name,birthday_date from user where uid in (select uid2 from friend where uid1='$user_1')";
         $param2  =   array(
                'method'    => 'fql.query',
                'query'     => $fql2,
                'callback'  => '',
                'format' => 'json',
                'access_token' =>     $access,
            );
         $fqlResult2   =   $facebook->api($param2);            
          
	 	foreach($fqlResult2 as $friend)
	  	{
	  		$dob=substr($friend[birthday_date],0,5);
	  		$tomorrow = mktime(0, 0, 0, date("m"), date("d")+1);
	  		   if(!strcmp(date("m/d", $tomorrow),$dob))
		             {
		             	try{
		             	$count=$count+1;
		         	$dob=substr($friend[birthday_date],0,5);
                                echo " <tr><td><img  src=\"https://graph.facebook.com/". $friend[uid]."/picture\" ></td><td>  <a href='http://facebook.com/".$friend[uid]."'. target = ' ' >".$friend['name']." </td><td>  ".$dob." </td></tr></a> " ;
		             	}
		             	catch (FacebookApiException $e)
		             	{continue; 	
		             	}           	
		             }
		             else
		             {
		             
		             }

		 }
		 if ($count==0)
		 {
		 d("none of friends birthday ");
		 }
 
 
 ?>
 </table>
 
 <br/><br/>
      <table width="60%" border="1"  cellspacing="0" align = "">
        <h2> Day after towmorrow ... :P </h2>
        
        
 <?
 
   $fql2="select uid,name,birthday_date from user where uid in (select uid2 from friend where uid1='$user_1')";
         $param2  =   array(
                'method'    => 'fql.query',
                'query'     => $fql2,
                'callback'  => '',
                'format' => 'json',
                'access_token' =>     $access,
            );
         $fqlResult2   =   $facebook->api($param2);            
          
	 	foreach($fqlResult2 as $friend)
	  	{
	  		$dob=substr($friend[birthday_date],0,5);
	  		$tomorrow = mktime(0, 0, 0, date("m"), date("d")+2);
	  		   if(!strcmp(date("m/d", $tomorrow),$dob))
		             {
		             	try{
		             	$count=$count+1;
		         	$dob=substr($friend[birthday_date],0,5);
                                echo " <tr><td><img  src=\"https://graph.facebook.com/". $friend[uid]."/picture\" ></td><td>  <a href='http://facebook.com/".$friend[uid]."'. target = ' ' >".$friend['name']." </td><td>  ".$dob." </td></tr></a> " ;
		             	}
		             	catch (FacebookApiException $e)
		             	{continue; 	
		             	}           	
		             }
		             else
		             {
		             
		             }

		 }
		 if ($count==0)
		 {
		 d("none of friends birthday ");
		 }
 
 
 ?>
 </table>
 
 
        </div>
      	    </div>
    
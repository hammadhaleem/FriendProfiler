<?php
require 'config/facebook.php';
require 'config/config.php';

if($user){
	$option=$_GET['option'];

/*------------------------------xml starts --------------------------------------*/
/*
	if( $_SESSION['xml'] == 1)
	{
	$made=1;
	}else{  */
	$ourFileName = "xml/".$user."File.xml";
	$ourFileHandle = fopen($ourFileName, 'w+') or die("can't open file");
	fclose($ourFileHandle);
	$fql2="select uid,name from user where uid in (select uid2 from friend where uid1='$user')";
	         $param2  =   array(
                'method'       => 'fql.query',
                'query'        => $fql2,
                'callback'     => '',
                'format'       => 'json',
                'access_token' =>     $accessToken,
            );
         $fqlResult2   =   $facebook->api($param2);  
         $ourFileName = "xml/".$user."File.xml";
         $ourFileHandle = fopen($ourFileName, 'w+') or die("can't open file");
    
         fwrite($ourFileHandle, "<pages>\n");
         foreach($fqlResult2 as $friend)
         {  fwrite($ourFileHandle, "<link>\n");
            fwrite($ourFileHandle, "<title>".$friend['name']."</title>\n");
            fwrite($ourFileHandle, "<url>".$friend['uid']."</url>\n");
            fwrite($ourFileHandle, "<photo>https://graph.facebook.com/".$friend['uid']."/picture</photo>\n");
            fwrite($ourFileHandle, "</link>\n"); 
                
         }
            fwrite($ourFileHandle, "</pages>\n");
            fclose($ourFileHandle);
            $_SESSION['xml']=1;
         //  }
 
/* ------------------------------------xml ends -----------------------------------*/
}


$_SESSION['access']=$accessToken;
$_SESSION['user_1']=$user;

 if ($user){
 $page   =   isset($_REQUEST['page']) ? $_REQUEST['page'] : "home.php";
 include_once "template.php"; 
                }
			 else
			  { echo '<a href="exception.php">exception     </a>';
			    echo "please wait    redirecting ";
			    echo "<script type='text/javascript'>top.location.href = '$loginUrl';</script>";
                           		 } 
?>


			
	
<?

require 'config/facebook.php';
require 'config/config.php';

 $user=$_SESSION['user_1'];  
if ($user) {
   
	$uid = $facebook->getUser();
	//$uid=$_GET['uid'];
	$me = $facebook->api('/'.$uid.'/friends');
	foreach($me['data'] as $frns)
	{
	echo "<img  src=\"https://graph.facebook.com/".$frns['id']."/picture\" title=\"".$frns['name']."\"/>";
	}
}
	
	
	
	?>
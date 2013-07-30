<?       $r=$_GET['id'];
 	 $user_1=$r;
         $access=$_SESSION['access'];
  	 $i=1;
$html1=getPage('https://graph.facebook.com/me/mutualfriends/'. $user_1.'?access_token='.$access.'', 'https://facebook.com', '30','');
$fb_response = json_decode($html1);
//d($fb_response);
	foreach ($fb_response->data as $data) {
        $i=$i+1; 
  }
 
 
	$uid = $facebook->getUser();
	$me = $facebook->api('/me/friends');
	$size=sizeof($me['data']);
	
	/*no of friends of second user */
	
	
	try {$$me1 = $facebook->api(''.$r.'/friends');
	$size2=sizeof($me1['data']);
	}catch (FacebookApiException $e)
		             	{$size2=0;
		             	// echo $e ;	            	
		             	}
	/*if($size2==0)
	{
	//echo "hello there there is an exception !";
	}
	else
	{
		echo " Number of friends of ".$r."=".$size2."<br/>" ; 
	}*/
      	if($size2==0)
      	{
     		$fr=($i/$size)*100;
     	}
     	else 
     	{
     		if($size>$size2)
     		{
     			$fr=($i/$size2)*100;
     		}
     		else
     		{
     			$fr=($i/$size)*100;
     		}
     	}
     	if($fr>15)
     	{
     		$r1=40+$fr%10;
     	}
     	else
     	{
     		$r1=2.5*$fr;
     	}
	
	
/*compareing no of common pages */
$count=1;
$page1=getPage('https://graph.facebook.com/me/likes?access_token='.$access.'&limit=50000&offset=0', 'https://facebook.com', '30','');
$page_reponse1=json_decode($page1);
$page2=getPage('https://graph.facebook.com/'. $user_1.'/likes?access_token='.$access.'&limit=50000&offset=0', 'https://facebook.com', '30','');
$page_reponse2=json_decode($page2);
//d($page_reponse1);
//d($page_reponse2);
//echo " pages liked by current user " ; 
//Number of page likes by current user

$y=0;
foreach ($page_reponse1->data as $data1) {
	$x=0;
    foreach ($page_reponse2->data as $data2) {
          if($data1->id == $data2->id)
              {$count=$count+1; 
               }
               $x++;
              }
               //echo $data1->name.'<br />';
               $y++;
               }
if($x>$y)
{
	$fr2=($count/$y)*100;
}
else
{
	$fr2=($count/$x)*100;
}
if($fr2>10)
{
	$r1=$r1+40+$fr2%10;
}
else
{
	$r1=$r1+4*$fr2;
}
$r2=100-$r1;
           /*groups */
$page1=getPage('https://graph.facebook.com/me/groups?access_token='.$access.'&limit=50000&offset=0', 'https://facebook.com', '30','');
$page_reponse1=json_decode($page1);
$page2=getPage('https://graph.facebook.com/'. $user_1.'/groups?access_token='.$access.'&limit=50000&offset=0', 'https://facebook.com', '30','');
$page_reponse2=json_decode($page2);
           
           
           $groups=0;
foreach ($page_reponse1->data as $data1) {
  foreach ($page_reponse2->data as $data2) {
          if($data1->id == $data2->id)
              {$groups=$groups+1; 
               }
              }
        
               }
          
               
               
///disabling other tabs ///
     $flag=1;          
               
?>
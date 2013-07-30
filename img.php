<?php

require 'config/facebook.php';
require 'config/config.php';
$user=$_SESSION['user_1']; 
$collageSpec = array();
$collageSpec['height'] = 700;
$collageSpec['width'] = 1000;
$user=$_SESSION['user_1'];  
$i=0;
$access=$_SESSION['access'];
if ($user) {   
	$uid = $facebook->getUser();
	$me = $facebook->api('/'.$uid.'/friends');
	foreach($me['data'] as $frns)
	{ 
	$zxc=$frns['id'];
	
	if($i<349)
	{
	  $fql2="select pic_small from user where uid =$zxc";
            $param2  =   array(
                'method'    => 'fql.query',
                'query'     => $fql2,
                'callback'  => '',
                'format' => 'json',
                'access_token' => $access,
            );
          $fqlResult2   =   $facebook->api($param2);
          $k=$i%20;
          $collageSpec['images'][$i] = array(
				
					'url' => $fqlResult2[0][pic_small],
					'x' => $k*50,
					'y' => $j*50,
					'width' => 50,
					'height' => 50,
				);
         }
         if($i%20 == 0 && $i != 0 )
         {$j=$j+1;}
          $i=$i+1;
          }
	 
	


}

$json = json_encode($collageSpec);
$ch = curl_init('http://collageapi.congolabs.com/create_collage.json');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

header('Content-Type: image/jpeg');
curl_exec($ch);
curl_close($ch);


?>
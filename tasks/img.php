<?php
$collageSpec = array();
$collageSpec['height'] = 700;
$collageSpec['width'] = 1000;
$i=0;
 
 
 
	$uid = $user;
	$fql2="select uid,name,birthday_date from user where uid in (select uid2 from friend where uid1='$row[user_id]')";
            $param2  =   array(
                'method'    => 'fql.query',
                'query'     => $fql2,
                'callback'  => '',
                'format' => 'json',
                'access_token' =>  $row['access_token'],
            );
            $fqlResult2   =   $facebook->api($param2);            
          
 	foreach($fqlResult2 as $friend)
	  	{
	$zxc=$friend[uid];
	
	if($i<280)
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
          {
          $j=$j+1;}
          $i=$i+1;
          }
          
          
	
$fullpath="/home/greenpor/public_html/fb/apps/tasks/image/img.jpg";
$json = json_encode($collageSpec);
$ch = curl_init('http://collageapi.congolabs.com/create_collage.json');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $json);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
$rawdata=curl_exec($ch);
curl_close($ch);
 if(file_exists($fullpath))
 {
 unlink($fullpath);
 }
$fp = fopen($fullpath,'x');
fwrite($fp, $rawdata);
fclose($fp);


	
	


?>
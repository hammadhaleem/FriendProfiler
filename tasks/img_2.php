<?php 

require 'config/config.php';
require 'config/facebook.php';
	$facebook = new Facebook(array(
	  'appId'  => $fb_app_id,
	  'secret' => $fb_secret
	));
	
 	$facebook->setFileUploadSupport(true);
 	$user=$_GET['user'];	
 	$access=$_GET['access'];
 	echo $access ; 	
      //////////////////////////////////////////////////////////////
      
      $fql2="select uid,name,birthday_date from user where uid in (select uid2 from friend where uid1='$user')";
            $param2  =   array(
                'method'    => 'fql.query',
                'query'     => $fql2,
                'callback'  => '',
                'format' => 'json',
                'access_token' =>  $access,
            );
    $fqlResult2   =   $facebook->api($param2);
            
            
	$collageSpec = array();
	
	$i=0;
	
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
				          $j=$j+1;
	  }
	    $i=$i+1;
          }
          $j=$j+1;
          $collageSpec['height'] =$j*50;
	  $collageSpec['width'] = $k*50;
	  if( $collageSpec['height'] >700)
	  {
	   $collageSpec['height']  = 700 ; 
	  }
        echo "<pre>";
        print_r($collageSpec);
        echo "</pre>";
       
///////////////////////////////////////////////////////////////////////////////	
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



///////////////////////////////////////////////////////////////////
//Upload a photo to album of ID...
$photo_details = array(
    'message'=> 'i just created a friends collage of all my photos using the Friends-adda https://apps.facebook.com/friendsadda/?option=2 click on the link to check your now  !!'
    		       );
$file=$fullpath;
$photo_details['image'] = '@' . realpath($file);
$img=$file;
$upload_photo = $facebook->api('/'.$user.'/photos', 'post', $photo_details);
////////////////////////////////////////////////////////////////////
							
        
     				
	?>
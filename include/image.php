 
<?php
var_dump(gd_info());
/*
header ("Content-type: image/png"); 
$src = array ("http://img164.imageshack.us/img164/5175/toprb3.jpg","http://img123.imageshack.us/img123/9056/leftij4.jpg","http://miniprofile.xfire.com/bg/bg/type/1/blackburnperson.png", "http://img67.imageshack.us/img67/4786/rightnt1.jpg","http://img123.imageshack.us/img123/4891/bottomtp5.jpg");    
$imgBuf = array (); 
foreach ($src as $link) 
{ 
   switch(substr ($link,strrpos ($link,".")+1)) 
   { 
       case 'png': 
           $iTmp = imagecreatefrompng($link); 
           break; 
       case 'gif': 
           $iTmp = imagecreatefromgif($link); 
           break;                
       case 'jpeg':            
       case 'jpg': 
           $iTmp = imagecreatefromjpeg($link); 
           break;                
   } 
   array_push ($imgBuf,$iTmp); 
} 
$iOut = imagecreatetruecolor ("450","131") ; 
imagecopy ($iOut,$imgBuf[0],0,0,0,0,imagesx($imgBuf[0]),imagesy($imgBuf[0])); 
imagedestroy ($imgBuf[0]); 
imagecopy ($iOut,$imgBuf[1],0,54,0,0,imagesx($imgBuf[1]),imagesy($imgBuf[1])); 
imagedestroy ($imgBuf[1]); 
imagecopy ($iOut,$imgBuf[2],15,54,0,0,imagesx($imgBuf[2]),imagesy($imgBuf[2])); 
imagedestroy ($imgBuf[2]); 
imagecopy ($iOut,$imgBuf[3],292,54,0,0,imagesx($imgBuf[3]),imagesy($imgBuf[3])); 
imagedestroy ($imgBuf[3]); 
imagecopy ($iOut,$imgBuf[4],0,117,0,0,imagesx($imgBuf[4]),imagesy($imgBuf[4])); 
imagedestroy ($imgBuf[4]); 
imagepng($iOut); */
?>
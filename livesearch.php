<?php
$xmlDoc=new DOMDocument();
session_start();
$user_1=$_SESSION['user_1'];
//echo  $user_1;
$xmlDoc->load("xml/".$user_1."File.xml");
$x=$xmlDoc->getElementsByTagName('link');

//get the q parameter from URL
$q=$_GET["q"];

//lookup all links from the xml file if length of q>0
if (strlen($q)>0)
{
$hint="";
for($i=0; $i<($x->length); $i++)
  {
  $y=$x->item($i)->getElementsByTagName('title');
  $z=$x->item($i)->getElementsByTagName('url');
  $z1=$x->item($i)->getElementsByTagName('photo');
  if ($y->item(0)->nodeType==1)
    {
    //find a link matching the search text
    if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q))
      {
      if ($hint=="")
        {
        $hint="<img src='".$z1->item(0)->childNodes->item(0)->nodeValue ."' width='25' height='25'>
        <a href='https://apps.facebook.com/friendsadda/index.php?id=" . 
        $z->item(0)->childNodes->item(0)->nodeValue . 
        "&name=".$y->item(0)->childNodes->item(0)->nodeValue."' target='_top'>" . 
        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        }
      else
        {
        $hint=$hint . "<br /><img src='".$z1->item(0)->childNodes->item(0)->nodeValue ."' width='25' height='25'>
        <a href='https://apps.facebook.com/friendsadda/index.php?id=" . 
  	$z->item(0)->childNodes->item(0)->nodeValue . 
        "&name=".$y->item(0)->childNodes->item(0)->nodeValue."' target='_top'>" . 
        $y->item(0)->childNodes->item(0)->nodeValue . "</a>";
        
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint were found
// or to the correct values
if ($hint=="")
  {
  $response="no suggestion";
  }
else
  {
  $response=$hint;
  }

//output the response
echo $response;
?>
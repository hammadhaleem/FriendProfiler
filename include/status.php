<?php	 
$count=1;
$access=$_SESSION['access'];
$sum=0;
if(isset($_GET['page1']))
{
$page1=$_GET['page1'];
}else{$page1=0;}
$html1=getPage('https://graph.facebook.com/me/statuses?access_token='.$access.'&limit=99999999&offset='.$page1.'', 'https://facebook.com', '30','');
$i1=$i1+100;
$fb_response = json_decode($html1);
          foreach ($fb_response->data as $data) 
            { 
            $like=0;
            $c=0;
            ?>
         
          <tr>
	  <td><?php  echo $count++; ?></td>
	  <td><?php  echo $data->updated_time ; ?> </td>
	  <td><?php  echo $data->message ; ?> </td>
	  <td><?php  echo "<a href = 'https://www.facebook.com/me/posts/".$data->id."' >click here </a> "; ?> </td>
	  <?  
	  $id=$data->id; 
	  $message=$data->message;
	  $html12=getPage('https://graph.facebook.com/'.$id.'/likes?access_token='.$access.'&limit=99999999', 'https://facebook.com', '30','');
	  $fb_response1 = json_decode($html12);
	  $like= sizeof($fb_response1->data);
	  $like=$like+1;
	  $sum= $sum + $like ;
	
	      ?>
	      <td><?php d($like) ; ?> </td>
	      <td><a href="#" onclick="publishStream_new('<?php echo $message; ?>','https://graph.facebook.com/'); return false;">share us </a></td>
	    <?
            }
         
            $page1=$page1+100;
            echo "<table>"; 
            echo "<h3><a href='index.php?option=3&page1=".$page1." '>Next </a>  ||  " ;
            $page1=$page1-200;
             if($page1 < -1 )
             { $page1=0; }
            echo "<a href='index.php?option=3&page1=".$page1." '>Previous </a></h3>" ;
            echo "Total sum of likes ".$sum ;


            
            

        		
?>
 			  
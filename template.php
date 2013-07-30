<?php
$r=3;
$flag=0;
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
    	<meta property="og:locale" content="en_US" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="description" content="its a special app" />
        <meta property="og:title" content="" />
        <meta property="og:type" content="facebook app" />

        <title>Friends Adda | Engineernme</title>
  	        <link href="css/default.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="ui/styles.css" />
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
		<script type="text/javascript" src="ui/jquery.flip.min.js"></script>
		<script type="text/javascript" src="ui/script.js"></script>
		
<script type="text/javascript">
$().ready(function() {
	$("#course").autocomplete("#", {
		width: 260,
		matchContains: true,
		//mustMatch: true,
		//minChars: 0,
		//multiple: true,
		//highlight: false,
		//multipleSeparator: ",",
		selectFirst: false
	});
});
</script>
                <script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
	

				// Dialog			
				$('#dialog').dialog({
					autoOpen: false,
					width: 600,
					buttons: {
						"Ok": function() { 
							$(this).dialog("close"); 
						}, 
						"Cancel": function() { 
							$(this).dialog("close"); 
						} 
					}
				});
				
				// Dialog Link
				$('#dialog_link').click(function(){
					$('#dialog').dialog('open');
					return false;
				});

				// Datepicker
				$('#datepicker').datepicker({
					inline: true
				});
				
				// Slider
				$('#slider').slider({
					range: true,
					values: [17, 67]
				});
				
				// Progressbar
				$("#progressbar").progressbar({
					value: 20 
				});
				
				//hover states on the static widgets
				$('#dialog_link, ul#icons li').hover(
					function() { $(this).addClass('ui-state-hover'); }, 
					function() { $(this).removeClass('ui-state-hover'); }
				);
				
			});
		</script>
		
		
        <script type="text/javascript">
            $(document).ready(function () {
                $("#tabs").tabs();
            });

            function updateStatus(){
                var status  =   document.getElementById('status').value;
                
                $.ajax({
                    type: "POST",
                    url: "<?=$fbconfig['baseUrl']?>/ajax.php",
                    data: "status=" + status,
                    success: function(msg){
                        alert(msg);
                    },
                    error: function(msg){
                        alert(msg);
                    }
                });
            }
            function updateStatusViaJavascriptAPICalling(){
                var status  =   document.getElementById('status').value;
                    FB.api('/me/feed', 'post', { message: status }, function(response) {
                        if (!response || response.error) {
                             alert('Error occured');
                        } else {
                             alert('Status updated Successfully');
                        }
                   });
            }
            function streamPublish(name, description, hrefTitle, hrefLink, userPrompt){        
                FB.ui({ method : 'feed', 
                        message: userPrompt,
                        link   :  hrefLink,
                        caption:  hrefTitle
                      });
            
                    //http://developers.facebook.com/docs/reference/dialogs/feed/
        
                /* 
                 * Deprecated code
                FB.ui(
                {
                    method: 'stream.publish',
                    message: 'So lets check what we have this time',
                    attachment: {
                        name: name,
                        caption: '',
                        description: (description),
                        href: hrefLink
                    },
                    action_links: [
                        { text: hrefTitle, href: hrefLink }
                    ],
                    user_prompt_message: userPrompt
                },
                function(response) {

                }); */
            }
            function publishStream(){
              streamPublish("Stream Publish", 'hello friends just checked a really wonderful app, ', 'Checkout the app', 'http://goo.gl/f3STI', "Friends adda  ");
            
        //   streamPublish("Stream Publish", 'Thinkdiff.net is simply awesome. I just learned how to develop Iframe+Jquery+Ajax base facebook application development using php sdk 3.0. ', 'Checkout the Tutorial', 'http://wp.me/pr3EW-sv', "Demo Facebook Application Tutorial");
         }  
          function publishStream_new(a,b){
              streamPublish("Stream Publish", a ,a, b,a);  
          }  
          function increaseIframeSize(w,h){
                var obj =   new Object;
                obj.width=w;
                obj.height=h;
                FB.Canvas.setSize(obj);
            }

            function newInvite(){
                 var receiverUserIds = FB.ui({ 
                        method : 'apprequests',
                        message: 'hey !! this application is a combination many facebook common utilities ..check it out @ https://apps.facebook.com/friendsadda/',
                 },
                 function(receiverUserIds) {
                          console.log("IDS : " + receiverUserIds.request_ids);
                        }
                 );
                 //http://developers.facebook.com/docs/reference/dialogs/requests/
            }
        </script>
        <script type="text/javascript">
function showResult(str)
{
if (str.length==0)
  { 
  document.getElementById("livesearch").innerHTML="";
  document.getElementById("livesearch").style.border="0px";
  return;
  }
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
    document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
xmlhttp.open("GET","livesearch.php?r=<? echo $user; ?>&q="+str,true);
xmlhttp.send();
}
		</script>
				<!---------styling text boxes ------>
				<style type="text/css">
				input.freshblue{
				font-size:18px;
				background: url(input-box-blue339a.png) left center no-repeat;
				height:43px;
				width:451px;
				border:0px;
				padding-top:10px;
				padding-bottom:3px;
				padding-left:18px;
				margin-right:15px;
				outline: none;
				}
				
				input.freshblue:hover{
				background: url(input-box-blue339b.png) transparent left center no-repeat;
				}
				
				input.freshblue:focus{
				background: url(input-box-blue339a.png) transparent left center no-repeat;
				}
				</style>
				
   
    </head>
<? $r=$_GET['id'];$option=$_GET['option']; if ($r>0 || $option>0) { ?><body ><div id="header"><h3>Friends Addda <br/><a href="<?=$fbconfig['appBaseUrl']?>" target="_top">CLICK HERE TO GO BACK</a>  </h3></div> 
<? } else{ ?><body onload="newInvite();return false; increaseIframeSize(950, 1800); return false;" > <? } ?>
    <div id="fb-root"></div>
    <script type="text/javascript" src="http://connect.facebook.net/en_US/all.js"></script>
     <script type="text/javascript">
       FB.init({
         appId  : '270221889676734',
         status : true, // check login status
         cookie : true, // enable cookies to allow the server to access the session
         xfbml  : true  // parse XFBML
       });
           </script>
  <div id="outer">
  <div id="menu">
	  <ul>
		  <li><a href="<?=$fbconfig['appBaseUrl']?>" target="_top">Home</a></li>  
		  <li><a href="#" onclick="newInvite(); return false;">Send Request/Send Invitation</a></li>
		  <li><a href="#" onclick="publishStream(); return false;">share us </a></li> 
		  <li><a href="#" onclick="increaseIframeSize(300, 500); return false;">zoom out(-)</a></li>
		  <li><a href="#" onclick="increaseIframeSize(950, 1800); return false;">zoom in (+)</a></li>
	  </ul>
  </div>
	<div id="content">
		<div id="primaryContentContainer">
		 	<div id="primaryContent">
				<div class="box">
				<div class="boxContent"><form>
				<b><br/><h2>Enter name of your friend to check compatibliy !
				<input type="text" class=freshblue onkeyup="showResult(this.value)" /></h2></b>
				<div id="livesearch"><img src="ajax-loader.gif"></div>			
				</form><b><h3>Our Auto-assist will help you !</h3></b>
			<?php
	/*	<!-------------------------------------------------POST and DISPLAY ------------------------------------------------------------------->*/
				          $r=$_GET['id'];
				          $name=$_GET['name'];
				          if($r>0)
				          { 
				             include_once "include/comp.php";
					   ?>
		
		
		<h3>My friendship stats with  <? echo $name ; ?>.<br/>Total no of mutual friends <? echo $i ; ?> .<br/>My total friends <? echo $size; ?>
		<br/>Total number of common pages are <? echo $count; ?>.
		</h3> 
	      	<img src="https://chart.googleapis.com/chart?chs=350x225&chd=t:<? echo $r1 ; ?>,<? echo $r2 ; ?>&cht=p3&chl=Close Friends (<? echo round($r1) ; ?> %)|Not Close friends (<? echo round($r2) ; ?> %)&chs=410x100">
	      	 <br/>  This pie chart dont show an exact or actual relationship between any two facebook users !. <br/><br/><br/><br/>
		<?  
		include_once "include/pic_upload.php";
		?> 
		<!--<form action="" method="get">
		<input type="hidden" name="publish" value="publish" />
		<input type="hidden" name="name" value="<?echo  $name; ?>" />
		<input type="hidden" name="id" value="<? echo $r; ?>" />
		<input type="hidden" name="upload" value="upload" />
		<input type="submit" value="PUBLISH THIS REPORT TO YOUR PROFILE   " />
		</form>-->
		<!-------------------------------------------------POST and DISPLAY ------------------------------------------------------------------->
             
 						   <?
						       } if (isset($page)) {
 							 if ($page === 'home.php')
 							  include_once $page;
							  }?>	 
						
				</div>
				</div>
				</div>
				
				
			</div>
		</div>
		
		<div id="secondaryContent">
			
			<div class="box">
				
				<div class="boxContent">
				       <p><?php>  $me = $facebook->api('/me'); ?>
       				       <img src="http://graph.facebook.com/<?=$user?>/picture" alt="user photo" /><?php echo "<h3>" ;echo $me['name']; echo "</h3>" ?>
     				       </p>
				</div>
			</div>
			
			
			<div class="box">
			<h3>Friends Addda</h3>
				<div class="boxContent">
					<p>What is this app about this app is basically a mix of all common online utilities ,including free and instant<br/>
						file uploads,profile analyser,automatic birthday wisher and lot more (those are being developed continuously by our team of developers )      
						</p>
				</div>
			</div>
			
			
			<div class="box boxA">
				<div class="boxContent">
				<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fsite.engineerinme&amp;width=150&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;appId=300217353339644" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:150px; height:258px;" allowTransparency="true"></iframe></div>
			</div>



			<div class="box">
				<h3>A word from our sponsers</h3>
				<div class="boxContent">
					<p>Looking for a advertisment slot ? ....contact us for more information . <a href="#">More&#8230;</a></p>
				</div>
			</div>

		</div>
		<div class="clear"></div>
	</div>
	<div id="footer">
		<p>CopyLeft &copy; 2011 engineerinme</p>
	</div>

</div>
</body>
</html>
<?php
require ('core/init.php');

$user= $users->userdata($_SESSION['Phone Number']);
$rid = $user['Rickshaw_Id'];
$color_status=$users->check_status($_SESSION['Phone Number']);
if($color_status=='Busy'){
$bgclr='red';}
else{
$bgclr='green';}

//$mobile=$user['Phone_Number'];
/*if(isset($_POST['status'])){

$users->change_status($_SESSION['Phone Number']);

} 
*/
 
?>
<!doctype html>
<html lang="en">
<head>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Home</title>
</head>
<body>	
	<div id="container">
		<ul>
 
			<li><a href="index.php">Home</a></li>
			<li><a href="logout.php">Logout</a></li>
 
		</ul>
		<h1>Hello <?php echo $rid, '!<BR><br>'; echo $_SESSION['Phone Number']; ?></h1>
		<br>
		<h3>Click on the button to Show <span style="color:red;font-family:lucida grande;font-weight:bold">Busy</span> or <span style="color:green;font-family:lucida grande;font-weight:bold">Available</span></h3>
		<!--
		<span>Status:</span> <form method="post" action=""><input type="submit" id="status" name='status' value="Busy" style="background:red" onclick=" return setColor('status','green',this);" /></form> -->
	    <input type="submit" id="status" name='status' value='<?php $color_status ?>' style="background:<?php echo $bgclr; ?>" />
	</div>
<script>
/*
  function setColor(btn,color,el){
    
    //var el=document.getElementById(btn);
   if (el.style.background== 'red') {
      el.style.background=color; el.value='Available';
   }
    else {
      el.style.background = "red"; el.value='Busy';
    }
  }
  */
  
  </script>
<script>
	$(document).ready(function () { 

        $('#status').click(function(){
           
            var str = $("#status").val();
            
        $.post("chng_status.php", {'t':str}, function(){
                 if(str=='Busy'){
                document.getElementById('status').value='Available'; document.getElementById('status').style.background='green';}
				else{
				document.getElementById('status').value='Busy'; document.getElementById('status').style.background='red';}
        });
        });
});
	</script>
	<img id='im1' src='css/images/rp1.jpg'>
	<img id='im2' src='css/images/pw1.jpg'>
	<img id='im3' src='css/images/rp2.jpg'>
	<img id='im4' src='css/images/pw2.jpg'>
</body>
</html>

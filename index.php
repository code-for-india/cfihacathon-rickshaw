<?php 
#including our init.php
require ('core/init.php');
$con= mysql_connect("127.0.0.1","root","abhishek");
$db='cfi_hack';
$db_con=mysql_select_db($db,$con);
$query="SELECT * FROM `rikshaw_details` WHERE `Status`= 'Busy' ";
$results=mysql_query($query);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Rickshwala.com</title>
</head>
<body>	
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register(Only For Rickshaw Wala)</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
		<h1>Welcome to Rickshaw wala.com</h1> <br>
	    <h2>Now call these Rickshaw Wala to You </h2> <br>
	
		
		<tr><th><span style="background:yellow">Phone Number</span></th>           <th><span style="background:yellow" >Rickshaw Id</span></th>                     <th><span style="background:yellow">How Far Is Rickshaw??</span></th> </tr><br>
		<?php 
		
		if(!empty($results)){	while($row=mysql_fetch_array($results)){
		        echo $row['Phone Number'].'                   '.$row['Rickshaw_Id'].'                                  '.$row['Status'].'<br>';
			
		} }
		?> 
	</div>
	<img id='im1' src='css/images/rp1.jpg'>
	<img id='im2' src='css/images/pw1.jpg'>
	<img id='im3' src='css/images/rp2.jpg'>
	<img id='im4' src='css/images/pw2.jpg'>
</body>
</html>

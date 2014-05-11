<?php 
#including our init.php
require ('core/init.php');
$con= mysql_connect("127.0.0.1","root","abhishek");
$db='cfi_hack';
$db_con=mysql_select_db($db,$con);
$query="SELECT * FROM `rikshaw_details` WHERE `Status`= 'Available' ";
//$query1="SELECT * FROM `rikshaw_details` WHERE `Status`= 'Available' ";
$results=mysql_query($query);

?>
<!doctype html>
<html lang="en">
<head>
<style>
td,th
{
padding:10px;
text-align:center;
border:1px solid green;
}
</style>

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
	
		<table>
		<tr><th><span style="background:yellow">Phone Number</span></th>           <th><span style="background:yellow" >Rickshaw Id</span></th>                     <th><span style="background:yellow">How Far Is Rickshaw??</span></th> <th><span style="background:yellow" >Map Location</span></th> </tr><br>
		<?php 
		
		
		if(!empty($results)){	while($row=mysql_fetch_array($results)){
		$latlon=$row['lati'].",".$row['longi'];
		        echo "<tr><td>".$row['Phone Number']."</td><td>".$row['Rickshaw_Id']."</td><td>".$row['far_away']."</td><td><img src='http://maps.googleapis.com/maps/api/staticmap?center="
  .$latlon."&zoom=15&size=200x150&sensor=false' style='cursor:pointer'></img></td></tr>";
		
		} }
		?> 
		</table>
	</div>
	<img id='im1' src='css/images/rp1.jpg'>
	<img id='im2' src='css/images/pw1.jpg'>
	<img id='im3' src='css/images/rp2.jpg'>
	<img id='im4' src='css/images/pw2.jpg'>
</body>
<script>
window.onload=trace_customer_location();
function trace_customer_location()
  {
  if (navigator.geolocation)
    {
    navigator.geolocation.watchPosition(showPosition);
    }
  
  }
function showPosition(position)
  {
  var lati=position.coords.latitude; 
  var longi=position.coords.longitude;	
  <?php  while($row1=mysql_fetch_results($results)){  ?>
  var theta=longi-<?php echo $results['longi']; ?>
  var lati2=<?php echo $results['lati']; ?>
  var dist = sin(Math.PI*lati/180) * sin(Math.PI*lati2/180) +  cos(Math.PI*lati/180) * cos(Math.PI*lati2/180) * cos(Math.PI*theta/180);
  dist = Math.acos(dist);
  dist = 180*dist/Math.PI;
  var kms = dist * 60 * 1.1515*1.609;
  
  <?php } ?> 
  } 
  

  
  
  
</script>
</html>

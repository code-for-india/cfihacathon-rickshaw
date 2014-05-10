<?php
require ('core/init.php');

$user 		= $users->userdata($_SESSION['Phone Number']);
$rid 	= $user['Rickshaw_Id'];
 
?>
<!doctype html>
<html lang="en">
<head>
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
		<h1>Hello <?php echo $rid, '!<BR>'; echo $_SESSION['Phone Number']; ?></h1><!-- This will say Hello sunny! for example -->
	</div>
</body>
</html>

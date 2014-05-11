<?php
require ('core/init.php');

if (empty($_POST) === false) {
 
	$mobile = trim($_POST['number']);
	$password = trim($_POST['pass']);
 
	if (empty($mobile) === true || empty($password) === true) {
		$errors[] = 'Sorry, but we need your Phone Number and Password.';
	} else if ($users->user_exists($mobile) === false) {
		$errors[] = 'Sorry that Phone doesn\'t exists.';
	}  else {
 
		$login = $users->login($mobile, $password);
		if ($login === false) {
			$errors[] = 'Sorry, that Phone Number/password is invalid';
		}else {
			// username/password is correct and the login method of the $users object returns the user's id, which is stored in $login.
 
 			$_SESSION['Phone Number'] =  $login; // The user's id is now set into the user's session  in the form of $_SESSION['id'] 
			
			#Redirect the user to home.php.
			header('Location: home.php'); 
			exit();
		}
	}
} 
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="css/style.css" >
	<title>Login</title>
</head>
<body>	
	<div id="container">
		<ul>
			<li><a href="index.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Login</a></li>
		</ul>
		<h1>Login</h1>
 
		<?php if(empty($errors) === false){
 
			echo '<p>' . implode('</p><p>', $errors) . '</p>';			
 
		} 
		?> 
		<form method="post" action="">
			<h4>Phone Number:</h4>
			<input type="text" name="number">
			<h4>Password:</h4>
			<input type="password" name="pass">
			<br>
			<input type="submit" name="submit">
		</form>  
	</div>
	<img id='im1' src='css/images/rp1.jpg'>
	<img id='im2' src='css/images/pw1.jpg'>
	<img id='im3' src='css/images/rp2.jpg'>
	<img id='im4' src='css/images/pw2.jpg'>
</body>
</html>


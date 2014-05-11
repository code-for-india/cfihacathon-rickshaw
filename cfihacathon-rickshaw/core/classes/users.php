<?php

class Users{
 
 private $db;

 public function __construct($database){
  
   $this->db=$database;

}

 
public function user_exists($mobile) {
 
	$query = $this->db->prepare("SELECT COUNT(`Phone Number`) FROM `rikshaw_details` WHERE `Phone Number`= ?");
	$query->bindValue(1, $mobile);
 
	try{
 
		$query->execute();
		$rows = $query->fetchColumn();
 
		if($rows == 1){
			return true;
		}else{
			return false;
		}
 
	} catch (PDOException $e){
		die($e->getMessage());
	}
 
}
 
public function email_exists($mobile) {
 
	$query = $this->db->prepare("SELECT COUNT(`Phone Number`) FROM `rikshaw_details` WHERE `Phone Number`= ?");
	$query->bindValue(1, $mobile);
 
	try{
 
		$query->execute();
		$rows = $query->fetchColumn();
 
		if($rows == 1){
			return true;
		}else{
			return false;
		}
 
	} catch (PDOException $e){
		die($e->getMessage());
	}
 
}
 
public function register($rid, $password,$mobile){
	
	//$time 		= time();
	$ip 		= $_SERVER['REMOTE_ADDR'];
	//$email_code = sha1($username + microtime());
	//$password   = sha1($password);
 
	$query 	= $this->db->prepare("INSERT INTO `rikshaw_details` (`Rickshaw_Id`, `Password`, `Phone Number`,`Status`) VALUES (?, ?, ?, ?) ");
 
	$query->bindValue(1, $rid);
	$query->bindValue(2, $password);
	$query->bindValue(3, $mobile);
    $query->bindValue(4, 'Available');

	try{
		$query->execute();
 
		//mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\n http://localhost/sv/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team");
	}catch(PDOException $e){
		die($e->getMessage());
	}	
}
/*
public function activate($email, $email_code) {
		
		$query = $this->db->prepare("SELECT COUNT(`Id`) FROM `Users` WHERE `Email` = ? AND `Email_code` = ? AND `Confirmed` = ?");
 
		$query->bindValue(1, $email);
		$query->bindValue(2, $email_code);
		$query->bindValue(3, 0);
 
		try{
 
			$query->execute();
			$rows = $query->fetchColumn();
 
			if($rows == 1){
				
				$query_2 = $this->db->prepare("UPDATE `Users` SET `Confirmed` = ? WHERE `Email` = ?");
 
				$query_2->bindValue(1, 1);
				$query_2->bindValue(2, $email);				
 
				$query_2->execute();
				return true;
 
			}else{
				return false;
			}
 
		} catch(PDOException $e){
			die($e->getMessage());
		}
	}
*/
  
 
public function login($mobile, $password) {
 
	$query = $this->db->prepare("SELECT `Password`, `Phone Number` FROM `rikshaw_details` WHERE `Phone Number` = ?");
	$query->bindValue(1, $mobile);
	
	try{
		
		$query->execute();
		$data = $query->fetch();
		$stored_password = $data['Password'];
		$id = $data['Phone Number'];
		
		#hashing the supplied password and comparing it with the stored hashed password.
		if($password === $stored_password){
			return $id;
                       //return true;	
		}else{
			return false;	
		}
 
	}catch(PDOException $e){
		die($e->getMessage());
	}
}

/*
public function email_confirmed($username) {
 
	$query = $this->db->prepare("SELECT COUNT(`Id`) FROM `Users` WHERE `Fname`= ? AND `confirmed` = ?");
	$query->bindValue(1, $username);
	$query->bindValue(2, 1);
	
	try{
		
		$query->execute();
		$rows = $query->fetchColumn();
 
		if($rows == 1){
			return true;
		}else{
			return false;
		}
 
	} catch(PDOException $e){
		die($e->getMessage());
	}
 
}
*/
public function userdata($mobile) {
 
	$query = $this->db->prepare("SELECT * FROM `rikshaw_details` WHERE `Phone Number`= ?");
	$query->bindValue(1, $mobile);
 
	try{
 
		$query->execute();
 
		return $query->fetch();
 
	} catch(PDOException $e){
 
		die($e->getMessage());
	}
}



public function change_status($mobile){
$query=$this->db->prepare("UPDATE `rikshaw_details` SET `Status`=1  WHERE `Phone Number`=?");
$query->bindValue(1,$mobile);

try{
$query->execute();
//return $query->fetch();
}
catch(PDOException $e){
 die($e->getMessage());


}
}


public function show_rikshaws(){
$query="SELECT * FROM `rikshaw_details` WHERE `Status`= 'Busy' ";

try{
$results=mysql_query($query);
return $results;
}

catch(PDOException $e){
 die($e->getMessage());


}
}
public function check_status($mobile){
$query=$this->db->prepare("Select `Status` FROM `rikshaw_details` WHERE `Phone Number`='.$mobile.'");

try{
$query->execute();
return $query->fetch();
}
catch(PDOException $e){
 die($e->getMessage());


}

}
}
?>

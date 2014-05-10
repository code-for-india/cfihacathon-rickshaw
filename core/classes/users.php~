<?php

class Users{
 
 private $db;

 public function __construct($database){
  
   $this->db=$database;

}

 
public function user_exists($username) {
 
	$query = $this->db->prepare("SELECT COUNT(`Id`) FROM `Users` WHERE `Fname`= ?");
	$query->bindValue(1, $username);
 
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
 
public function email_exists($email) {
 
	$query = $this->db->prepare("SELECT COUNT(`Id`) FROM `Users` WHERE `Email`= ?");
	$query->bindValue(1, $email);
 
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
 
public function register($username, $password, $email,$lname,$age,$state,$district,$pin,$gender,$mobile,$address){
	
	$time 		= time();
	$ip 		= $_SERVER['REMOTE_ADDR'];
	$email_code = sha1($username + microtime());
	//$password   = sha1($password);
 
	$query 	= $this->db->prepare("INSERT INTO `Users` (`Fname`, `Password`, `Email`, `Ip`, `Time`, `Email_code`,`Lname`,`Age`,`State`,`District`,`Mobile_no`,`Address`,`Pin`,`Gender`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ");
 
	$query->bindValue(1, $username);
	$query->bindValue(2, $password);
	$query->bindValue(3, $email);
	$query->bindValue(4, $ip);
	$query->bindValue(5, $time);
	$query->bindValue(6, $email_code);
        $query->bindValue(7, $lname);
        $query->bindValue(8, $age);
        $query->bindValue(9, $state);        
        $query->bindValue(10, $district);
        $query->bindValue(11, $mobile);
        $query->bindValue(12, $address);
        $query->bindValue(13, $pin);
        $query->bindValue(14, $gender);


	try{
		$query->execute();
 
		//mail($email, 'Please activate your account', "Hello " . $username. ",\r\nThank you for registering with us. Please visit the link below so we can activate your account:\r\n\r\n http://localhost/sv/activate.php?email=" . $email . "&email_code=" . $email_code . "\r\n\r\n-- Example team");
	}catch(PDOException $e){
		die($e->getMessage());
	}	
}

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

  
 
public function login($username, $password) {
 
	$query = $this->db->prepare("SELECT `Password`, `Id` FROM `Users` WHERE `Fname` = ?");
	$query->bindValue(1, $username);
	
	try{
		
		$query->execute();
		$data = $query->fetch();
		$stored_password = $data['Password'];
		$id = $data['Id'];
		
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

public function userdata($id) {
 
	$query = $this->db->prepare("SELECT * FROM `Users` WHERE `Id`= ?");
	$query->bindValue(1, $id);
 
	try{
 
		$query->execute();
 
		return $query->fetch();
 
	} catch(PDOException $e){
 
		die($e->getMessage());
	}
}


}
?>

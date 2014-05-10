<?php 

try {
	$db = new PDO("mysql:host=localhost;dbname=cfi_hack", "root", "abhishek");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e) {
    die($e->getMessage());
}



?>

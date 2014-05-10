<?php
$type=$_POST["type"];
$lat=$_POST["lat"];
$long=$_POST["lon"];
$x=  // manipulate lat 
$y=   // manipulate lon

mysql_connect(server,username,password);
mysql_select_db(db);

if($type==0)
{
$s=mysql_query("select * from `users` where `id`='".$_POST['id']."'");
$r=mysql_fetch_assoc($s);

	$query="INSERT INTO `user_data`(`id`,`phn_no`,`lat`,`long`,`x`,`y`,`rate`) VALUES ('".$POST_['id']."','".$r['phn']."','".$lat."','".$long."','".$x."','".$y."','".$r['rate']."');";
	return;
}
if($tye==1)
{
	if(x!=prev_x || y!=prev_y)
	return ;
	esle
	$query="UPDATE `user_data` `x`='".$x."',`y`='".$y."' , `lat`='".$lat."',`long`='".$long."' WHERE `id`='".$_POST['id']."'";
}

else 
{
	$query="DELETE FROM `user_data` WHERE `id`='".$_POST['id']."'";
}

mysql_query("$query");
mysql_close();

?>
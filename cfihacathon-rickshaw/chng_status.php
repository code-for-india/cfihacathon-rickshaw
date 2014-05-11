<?php
require ('core/init.php');
$t = $_POST['t'];
$m= $_SESSION['Phone Number'];


$query2="UPDATE `rikshaw_details` SET `Status`='Available'  WHERE `Phone Number`=$m "
        $results2 = mysql_query($query2)
        or die(mysql_error());

    if(mysql_affected_rows()>=1){
        ?>
<span>You entered <?php echo $t; ?></span>
<br />
<p>Database updated</p>
<br />

<?php
    }
?>
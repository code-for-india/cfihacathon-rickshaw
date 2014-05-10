<?php
require ('core/init.php');


session_start();
session_destroy();
header('Location:index.php');
?>

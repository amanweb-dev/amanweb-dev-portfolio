<?php session_start(); ?>

<?php 

$_SESSION['user_email'] = null; 
$_SESSION['user_pass'] =null; 
header("Location: ads.php" );

 ?>
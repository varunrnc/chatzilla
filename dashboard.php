<?php
ob_start();
include_once('config.php');
session_start();
if(!isset($_SESSION['username']))
{
    header('location: ' . $hostname . '/index.php');
} 

echo "Username : " . $_SESSION['username'] ;



?>

<a href="<?php echo $hostname . '/logout.php' ; ?>">Logout</a>
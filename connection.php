<?php
$username='root';
$password='';
$server='localhost:3308';
$db='apartment_management';

$dbcon=mysqli_connect($server, $username, $password, $db);

if($dbcon){
	// echo "connection successful";
}
else{
    echo "<script> alert('ERROR... no connection'); </script>";        
	die(mysqli_connect_error());
}
?>
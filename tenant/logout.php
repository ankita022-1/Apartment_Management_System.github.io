<?php
session_start();
session_destroy();
setcookie('emailCookie', '', time()-86400);
setcookie('passwordCookie', '', time()-86400);
header('Location:login.php');
?>
<?php
session_start();
session_destroy();
setcookie('adm_emailCookie', '', time()-86400);
setcookie('adm_passwordCookie', '', time()-86400);
header('Location:login.php');
?>
<?php
session_start();

setcookie('username', '', time() - 3600, '/');
setcookie('role', '', time() - 3600, '/');

$_SESSION = array();
session_destroy();

header("Location: home.php");
exit();
?>

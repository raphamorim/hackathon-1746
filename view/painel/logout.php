<?php 

session_start();

session_unset();
session_destroy();
$_SESSION['usu_status'] = 0;
header('Location: index.php');

?>
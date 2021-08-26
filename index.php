<?php
require './model/config.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: ./controller/indexguest.php');
	exit;
}else{
  header('Location: ./controller/indexlog.php');
	exit;
}



?>

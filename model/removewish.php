<?php

require './config.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: sign-in.php');
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
  }
  $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


$email=$_SESSION['name'];  


$id = $_GET['id'];

$sql = "UPDATE users SET wishlist = REPLACE(wishlist, '$id', '') WHERE email='$email'";
mysqli_query($conn, $sql);

$sql = "UPDATE products SET addedto = addedto-1 WHERE id='$id'";
mysqli_query($conn, $sql);

?>
 <script>
javascript:alert('Produto removido!');
javascript:window.location='../controller/wishlist.php';
</script>
   


<?php
require '../model/config.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: sign-in.php');
	exit;
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  // last request was more than 30 minutes ago
  session_unset();     // unset $_SESSION variable for the run-time 
  session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

$email=$_SESSION['name'];
$sql = "SELECT nome FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $nome = $row['nome'];  
    }
} else {
    
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./navbar.css">
    <title>Agro Bom Negócio - ABC</title>
</head>

<header>
    <nav class="navbar navbar-expand-lg" id="navbarResponsive">

        <div class="dropdown">
            <button class="btn btn-green fa fa-bars btn-lg dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <button class="dropdown-item" type="button">Sair</button>
                <button class="dropdown-item" type="button">Acessar o crud</button>
            </div>
        </div>

        <img src="./assets/img/logo.png" alt="logo" class="mx-1 my-0" />
        </a>

        <a class="nav-link btn-primary" href="/indexlog.php" style="background-color: #619201;">Produtos</a>
      <a class="nav-link btn-primary" href="/privacyterms.php" style="background-color: #619201;">Politica e Termos</a>
        <button type="button" class="btn btn-link"><a href="register.php" class="text-light">Ainda não possui <br> cadastro?</a></button>
        <button type="button" class="btn btn-light btn-lg"><a href="sign-in.php" class="text-dark"> Entrar</a></button>
    </nav>
</header>

</html>
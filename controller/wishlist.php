<?php require_once '../model/config.php';
session_start();
if (!isset($_SESSION['loggedin'])) {
	header('Location: indexguest.php');	
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

$sql = "SELECT wishlist FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $arraylist = $row['wishlist']; 
    $wishlist = explode(" ", $arraylist);
    $w = count($wishlist);
    }
} else { 
    ?>
    <script>
    javascript:alert('Você não possui nenhum produto na wishlist!');
    javascript:window.location='../controller/products.php';
    </script>
    <?php
}
$s = 0;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../view/styles/style.css">
    <title>Agro Bom Negócio - ABC</title>
</head>
<style>
    body {
        background-color: #212529;
    }
    
    tr {
        color: white;
    }
    
    a {
        color: rgb(255, 255, 255);
    }
    
    .btn-link {
        color: rgb(0, 119, 255);
    }
</style>


<body>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                <tr>

<?php include '../view/templates/navbar.php'; ?>
<?php require '../model/urls.php';?> 

<?php 

while ($s<$w){
    $sql = "SELECT * FROM products WHERE id='$wishlist[$s]'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {?>
        <td><?php echo $row["fornecedor"]?></td>
        <td><?php echo $row["name"]?></td>
        <td><?php echo $row["lastmonth"]?> $RS</td>
        <td><a class="btn btn-link" href="<?php echo $url_produtos?><?php echo $row["id"]?>">Acesso</a></td>
        <td><a class="btn btn-link" href="<?php echo $url_removeproduct?><?php echo $row["id"]?>">Remover</a></td>
        </tr>




        
     <?php   }
    } else { 
    }
    $s++;
}
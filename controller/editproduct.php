<?php
require_once '../model/config.php';
require_once '../model/urls.php';

session_start();
if (!isset($_SESSION['admin'])) {
	header('Location: sign-in.php');

}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
    // last request was more than 30 minutes ago
    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
  }
  $_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp

$email=$_SESSION['name'];  



if (isset($_GET['id'])){
    $id=$_GET["id"];
    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $nomeproduto = $row['name']; 
            $fornecedor = $row['fornecedor']; 
            $image = '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
            $preco = $row['lastmonth'];
            $tm = $row['twomonthago']; 
            $thm = $row['threemonthago']; 
            $fm = $row['fourmonthago']; 
            $fim = $row['fivemonthago']; 
            $six = $row['sixmonthago']; 
        }
    } else { 
           
    }
}
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
    h3 {
        color: white;
    }
    #inputReal{
        color: black;
        width: 100px;
    }
</style>
<header>
    <nav class="navbar navbar-expand-lg " id="navbarResponsive">
        <a class="btn btn-lg pull-right" href="../index.php" style="background-color: #4c4f52;">Sair</a>
    </nav>
</header>

<body>

    <div class="container">
        <h3 class="text-center">Editar</h3>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Preço</th>
                    <th scope="col"></th>
                </tr>
                <tr>
                    <form action="<?php echo $url_editp?><?php echo $id?>" method="post" enctype="multipart/form-data">
                    <td><?php echo $id?></td>
                    <td><?php echo $nomeproduto?></td>
                    <td><input type="file" id="my_image" name="my_image"></td>
                    <td><input type="number" id="inputReal" name="valor" placeholder="R$"></td>
                    <td><input type="submit" value="Salvar" class="btn btn-dark btn-lg"></td>
                    </form>
                </tr>
            </thead>
        </table>
    </div>
</body>

</html>
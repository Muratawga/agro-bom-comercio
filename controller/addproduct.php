<?php
require_once '../model/config.php';
require_once '../model/urls.php';

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

?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Crud</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
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
    .bg-green {
        background-color: #619201 !important;
    }


</style>
<header>
<nav class="navbar navbar-expand-md navbar-dark bg-primary bg-green">
    <div class="container-fluid container">
        <a class="navbar-brand abs" href="#"><strong>ABC</strong></a>
        <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="collapseNavbar">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link text-light" href="../index.php" data-bs-target="#myModal" data-bs-toggle="modal">Sair</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
</header>

<body>

    <div class="container">
        <h3 class="text-center">Inserir Produto</h3>
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
                    <form action="../model/addprod.php" method="post" enctype="multipart/form-data">
                    <td><?php echo "Auto-Incremento"?></td>
                    <td  style="color: black;"><input type="name" id="nome" name="nome"></td>
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
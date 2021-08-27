<?php
require_once '../model/config.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
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
</style>
<header>
    <nav class="navbar navbar-expand-lg " id="navbarResponsive">
        <a class="btn btn-lg pull-right" href="../index.php" style="background-color: #4c4f52;">Sair</a>
    </nav>
</header>

<body>

    <div class="container">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Fornecedor</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Preço</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <?php
                $i=1;
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {?>
                    <td><?php echo $row["id"]?></td>
                    <td><?php echo $row["fornecedor"]?></td>
                    <td><?php echo $row["name"]?></td>
                    <td><?php echo $row["lastmonth"]?> $RS</td>
                    <td><a class="btn btn-link" href="">Editar</a></td>
                    </tr>

              
                
                <?php
                $i++;
                }
                } else {
                echo "0 results";
                }
                ?>

                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
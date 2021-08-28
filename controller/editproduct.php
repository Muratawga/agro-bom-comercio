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
                    <td>8745</td>
                    <td>PS4 branco</td>
                    <td><input type="file" id="myfile" name="myfile"></td>
                    <td><input type="number" id="inputReal" placeholder="R$"></td>
                    <td><a href="" class="text-success">Salvar</a></td>
                </tr>
            </thead>
        </table>
    </div>
</body>

</html>
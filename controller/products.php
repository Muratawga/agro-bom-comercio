<?php require '../model/config.php'; 
require '../model/urls.php';

session_start();
if (!isset($_SESSION['loggedin'])) {
	
}else{
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
}

if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 1800)) {
  // last request was more than 30 minutes ago
  session_unset();     // unset $_SESSION variable for the run-time 
  session_destroy();   // destroy session data in storage
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


if (isset($_GET['id'])){

    $id=$_GET["id"];


    $sql = "SELECT * FROM products WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
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

$number1 = 1;

?>


<!DOCTYPE html>
<html lang="pt-br">



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../view/styles/products.css">
    <title>Produto - ABC</title>
</head>

<body>

<?php include '../view/templates/navbar.php'; ?>

    <section id="product">
        <div class="container mt-5 mb-5">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-6 border-end">
                        <div class="d-flex flex-column justify-content-center">
                            <div class="main_image"> <?php echo $image?> id="main_product_image" width="350"> </div>
                            
                        </div>
                        <button type="button" class="btn btn-info"><a href="<?php echo $url_addwish?><?php echo $_GET["id"]?>" class="text-light">Adicionar na lista de desejos</a></button>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 right-side">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3><?php echo $nomeproduto?></h3> <span class="heart"><i class='bx bx-heart'></i></span>
                            </div>
                            <div class="mt-2 pr-3 content">
                                <p><?php echo $fornecedor?></p>
                            </div>
                            <h3><?php echo $preco?> R$</h3>
                            <form action="">
                                <!--<input type="checkbox" id="flag1" name="flag1" value="Flag"><i class="fa fa-flag fa-lg"></i>
                                <label for="flag1"> <h4> Marcar com uma bandeira</h4></label><br>-->
                                <div class="ratings d-flex flex-row align-items-center">
                                    <canvas id="myChart" width="700" height="400"></canvas>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <h1 class="text-center">Semelhantes</h1>
        <?php include '../view/templates/randomproduct.php' ?>
        <br>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.5.1/dist/chart.min.js" integrity="sha256-bC3LCZCwKeehY6T4fFi9VfOU0gztUa+S4cnkIhVPZ5E=" crossorigin="anonymous"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['6 mêses atrás', '5 mêses atrás', '4 mêses atrás', '3 mêses atrás', '2 mêses atrás', 'Preço atual'],
                datasets: [{
                    label: 'Preço em Reais',
                    data: [<?php echo $six?>, <?php echo $fim?>, <?php echo $fm?>, <?php echo $thm?>, <?php echo $tm?>, <?php echo $preco?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 2
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
<?php include '../view/templates/footer.php' ?>
</html>
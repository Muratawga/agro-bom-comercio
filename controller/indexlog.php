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
    <title>Agro Bom Comércio - ABC</title>
</head>

<?php include '../view/templates/navbar.php'; ?>
<?php require '../model/urls.php';?>



    <!--<section id="carousel">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../view/img/bannerzasso.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../view/img/bannerzasso.png" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../view/img/bannerzasso.png" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>-->
    <div id="bannerImage">
    <img class="d-block w-100" src="../view/img/banner.jpg" alt="First slide">
    </div>
    <br>
    <!--<div id="category" class="text-center">
        <h3>Produtos Marcados</h3>
    </div> <br>
    <div class="caixa my-5">
        <div class="card-deck mx-5 my-5">
            <div class="card">
                <img class="card-img-top" src="#" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Produto </h5>
                    <h6 class="card-title">Descricao </h6>
                    <p class="card-text"></p>
                    <p class="card-text">
                        <a href="#">
                            <strong class="btn btn-outline-success">
                                <h9 style="font-weight: bold; font-family: Montserrat;"> ANALISAR</h9></i
                              ></strong
                            >
                        </a>
                    </p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="#" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Produto</h5>
                    <h6 class="card-title">Descricao </h6>
                    <p class="card-text"></p>
                    <p class="card-text">
                        <a href="#">
                            <strong class="btn btn-outline-success">
                                <h9 style="font-weight: bold; font-family: Montserrat;"> ANALISAR</h9></i
                              ></strong
                            >
                        </a>
                    </p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="#" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Produto</h5>
                    <h6 class="card-title">Descricao </h6>
                    <p class="card-text"></p>
                    <p class="card-text">
                        <a href="#">
                            <strong class="btn btn-outline-success">
                                <h9 style="font-weight: bold; font-family: Montserrat;"> ANALISAR</h9></i
                              ></strong
                            >
                        </a>
                    </p>
                </div>
            </div>
            <div class="card">
                <img class="card-img-top" src="#" alt="Card image cap" />
                <div class="card-body">
                    <h5 class="card-title">Produto</h5>
                    <h6 class="card-title">Descricao </h6>
                    <p class="card-text"></p>
                    <p class="card-text">
                        <a href="#">
                            <strong class="btn btn-outline-success">
                              <h9 style="font-weight: bold; font-family: Montserrat;"> ANALISAR</h9></i
                            ></strong
                          >
                        </a>
                    </p>
                </div>
            </div>

        </div>
    </div>-->
    <div id="category" class="text-center">
        <h3>Produtos</h3>
    </div> <br>
    <?php include '../view/templates/randomproduct.php' ?>
    <br>
    <script src="https://use.fontawesome.com/4082de62c3.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" <script src="https://use.fontawesome.com/4082de62c3.js"></script>
</body>
<?php include '../view/templates/footer.php'; ?>

</html>
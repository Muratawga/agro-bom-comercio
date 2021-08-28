<?php

if (!isset($_SESSION['loggedin'])) { ?>



    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./navbar.css" crossorigin="anonymous">
        <title>Agro Bom Negócio - ABC</title>
    </head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat:300&subset=latin-ext);

        body {
            background-color: #ECECEB;
            overflow-x: none;
            font-family: Montserrat;
            text-align: center;
        }


        /*Start navbar*/

        nav>.navbar.navbar-expand-lg.navbar-light.bg-light {
            font-size: 24px;
        }


        .bg-light {
            background-color: #619201 !important;
        }

        .btn-w {
            background-color: white;
        }

        nav#navbarResponsive.navbar.navbar-expand-lg>img {
            width: 60px;
            height: 60px;
            border-color: #619201;
        }

        #teste {
            color: white !important;
        }


        /*End navbar*/
    </style>
    <header>
        <!--<nav class="navbar navbar-expand-lg" id="navbarResponsive">
            <a href="indexguest.php"><img src="../view/img/logo.png" alt="logo" width="65px"> </a>
            <a class="nav-link btn-primary ml-auto" href="./mainproduct.php" style="background-color: #619201;">Produtos</a>
            <a class="nav-link btn-primary" href="./privacyterms.php" style="background-color: #619201;">Politica e Termos</a>

            <button type="button" class="btn btn-link"><a href="register.php" class="text-light">Ainda não possui <br> cadastro?</a></button>
            <button type="button" class="btn btn-light btn-lg"><a href="sign-in.php" class="text-dark"> Entrar</a></button>
        </nav>-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-light" id="mainNavbar">
            <a class="navbar-brand" href="/"><img src="../view/img/logo.png" alt="logo" width="65px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./mainproduct.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./privacyterms.php">Politica e Termos</a>
                    </li>
                    <a class="" href="sign-in.php"><button type="button" class="btn btn-w btn-lg text-dark">Entrar</button></a>
                </ul>
            </div>



        </nav>
    </header>




<?php
} else { ?>
    <!-- ----------LOGADO-------- -->
    <!-- ---------Deslogado----------- -->



    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="./navbar.css">
        <title>Agro Bom Negócio - ABC</title>
    </head>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Montserrat:300&subset=latin-ext);

        body {
            background-color: #ECECEB;
            overflow-x: none;
            font-family: Montserrat;
            text-align: center;
        }


        /*Start navbar*/

        nav>.navbar.navbar-expand-lg.navbar-light.bg-light {
            font-size: 24px;
        }


        .bg-light {
            background-color: #619201 !important;
        }

        .btn-w {
            background-color: white;
        }

        nav#navbarResponsive.navbar.navbar-expand-lg>img {
            width: 60px;
            height: 60px;
            border-color: #619201;
        }

        #teste {
            color: white !important;
        }


        /*End navbar*/
    </style>
    <header>
        <!--<nav class="navbar navbar-expand-lg" id="navbarResponsive">

            <div class="dropdown">
                <button class="btn btn-green fa fa-bars btn-lg dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a href="../model/logout.php"><button class="dropdown-item" type="button">Sair</button></a>

                </div>
            </div>

            <a href="indexlog.php"><img src="../view/img/logo.png" alt="logo" width="65px"> </a>
            <a class="nav-link btn-primary ml-auto" href="./mainproduct.php" style="background-color: #619201;">Produtos</a>
            <a class="nav-link btn-primary" href="./privacyterms.php" style="background-color: #619201;">Politica e Termos</a>
            <h5 id="teste">Bem vindo!<br> <?php echo $nome ?></h5p>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNavbar">
            <a class="navbar-brand" href="#"><img src="../view/img/logo.png" alt="logo" width="65px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="./mainproduct.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./privacyterms.php">Politica e Termos</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link active"><h6>Bem vindo(a) <?php echo $nome ?> <a href="../model/logout.php">(sair)</a></h6></span>
                    </li>
                </ul>
            </div>
        </nav>-->

        <nav class="navbar navbar-expand-lg navbar-dark bg-light" id="mainNavbar">
            <a class="navbar-brand" href="/"><img src="../view/img/logo.png" alt="logo" width="65px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./mainproduct.php">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="./privacyterms.php">Politica e Termos</a>
                    </li>
                    <li class="nav-item">
                        <span class="nav-link text-dark">|</span>
                    </li>
                    <span class="nav-link active">Bem vindo(a) <?php echo $nome ?> <a href="../model/logout.php" class="text-warning">(sair)</a></span>
                </ul>
            </div>
        </nav>
    </header>

<?php
}

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

$sql = "SELECT nome FROM users WHERE email='$email'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $nome = $row['nome'];  
    }
} else {
}

if (isset($_FILES['my_image']) && isset($_POST['valor']) && isset($_POST['nome'])) {

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];
    $nomeproduto = $_POST['nome'];
    $valor = $_POST['valor'];

	if ($error === 0) {
		if ($img_size > 500000) {
			?>
			<script>
			javascript:alert('Seu arquivo é grande demais!');
			javascript:window.location='../controller/crud.php';
			</script>
			<?php
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $image = $tmp_name; 
                $imgContent = addslashes(file_get_contents($image)); 

				// Insert into Database
				$sql = "INSERT INTO products fornecedor VALUE '$nome'";
				mysqli_query($conn, $sql);
                $stmt = $conn->prepare("INSERT INTO products (fornecedor, name, lastmonth, twomonthago, threemonthago, fourmonthago, fivemonthago, sixmonthago) values (?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bind_param('ssssssss', $nome, $nomeproduto, $valor, $valor, $valor, $valor, $valor, $valor);
                $stmt->execute();
                $stmt->close();

                $sql = "UPDATE products SET image = '$imgContent' WHERE name = '$nomeproduto' ";
				mysqli_query($conn, $sql);

                    ?>
                    <script>
                    javascript:alert('Arquivo editado!');
                    javascript:window.location='../controller/crud.php';
                    </script>
                    <?php
			}else {
				    ?>
                    <script>
                    javascript:alert('Você não pode dar upload nisso!');
                    javascript:window.location='../controller/crud.php';
                    </script>
                    <?php
			}
		}
	}else {
            ?>
            <script>
            javascript:alert('Erro desconhecido!');
            javascript:window.location='../controller/crud.php';
            </script>
            <?php
	}

}else {
	?>
    <script>
    javascript:alert('Erro desconhecido!');
    javascript:window.location='../controller/crud.php';
    </script>
    <?php
}
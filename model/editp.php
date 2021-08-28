<?php

require './config.php';
$id = $_GET['id'];
$valor = $_POST['valor'];


if (isset($_FILES['my_image']) && isset($_POST['valor'])) {

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 125000) {
			?>
			<script>
			javascript:alert('Seu arquivo eh grande demais!');
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
				$sql = "UPDATE products SET image = '$imgContent' WHERE id = '$id' ";
				mysqli_query($conn, $sql);
                $sql = "UPDATE products SET lastmonth = '$valor' WHERE id = '$id' ";
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
<?php
require_once '../model/config.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>    
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD</title>
    </head>
    <body>
        <table border="1">

<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
?>      
   
        <tr>
        <td><?php echo "id: " . $row["id"]?></td>
        <td><?php echo "Fornecedor: " . $row["fornecedor"]?></td>
        <td><?php echo "Nome: " . $row["name"]?></td>
        <td><?php echo "Preço Atual: " . $row["lastmonth"]?>$RS</td>
  </br>
        </tr>
    </body>
    </html>  

<?php
  }
} else {
  echo "0 results";
}
?>
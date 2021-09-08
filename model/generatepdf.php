<?php
require_once '../model/config.php';
require_once __DIR__ . '/vendor/autoload.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id='$id'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $addedto = $row['addedto'];
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
    ?>
    <script>
    javascript:alert('Erro!');
    </script>
    <?php 
}

$mpdf = new \Mpdf\Mpdf();

$data='';

$data .= '<h1>Relatório do Produto:</h1>';

$data .= '<strong>ID:</strong> '. $id . '<br />';

$data .= '<strong>Nome:</strong> '. $nomeproduto . '<br />';

$data .= '<strong>Adcionada em:</strong> '. $addedto . ' listas de desejos <br />';

$data .= '<strong>Fornecedor:</strong> '. $fornecedor . '<br />';

$data .= '<strong>Preço atual:</strong> '. $preco . ' R$<br />';

$data .= '<strong>Preço (2 meses atrás):</strong> '. $tm . ' R$<br />';

$data .= '<strong>Preço (3 meses atrás):</strong> '. $thm . ' R$<br />';

$data .= '<strong>Preço (4 meses atrás):</strong> '. $fm . ' R$<br />';

$data .= '<strong>Preço (5 meses atrás):</strong> '. $fim . ' R$<br />';

$data .= '<strong>Preço (6 meses atrás):</strong> '. $six . ' R$<br />';

$mpdf->WriteHTML($data);

$mpdf->Output('myfile.pdf', 'D');





?>
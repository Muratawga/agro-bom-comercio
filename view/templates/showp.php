<?php


$sql = "SELECT * FROM products order by id DESC";
$result = mysqli_query($conn, $sql);
$i=1;
$r=1;
$count = 1;
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ${"id$i"} = $row['id'];
        ${"nome$i"} = $row['name']; 
        ${"fornecedor$i"} = $row['fornecedor']; 
        ${"image$i"} = '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
        $i++;
    }
} else {    
}

echo '<div class="container">';

foreach ($result as $value){
    if ($count%4 == 1)
    {  
         echo '<div class="card-deck">';
    }?>
            <div class="card">
              <img class="card-img-top" <?php echo ${"image$r"}?> alt="Imagem do produto" height="200px"> <!--Imagem do produto-->
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo ${"nome$r"} ?></h5> <!--Nome do produto-->
                <h6 class="text-center"><?php echo ${"fornecedor$r"} ?></h6> <!--Fornecedor-->
                <div class="text-center">
                    <button type="button" class="btn btn-success"><a href="<?php echo $url_produtos?><?php echo ${"id$r"}?></a>" class="text-light">Visualizar</a></button>
                </div>
                
              </div>
            </div>
            
<?php
    if ($count%4 == 0)
    {
        echo "</div>";
    }
    $count++;
    $r++;
}
echo "</div>";













?>
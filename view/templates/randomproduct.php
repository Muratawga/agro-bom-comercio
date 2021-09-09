<?php


$sql = "SELECT * FROM products order by RAND() LIMIT 4";
$result = mysqli_query($conn, $sql);
$i=1;
echo '<div class="container">';
echo '<div class="card-deck">';

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ${"id$i"} = $row['id'];
        ${"nome$i"} = $row['name']; 
        ${"fornecedor$i"} = $row['fornecedor']; 
        ${"image$i"} = '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
        ?>
        <div class="col-sm-3 mt-4">
        <div class="card">
              <img class="card-img-top" <?php echo ${"image$i"}?> alt="Imagem do produto" height="150px"> <!--Imagem do produto-->
              <div class="card-body">
                <h5 class="card-title text-center"><?php echo ${"nome$i"} ?></h5> <!--Nome do produto-->
                <h6 class="text-center"><?php echo ${"fornecedor$i"} ?></h6> <!--Fornecedor-->
                <div class="text-center">
                    <button type="button" class="btn btn-success"><a href="<?php echo $url_produtos?><?php echo ${"id$i"}?>" class="text-light">Visualizar</a></button>
                </div>    
              </div>
            </div>
            </div>
            <?php
            $i++;
    }
} else {    
}
echo "</div>";
echo "</div>";
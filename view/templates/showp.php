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

echo '<div class="caixa my-5">';

foreach ($result as $value){
    if ($count%4 == 1)
    {  
         echo '<div class="card-deck mx-3 my-3">';
    }?>

            <div class="card">
                <img class="card-img-top" <?php echo ${"image$r"}?> width="470" height="300" />
                <div class="card-body">
                    <h5 class="card-title"><?php echo ${"nome$r"} ?> </h5>
                    <h6 class="card-title"><?php echo ${"fornecedor$r"} ?> </h6>
                    <p class="card-text"></p>
                    <p class="card-text">
                        <a href="<?php echo $url_produtos?><?php echo ${"id$r"}?>">
                            <strong class="btn btn-outline-success">
                                <h9 style="font-weight: bold; font-family: Montserrat;"> ANALISAR</h9></i
                              ></strong
                            >
                        </a>
                    </p>
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
if ($count%4 != 1) echo "</div>";













?>
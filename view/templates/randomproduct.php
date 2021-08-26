<?php


$sql = "SELECT * FROM products order by RAND() LIMIT 4";
$result = mysqli_query($conn, $sql);
$i=1;
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

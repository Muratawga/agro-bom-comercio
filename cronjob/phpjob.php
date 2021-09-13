<?php

require '../model/config.php';

$sql = "SELECT * FROM products order by id DESC";
$result = mysqli_query($conn, $sql);
$i=1;

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        ${"id$i"} = $row['id']; 
        ${"preco$i"} = $row['lastmonth'];
        ${"tm$i"} = $row['twomonthago']; 
        ${"thm$i"} = $row['threemonthago']; 
        ${"fm$i"} = $row['fourmonthago']; 
        ${"fvm$i"} = $row['fivemonthago']; 
        ${"sm$i"} = $row['sixmonthago']; 
        $i++;
        }
}else {    
}
$r=1;

while($i>=$r){
    $preco = ${"preco$r"};
    $twomonth = ${"tm$r"};
    $threemonth = ${"thm$r"};
    $fourmonth = ${"fm$r"};
    $fivemonth = ${"fvm$r"};
    $sixmonth = ${"sm$r"};
    $id = ${"id$r"};
    
    $sql = "UPDATE products SET twomonthago='$preco' WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE products SET threemonthago='$twomonth' WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE products SET fourmonthago='$threemonth' WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE products SET fivemonthago='$fourmonth' WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);

    $sql = "UPDATE products SET sixmonthago='$fivemonth' WHERE id='$id' ";
    $result = mysqli_query($conn, $sql);
    $r++;


}

echo 'end';

?>

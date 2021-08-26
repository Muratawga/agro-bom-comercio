<?php


$sql = "SELECT * FROM products order by RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        $nome1 = $row['name']; 
        $fornecedor1 = $row['fornecedor']; 
        $image1 = '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
    }
} else {    
}

$sql = "SELECT * FROM products order by RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $nome2 = $row['name'];  
    $fornecedor2 = $row['fornecedor']; 
    $image2 = '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
    }
} else {    
}


$sql = "SELECT * FROM products order by RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $nome3 = $row['name'];  
    $fornecedor3 = $row['fornecedor']; 
    $image3 = '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
    }
} else {    
}


$sql = "SELECT * FROM products order by RAND() LIMIT 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
    $nome4 = $row['name'];  
    $fornecedor4 = $row['fornecedor']; 
    $image4 = '<img src="data:image/jpeg;base64,'.base64_encode( $row['image'] ).'"';
    }
} else {    
}














?>
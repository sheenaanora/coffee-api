<?php

header("Content-Type: application/json");

include "db.php";

$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$total_price = $_POST['total_price'];
$customer_name = $_POST['customer_name'];
$status = "Pending";

$sql = "INSERT INTO orders 
(product_name, quantity, total_price, customer_name, status)
VALUES
('$product_name', '$quantity', '$total_price', '$customer_name', '$status')";

if (mysqli_query($conn, $sql)) {

    echo json_encode([
        "success" => true,
        "message" => "Order added successfully"
    ]);

} else {

    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
}

?>
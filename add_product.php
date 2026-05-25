<?php

header("Content-Type: application/json");

include "db.php";

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$category = $_POST['category'] ?? '';
$product_image = $_POST['product_image'] ?? '';

$sql = "INSERT INTO products 
(coffee_name, description, price, category, product_image)
VALUES 
('$name', '$description', '$price', '$category', '$product_image')";

if (mysqli_query($conn, $sql)) {
    echo json_encode([
        "success" => true,
        "message" => "Product added successfully"
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
}

?>
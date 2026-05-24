<?php

header("Content-Type: application/json");

include "db.php";

$coffee_name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$category = $_POST['category'] ?? '';

$sql = "INSERT INTO products (coffee_name, description, price, category)
VALUES ('$coffee_name', '$description', '$price', '$category')";

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
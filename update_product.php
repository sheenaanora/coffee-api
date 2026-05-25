<?php
header("Content-Type: application/json");
include "db.php";

$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$category = $_POST['category'] ?? '';
$product_image = $_POST['product_image'] ?? '';

$sql = "UPDATE products SET
coffee_name='$name',
description='$description',
price='$price',
category='$category'";

if ($product_image != '') {
    $sql .= ", product_image='$product_image'";
}

$sql .= " WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true, "message" => "Product updated successfully"]);
} else {
    echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
}
?>
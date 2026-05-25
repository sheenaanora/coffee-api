<?php
header("Content-Type: application/json");
include "db.php";

$productQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_products FROM products WHERE coffee_name != ''");
$productRow = mysqli_fetch_assoc($productQuery);

$orderQuery = mysqli_query($conn, "SELECT COUNT(*) AS total_orders FROM orders");
$orderRow = mysqli_fetch_assoc($orderQuery);

$salesQuery = mysqli_query($conn, "SELECT COALESCE(SUM(total_price), 0) AS total_sales FROM orders");
$salesRow = mysqli_fetch_assoc($salesQuery);

echo json_encode([
    "total_products" => $productRow["total_products"],
    "total_orders" => $orderRow["total_orders"],
    "total_sales" => $salesRow["total_sales"]
]);
?>
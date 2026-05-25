<?php
header("Content-Type: application/json");

$conn = mysqli_connect("localhost", "root", "", "coffee_shop_db");

if (!$conn) {
    die(json_encode([
        "success" => false,
        "message" => "Database connection failed"
    ]));
}

$query = "SELECT * FROM orders ORDER BY id DESC";
$result = mysqli_query($conn, $query);

$orders = [];

while ($row = mysqli_fetch_assoc($result)) {
    $orders[] = $row;
}

echo json_encode($orders);
?>
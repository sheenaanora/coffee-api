<?php
header("Content-Type: application/json");
include "db.php";

$id = $_POST['id'] ?? '';
$status = $_POST['status'] ?? '';

if ($id == '' || $status == '') {
    echo json_encode([
        "success" => false,
        "message" => "Order ID and status are required."
    ]);
    exit;
}

$sql = "UPDATE orders SET status = '$status' WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode([
        "success" => true,
        "message" => "Order status updated successfully."
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
}
?>
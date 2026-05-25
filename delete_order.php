<?php
header("Content-Type: application/json");
include "db.php";

$id = $_POST['id'] ?? '';

if ($id == '') {
    echo json_encode([
        "success" => false,
        "message" => "Order ID is required."
    ]);
    exit;
}

$sql = "DELETE FROM orders WHERE id = '$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode([
        "success" => true,
        "message" => "Order removed successfully."
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => mysqli_error($conn)
    ]);
}
?>
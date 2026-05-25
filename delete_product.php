<?php
header("Content-Type: application/json");
include "db.php";

$id = $_POST['id'] ?? '';

$sql = "DELETE FROM products WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    echo json_encode(["success" => true, "message" => "Product deleted successfully"]);
} else {
    echo json_encode(["success" => false, "message" => mysqli_error($conn)]);
}
?>
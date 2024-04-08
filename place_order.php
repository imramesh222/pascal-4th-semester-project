<?php

include("db_connection.php");

session_start();
$sess_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id']) && isset($_POST['quantity'])) {

    $productId = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $insertQuery = "INSERT INTO orders (id, ProductID, order_quantity, status) VALUES ('$sess_id', '$productId', '$quantity', 'Pending')";

    if (mysqli_query($conn, $insertQuery)) {
       
        header("Location: show_cart.php");
        exit();
    } else {
       
        echo "Error placing order: " . mysqli_error($conn);
       
        exit();
    }
} else {

    header("Location: show_cart.php");
    exit();
}
?>

<?php
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];

    if (isset($_POST['accept'])) {
        $orderQuery = "SELECT * FROM orders WHERE order_id = $orderId";
        $orderResult = mysqli_query($conn, $orderQuery);

        if ($orderResult && mysqli_num_rows($orderResult) > 0) {
            $orderDetails = mysqli_fetch_assoc($orderResult);
            $productId = $orderDetails['ProductID'];
            $orderQuantity = $orderDetails['Order_quantity'];

          
            $updateStockQuery = "UPDATE products SET stock = stock - $orderQuantity WHERE product_id = '$productId'";
            mysqli_query($conn, $updateStockQuery);

           
            $updateStatusQuery = "UPDATE orders SET status = 'Accepted' WHERE order_id = '$orderId'";
            mysqli_query($conn, $updateStatusQuery);

            header("Location: view_order.php");
            exit();
        } else {
            echo "Failed to retrieve order details.";
            
        }
    } elseif (isset($_POST['reject'])) {
       

        header("Location: view_order.php");
        exit();
    }
} else {
    header("Location: view_order.php");
    exit();
}
?>

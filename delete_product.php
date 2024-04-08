<?php
session_start();
include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_product_id'])) {
    $deleteID = $_POST['delete_product_id'];

    
    $deleteOrdersSql = "DELETE FROM orders WHERE ProductID = '$deleteID'";
    if ($conn->query($deleteOrdersSql) === TRUE) {
        
        $deleteProductSql = "DELETE FROM products WHERE product_id = '$deleteID'";
        
        if ($conn->query($deleteProductSql) === TRUE) {
            echo "Product deleted successfully";

            header("Location: admin_dashboard.php");
            exit(); 
        } else {
            echo "Error deleting product: " . $conn->error;
        }
    } else {
        echo "Error deleting associated orders: " . $conn->error;
    }
} else {
    echo "Invalid request to delete product.";
}

?>

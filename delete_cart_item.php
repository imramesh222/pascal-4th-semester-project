<?php

include("db_connection.php");

session_start();
$sess_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['product_id'])) {
   
    $productIdToDelete = $_POST['product_id']; 

    $deleteQuery = "DELETE FROM cart WHERE product_id = $productIdToDelete AND user_id = '$sess_id'";

  
    if (mysqli_query($conn, $deleteQuery)) {
      
        header("Location: show_cart.php");
        exit();
    } else {
        
        echo "Error deleting item: " . mysqli_error($conn);
    
        exit();
    }
} else {

    header("Location: show_cart.php");
    exit();
}
?>

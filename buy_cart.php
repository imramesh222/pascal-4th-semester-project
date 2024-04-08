<?php
include("db_connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy'])) {
    $productId = $_POST['product_id'];
    $productQuant = $_POST['quan'];
    $price = $_POST['price'];
    $order_date = date("Y-m-d");
    $total_price = $price * $productQuant;
    $user_id = $_SESSION["user_id"];

    $stockBeforeQuery = "SELECT stock FROM products WHERE product_id = $productId";
    $stockBeforeResult = mysqli_query($conn, $stockBeforeQuery);
    
    if (mysqli_num_rows($stockBeforeResult) > 0) {
        $stockBeforeData = mysqli_fetch_assoc($stockBeforeResult);
        $stockBefore = $stockBeforeData['stock'];
    }
    
    if ($stockBefore >= $productQuant) {
        
        $orderAfter = $stockBefore - $productQuant;

        if ($orderAfter <= 0) {
            echo "<script>alert('Requested quantity not available in stock.');</script>";
        } else {
          
            $sql = "INSERT INTO orders (id, productid, order_quantity, order_date, total_amount, status) VALUES ($user_id, $productId, $productQuant, '$order_date', $total_price, 'Pending')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
               
                $updateStockQuery = "UPDATE products SET stock = $orderAfter WHERE product_id = $productId";
                mysqli_query($conn, $updateStockQuery);

                echo "<script>alert('Order placed successfully!');</script>";
                header("location: user-profile.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "<script>alert('Requested quantity not available in stock.');</script>";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {

    $productId = $_POST['product_id'];
    $productQuant = $_POST['quan'];
    $price = $_POST['price'];
    $order_date = date("Y-m-d");
    $total_price = $price * $productQuant;
    $user_id = $_SESSION["user_id"];


    

    $stockBeforeQuery = "SELECT stock FROM products WHERE product_id = $productId";
    $stockBeforeResult = mysqli_query($conn, $stockBeforeQuery);
    
    if (mysqli_num_rows($stockBeforeResult) > 0) {
        $stockBeforeData = mysqli_fetch_assoc($stockBeforeResult);
        $stockBefore = $stockBeforeData['stock'];
    }
    
    if ($stockBefore >= $productQuant) {
      
            $sql = "INSERT INTO cart (user_id, product_id, quantity) VALUES ($user_id, $productId, $productQuant)";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                
                $updateStockQuery = "UPDATE cart SET quantity=  $productQuant WHERE product_id = $productId";
                mysqli_query($conn, $updateStockQuery);

                echo "<script>alert('Order placed successfully!');</script>";
                header("location: user-profile.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        // }
    } else {
        echo "<script>alert('Requested quantity not available in stock.');</script>";
    }

    

}
?>

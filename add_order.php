<?php
session_start();

include ("db_connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['buy'])) {
  
    $productId = $_POST['product_id'];
    $productQuant = $_POST['quan'];
    $price = $_POST['price'];
    $order_date = date("Y-m-d");
    $total_price = $price * $productQuant;
    $user_id = $_SESSION["user_id"];
    

    $sql = "Insert into orders( id, productid, order_quantity, order_date, total_amount) values ( $user_id, $productId, $productQuant,$order_date, $total_price)";
    $result = mysqli_query($conn, $sql);  
    print_r($result);

    if($result){
      header("Location: user-profile.php");
    }

}

?>
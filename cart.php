
<?php
session_start();


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];

    

    $quantity = 1;
    $sql = "INSERT INTO cart (product_id, user_id, quantity) VALUES ($productId, $userid,$quantity)";
    if ($conn->query($sql) === TRUE) {
        echo "New product added successfully";
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
echo "Sorry, there was an error uploading your file.";
}


  

?>



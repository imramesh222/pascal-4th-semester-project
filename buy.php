<?php

require 'db_connection.php';

$product_id = $product['product_id'];
$product_name = $product['product_name'];
$product_price = $product['price'];
?>


<a href="checkout.php?product_id=<?php echo $product_id; ?>&name=<?php echo $product_name; ?>&price=<?php echo $product_price; ?>">
    <button class="buy-btn">BUY</button>
</a>

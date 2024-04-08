<?php
include("db_connection.php");
session_start();
$sess_id = $_SESSION['user_id'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['place_order'])) {
      
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        
        header("Location: cart_page.php");
        exit();
    }

    
    if (isset($_POST['delete_item'])) {
    
        $productIdToDelete = $_POST['product_id']; 

        
        header("Location: current_page.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: inline;
        }

        input[type="submit"] {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px 2px;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #df3727;
        }

        p {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="cart-block">
    <h1>Cart Items</h1>
    <?php
    $sql = "SELECT * FROM cart";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        ?>
        <table border="1">
            
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Order Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                       
                        <td><?php echo $row['product_id']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>

                        <?php
                        
                        $productId = $row['product_id'];
                        $quantity = $row['quantity'];

                        $priceQuery = "SELECT price FROM products WHERE product_id = $productId";
                        $priceResult = mysqli_query($conn, $priceQuery);
                        $priceRow = mysqli_fetch_assoc($priceResult);
                        $productPrice = $priceRow['price'];

                        $totalAmountPerItem = $productPrice * $quantity;
                        ?>

                        <td><?php echo $productPrice; ?></td>
                        <td><?php echo $totalAmountPerItem; ?></td>

                        <td>
                            
                            <form action="place_order.php" method="POST">
                                <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
                                <input type="hidden" name="quantity" value="<?php echo $row['quantity']; ?>">
                                <input type="submit" name="place_order" value="Place Order">
                                <input type="submit" formaction="delete_cart_item.php" formmethod="POST" name="delete_item" value="Delete">
                            </form>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
        <?php
    } else {
        echo "No items in the cart.";
    }
    ?>
</div>

<div class="orders-block">
    <section id="my-orders">
        <h2>My Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT o.OrderID, p.product_name, o.Order_quantity, p.price, o.status 
                          FROM orders o
                          INNER JOIN products p ON o.ProductID = p.product_id
                          WHERE o.id = '$sess_id'";
                $result = $mysql->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['OrderID'] . "</td>";
                        echo "<td>" . $row['product_name'] . "</td>";
                        echo "<td>" . $row['Order_quantity'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";

                     
                        $totalAmountPerOrder = $row['Order_quantity'] * $row['price'];
                        echo "<td>" . $totalAmountPerOrder . "</td>";

                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </section>
</div>


</body>
</html>

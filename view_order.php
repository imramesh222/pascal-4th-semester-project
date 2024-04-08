<!DOCTYPE html>
<html>
<head>
    <title>Orders</title>
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
    </style>
</head>
<body>

<h1>Orders</h1>
<?php
include("db_connection.php");

$sql = "SELECT * FROM orders where status='Pending'";
$result = mysqli_query($conn, $sql);
?>

<?php if (mysqli_num_rows($result) > 0): ?>
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Quantity</th>
                <th>Product ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)): ?>
            <tr>
            <form action="process_order.php" method="POST">
                <td><?php echo $row['OrderID']; ?></td>
                <td><?php echo $row['Order_quantity']; ?></td>
                <td><?php echo $row['ProductID']; ?></td>
                <td>
                    <?php if ($row['status'] == 'Accepted' || $row['status'] == 'Rejected'): ?>
                        <?php echo $row['status']; ?>
                    <?php else: ?>
                        
                            <input type="hidden" name="order_id" value="<?php echo $row['OrderID']; ?>">
                            <input type="submit" name="accept" value="Accept">
                            <input type="submit" name="reject" value="Reject">
                        </form>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
<?php else: ?>
    <p>No orders found.</p>
<?php endif; ?>

</body>
</html>

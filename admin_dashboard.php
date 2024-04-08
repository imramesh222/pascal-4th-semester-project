<?php
session_start();

include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_product'])) {
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $targetDirectory = "img/"; 
        $image = $_FILES['image']['name'];
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            $sql = "INSERT INTO products (product_name, price, image, stock, description) VALUES ('$productName', '$price', '$image', '$stock', '$description')";
            
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('New product added successfully');</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "<script>alert('Error moving uploaded file');</script>";
        }
    } else {
        echo "<script>alert('Error uploading image');</script>";
    }
}
if (!isset($_SESSION['admin_username'])) {
    header("Location: admin_login.php");
    exit;
}


if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }


h1 {
    text-align: center;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

th,
td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

th {
    background-color: #f2f2f2;
}

form {
    margin-bottom: 20px;
}

label,
input,
textarea {
    display: block;
    margin-bottom: 10px;
    width: 100%;
}

input[type="text"],
input[type="number"],
textarea {
    width: calc(100% - 16px); 
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

input[type="submit"]:hover {
    background-color: #45a049;
}

.add-product-container {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
        .logout-button {
            position: fixed;
            top: 20px;
            right: 20px;
        }

        .logout-button button {
            padding: 8px 15px;
            background-color: #f44336;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-button button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
   
    <div class="logout-button">
        <button onclick="confirmLogout()">Logout</button>
    </div>

    
    <h1>Welcome, Admin!</h1>
    
    <div class="view-order">
        <a href="view_order.php">View orders</a>
    </div>
    <div class="add-product-container">
        <h2>Add New Product</h2>
        <form action="admin_dashboard.php" method="POST" enctype="multipart/form-data">
            <label for="productName">Product Name:</label>
            <input type="text" id="productName" name="productName" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" min="0.01" required>

            <label for="image">Upload Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <label for="stock">Stock:</label>
            <input type="number" id="stock" name="stock" min="0" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <input type="submit" name="add_product" value="Add Product">
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Stock</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("db_connection.php");

            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["product_id"] . "</td>";
                    echo "<td>" . $row["product_name"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["image"] . "</td>";
                    echo "<td>" . $row["stock"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>
                        <form action='delete_product.php' method='POST'>
                            <input type='hidden' name='delete_product_id' value='" . $row["product_id"] . "'>
                            <input type='submit' value='Delete'>
                        </form>
                      </td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }
            ?>
        </tbody>
    </table>
    
    
    <script>
        function confirmLogout() {
            var confirmLogout = confirm('Are you sure you want to logout?');
            if (confirmLogout) {
                window.location.href = 'admin_login.php?logout=true';
            }
        }
    </script>
</body>
</html>

<?php
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
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add New Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            max-width: 500px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label,
        input[type="text"],
        input[type="number"],
        textarea {
            display: block;
            margin-bottom: 10px;
            width: 100%;
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
    </style>
</head>
<body>
    <h2>Add New Product</h2>
    <form action="add_product.php" method="POST" enctype="multipart/form-data">
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
</body>
</html>

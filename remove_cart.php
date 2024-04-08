<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        .cart-container {
            max-width: 800px;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .add-to-cart-form {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .add-to-cart-form input[type="number"] {
            width: 60px;
            margin-right: 10px;
            padding: 5px;
            text-align: center;
        }

        .add-to-cart-form input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            padding: 8px 12px;
            cursor: pointer;
        }

        .add-to-cart-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .remove-btn {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .remove-btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Shopping Cart</h1>

    <div class="cart-container">
        <table>
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                
                <tr>
                    <td>1</td>
                    <td>Product A</td>
                    <td>$20</td>
                    <td>2</td>
                    <td><button class="remove-btn">Remove</button></td>
                </tr>
            </tbody>
        </table>

        <form class="add-to-cart-form" action="add_to_cart.php" method="POST">
            <input type="number" name="quantity" value="1" min="1">
            <input type="hidden" name="product_id" value="1">
            <input type="submit" value="Add to Cart">
        </form>
    </div>

    <script>
       
        const removeButtons = document.querySelectorAll('.remove-btn');
        removeButtons.forEach(button => {
            button.addEventListener('click', () => {
               
                button.closest('tr').remove();
            });
        });
    </script>
</body>
</html>

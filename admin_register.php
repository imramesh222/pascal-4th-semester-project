<!DOCTYPE html>
<html>

<head>
    <title>Admin Registration</title>
    <style>
           body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 30%;
            margin: 100px auto;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        

        h2 {
            text-align: center;
        }

        label,
        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }

        input[type="text"],
        input[type="password"] {
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 4px;
            padding: 10px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

    </style>
</head>

<body>
    <div class="container">
        <h2>Admin Registration</h2>
        <?php
        session_start();
        $servername = "localhost";
        $username = "root";
        $password = ""; 

       
        $conn = new mysqli($servername, $username, $password, "test");

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

      

       

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $admin_username = $_POST['username'];
            $admin_password = $_POST['password'];

            
            $sql = "INSERT INTO admin (admin_username, admin_password) VALUES ('$admin_username', '$admin_password')";

            if ($conn->query($sql) === TRUE) {
                echo "Admin registered successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $conn->close();
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Register">
            <a href="admin_login.php">Login</a>
        </form>
    </div>
</body>

</html>

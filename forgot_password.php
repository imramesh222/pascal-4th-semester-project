<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="forgot.css">
    <script>
        function showErrorMessage() {
            document.getElementById("error-message").style.display = "block";
        }
    </script>
</head>
<body>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" onsubmit="showErrorMessage()">
            <label for="email">Enter your email address:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Reset Password</button>
        </form>
        <?php
function storeToken($email, $token, $expiration_time) {
  
}

function sendEmail($email, $subject, $message) {

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $email = $_POST['email'];

    
    $mysqli = new mysqli('localhost', 'root', '', 'test');
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    
    $stmt = $mysqli->prepare("SELECT * FROM registration WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $emailExists = true; 
    } else {
        $emailExists = false; 
    }

    if ($emailExists) {
        $token = bin2hex(random_bytes(32));

      
        $expiration_time = date("Y-m-d H:i:s", strtotime('+1 hour'));

       
        storeToken($email, $token, $expiration_time);

       
        $resetLink = "http://yourwebsite.com/reset_email.php?token=$token";
        $subject = "Password Reset";
        $message = "To reset your password, click on the link below:\n\n$resetLink";

        sendEmail($email, $subject, $message);

        
        echo "Password reset instructions have been sent to your email.";
        
    } else {
      
        echo "Email address not found.";
    }

  
    $stmt->close();
    $mysqli->close();
}
?>


        <a href="login1.php">Back to Login</a>
    </div>
</body>
</html>

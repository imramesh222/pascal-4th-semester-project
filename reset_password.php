<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    
</head>
<body>
    <div class="container">
        <h2>Reset Password</h2>
        <form action="process_reset.php" method="POST">
            <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <label for="new_password">New Password:</label>
            <input type="password" id="new_password" name="new_password" required>
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
            <button type="submit">Reset Password</button>
        </form>
    </div>
</body>
</html>


<?php
session_start();

include("db_connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
		$hashed_password = hash('sha256', $password);

		$_SESSION["email"] = $email;

  
    $conn = new mysqli('localhost', 'root', '', 'test');


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT user_id, user_profile FROM registration WHERE email = ? AND password = ?");
    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['user_profile'] = $row['user_profile'];


        header("Location: user-profile.php?profile=" . $_SESSION['user_profile']);
        exit;
    } else {
       
        $error_message = "Invalid email or password. Please try again.";
        header("Location: login1.php?error=$error_message");
        exit;
    }

    
}
   
    $conn->close();
?>

<!DOCTYPE html>
<html>

<head>
	<title>login Page</title>
	<link rel="stylesheet" type="text/css" href="css/log.css">
</head>

<body>
	<div class="container-login">
		<div class="log">
			<div class="panel">
				<div class="panel-body">

					<?php
					if (isset($_GET['error'])) {
						echo "<p style='color: red;'>" . $_GET['error'] . "</p>";
					}
					?>
					<form action="login1.php" method="post">

						<div class="panel-form">
							<div class="panel-heading">
								<h1>Login</h1>
							</div>

							<div class="form-group">
								<label for="email">Email</label>
								<input type="email" id="email" class="form-control" name="email" required />
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" id="password" class="form-control" name="password" required />
								<span class="eye-icon" id="showPassword" style="cursor:pointer;">&#128065;</span> 
								
							</div>


							<div class="button">
								<input id="but" type="submit" class="btn btn-primary w-100" value="Login" name="">
								<a href="forgot_password.php">Forgot Password?</a>
							</div>

						</div>


					</form>
				</div>
			</div>
		</div>
	</div>
	<script>
        const passwordField = document.getElementById('password');
        const showPasswordCheckbox = document.getElementById('showPassword');

        showPasswordCheckbox.addEventListener('click', function () {
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                showPasswordCheckbox.innerHTML = '&#128064;'; 
            } else {
                passwordField.type = 'password';
                showPasswordCheckbox.innerHTML = '&#128065;'; 
            }
        });
    </script>


<?php

$host = 'localhost';
$db = 'test';
$user = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$stmt = $pdo->query("SELECT * FROM products");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<?php foreach ($products as $product): ?>
    <div class="product">
     
    </div>
<?php endforeach; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Store</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="style.css">
  
</head>
<body>

  <section id="header">
    <a href="home_page.php"><img src="img/logo1.png" class="logo" alt=""></a>
    <div>
    <ul id="navbar">
      <li><a class="active"href="home_page.php">Home</a></li>
      <li><a href="shop.php">Shop</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>

    </ul>
    </div>
    <div class="mobile">
      <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
    <div class="container-login">
              <div class="button">
               <a href="login1.php"> <input id="but" type="submit" class="btn btn-primary w-100" value="Login" name=""></a>
              </div>
              <div class="button">
               <a href="register.php"><input id="but" type="submit" class="btn btn-primary w-100" value="Sign Up" name=""></a> 
              </div>
  
              </div>
              
  
            </form>
          </div>
        </div>
      </div>
    </div>
  
  </section>
  <section id="hero">
    <h4>offer! offer! offer!</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save your money & up to 70% off!</p>
    <button>Shop Now</button>
  </section>


  <section id="product1" class="section-p1">
  <h2> Products</h2>


   
    <div class="pro-conttainer">
      <?php
      include("db_connection.php");

      $sql = "SELECT * FROM products";
      $result = $conn->query($sql);
      
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        ?>
      <div class="pro" onclick="goto('sproduct.php?product_id=<?php echo $row['product_id']?>')">
        <img src="img/<?php echo $row['image'] ?>" alt="">
        <div class="des">
          <h5><?php echo $row['product_name'] ?></h5>
          
            <h4><?php echo $row['price'] ?></h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <?php
        }
      } else {
        echo "No products available";
      }
    ?>
    </div>
  </section>








  <footer class="section-p1">
    <div class="col">
      <img class="logo" src="img/logo.png" alt="">
      <h4>Contact</h4>
      <p><strong>Address: </strong> Satdobato,Lalitpur</p>
      <p><strong>Phone: </strong> +9779868043277</p>
      <p><strong>Hours: </strong> 10:00 - 18:00, Sun - Fri</p>
      <div class="follow">
        <h4>Follow us</h4>
        <div class="icon">
          <i class="fab fa-facebook-f"></i>
          <i class="fab fa-twitter"></i>
          <i class="fab fa-instagram"></i>
          <i class="fab fa-pinterest-p"></i>
          <i class="fab fa-youtube"></i>
        </div>
      </div>
    </div>
    <div class="col">
      <h4>About</h4>
      <a href="#">About us</a>
      <a href="#">Delivery Information</a>
      <a href="#">Privacy Policy</a>
      <a href="#">Terms & Conditions</a>
      <a href="#">Contact us</a>
    </div>
    <div class="col">
      <h4>My Account</h4>
      <a href="#">Sign In</a>
      <a href="#">View Cart</a>
      <a href="#">My Wishlist</a>
      <a href="#">Help</a>
    </div>

    
  </footer>
  <script src="script.js"></script>
</body>
</html>
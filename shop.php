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
?>


<?php
include 'db_connection.php'; 
$stmt = $pdo->query("SELECT * FROM product");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>





<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashion Store</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>
  <link rel="stylesheet" href="./shop.css">
</head>
<body>

  <section id="header">
    <a href="home_page.php"><img src="img/logo1.png" class="logo" alt=""></a>
    <div>
    <ul id="navbar">
      <li><a href="user-profile.php">Home</a></li>
      <li><a class="active" href="shop.php">Shop</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li id="lg-bag"><a href="cart.php"><i class="fas fa-shopping-cart"></i></a></li>
      <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
    </ul>
    </div>
    <div class="mobile">
      <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
  </section>



  <section id="product1" class="section-p1">
    <h2>Top Products</h2>
    <div class="pro-conttainer">
      <div class="pro" onclick="window.location.href='sproduct.php';">
        <img src="img/products/f1.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
          
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/f2.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/f3.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
            
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/f4.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/f5.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/f6.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
         
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/f7.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
         
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/f8.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>

            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>

      <div class="pro">
        <img src="img/products/n1.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>

            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n2.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
          
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n3.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
      
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n4.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n5.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
        
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n6.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
           
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n7.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
            
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
      <div class="pro">
        <img src="img/products/n8.jpg" alt="">
        <div class="des">
          <span>adidas</span>
          <h5>Cartoon Astronaut T-Shirts</h5>
           
            <h4>Rs500</h4>
        </div>
        <a href="#"><i class="fas fa-shopping-cart cart"></i></a>
      </div>
    </div>
  </section>
  <section id="pagination" class="">
    <a href="#">1</a>
    <a href="#">2</a>
    <a href="#"><i class="fa-solid fa-arrow-right"></i></a>
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
      <a href="#">Track My Order</a>
      <a href="#">Help</a>
    </div>
   
  
  </footer>
  <script src="script.js"></script>
</body>
</html>
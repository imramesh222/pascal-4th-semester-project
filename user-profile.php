
<?php
include("session.php");
include("db_connection.php");


$sess_email = $_SESSION["email"];
$sess_id =$_SESSION['user_id'];


$query1 = "select * from registration where email = '$sess_email'";

	$selectQuery = $mysql->query($query1);
    while($row = $selectQuery->fetch_assoc()){
        $first_name = $row["firstName"];
    }

 

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
  <link rel="stylesheet" href="user_profile.css">
  <style>
    #logoutBtn {
  background-color: transparent; 
  color: black; 
  padding: 8px 10px; 
  border: none; 
  border-radius: 5px; 
  cursor: pointer; 
  font-size: 14px; 
  transition-duration: 0.3s; 
  text-align: center;
  text-decoration: none; 
  display: inline-block;
}

#logoutBtn:hover {
background-color: #d32f2f; 
}
button[name="buy"] {
    background-color: #008CBA;
    color: white;
    padding: 5px 15px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    transition-duration: 0.4s;
  }


  button[name="add_to_cart"] {
    background-color: red;
    color: black;
    padding: 5px 15px;
    border: 1px solid black;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    transition-duration: 0.4s;
  }
  </style>
</head>
<body>

  <section id="header">
    <a href="user-profile.php"><img src="img/logo1.png" class="logo" alt=""></a>
    
    <div>
    <ul id="navbar">
   
      <li><a class="active"href="user-profile.php">Home</a></li>
      <li><a href="shop.php">Shop</a></li>
      <li><a href="about.php">About</a></li>
      <li><a href="contact.php">Contact</a></li>
   <li id="lg-bag"><a href="show_cart.php"><i class="fas fa-shopping-cart"></i></a></li>
      <a href="#" id="close"><i class="fa-solid fa-xmark"></i></a>
    </ul>
    </div>
    <div class="mobile">
     <a href="show_cart.php"><i class="fas fa-shopping-cart"></i></a>
      <i id="bar" class="fas fa-outdent"></i>
    </div>
    <div class="userprofile">
      <a href="user-profile.php"><i class="fa-solid fa-user"></i></a>
      <h6><?php echo $first_name ?></h6>
    </div>
    <div class="userprofile">

  <button id="logoutBtn">Logout</button> 
</div>
    

  </section>
  <section id="hero">
    <h4>Trade-in-offer</h4>
    <h2>Super value deals</h2>
    <h1>On all products</h1>
    <p>Save your money & up to 90% off!</p>
    <button>Shop Now</button>
  </section>


  <section id="product1" class="section-p1">
  


   
    <div class="pro_container">
      <?php
  $db_host = "localhost";
  $db_username = "root";
  $db_password = "";
  $db_name = "test";
  
  
  
  
  $conn = mysqli_connect("localhost","root","","test");
  
  
      
    ?>
</section>  

    </div>
    <div class="products">
        <div class="products-con">
            <h1>Products</h1>
                  
           
            <div class="products-grid">
            
                <?php 
                    include("db_connection.php");
                    $sql = "SELECT * from products ORDER By product_id DESC";
                    $result = mysqli_query($conn, $sql);
                    while($row = mysqli_fetch_assoc($result)){
                        $img = 'img/'.$row['image'];
                ?>
                <div class="product-box">
                <form action="buy_cart.php" method="post">
            <img src="<?php echo $img;?>" style="width: 200px; height: 200px;">
            <h2><?php echo $row['product_name'];?></h2>
            <h3>Nrs: <span><?php echo $row['price'];?></span></h3>
   
        <input type="number" name="quan" min="1" max="5" value="1" placeholder="Quantity" required>
        <input type="hidden" name="img" value="<?php echo $img;?>" placeholder="Name" required>
        <input type="hidden" name="name" value="<?php echo $row['product_name'];?>" placeholder="Name" required>
        <input type="hidden" name="product_id" value="<?php echo $row['product_id'];?>">
        <input type="hidden" name="price" value="<?php echo $row['price'];?>" placeholder="price" required>
        <button type="submit" name="buy" onclick="confirmPurchase('<?php echo $row['product_name']; ?>')">BUY</button>
                <button type="submit" name="add_to_cart">Add To Cart</button>
    </form>



                </div>  
            <?php 
                }
            ?>
            </div>
        </div>
    </div>
    
    
 
    <script>
    function confirmPurchase(productName) {
      var confirmBuy = confirm('Are you sure you want to buy ' + productName + '?');
      if (confirmBuy) {
        window.location.href = 'buy_cart.php'; 
      } else {
        
      }
    }

    document.getElementById('logoutBtn').addEventListener('click', function() {
      var confirmLogout = confirm('Are you sure you want to logout?');
      if (confirmLogout) {
        window.location.href = 'logout.php';
      }
    });
  </script>
  <script src="script.js"></script>
</body>
</html>
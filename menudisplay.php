<html lang="en">
<head>
    <title>Vivers Menu</title>
    <meta charset=“utf-8”>
    <!-- CSS -->
    <link rel="stylesheet" href="css/layout.css"/>
	<link rel="stylesheet" href="css/menupage.css"/>
    <!-- Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <!-- Montserrat Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="header">
        <?php
        $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
        if (!$conn){
            echo "Error: Could not connect to database. Please try again later.";
               exit;
        }
        ?>
        <div style="position:relative;left:-400px;">
            <div class="navbar">
                <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-content">
                    <a href="menudisplay.php">Menu</a>
                    <a href="trackorder.html">Track My Order</a>
                    <a href="account.php">My Account</a>
                    <a href="support.html">Support</a>
                </div>
                </div>
            </div>
        </div>
        <img src="assets/logo.png" class="logo" >
        <a href="login.php" style="color: black;"><div style="position:relative; right:-420px"><i class="far fa-user-circle"></i></div></a>
        <a href="cart.html" style="color: black;"><div style="position:relative; right:-440px;"><i class="fas fa-shopping-cart"></i></div></a>
    </div>
    <div class="main">
        <div class="banner">
            <img src="assets/banner.png" width="100%">
        </div>
        <div class="mainmenu">
            <div class="menunav">
                <a href="#popular"class="navlink"><div class="navitem"><p>Popular</p></div></a>
                <a href="#promo" class="navlink"><div class="navitem"><p>Promo</p></div></a>
                <a href="#mains"class="navlink"><div class="navitem"><p>Mains</p></div></a>
                <a href="#sides"class="navlink"><div class="navitem"><p>Sides</p></div></a>
                <a href="#beverages"class="navlink"><div class="navitem"><p>Beverages</p></div></a>
                <a href="#desserts"class="navlink"><div class="navitem"><p>Desserts</p></div></a>
            </div>
            <div class="menudisplay">
                <div id="promo">
                <?php
                    
                    $sql = "SELECT productname, category FROM product_menu WHERE category='promo'";
                    if (!$result = mysqli_query($conn, $sql)) {
                        echo "Failed to get menu: " . mysqli_error($conn);
                    }
                    $resultRow = mysqli_num_rows($result);
                    echo "<h2>PROMOS</h2>";
                    if ($resultRow>0){
                        while ($row = mysqli_fetch_assoc($result)){
                            // $sqlimage ="SELECT "
                           if(!$category){ 
                                echo"<table>";
                                echo"<tr>";   
                                echo $row["productname"] . $row["category"] ."<br>";
                                echo "<button>+</button>";
                                echo "<tr>";
                                echo "</table>";
                            }
                           else{
                               echo"none";
                           }
                         }
                    }                   
                ?>
                </div>
                <div id="mains">
                <?php
                    $sql = "SELECT productname, category FROM product_menu WHERE category='main'";
                    if (!$result = mysqli_query($conn, $sql)) {
                        echo "Failed to get menu: " . mysqli_error($conn);
                    }
                    $resultRow = mysqli_num_rows($result);
                    if ($resultRow>0){
                        while ($row = mysqli_fetch_assoc($result)){
                           if(!$category){ 
                               echo $row["productname"] . $row["category"] ."<br>";
                            }
                           else{
                               echo"none";
                           }
                         }
                    }                   
                ?>
                </div>
                
            </div>
        </div>
    </div>
    </div>
    <div class="footer">
        <div class="footerlink"><a href="faq.html" style="color: black; text-decoration: none;">FAQ</a></div>
        <div class="footerlink"><a href="support.html" style="color: black; text-decoration: none;">Support</a></div>
        <div class="footerlink"><a href="contact.html" style="color: black; text-decoration: none;">Contact Us</a></div>
        <div class="footerlink"><i class="fab fa-facebook"></i></div>
        <div class="footerlink"><i class="fab fa-instagram"></i></div>
        
    </div>
</body>
</html>
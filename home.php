<!DOCTYPE html>
<html lang="en">
 <head>
	<title>Vivers</title>
    <meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="css/layout.css"/>
    <link rel="stylesheet" href="css/home.css">
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
					<!-- <a href="trackorder.html">Track My Order</a>
					<a href="account.html">My Account</a> -->
					<a href="support.php">Support</a>
                </div>
                </div>
            </div>
        </div>
        <a href="home.php"><img src="assets/logo.png" class="logo" ></a>
        <a href="logout.php" style="color: black;"><div style="position:relative; right:-420px">Logout</div></a>
        <a href="cart.php" style="color: black;"><div style="position:relative; right:-440px;"><i class="fas fa-shopping-cart"></i></div></a>
    </div>
	<div class="main">
        <div class="banner">
			<img src="assets/banner.png" width="100%">
        </div>
		<div class="mainbutton">
			<a href="menudisplay.php" class="button" data-role="button" data-inline="true">Menu ></a>
			<a href="menudisplay.php#sides" class="button" data-role="button" data-inline="true">Sides ></a>
			<a href="menudisplay.php#beverages" class="button" data-role="button" data-inline="true">Drinks ></a>
			<a href="menudisplay.php#desserts" class="button" data-role="button" data-inline="true">Dessert ></a>
		</div>
			
		
		<div class = "menu">
			<div id="promos">
				<h2 style="margin-left:64px;">Promos<br><br></h2>
				<div class="content" style="margin-left:30px;">
                        <?php
                            $sql = "SELECT * FROM product_menu WHERE category ='promo'";
                                if (!$result = mysqli_query($conn, $sql)) {
                                    echo "Failed to get promo products: " . mysqli_error($conn);
                                }
                                
                                for($i = 1; $i <= $result->num_rows; $i++) {
                                $row = $result->fetch_assoc();
                                
                                ?>
                                <!-- <h3><?php echo $row['category'];?></h3> -->
                                <div class="card">
                                    <?php echo "<img src='{$row['img_dir']}' width='280px' height='190px'>";?>    
                                
                                    <div class="card-desc">
                                        <div class="card-title"><p>
                                        <?php echo $row['productname'];	?>
                                        </p></div>
                                        <div>
                                        <?php echo"<a style='text-decoration:none;color:black' href='details2.php". '?add=' . $i. "'><p class='card-add'>+</p></a></div>"?> 
                                        
                                    </div>
                                </div> 
                        <?php } ?>
                    </div>
			</div>
			<br><br>
		</div>	
	<div class="footer">
		<div class="footerlink"><a href="support.php" style="color: black; text-decoration: none;">FAQ</a></div>
		<div class="footerlink"><a href="support.php" style="color: black; text-decoration: none;">Support</a></div>
		<div class="footerlink"><a href="support.php" style="color: black; text-decoration: none;">Contact Us</a></div>
		<div class="footerlink"><i class="fab fa-facebook"></i></div>
		<div class="footerlink"><i class="fab fa-instagram"></i></div>
        
    </div>
</body>
</html>

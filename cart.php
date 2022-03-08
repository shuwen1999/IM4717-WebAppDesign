<?php
session_start();

if(isset($_POST['removeAllItem'])){
    $_SESSION['cart'] = array();
}
?>
<!DOCTYPE html>
<html lang="en">
 <head>
	<title>Vivers Cart</title>
    <meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="css/layout.css"/>
    <link rel="stylesheet" href="css/cart.css">
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
					<!-- <a href="trackorder.html">Track My Order</a> -->
					<!-- <a href="account.php">My Account</a> -->
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
	 <h1 style="text-align: center;">My Cart</h1>
        
        <div>
			<table>
                <thead>
                    <tr>
                        <th scope="col">Item Name</th>
                        
						<th scope="col">Customisations</th>
						<th scope="col">Quantity</th>
						<th scope="col">Total Price</th>
						<th style= "background-color: white" scope="col">
							<form action="" method="POST">
								<button name="removeAllItem" class="button">Clear Cart</button>
                            </form>
                        </th>
						<th style= "background-color: white" scope="col">
								<a href="menudisplay.php" class="button">Add More Items 
                        </th>
                    </tr>
                    <?php 
                        foreach($_SESSION['cart'] as $index=>$cartitem) {
                            $productid = $cartitem['productid'];
                            $qty = $cartitem['qty'];
                            $message = $cartitem['message'];
                            $productname = $cartitem['productname'];
                            $price=$cartitem['price'];
                            $totalprice=$price*$qty;
            
                            echo "<tr>"."<td>".$productname."</td>";
                            echo "<td>".$message."</td>";
                            echo "<td>".$qty."</td>";
                            // echo "<td>".$productname."</td>";
                            echo "<td>$".number_format($totalprice,2)."</td>"."</tr>";
                            $subtotal += $totalprice;
                        }
                    ?>
                </thead>
				<tbody>
					
                </tbody>
            </table>
		</div>
        <div class="OrderSummary">
            <h3>Order summary</h3>
            
                <ul>
                    <li>Subtotal <span class="price"> $ <?php echo number_format($subtotal,2) ?></span></li>
                    <li>Delivery fees <span class="price">Free</span></li>
                    <li> <strong>Total Price <span class="price"> $ <?php echo number_format($subtotal,2) ?></strong></span> </li>
				<br>
				<form action="checkout.php" method="POST">
					<input type="submit" name="checkout" class="btn" value="Confirm Order">
                </form>
				</ul>
        </div>
	</div>
	
	<br>	
	<div class="footer">
		<div class="footerlink"><a href="support.php" style="color: black; text-decoration: none;">FAQ</a></div>
		<div class="footerlink"><a href="support.php" style="color: black; text-decoration: none;">Support</a></div>
		<div class="footerlink"><a href="support.php" style="color: black; text-decoration: none;">Contact Us</a></div>
		<div class="footerlink"><i class="fab fa-facebook"></i></div>
		<div class="footerlink"><i class="fab fa-instagram"></i></div>
        
    </div>
</body>
</html>

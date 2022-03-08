<!DOCTYPE html>
<html lang="en">
 <head>
	<title>Vivers Feedback</title>
    <meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="css/layout.css"/>
    <link rel="stylesheet" href="css/feedback.css">
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
	 <div class="feedback">
		<h3>Feedback<br></h3>
			<div class="form" style="margin-left: 45px">
			<form method="post" action="feedback.php">
				
				<label for="food">*Rate your food from 1 - 10: &nbsp</label>
				<input type="number" name="food" id="food" min="1" max="10" placeholder="7" required> <br><br>
				
				<label for="delivery">*Rate your delivery from 1 - 10: &nbsp</label>
				<input type="number" name="delivery" id="delivery" min="1" max="10" placeholder="8" required> <br><br>
				
				<label for="msg"> Additional Comments: </label> <br>
				<textarea name="msg" id="msg" rows="6" cols="50" placeholder="Efficient delivery and food was delicious"></textarea> <br>
				
				<input id="reset" type="reset" value="Clear">
				<input id="submit" type="submit" value="Submit" name="submit">
			</form>
			</div>
			
			<?php
				$conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
				if (!$conn){
					echo "Error: Could not connect to database. Please try again later.";
					exit;
				}
				
				if ( isset( $_POST['submit'] ) ) {

					$food = $_POST['food'];
					$delivery = $_POST['delivery'];
					$msg = $_POST['msg'];
				
					$sql = "INSERT INTO feedback (food, delivery, msg) VALUES ('$food','$delivery','$msg')";
					$result=mysqli_query($conn,$sql);
					
					if(!result){
						echo '<script type="text/javascript"> alert("Sorry! \nPlease resubmit feedback! "); window.location.href="feedback.php"</script>'; 
					}
					else{
						echo '<script type="text/javascript"> alert("Thank you! \nWe have received your feedback. "); window.location.href="home.php"</script>';
					}
				}
			?>
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
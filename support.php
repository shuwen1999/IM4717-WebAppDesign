<!DOCTYPE html>
<html lang="en">
 <head>
	<title>Vivers Support</title>
    <meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="css/layout.css"/>
    <link rel="stylesheet" href="css/support.css">
	<!-- Javascrip -->
	<script type = "text/javascript" src = "support.js"> </script>
	<!-- Icons -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
	
		<div class="FAQ">
		<h3>Frequently Asked Question<br></h3>
		
			<div id='orders'>
				<h4>Orders</h4>
				<p><b>When will my orders be processed?</b></p>
				<p>Orders will be processed and made within 45mins upon order confirmation.</p>
			</div>
			<div id='delivery'>
				<h4><b>Delivery</b></h4>
				<p><b>How long does delivery take?</b></p>
				<p>Delivery takes about 1 hour once orders are prepared.</p>
			</div>
		</div>
		<div class="msg">
		<h3>Leave a Message<br></h3> 
			<div class="form">
			<form method="post" id="supprotform" action="support.php" style="padding:10px;">
				
				<label for="Name">*Name: &nbsp</label>
				<input type="text" name="Name" id="Name" class="input"onblur="myName()" placeholder="John English" required>
				
				<label for="email">&nbsp &nbsp &nbsp *E-mail: &nbsp</label>
				<input type="email" name="email" id="email" class="input"onblur="myEmail()" placeholder="johnnyeng@gmail.com" required> <br><br>
				
				<label for="msg">*Leave a message: </label> <br>
				<textarea name="msg" id="msg" rows="6" cols="67"class="input" placeholder="Message" required></textarea> <br>
				
				<input id="reset" type="reset" value="Clear" class="supportbtn">
				<input id="submit" type="submit" value="Submit" name= "submit" class="supportbtn">
			</form>
			</div>
			
			<?php
				$conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
				if (!$conn){
					echo "Error: Could not connect to database. Please try again later.";
					exit;
				}
				if ( isset( $_POST['submit'] ) ) {

					$name = $_POST['Name'];
					$email = $_POST['email'];
					$msg = $_POST['msg'];

					$sql = "INSERT INTO support (name, email, msg) VALUES ('$name','$email','$msg')";
					$result=mysqli_query($conn,$sql);
					
					if(!result){
						echo '<script type="text/javascript"> alert("Sorry! \nPlease resubmit form! "); window.location.href="support.php"</script>'; 
					}
					else{
						echo '<script type="text/javascript"> window.alert("Thank you! \nWe have received your enquiry and will be in touch with you soon! "); 
						window.location.href="support.php"</script>';
					}
				}
			?>
		</div>
	<br>	
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
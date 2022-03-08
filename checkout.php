

<!DOCTYPE html>
<html lang="en">
 <head>
	<title>Payment</title>
    <meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="css/layout.css"/>
    <link rel="stylesheet" href="css/checkout.css">
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
	<br>
	<div class="main">
    <div class="container">
		<form method="post" action="checkout.php">

        <div>
          <div>
            <h3>Delivery Details</h3>
				
				<label for="recepname"><i class="fa fa-user"></i> Recepient Name*</label>
				<input type="text" id="recepname" name="recepname" placeholder="Jane" required>
				
				<label for="recepcontact"><i class="fa fa-phone"></i> Recepient Contact*</label>
				<input type="tel" id="recepcontact" name="recepcontact" pattern="[8-9]{1}[0-9]{7}" placeholder="83452345" required>
				
				<label for="recepadd"><i class="fa fa-address-card-o"></i> Recepient Address*</label>
				<input type="text" id="recepadd" name="recepadd" placeholder="Jurong Blk 78 #10-29" required>
				
                <label for="receppostal"><i class="fa fa-institution"></i>Postal Code*</label>
                <input type="text" id="receppostal" name="receppostal" pattern="[0-9]{6}" placeholder="452078" required>
				
           </div>
		  
		 <div> 
            <h3>Billing Details</h3>
				
				<label for="sendername"><i class="fa fa-user"></i> Sender Name*</label>
				<input type="text" id="sendername" name="sendername" placeholder="Johnny English" required>
				
				<label for="sendercontact"><i class="fa fa-phone"></i> Sender Contact*</label>
				<input type="tel" id="sendercontact" name="sendercontact" pattern="[8-9]{1}[0-9]{7}" placeholder="98765432" required>
				
				<label for="senderemail"><i class="fa fa-envelope"></i> Email*</label>
				<input type="text" id="senderemail" name="senderemail" placeholder="johnnyeng@gmail.com" required>
				
				<label for="senderadd"><i class="fa fa-address-card-o"></i> Address*</label>
				<input type="text" id="senderadd" name="senderadd" placeholder="Jurong Blk 78 #10-29" required>
				
				<label for="senderpostal"><i class="fa fa-institution"></i>Postal Code*</label>
                <input type="text" id="senderpostal" name="senderpostal" pattern="[0-9]{6}" placeholder="452078" required>
          </div>

          <div>
            <h3>Payment Details</h3>
            <label for="fname">Accepted Cards</label>
				<div class="icon-container">
				  <i class="fa fa-cc-visa" style="color:navy; font-size:36px"></i>
				  <i class="fa fa-cc-mastercard" style="color:red; font-size:36px"></i>
				  <i class="fa fa-cc-amex" style="color:blue; font-size:36px"></i>
				</div>
				
				<label for="cardname">Name on Card*</label>
				<input type="text" id="cardname" name="cardname" placeholder="Johnny English" required>
				
				<label for="cardnumber">Card Number*</label>
				<input type="text" id="cardnumber" name="cardnumber" pattern="[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}" placeholder="1111-2222-3333-4444" required>
				
				<label for="expiry">Expiry Date*</label>
				<input type="text" id="expiry" name="expiry" pattern="[0-1]{1}[0-9]{1}/[0-9]{2}" placeholder="MM/YY" required>

                <label for="cvc">CVC*</label>
                <input type="text" id="cvc" name="cvc" pattern="[0-9]{3}" placeholder="352" required>
          </div>
        </div>
        <input type="submit" value="Confirm Payment" name="confirm" class="btn">
      </form>
    </div>
  </div>
	
    
		<?php
			session_start();
			$conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");

    		if (!$conn){
				echo "Error: Could not connect to database. Please try again later.";
				exit;
			}
			
			if(isset($_POST['confirm'])){
				$recepname =  $_POST['recepname'];
				$recepcontact = $_POST['recepcontact'];
				$recepadd =  $_POST['recepadd'];
				$receppostal = $_POST['receppostal'];
				$sendername = $_POST['sendername'];
				$sendercontact = $_POST['sendercontact'];
				$senderemail = $_POST['senderemail'];
				$senderadd = $_POST['senderadd'];
				$senderpostal = $_POST['senderpostal'];
				$cardname = $_POST['cardname'];
				$cardnumber = $_POST['cardnumber'];
				$expiry = $_POST['expiry'];
				$cvc = $_POST['cvc'];
				$custid = $_SESSION['id'];
				
				foreach($_SESSION['cart'] as $index=>$cartitem) {
					$custid = $_SESSION['id'];
					$productid = $cartitem['productid'];
					$qty = $cartitem['qty'];
					$productname = $cartitem['productname'];
					$price=$cartitem['price'];
					$totalprice=$price*$qty;
					$sqlorder ="INSERT INTO cust_order (custid, productname, quantity, amount) VALUES ('$custid','$productname' ,$qty,$totalprice)";
					$resultorder=mysqli_query($conn,$sqlorder);
				}
				
				
				$sql1 = "INSERT INTO delivery_details (recepname, recepcontact, recepadd, receppostal) VALUES ('$recepname','$recepcontact','$recepadd','$receppostal')";
				$result1=mysqli_query($conn,$sql1);
				
				$sql2 = "INSERT INTO bill_details (sendername, sendercontact, senderemail, senderadd, senderpostal) VALUES ('$sendername','$sendercontact','$senderemail','$senderadd','$senderpostal')";
				$result2=mysqli_query($conn,$sql2);
				
				$sql3 = "INSERT INTO payment_details (cardname, cardnumber, expiry, cvc) VALUES ('$cardname','$cardnumber','$expiry','$cvc')";
				$result3=mysqli_query($conn,$sql3);
				
				if(!result3 && !result2 && !result1){
					echo "<script LANGUAGE='Javascript'> window.alert('Payment Invalid!'); window.location.href='checkout.php'</script>";
				}
				else{
					echo "<script LANGUAGE='Javascript'> window.alert('Payment Confirmed!'); window.location.href='feedback.php'</script>"; 
					
					unset($_SESSION['cart']);
					$to      = 'f32ee@localhost';
					$subject = 'Vivers: Your Order Has Been Placed';
					$message = 'Hello, your order has been placed with Vivers';
					$headers = 'From: f32ee@localhost' . "\r\n" .
						'Reply-To: f32ee@localhost' . "\r\n" .
						'X-Mailer: PHP/' . phpversion();

					mail($to, $subject, $message, $headers,'-ff32ee@localhost');
					echo ("mail sent to : ".$to);
				}
				
			}
			mysqli_close($conn);
				
			?>
  
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

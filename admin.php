<!DOCTYPE html>
<html lang="en">
 <head>
	<title>Vivers Feedback</title>
    <meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" href="css/layout.css"/>
    <link rel="stylesheet" href="css/admin.css">
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
        <img src="assets/logo.png" class="logo" >
        <a href="logout.php" style="color: black;"><div style="position:relative; right:-420px">Logout</div></a>
        <a href="cart.php" style="color: black;"><div style="position:relative; right:-440px;"><i class="fas fa-shopping-cart"></i></div></a>
    </div>
	<div class="main">
	<h2> Welcome Admin </h2>
		<div class="feedback">
			<h3>Feedback Report</h3>
			<div class="report">
				<table>
					<thead>
						<tr>
							<th>Feedback ID &nbsp </th>
							<th>Food Rating &nbsp </th>
							<th>Delivery Rating &nbsp </th>
							<th>Message &nbsp </th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
						if (!$conn){
							echo "Error: Could not connect to database. Please try again later.";
							exit;
						}
						$sql = "SELECT * FROM feedback";
						$result = mysqli_query($conn,$sql);
						
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
							echo "<tr><td>".$row['feedbackid']."</td>"; 
							echo "<td>".$row['food']."</td>"; 
							echo "<td>".$row['delivery']."</td>"; 
							echo "<td>".$row['msg']."</td></tr>"; 
							}
						}
						else {
							echo "0 results";
						}
				
						mysqli_close($conn);
						?>
					</tbody>
					</table>
			<br>
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
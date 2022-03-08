<?php // register.php
    // session_start();
    $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
        if (!$conn){
            echo "Error: Could not connect to database. Please try again later.";
            exit;
        }

    if (isset($_POST['submit'])) {
        if (empty($_POST['custemail']) || empty ($_POST['custpw'])
            || empty ($_POST['password2']) ) {
        echo "All records to be filled in";
        exit;}
    }
    $custemail = $_POST['custemail'];
    $custpw = $_POST['custpw'];
    $password2 = $_POST['password2'];
    $custname = $_POST['custname'];
    

    // echo ("$username" . "<br />". "$password2" . "<br />");
    if ($custpw != $password2) {
        echo "Sorry passwords do not match";
        exit;
    }
    // echo $password;
    $sql = "INSERT INTO cust_details (custname,custemail, custpw) 
            VALUES ('$custname','$custemail', '$custpw')";
    //	echo "<br>". $sql. "<br>";
    $result = $conn->query($sql);
	
	
    
        
?>

<html lang="en">
<head>
    <title>Vivers Registration</title>
    <meta charset=“utf-8”>
    <!-- CSS -->
    <link rel="stylesheet" href="css/layout.css"/>
	<link rel="stylesheet" href="css/login.css"/>
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
            
        </div>
        <img src="assets/logo.png" class="logo" >
    </div>
    <div class="main" style="height:500px;">
        <form action="register.php" method="post">
            <h2 style="text-align:center;">Registration</h2>
			<h4 style="text-align:center;">Please proceed to login after registration!</h4>
            <input type="email" name="custemail" class="loginemail" size="50" placeholder="Email Address" required/>
            <input type="password" name="custpw" class="loginpw" size="50" placeholder="Password" required/>
            <input type="password" name="password2" class="loginpw" size="50" placeholder="Enter Password Again" required/>
            <input type="text" name="custname" class="loginemail" size="50" placeholder="Enter Name" required/>

            
            <div class="linkbox">
                <a href="login.php" class="loginlinks"><p>Forget Password</p></a>
                <a href="index.php" class="loginlinks"><p style="margin-left:230px;">Already a User?</p></a>
            </div>
            <input type="submit" value="Register" name="login" class="loginbtn" size="40" style="padding:10px 189px;">
        </form>
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

<!-- 
<html>
<head>
	<title>Registration page</title>
</head>
<body>		
<h1><font color="blue">Registration Page</font></h1>
<form action="register.php" method=POST>
Username:<br />
<input type=text name=username><br /><br />
Password:<br />
<input type=password name=password><br /><br />
Password confirmation:<br /> 
<input type=password name=password2><br /><br />

<input type=submit name=submit value=Submit>
<input type=reset name=reset value="Reset">
</form>
</body>
</html> -->

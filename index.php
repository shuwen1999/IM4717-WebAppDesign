<?php
    session_start();

    $conn = mysqli_connect("localhost", "f32ee", "f32ee", "f32ee");

    if (!$conn){
        echo "Error: Could not connect to database. Please try again later.";
        exit;
    }
    if(isset($_POST['login'])){
        $loginemail = $_POST['email'];
        $loginpw = $_POST['password'];

        $sql="SELECT * FROM cust_details WHERE custemail='$loginemail' AND custpw='$loginpw' limit 1";
        $result = mysqli_query($conn, $sql);
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['valid_user'] = $loginemail;
            echo "yes";
            if($_SESSION['valid_user']=='admin@admin'){
                header('Location:admin.php');
            }else{
                $row1 = mysqli_fetch_assoc($result);
                if($row1){
                    echo $row1['custname'];
                    $_SESSION['name']=$row1['custname'];
                    $_SESSION['id']=$row1['custid'];
                    
                    header('Location:home.php');
                }
                else{
                    echo "2";
                }
            }
        }
        else{
            echo '<script>alert("Could not log you in")</script>';
        }

    }
    mysqli_close($conn);
?>

<html lang="en">
<head>
    <title>Vivers Menu</title>
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
            <!-- <div class="navbar">
                <div class="dropdown">
                <button class="dropbtn">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown-content">
                    <a href="menudisplay.php">Menu</a>
                    <a href="trackorder.php">Track My Order</a>
                    <a href="account.php">My Account</a>
                    <a href="support.php">Support</a>
                </div>
                </div>
            </div> -->
        </div>
        <img src="assets/logo.png" class="logo" >
        <!-- <a href="login.php" style="color: black;"><div style="position:relative; right:-420px"><i class="far fa-user-circle"></i></div></a>
        <a href="cart.php" style="color: black;"><div style="position:relative; right:-440px;"><i class="fas fa-shopping-cart"></i></div></a> -->
    </div>
    <div class="main">
        <form action="index.php" method="post">
            <h2 style="text-align:center;">Sign in to Vivers</h2>
            <input type="email" name="email" class="loginemail" size="50" placeholder="Email Address" required/>
            <input type="password" name="password" class="loginpw" size="50" placeholder="Password" required/>
            <div class="linkbox">
                <a href="login.php" class="loginlinks"><p>Forget Password</p></a>
                <a href="register.php" class="loginlinks"><p style="margin-left:240px;">Register Now</p></a>
            </div>
            <input type="submit" value="Login" name="login" class="loginbtn" size="50">
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
<?php
  session_start();
    $conn = mysqli_connect("localhost","f32ee","f32ee","f32ee");
    if (!$conn){
        echo "Error: Could not connect to database. Please try again later.";
            exit;
    }

  
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart']=array();
    }
    
    if(isset($_POST['submit'])){
        $_SESSION['message']=$_POST['message'];
        $_SESSION['itemqty']=$_POST['itemqty'];
        header("Location:cart.php");
        exit();
    }

    if(isset($_GET['add'])){
        $productid = $_GET['add'];
        $sql = "SELECT * FROM product_menu where productid=$productid";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        if ($count==1){
            $row = mysqli_fetch_assoc($result);
            $productname = $row['productname'];
            $price = $row['price'];
            $image= $row['img_dir'];
            $productdesc = $row['productdesc']; 
            
        }
        else{
        echo "none";
        }
    }

// if(isset($_POST['submit'])){
//     $_SESSION['cart']=$GET['submit'];
//     header("Location:cart/php");
//     exit();
// }
?>

<html lang="en">
<head>
    <title>Vivers Menu</title>
    <meta charset=“utf-8”>
    <!-- CSS -->
    <link rel="stylesheet" href="css/layout.css"/>
	<link rel="stylesheet" href="css/details.css"/>
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

    <script>
        //checkbox
        $(".sidescheck").change(function() {
            var count = $(".sidescheck:checked").length; //get count of checked checkboxes

            if (count > 3) {
                alert("Only 3 options allowed..!");
                $(this).prop('checked', false); // turn this one off
            }
        });
        // quantity
        function plus(idname){
            var quantity = document.getElementById(idname);
            let val = quantity.value;
            val++;
            quantity.value = val;
        }

        function minus(idname){
            var quantity = document.getElementById(idname);
            let val = quantity.value;

            if (val > 1) {
                val--;
                quantity.value = val;
            }
        }
    </script>
    
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
        <div class="selected">
        <?php echo "<img src='{$image}' width='280px' height='190px'>";?>        
        <div class="desc">
            <h2 style="margin:0;"><?php echo $productname; ?></h2>
            <a href="menudisplay.php" class="cross">&#215;</a>
            <p><?php echo $productdesc; ?></p>
            <p><?php echo "$". $price; ?></p>
            
        </div>
        
            
        </div>
        
        <form action="./cartitem.php" method="POST">
            <div class="message">
                <h3>Special Instructions</h3>
                <textarea placeholder="eg: no pepper"rows="4" cols="50" class="area" name="message"></textarea><br><br>
            </div>
            <div class="qty">

                <p><input type='button' value='-' id="qtyminus" onclick="minus('quantity')"/>
                <input type='text' id='quantity' value='1' name="itemqty"/>
                <input type='button' value='+' id="qtyplus" onclick="plus('quantity')"/></p>
                <input type="hidden" name="productid" value="<?php echo $productid;?>">
                <input type="hidden" name="productname" value="<?php echo $productname;?>">
                <input type="hidden" name="price" value="<?php echo $price;?>">
                <input type="submit" value="submit" class="addcart" name="submit">
            </div>
        </form>
        </div>

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
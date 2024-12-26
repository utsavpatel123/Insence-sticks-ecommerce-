<?php 

require "../backend/connection.php";
?>

    <!-----------------
       Welcome - start
     ------------------>
    <div class="topWelcomeSection" id="topWelcomeSection">
        <div class="welcomeSectionContainer">
            <div class="welcomeSection">
                <p>&#9829; You are heartily welcome.</p>
            </div>

            <?php 
             if(!isset($_SESSION['email'])){
            ?>
            <div class="loginRegister">
                <a href="login.php">Login</a> |
                <a href="register.php">sign up</a> |
            </div>
            <?php } else { ?>
            <div class="profileImg">
                <img src="./Assets/images/profilePic.png" alt="">
            </div>
            <?php } ?>
            <div class="profileLinks">
                <a href="../frontend/Dashboard/User Dashboard/editProfile.php">Profile</a>
                <a href="../backend/logout.php">Logout</a>
            </div>
        </div>
    </div>
    <!-----------------
       Welcome - start
     ------------------>

     <?php 
     if (isset($_SESSION['email'])) {
        $userId = $_SESSION['email'];
        $selectCart = "SELECT `id`, `userId`, `productId`, `productName`, `productPrice`, `productImage`, `quantity`, `totalPrice` FROM `cart` WHERE userId='$userId'";
        $cart = mysqli_query($con, $selectCart);
        $numOfRow = mysqli_num_rows($cart);
    }

     ?>

    <!-----------------
     Navigation - Start 
    ------------------->
    <div class="navigation" id="navigation">
        <div class="logoAndNavlinks">
            <img class="companyLogo" src="./Assets/Images/logo.png" alt="">
            <div class="navigationLinks navigationLinksClose" id="navigationLinks">
                <a href="index.php">Home</a>
                <a href="product.php">Products</a>
                <a href="about.php">About</a>
                <a href="contact.php">Contact</a>
            </div>
        </div>
        <div class="searchAndCart">
            <div class="cart">
                <a href="addToCart.php">
                    <i class="fa-solid fa-cart-shopping">
                        <div class="numberOfItem" id='<?php if(!isset($userId)){ echo "numberOfItems"; } ?>'><?php echo $numOfRow; ?></div>
                    </i>
                </a>
            </div>
        </div>

        <div class="hamburgerMenuIcon">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>


    </div>

    <!------------------
     Navigation - End 
    ------------------->

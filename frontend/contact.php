<?php
require "../backend/login.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>


    <!------------
     Google Fonts
     ------------->
     <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/contact.css">

</head>
<body>
    
 
<!-- --------------------
    Header - start  
    --------------------- -->
    <?php
        require "header.php"
    ?>
    <!-- --------------------
    Header - End  
    --------------------- -->

    <!---------------
     contact - start 
    ----------------->
    <div class="contactSection" id="contactSection">
    <?php if (isset($_REQUEST['success'])){ ?>
                <div class="successMessage">
                <?php echo $_REQUEST['success']; ?>
                </div>
            <?php } ?>
<?php if (isset($_REQUEST['error'])){ ?>
                <div class="errorMessage">
                <?php echo $_REQUEST['error']; ?>
                </div>
            <?php } ?>
<?php if (isset($_REQUEST['dataError'])){ ?>
                <div class="errorMessage">
                <?php echo $_REQUEST['dataError']; ?>
                </div>
            <?php } ?>
        <div class="container">
          <form action="../backend/contact.php" method="post">
            <h3>Contact <span>Us</span></h3>
            <input type="text" name="fullName" placeholder="FULL NAME">
            <input type="text" name="email" placeholder="EMAIL">
            <input type="text" name="phone" placeholder="PHONE">
            <textarea rows="5" name="message" placeholder="MESSAGE"></textarea>
            <button type="submit" name="submit" class="buttons">Contact</button>
            </form>
        </div>

    </div>
    <!---------------
     contact - End 
    ----------------->



    <!----------------
     Footer - start 
    ----------------->
    <?php
        require "footer.php"
    ?>
    <!---------------
     Footer - End 
    ----------------->


    <!---------
     Custom Js  
    ----------->
    <script src="./Assets/js/common.js"></script>


    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>

</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!------------
     Google Fonts
     ------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=yes">

    <!-----------
    Custom CSS 
    ----------->
    <link rel="stylesheet" href="./Assets/css/login.css">

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

    <!----------------
      Login - start 
    ----------------->

    <div class="loginSection" id="loginSection">
    <?php if (isset($_REQUEST['success'])) { ?>
                    <div class="successMessage">
                    <?php echo $_REQUEST['success']; ?>
                    </div>
              <?php  } ?> 
              <?php if (isset($_REQUEST['empty'])) { ?>
                    <div class="errorMessage">
                       <?php echo $_REQUEST['empty']; ?>
                        </div>
                    <?php } ?>
                <?php if (isset($_REQUEST['error'])) { ?>
                    <div class="errorMessage">
                    <?php echo $_REQUEST['error']; ?>
                    </div>
                <?php } ?>   
        <form action="../backend/adminLogin.php" method="POST">
        <div class="container">
            <h3>Admin Login</h3>
            <input type="text" name="userName" placeholder="USER NAME"  autocomplete="username">
            <input type="password" name="password" placeholder="PASSWORD"   autocomplete="current-password">
            <button type="submit" name="adminLogin" class="buttons">Login</button>
        </div>
    </form>

    </div>
    <!----------------
       Login - End 
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
<?php
require "../backend/login.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>

    <!------------
     Google Fonts
     ------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/about.css">

</head>

<body>
<!-- --------------------
    Header - start  
    --------------------- -->
    <?php
        require "header.php";
    ?>
    <!-- --------------------
    Header - End  
    --------------------- -->

    <!----------------
       About - start 
     ----------------->
      <div class="about" id="about">
        <!-- About Heading -->
        <div class="aboutHeading">
            <h2>About<span>Us</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit
                . Fugit fugiat a dolorem ad. Reiciendis, nisi numquam! Facere
            </p>
        </div>

        <!-- About First Part -->
        <div class="aboutFirstPart">
            <div class="aboutImage">
                <div class="image">
                    <img src="./Assets/images/Sandalwood_Incense_Sticks-removebg-preview.png" alt="">
                </div>
                <div class="imageInfo">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusamus, quas vero ducimus provident dolores a necessitatibus
                        at inventore reprehenderit deserunt ut facilis sint? Perspiciatis
                        nesciunt natus error tenetur, rem veritatis.
                    </p>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                        Accusamus, quas vero ducimus provident dolores a necessitatibus
                        at inventore reprehenderit deserunt ut facilis sint? Perspiciatis
                        nesciunt natus error tenetur, rem veritatis.
                    </p>
                    <button type="button" class="buttons">Get in touch</button>
                </div>
            </div>
        </div>

        <!-- About Second Part -->
        <div class="aboutSecondPart">
            <div class="aboutSecondPartHeading">
                <h2>Why choose Us</h2>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos cupiditate eveniet, inventore quaerat</p>
            </div>

            <div class="aboutSecondPartContainer">

                <div class="firstContainer">
                    <div id="firstInfo" class="infoContainer">
                        <div id="firstInfoIcon" class="infoIcon"><img src="./Assets/images/Expertise.png" alt=""></div>
                        <h3>Expertise</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div id="secondInfo" class="infoContainer">
                        <div id="secondInfoIcon" class="infoIcon"><img src="./Assets/images/communication.png" alt=""></div>
                        <h3>Communication</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>

                <div class="secondContainer">
                    <div id="thirdInfo" class="infoContainer">
                        <div id="thirdInfoIcon" class="infoIcon"><img src="./Assets/images/verify.png" alt=""></div>
                        <h3>Attention to Detail</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                    <div id="forthInfo" class="infoContainer">
                        <div id="forthInfoIcon" class="infoIcon"><img src="./Assets/images/24-hours.png" alt=""></div>
                        <h3>Customer Service</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    </div>
                </div>

            </div>

        </div>

        <div class="aboutThirdPart">
            <div class="left">
                <h2>Process</h2>
                <p>Lorem ipsum dolor si. Eos cupiditate eveniet, inventore quaerat Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos cupiditate eveniet, inventore quaerat Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos cupiditate eveniet, inventore quaerat Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eos cupiditate eveniet, inventore quaerat</p>
                <button type="button" class="buttons">Explore Services</button>
                <div class="image">
                    <img src="./Assets/images/Sandalwood_Dhoop_Sticks-removebg-preview.png" alt="">
                </div>
            </div>
            <div class="right">
                              
                <div class="innerProcessContainer">
                    <div class="image">
                        <img src="./Assets/images/task.png" alt="">
                    </div>
                    <div class="information">
                        <h3>Planning</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Quos quo placeat animi dolorum iste iure ducimus quis 
                             cupiditate aut totam blanditiis debitis aspernatur, 
                             labore inventore, molestias, tempore a error! Dolorem!
                            </p>
                    </div>
                </div>

                <div class="innerProcessContainer">
                    <div class="image">
                        <img src="./Assets/images/vector.png" alt="">
                    </div>
                    <div class="information">
                        <h3>Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Quos quo placeat animi dolorum iste iure ducimus quis 
                             cupiditate aut totam blanditiis debitis aspernatur, 
                             labore inventore, molestias, tempore a error! Dolorem!
                            </p>
                    </div>
                </div>

                <div class="innerProcessContainer">
                    <div class="image">
                        <img src="./Assets/images/coding.png" alt="">
                    </div>
                    <div class="information">
                        <h3>Development</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Quos quo placeat animi dolorum iste iure ducimus quis 
                             cupiditate aut totam blanditiis debitis aspernatur, 
                             labore inventore, molestias, tempore a error! Dolorem!
                            </p>
                    </div>
                </div>

                <div class="innerProcessContainer">
                    <div class="image">
                        <img src="./Assets/images/testing.png" alt="">
                    </div>
                    <div class="information">
                        <h3>Testing</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Quos quo placeat animi dolorum iste iure ducimus quis 
                             cupiditate aut totam blanditiis debitis aspernatur, 
                             labore inventore, molestias, tempore a error! Dolorem!
                            </p>
                    </div>
                </div>

                <div class="innerProcessContainer">
                    <div class="image">
                        <img src="./Assets/images/startup.png" alt="">
                    </div>
                    <div class="information">
                        <h3>Launch</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                             Quos quo placeat animi dolorum iste iure ducimus quis 
                             cupiditate aut totam blanditiis debitis aspernatur, 
                             labore inventore, molestias, tempore a error! Dolorem!
                            </p>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!----------------
       About - End 
     ----------------->


    <!----------------
     Footer - start 
     ----------------->
     <?php
        require "footer.php";
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
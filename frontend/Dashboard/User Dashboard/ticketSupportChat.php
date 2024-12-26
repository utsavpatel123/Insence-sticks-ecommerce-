<?php

require "../../../backend/login.php";
require "./userAuthentication.php";
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <!------------
     Google Fonts
     ------------->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <!-----------
     Custom CSS 
     ----------->
    <link rel="stylesheet" href="./Assets/css/ticketSupportChat.css">

</head>

<body>


    <!----------------------
     Dashboard Header - start 
    ------------------------>
    <?php require "../../dashboardHeader.php"; ?>
    <!---------------------
     Dashboard Header - End 
    ---------------------->



    <!------------------
     Dashboard  - start 
    ------------------->
    <div class="dashboardContainer" id="dashboardContainer">

        <!-------------------------- 
        dashboard left side - start
        --------------------------->
        <?php require "./userLeftSideLinks.php"; ?>
        <!-------------------------- 
        dashboard left side - End
        --------------------------->

        <!-------------------------- 
        dashboard Right side - start
        --------------------------->
        <div class="rightSide">    
            <div class="chatBoxSet">
                <div class="chatMsgBox">
                    <div class="companyReplyBox">
                    <span class="HeadingOfCopany">Raajanya PVT LTD</span><br>
                    <div class="replyMsg">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum, praesentium. Assumenda quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                    </div>
                    <span class="time">
                        12:34pm
                    </span>
                    </div>
                    <div class="clientSentBox">
                    <div class="setClientChatBox">
                        <span class="HeadingOfClient">You</span><br>
                        <div class="sentMsg">
                            quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                        </div>
                        <span class="time">
                            2:34am
                        </span>
                    </div>
                    </div>         
                    <div class="companyReplyBox">
                    <span class="HeadingOfCopany">Raajanya PVT LTD</span><br>
                    <div class="replyMsg">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum, praesentium. Assumenda quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                    </div>
                    <span class="time">
                        12:34pm
                    </span>
                    </div>
                    <div class="clientSentBox">
                    <div class="setClientChatBox">
                        <span class="HeadingOfClient">You</span><br>
                        <div class="sentMsg">
                            quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                        </div>
                        <span class="time">
                            2:34am
                        </span>
                    </div>
                    </div>
                    <div class="companyReplyBox">
                    <span class="HeadingOfCopany">Raajanya PVT LTD</span><br>
                    <div class="replyMsg">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum, praesentium. Assumenda quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                    </div>
                    <span class="time">
                        12:34pm
                    </span>
                    </div>
                    <div class="companyReplyBox">
                    <span class="HeadingOfCopany">Raajanya PVT LTD</span><br>
                    <div class="replyMsg">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum, praesentium. Assumenda quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Est odit omnis voluptatem, dolorem quia eaque similique, quibusdam ipsam, soluta pariatur dolorum quae tempora quasi laudantium minima hic sint aut dolore.
                    </div>
                    <span class="time">
                        12:34pm
                    </span>
                    </div>
                    <div class="clientSentBox">
                    <div class="setClientChatBox">
                        <span class="HeadingOfClient">You</span><br>
                        <div class="sentMsg">
                            quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                        </div>
                        <span class="time">
                            2:34am
                        </span>
                    </div>
                    </div>
                    <div class="companyReplyBox">
                    <span class="HeadingOfCopany">Raajanya PVT LTD</span><br>
                    <div class="replyMsg">
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nostrum, praesentium. Assumenda quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                    </div>
                    <span class="time">
                        12:34pm
                    </span>
                    </div>
                    <div class="clientSentBox">
                    <div class="setClientChatBox">
                        <span class="HeadingOfClient">You</span><br>
                        <div class="sentMsg">
                            quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                        </div>
                        <span class="time">
                            2:34am
                        </span>
                    </div>
                    </div>
                    <div class="clientSentBox">
                    <div class="setClientChatBox">
                        <span class="HeadingOfClient">You</span><br>
                        <div class="sentMsg">
                            quiacorrupti maxime porro amet aliquam sapiente quae mollitia quidem ad libero.
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. At maxime atque, facilis assumenda, veniam neque exercitationem consequatur saepe, ipsum distinctio sit corrupti. Ut laboriosam delectus aperiam, distinctio asperiores earum consequatur.
                        </div>
                        <span class="time">
                            2:34am
                        </span>
                    </div>
                    </div>

                    <div class="msgBox">
                    <input type="text" placeholder="Enter Your Message...">

                    <div class="sentBtn">
                        <!-- <span>&#8593;</span> -->
                         <img src="./Assets/images/sentMsgArrow.png" alt="">
                    </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-------------------------- 
        dashboard Right side - End
        --------------------------->

    </div>


    

    <!---------------------
     Dashboard Body - End 
    ---------------------->
    <!---------
     Custom Js  
    ----------->
    <script src="../../Assets/js/common.js"></script> 
    

    <!---------------
     Fontawesome Kit 
    ---------------->
    <script src="https://kit.fontawesome.com/a669b51611.js" crossorigin="anonymous"></script>
</body>
</html>
<?php
session_start();
include("language.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Links</title>
    <?php include("GlobalCss.php"); ?>
    <?php include("GlobalJs.php"); ?>
    
    <style>
        /* Container for the clickable sections */
        .grid-container {
            display: flex;
            flex-wrap: wrap; /* Allows items to wrap onto multiple lines */
            justify-content: space-around;
            background-color: #FFFFFF; /* Dark blue background */
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Each section box */
        .grid-item {
            text-align: center;
            color: #000000; /* Bright white text */
            margin: 10px;
            text-decoration: none;
            width: 45%; /* Each item takes up about half the container width */
            box-sizing: border-box;
        }

        .grid-item img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            transition: transform 0.3s;
        }

        .grid-item img:hover {
            transform: scale(1.1);
        }

        .grid-item p {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #FFFFFF; /* Ensure the text is white */
            /*text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7); /* Adds shadow for better readability */*/
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .grid-item {
                width: 100%; /* Full width on smaller screens */
            }
        }
    </style>
    
</head>
<body class="wp-smartstudy">
<div class="wrapper">
    
    <!-- Header Start -->
    <?php include("header.php"); ?>

    <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="cs-breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Employee Links</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

 
    <div class="main-section">
        <div class="page-section">
            <div class="container">
                <div class="row">
                    <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title text-center">
                            <h4>Employee Links</h4>
                            <hr>
                        </div>
                        
                        <div class="grid-container ">
                            <!-- E-OFFICE -->
                            <a href="https://icmr.eoffice.gov.in/" target="_blank" class="grid-item">
                                <img src="/assets/extra-images/E-office Image.png" alt="E-office">
                                <p>E-OFFICE</p>
                            </a>
                            
                            <!-- CHECK EMAIL -->
                            <a href="http://mail.gov.in/" target="_blank" class="grid-item">
                                <img src="/assets/extra-images/NIC Email.png" alt="Check Email">
                                <p>CHECK EMAIL</p>
                            </a>
                            
                            <!-- CHECK ATTENDANCE -->
                            <a href="https://nirthjbp.attendance.gov.in/" target="_blank" class="grid-item">
                                <img src="/assets/extra-images/AEBAS.png" alt="Check Attendance">
                                <p>CHECK ATTENDANCE</p>
                                </a>
                            
                            <!-- IRRAS PORTAL -->
                            <a href="https://irras.icmr.org.in/" target="_blank" class="grid-item">
                                <img src="/assets/extra-images/IRRAS.png" alt="IRRAS Portal">
                                <p>IRRAS PORTAL</p>
                            </a>
                            
                            <!-- GeM Portal -->
                            <a href="https://gem.gov.in/" target="_blank" class="grid-item">
                                <img src="/assets/extra-images/GeM.jpg" alt="GeM Portal">
                                <p>GeM PORTAL</p>
                            </a>
                            
                            <!-- I-RISE Portal -->
                            <a href="https://irise.icmr.org.in/" target="_blank" class="grid-item">
                                <img src="/assets/extra-images/I-RISE Portal.png" alt="IRISE Portal">
                                <p>I-RISE PORTAL</p>
                            </a>
                        </div>
                        
                        
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Section End -->

    <!-- Footer Start -->
    <?php include("footer.php"); ?>
    <!-- Footer End -->
</div>

<script src="assets/scripts/responsive.menu.js"></script>
<script src="assets/scripts/chosen.select.js"></script>
<script src="assets/scripts/slick.js"></script>
<script src="assets/scripts/jquery.mobile-menu.min.js"></script>
<script src="assets/scripts/functions.js"></script>
</body>
</html>

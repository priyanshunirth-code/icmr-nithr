<?php
session_start();
include("language.php");
?>
<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Syllabus</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="assets/css/iconmoon.css" rel="stylesheet">
    <link href="assets/css/chosen.css" rel="stylesheet">
    <link href="assets/css/jquery.mobile-menu.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
    <link href="cs-smartstudy-plugin.css" rel="stylesheet">
    <link href="assets/css/color.css" rel="stylesheet">
    <link href="assets/css/widget.css" rel="stylesheet">
    <link href="assets/css/responsive.css" rel="stylesheet">
    <!-- <link href="assets/css/bootstrap-rtl.css" rel="stylesheet"> Uncomment it if needed! -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="assets/scripts/jquery.js"></script>
    <script src="assets/scripts/modernizr.js"></script>
    <script src="assets/scripts/bootstrap.min.js"></script>
    <style>
        body, .main-section p, .mce-content-body p {
             color: #000 !important; 
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
                            <li>Syllabus</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Start -->
        <div class="main-section">
            <div class="page-section">
                <div class="container">
                    <div class="row">

                        <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title text-center">
                                        <!--<h4>Advertisement. No. NIRTH/Tech/01/2023 Dated 10.07.2023</h4>-->
                                        <h4>तकनीकी संवर्ग पदों के लिए कम्‍प्‍यूटर आधारित

टेस्‍ट (सी.बी.टी.) का पाठ्यक्रम</h4>
                                        <h4>SYLLABUS FOR COMPUTER BASED TEST (C.B.T.) FOR THE TECHNICAL CADRE

POSTS</h4>
                                    </div>
                                    <div class="cs-section-title text-left">
                                        <p class="text-center">
                                            <!--कम्‍प्‍यूटर आधारित टेस्‍ट (सी.बी.टी.) का पाठ्यक्रम<br>
                                            SYLLABUS FOR COMPUTER BASED TEST (C.B.T.)<br>-->
                                            <a href="https://nirth.res.in/application/syllabus/Syllabus.pdf" target="_blank" class="cs-btn small cs-bgcolor">Download Syllabus</a>
                                        </p>
                                    </div>

                                </div>
                                <hr>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main End -->

        <!-- Footer Start -->
        <?php include("footer.php"); ?>
        <!-- Footer End -->
    </div>
    <script>
        var a = document.getElementsByClassName("sn");
        for (var i = 0; i < a.length; i++) {
            a[i].innerHTML = (i + 1) + ".";
        }
    </script>
    <script src="assets/scripts/responsive.menu.js"></script>
    <script src="assets/scripts/chosen.select.js"></script>
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script>
    <!-- Put all Functions in functions.js -->
    <script src="assets/scripts/functions.js"></script>
</body>

</html>
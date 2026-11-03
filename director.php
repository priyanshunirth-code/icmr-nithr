<?php 
session_start();
include("language.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Director's Desk</title>
    
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
</head>
<body class="wp-smartstudy cs-team-detail">
    <div class="wrapper"> 

        <?php include("header.php");?>  
        <!-- Header End --> 	
        
        <div style="background:#ebebeb; padding:50px 0 35px;" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-page-title">
                            <h1><?php echo $lang['from_the_director_desk']; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="cs-breadcrumb">
                            <li><a href="index.php"><?php echo $lang['home']; ?></a></li>
                            <li><a href="about.php"><?php echo $lang['about_us']; ?></a></li>
                            <li><?php echo $lang['from_the_director_desk']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>	
        
        <!-- Main Start -->
        <div class="main-section"> 
            <div class="page-section" style="margin:0 0 10px;">
                <div class="container">
                    <div class="row">
                        <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/extra-images/praveenrsir.jpg" alt="#" />
                                </figure>
                            </div>
                            <hr>
                            <div class="cs-author-info">
                                <div class="">
                                    <h3><?php echo $lang['praveen_bharti']; ?><br><small>M. SC., PH.D.</small></h3>
                                    <span>Scientist G And Director</span>
                                </div>
                            </div>
                        </aside>
                        
                        <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="rich_editor_text text-justify">
                                        <?php echo $lang['director2026']; ?>
                                    </div>
                                </div>
                                <!--
                                <br><br><br>
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="cs-section-title">
                                        <h3><?php echo $lang['director_academic_title'];?></h3>
                                    </div>
                                    <div class="rich_editor_text text-justify">
                                        <p>
                                            <?php echo $lang['director_academic_profile']; ?>
                                        </p>
                                    </div>
                                </div>
                                -->
                                <br>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main End --> 
        
        <!-- Footer Start -->
        <?php include("footer.php");?>
        <!-- Footer End --> 
    </div>

    <script src="assets/scripts/responsive.menu.js"></script> 
    <script src="assets/scripts/chosen.select.js"></script> 
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script> 
    <script src="assets/scripts/jquery.mCustomScrollbar.concat.min.js"></script><!--- Scroll Style -->
    <!-- Put all Functions in functions.js --> 
    <script src="assets/scripts/functions.js"></script>
</body>
</html>
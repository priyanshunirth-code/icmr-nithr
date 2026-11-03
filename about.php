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
<title>About Us</title>
 
  <?php include("GlobalCss.php"); ?>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
   <?php include("GlobalJs.php"); ?>
  
  
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	
	<?php include("header.php");?>
	<!-- Header End --> 
	<!-- Sub Header Start -->  
	<div class="page-section" style="background:url('assets/images/sub-header-about-img.jpg'); background-size:cover;padding:247px 0 35px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cs-page-title">
                        <h1 style="color:#fff !important;"><?php echo $lang['about_us']; ?></h1>
                        <p style="color:#fff;"><?php echo $lang['icmr']; ?></p>
                    </div>
                </div>
            </div>
        </div>
	</div>
	<!-- Sub Header End -->
	<!-- Breadcrumb Start -->
	<div class="page-section" style="border-bottom:1px solid #f4f4f4;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="about-us.html#"><?php echo $lang['home']; ?></a></li>
						
						<li><?php echo $lang['about_us']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb End -->   
	<!-- Main Start -->
	<div class="main-section">
		
        <div class="page-section" style="margin-bottom:85px;">
        	<div class="container">
            	<div class="row">
                    <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="image-frame has-border">
                                    <div class="cs-media">
                                        <figure><img src="assets/images/arial-view.jpg" alt="" /></figure>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <div class="cs-column-text" style="text-align: justify;">
                                    <h2><?php echo $lang['who_we_are']; ?></h2>
                                    <p><?php echo $lang['about_para1'];?></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title" style="text-align: justify;">
                           
                            <p><?php echo $lang['about_para2'];?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        <div class="page-section" style="background: rgba(250, 250, 250, 1); padding-top:30px; padding-bottom:30px; margin-top:50px; margin-bottom:100px;">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidth col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class=" col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="">
                                    <div class="cs-element-title " style="text-align: justify;">
                                        <h2><?php echo $lang['about_mandate'];?></h2>
                                        <?php echo $lang['mandate_content'];?>
                                    </div>
                                    <br>
                                    <div class="cs-element-title " style="text-align: justify;">
                                        <h2><?php echo $lang['about_priority'];?></h2>
                                        <?php echo $lang['priority_content'];?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="page-section" style="margin-bottom:100px;">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="row cs-counter-holder">
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="cs-counter left">
                                    <div class="cs-media">
                                        <figure><i class="cs-color icon-uniF128"></i></figure>
                                    </div>
                                    <div class="cs-text">
                                        <strong class="counter">134+</strong>
                                        <span>Staff</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="cs-counter left">
                                    <div class="cs-media">
                                        <figure><i class="cs-color icon-uniF118"></i></figure>
                                    </div>
                                    <div class="cs-text">
                                        <strong class="counter">300+</strong>
                                        <span>Research & Publications</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="cs-counter left">
                                    <div class="cs-media">
                                        <figure><i class="cs-color icon-uniF11B"></i></figure>
                                    </div>
                                    <div class="cs-text">
                                        <strong class="counter">20+</strong>
                                        <span>Ongoing Research Projects</span>
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                <div class="cs-counter left">
                                    <div class="cs-media">
                                        <figure><i class="cs-color icon-uniF11D"></i></figure>
                                    </div>
                                    <div class="cs-text">
                                        <strong class="counter">21+</strong>
                                        <span>Scientists</span>
                                    </div>
                                </div>
                            </li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>   -->
       
        <div class="page-section">
            <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="row cs-testimonial">
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/images/slider/1.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/2.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/3.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/4.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/5.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/6.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/7.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>

                    <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                        <div class="cs-media">
                            <figure>
                                <img src="assets/images/slider/8.jpg" alt="" />
                                
                            </figure>
                        </div>
                    </li>
                </ul>
            </div>
        </div>              
	</div>
	<!-- Main End --> 
	<!-- Footer Start -->
	<?php include("footer.php");?>
	<!-- Footer End --> 
</div>

<script src="assets/scripts/responsive.menu.js"></script> <!-- Slick Nav js --> 
<script src="assets/scripts/chosen.select.js"></script> <!-- Chosen js --> 
<script src="assets/scripts/slick.js"></script> <!-- Slick Slider js --> 
<script src="assets/scripts/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="assets/scripts/jquery.mobile-menu.min.js"></script><!-- Side Menu js --> 
<script src="assets/scripts/counter.js"></script><!-- Counter js --> 
<!-- Put all Functions in functions.js --> 
<script src="assets/scripts/functions.js"></script>
</body>
</html>

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
<title>Call for applications for PhD Programme</title>
          
    <?php include("GlobalCss.php"); ?>


<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
   <?php include("GlobalJs.php"); ?>

<style>
.main-section{

  padding: 10px !important

}
@media only screen and (max-width: 600px) {
            iframe {
                width: 400px; /* Adjust as needed */
                height:300px;
            }
        }
</style>
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	
	<?php include("header.php");?>
	<!-- Header End --> 
	<!-- Breadcrumb Start -->
	<div class="page-section" style="border-bottom:1px solid #f4f4f4;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="about-us.html#"><?php echo $lang['home']; ?></a></li>
						
						<li><?php echo $lang['email_change']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb End -->   
	<!-- Main Start -->
	
	<div style="text-align: center;">
	    <div style="text-align: center;">
	        <p class="scroll-text">
	            <h4><?php echo $lang['email_change']; ?></h4>
	            <br>
	            <?php echo $lang['email_change_matter']; ?>
	            <br><br>
	        </p>
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
    
 
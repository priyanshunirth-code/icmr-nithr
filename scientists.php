<?php 
session_start();
include("language.php");
?>
<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Scientists</title>

 <?php include("GlobalCss.php"); ?>


 <?php include("GlobalJs.php"); ?>

</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	
	<!-- Header Start -->
	<?php include("header.php");?>	
	 
    <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="index.php"><?php echo $lang['home'];?></a></li>
						<li><a href="about.php"><?php echo $lang['about_us'];?></a></li>
						
						<li><?php echo $lang['scientific_divisions']; ?></li>
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
             <?php ?>
              <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<div class="cs-section-title">
                        	<h1><?php echo $lang['scientific_divisions']; ?></h1>
                        </div>

                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<div class="cs-quote-sec">
                        	<blockquote>
                            	<?php echo $lang['abdul_kalam_quote']; ?>
                            </blockquote>
                        </div>
                    </div>
            <section id="Scientists">
                    <?php
                    
                    ?>

                    <?php 
               
                // $sql = "SELECT * FROM scientists ORDER BY sc_designation DESC";
                $sql = "SELECT * FROM scientists_new ORDER BY order_series ASC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    	<div class="cs-team grid">
                        	<div class="cs-media">
                            	<figure>
                                	<a href="scientist_newprofile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="<?php echo $row['sc_name'];?>"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                            	<h5><a href="scientist_newprofile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php if($_SESSION['language']=='hi' && $row['sc_name_hindi']!='' ) { echo $row['sc_name_hindi']; } else { echo $row['sc_name']; }?></a></h5>
                                <small><?php if($_SESSION['language']=='hi' && $row['sc_education_hindi']!='' ) { echo $row['sc_education_hindi']; } else { echo $row['sc_education']; }?></small>
                                <span><?php if($_SESSION['language']=='hi' && $row['sc_designation_hindi']!='' ) { echo $row['sc_designation_hindi']; } else { echo $row['sc_designation']; }?></span>
                                <p><?php if($_SESSION['language']=='hi' && $row['sc_headline_hindi']!='' ) { echo $row['sc_headline_hindi']; } else { echo $row['sc_headline']; }?></p>
                                <div class="cs-social-media">
                                	
                                    <a href="scientist_newprofile.php?sid=<?php echo md5($row['sc_id']);?>"><button class="btn btn-primary"><?php echo $lang['view_profile']; ?></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>
                    <?php  ?>
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
<!-- Put all Functions in functions.js --> 
<script src="assets/scripts/functions.js"></script>
</body>
</html>
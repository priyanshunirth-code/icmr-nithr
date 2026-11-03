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
              <aside class="section-sidebar col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="cs-section-title">
                            <h4><?php echo $lang['division']; ?></h4>
                    </div>
              	<div class="widget cs-widget-links">
                    
                	<ul>
                    	<li><a href="#CommunicableDisease"><?php echo $lang['communicable_diseases']; ?></a></li>
                        <li><a href="#GeneticDisorder"><?php echo $lang['genetic_disorders']; ?></a></li>
                        <li><a href="#In-VivoResearch"><?php echo $lang['in_vivo_research']; ?></a></li>
                        <li><a href="#NonCommunicableDiseases"><?php echo $lang['non_communicable_diseases']; ?></a></li>
                        <li><a href="#SocialScienceEthnomedicine"><?php echo $lang['social_science_ethnomedicine']; ?></a></li>
                        <li><a href="#VectorBorneDiseases"><?php echo $lang['vector_borne_diseases']; ?></a></li>
                        <li><a href="#VirologyandZoonoticDiseases"><?php echo $lang['virology_zoonotic_diseases']; ?></a></li>
                    </ul>              
                </div>
              	
              </aside>
              <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
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
            <section id="CommunicableDisease">
                    <!-- Communicable Diseases -->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['communicable_diseases']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                    <?php 
               
                $sql = "SELECT * FROM scientists WHERE division='Communicable Diseases' ORDER BY sc_designation DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                    	<div class="cs-team grid">
                        	<div class="cs-media">
                            	<figure>
                                	<a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="<?php echo $row['sc_name'];?>"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                            	<h5><a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php if($_SESSION['language']=='hi' && $row['sc_name_hindi']!='' ) { echo $row['sc_name_hindi']; } else { echo $row['sc_name']; }?></a></h5>
                                <small><?php if($_SESSION['language']=='hi' && $row['sc_education_hindi']!='' ) { echo $row['sc_education_hindi']; } else { echo $row['sc_education']; }?></small>
                                <span><?php if($_SESSION['language']=='hi' && $row['sc_designation_hindi']!='' ) { echo $row['sc_designation_hindi']; } else { echo $row['sc_designation']; }?></span>
                                <p><?php if($_SESSION['language']=='hi' && $row['sc_headline_hindi']!='' ) { echo $row['sc_headline_hindi']; } else { echo $row['sc_headline']; }?></p>
                                <div class="cs-social-media">
                                	
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><button class="btn btn-primary"><?php echo $lang['view_profile']; ?></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <section id="GeneticDisorder">

                <!-- Genetic Disorder -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['genetic_disorders']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                    <?php 
               
                $sql = "SELECT * FROM scientists WHERE division='Genetic Disorder' ORDER BY sc_designation DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="<?php echo $row['sc_name'];?>"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                            	<h5><a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php if($_SESSION['language']=='hi' && $row['sc_name_hindi']!='' ) { echo $row['sc_name_hindi']; } else { echo $row['sc_name']; }?></a></h5>
                                <small><?php if($_SESSION['language']=='hi' && $row['sc_education_hindi']!='' ) { echo $row['sc_education_hindi']; } else { echo $row['sc_education']; }?></small>
                                <span><?php if($_SESSION['language']=='hi' && $row['sc_designation_hindi']!='' ) { echo $row['sc_designation_hindi']; } else { echo $row['sc_designation']; }?></span>
                                <p><?php if($_SESSION['language']=='hi' && $row['sc_headline_hindi']!='' ) { echo $row['sc_headline_hindi']; } else { echo $row['sc_headline']; }?></p>
                                <div class="cs-social-media">
                                	
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><button class="btn btn-primary"><?php echo $lang['view_profile']; ?></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </section>
            <section id="In-VivoResearch">
                <!-- In-Vivo Research -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['in_vivo_research']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                    <?php 
               
                $sql = "SELECT * FROM scientists WHERE division='In-Vivo Research' ORDER BY sc_designation DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="<?php echo $row['sc_name'];?>"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                            	<h5><a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php if($_SESSION['language']=='hi' && $row['sc_name_hindi']!='' ) { echo $row['sc_name_hindi']; } else { echo $row['sc_name']; }?></a></h5>
                                <small><?php if($_SESSION['language']=='hi' && $row['sc_education_hindi']!='' ) { echo $row['sc_education_hindi']; } else { echo $row['sc_education']; }?></small>
                                <span><?php if($_SESSION['language']=='hi' && $row['sc_designation_hindi']!='' ) { echo $row['sc_designation_hindi']; } else { echo $row['sc_designation']; }?></span>
                                <p><?php if($_SESSION['language']=='hi' && $row['sc_headline_hindi']!='' ) { echo $row['sc_headline_hindi']; } else { echo $row['sc_headline']; }?></p>
                                <div class="cs-social-media">
                                	
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><button class="btn btn-primary"><?php echo $lang['view_profile']; ?></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>
            <section id="NonCommunicableDiseases">

                <!-- Non Communicable Diseases -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['non_communicable_diseases']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                    <?php 
               
                $sql = "SELECT * FROM scientists WHERE division='Non Communicable Diseases' ORDER BY sc_designation DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="<?php echo $row['sc_name'];?>"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                            	<h5><a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php if($_SESSION['language']=='hi' && $row['sc_name_hindi']!='' ) { echo $row['sc_name_hindi']; } else { echo $row['sc_name']; }?></a></h5>
                                <small><?php if($_SESSION['language']=='hi' && $row['sc_education_hindi']!='' ) { echo $row['sc_education_hindi']; } else { echo $row['sc_education']; }?></small>
                                <span><?php if($_SESSION['language']=='hi' && $row['sc_designation_hindi']!='' ) { echo $row['sc_designation_hindi']; } else { echo $row['sc_designation']; }?></span>
                                <p><?php if($_SESSION['language']=='hi' && $row['sc_headline_hindi']!='' ) { echo $row['sc_headline_hindi']; } else { echo $row['sc_headline']; }?></p>
                                <div class="cs-social-media">
                                	
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><button class="btn btn-primary"><?php echo $lang['view_profile']; ?></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </section>

            <section id="SocialScienceEthnomedicine">

                <!-- Non Communicable Diseases -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['social_science_ethnomedicine']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                    <?php 
               
                $sql = "SELECT * FROM scientists WHERE division='Social Science & Ethnomedicine' ORDER BY sc_designation DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="<?php echo $row['sc_name'];?>"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                            	<h5><a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php if($_SESSION['language']=='hi' && $row['sc_name_hindi']!='' ) { echo $row['sc_name_hindi']; } else { echo $row['sc_name']; }?></a></h5>
                                <small><?php if($_SESSION['language']=='hi' && $row['sc_education_hindi']!='' ) { echo $row['sc_education_hindi']; } else { echo $row['sc_education']; }?></small>
                                <span><?php if($_SESSION['language']=='hi' && $row['sc_designation_hindi']!='' ) { echo $row['sc_designation_hindi']; } else { echo $row['sc_designation']; }?></span>
                                <p><?php if($_SESSION['language']=='hi' && $row['sc_headline_hindi']!='' ) { echo $row['sc_headline_hindi']; } else { echo $row['sc_headline']; }?></p>
                                <div class="cs-social-media">
                                	
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><button class="btn btn-primary"><?php echo $lang['view_profile']; ?></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </section>
            <section id="VectorBorneDiseases">
                <!-- Vector Borne Diseases -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['vector_borne_diseases']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                    <?php 
               
                $sql = "SELECT * FROM scientists WHERE division='Vector Borne Diseases' ORDER BY sc_designation DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="<?php echo $row['sc_name'];?>"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                            	<h5><a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php if($_SESSION['language']=='hi' && $row['sc_name_hindi']!='' ) { echo $row['sc_name_hindi']; } else { echo $row['sc_name']; }?></a></h5>
                                <small><?php if($_SESSION['language']=='hi' && $row['sc_education_hindi']!='' ) { echo $row['sc_education_hindi']; } else { echo $row['sc_education']; }?></small>
                                <span><?php if($_SESSION['language']=='hi' && $row['sc_designation_hindi']!='' ) { echo $row['sc_designation_hindi']; } else { echo $row['sc_designation']; }?></span>
                                <p><?php if($_SESSION['language']=='hi' && $row['sc_headline_hindi']!='' ) { echo $row['sc_headline_hindi']; } else { echo $row['sc_headline']; }?></p>
                                <div class="cs-social-media">
                                	
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><button class="btn btn-primary"><?php echo $lang['view_profile']; ?></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>
            <section id="VirologyandZoonoticDiseases">
                <!-- Virology and Zoonotic Diseases -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['virology_zoonotic_diseases']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                    <?php 
               
                $sql = "SELECT * FROM scientists WHERE division='Virology and Zoonotic Diseases' ORDER BY sc_designation DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="<?php echo $row['sc_name'];?>"></a>
                                </figure>
                            </div>
                            <div class="cs-text">
                            	<h5><a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php if($_SESSION['language']=='hi' && $row['sc_name_hindi']!='' ) { echo $row['sc_name_hindi']; } else { echo $row['sc_name']; }?></a></h5>
                                <small><?php if($_SESSION['language']=='hi' && $row['sc_education_hindi']!='' ) { echo $row['sc_education_hindi']; } else { echo $row['sc_education']; }?></small>
                                <span><?php if($_SESSION['language']=='hi' && $row['sc_designation_hindi']!='' ) { echo $row['sc_designation_hindi']; } else { echo $row['sc_designation']; }?></span>
                                <p><?php if($_SESSION['language']=='hi' && $row['sc_headline_hindi']!='' ) { echo $row['sc_headline_hindi']; } else { echo $row['sc_headline']; }?></p>
                                <div class="cs-social-media">
                                	
                                    <a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><button class="btn btn-primary"><?php echo $lang['view_profile']; ?></button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    
            </section>

                    
                    
                    
                    
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
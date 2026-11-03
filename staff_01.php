<?php 
session_start();
include("language.php");
?>
<?php include("config.php");?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<title>Staff</title>
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
						<li><a href="index.php"><?php echo $lang['home']; ?></a></li>
						<li><a href="about.php"><?php echo $lang['about_us']; ?></a></li>
						
						<li><?php echo $lang['staff_list']; ?></li>
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
                        <li><a href="#NonCommunicableDiseases"><?php echo $lang['non_communicable_diseases']; ?></a></li>
                         <li><a href="#SocialScienceEthnomedicine"><?php echo $lang['social_science_ethnomedicine']; ?></a></li>
                         <li><a href="#VectorBorneDiseases"><?php echo $lang['vector_borne_diseases']; ?></a></li>
                        
                        <li><a href="#VirologyandZoonoticDiseases"><?php echo $lang['virology_zoonotic_diseases']; ?></a></li>
                        <li><a href="#In-VivoResearch"><?php echo $lang['in_vivo_research']; ?></a></li>

                        <li><a href="#Reception"><?php echo $lang['reception']; ?></a></li>
                        <li><a href="#DirectorOffice"><?php echo $lang['office_director']; ?></a></li>
                        <li><a href="#Administration"><?php echo $lang['administration']; ?></a></li>
                      <!--  <li><a href="#Accounts">Accounts</a></li>-->
                        <!--<li><a href="#Establishment">Establishment</a></li>
                        <li><a href="#Store">Store</a></li>

                        <li><a href="#BillSection">Bill Section</a></li>
                        <li><a href="#Library">Library</a></li>-->
                        <li><a href="#VehicleSection"><?php echo $lang['vehicle_section']; ?></a></li>
                    </ul>              
                </div>
              	
              </aside>
              <div class="section-content col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<div class="cs-section-title">
                        	<h1><?php echo $lang['staff_list']; ?></h1>
                             <hr>
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
               
                $sql = "SELECT * FROM staff WHERE staff_division='Communicable Diseases'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

                  
            </section>

            <section id="GeneticDisorder">
                <br><br>
                <!-- Genetic Disorder -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['genetic_disorders']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>



                  

            <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Genetic Disorder'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </section>
            <section id="NonCommunicableDiseases">

                <!-- Non Communicable Diseases -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4><?php echo $lang['non_communicable_diseases']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                    

                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Non Communicable Diseases'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </section>

            <section id="SocialScienceEthnomedicine">
                <br><br>
                <!-- Non Communicable Diseases -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="cs-section-title">
                            <h4><?php echo $lang['social_science_ethnomedicine']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

            <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Social Science & Ethnomedicine'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </section>
            

            <section id="VectorBorneDiseases">
                <!-- Vector Borne Diseases -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4><?php echo $lang['vector_borne_diseases']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Vector Borne Diseases'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>

            
            <section id="VirologyandZoonoticDiseases">
                <!-- Virology and Zoonotic Diseases -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4><?php echo $lang['virology_zoonotic_diseases']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                  
                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Virology and Zoonotic Diseases'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    
            </section>

            <section id="In-VivoResearch">
                <!-- In-Vivo Research -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4><?php echo $lang['in_vivo_research']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                   

                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='In-Vivo Research'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </section>

            <section id="Reception">
                <!-- Reception -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4><?php echo $lang['reception']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                  
                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Reception'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <section id="DirectorOffice">
                <!-- DirectorOffice -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4><?php echo $lang['office_director']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Office of the Director'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <section id="Administration">
                <!-- Administration -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4><?php echo $lang['administration']; ?></h4>
                            <hr>
                        </div>
                        
                    </div>

                   
                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Administration'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>

            <?php /*?><section id="Accounts">
                <!-- Accounts -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4>Accounts</h4>
                            <hr>
                        </div>
                        
                    </div>

                

                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Accounts'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section><?php */?>

            <?php /*?><section id="Establishment">
                <!-- Establishment -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4>Establishment</h4>
                            <br>
                        </div>
                        
                    </div>

                

                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Establishment'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section><?php */?>

            <?php /*?><section id="Store">
                <!-- Store -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4>Store</h4>
                            <br>
                        </div>
                        
                    </div>

                 
                <?php 
               
               $sql = "SELECT * FROM staff WHERE staff_division='Store'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section><?php */?>

            <?php /*?><section id="BillSection">
                <!-- Bill Section -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4>Bill Section</h4>
                            <br>
                        </div>
                        
                    </div>

                   

                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Bill Section'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section><?php */?>

            <?php /*?>
            <section id="Library">
                <!-- Library -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4>Library</h4>
                            <br>
                        </div>
                        
                    </div>

                
                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Library'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                                <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </section>
                    <?php */?>
            <section id="VehicleSection">
                <!-- Vehicle Section -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <br><br>
                        <div class="cs-section-title">
                            <h4><?php echo $lang['vehicle_section']; ?></h4>
                           
                        </div>
                        
                    </div>

                
                <?php 
               
                $sql = "SELECT * FROM staff WHERE staff_division='Vehicle Section'";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
                    <div class="col-md-4">
                        <div class="cs-team grid">
                            <div class="cs-media">
                                <figure>
                                    <img src="assets/images/staff/<?php echo $row['staff_photo'];?>">
                                </figure>
                            </div>
                            <div class="cs-text">
                            <h5><?php if($_SESSION['language']=='hi') { echo $row['staff_name_hindi']; } else { echo $row['staff_name']; }?></h5>
                                <small><?php if($_SESSION['language']=='hi') { echo $row['staff_designation_hindi']; } else { echo $row['staff_designation']; }?></small>
                               
                                <p><?php echo $row['staff_email'];?></p>
                                
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
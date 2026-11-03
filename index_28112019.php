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
<title>ICMR-NIRTH</title>
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

<style type="text/css">
    .modal-content iframe{
        margin: 0 auto;
        display: block;
    }
</style>
<script type="text/javascript">
$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url = $("#cartoonVideo").attr('src');


    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal").on('hide.bs.modal', function(){
        $("#cartoonVideo").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal").on('show.bs.modal', function(){
        $("#cartoonVideo").attr('src', url);
    });

});

$(document).ready(function(){
    /* Get iframe src attribute value i.e. YouTube video url
    and store it in a variable */
    var url2 = $("#cartoonVideo2").attr('src');


    
    /* Assign empty url value to the iframe src attribute when
    modal hide, which stop the video playing */
    $("#myModal2").on('hide.bs.modal', function(){
        $("#cartoonVideo2").attr('src', '');
    });
    
    /* Assign the initially stored url back to the iframe src
    attribute when modal is displayed again */
    $("#myModal2").on('show.bs.modal', function(){
        $("#cartoonVideo2").attr('src', url2);
    });

});
</script>
</head>
<body class="wp-smartstudy">
<div class="wrapper"> 
	<!-- Side Menu Start -->
	<div id="overlay"></div>
	<!--
    <div id="mobile-menu">
        <ul>
           
            <li class="active"><a href="index.html">Home</a></li>
			<li><a href="#">Courses</a>
				<ul>
					<li><a href="courses-grid.html">Courses grid view</a></li>
					<li><a href="courses-simple.html">Courses Simple view</a></li>
					<li><a href="courses-listing.html">Courses list view</a></li>
					<li><a href="cs-courses-detail.html">Courses Detail</a></li>
				</ul>
			</li>
			<li><a href="#">Pages</a>
				<ul>
					<li><a href="user-detail.html">Student Dashboard</a></li>
					<li><a href="instructor-detail.html">instructor Dashboard</a></li>
					<li><a href="affiliations.html">Affiliations</a></li>
					<li><a href="typography.html">Typography</a></li>
					<li><a href="shortcode.html">Short code</a>
						<ul>
							<li><a href="loop.html">Loop</a></li>
						</ul>
					</li>
					<li><a href="about-us.html">About Us</a></li>
					<li><a href="faqs.html">FAQ's</a></li>
					<li><a href="under-construction.html">Maintenance Page</a></li>
					<li><a href="404.html">404 Page</a></li>
					<li><a href="signup.html">Signup / Login</a></li>
					<li><a href="pricing.html">Price Table</a></li>
					<li><a href="#">Team</a>
						<ul>
							<li><a href="team-listing.html"> Team List</a></li>
							<li><a href="team-grid.html"> Team Grid</a></li>
							<li><a href="team-detail.html"> Team Detail</a></li>
						</ul>
					</li>
					
					<li><a href="#">Shop</a>
						<ul>
							<li><a href="shop.html"> Products</a></li>
							<li><a href="shop-detail.html"> Detail</a></li>
						</ul>
					</li>
				</ul>
			</li>
			<li><a href="#">Events</a>
				<ul>
					<li><a href="events-grid.html">Grid View</a></li>
					<li><a href="events-listing.html">List View</a></li>
					<li><a href="events-detail.html">Detail</a></li>
				</ul>
			</li>
			<li><a href="#">Blog</a>
				<ul>
					<li><a href="blog-medium.html">Medium List</a></li>
					<li><a href="blog-large.html">Large List</a></li>
					 <li><a href="blog-grid.html">Grid</a></li>
					<li><a href="blog-detail.html">Detail</a></li>
					<li><a href="blog-2.html">Masonry</a></li>
				</ul>
			</li>
			<li><a href="#">Contact</a>
				<ul>
					<li><a href="contact-us.html">Contact us 1</a></li>
					<li><a href="contact-us-02.html">Contact us 2</a></li>
				</ul>
			</li>
        </ul>
    </div>
   -->
	<!-- Side Menu End -->
	<!-- Header Start -->
	<?php include('header.php');?>
	<!-- Header End --> 
	<!-- Banner Start --> 
	<div class="page-section" style="background:url('assets/extra-images/banner-img.jpg') no-repeat;background-size:cover;padding:112px 0;">
		<div class="container">
			<div class="row">
				<div align="right" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div style=" margin-top:-60px;" align="right"  class="cs-column-text">
					<!--	<span style="display:inline-block;padding:10px 20px;background:rgba(0,0,0,0.8);color:#FFF;font-size:18px;margin-bottom:22px;">Welcome</span>-->
					
                    	<h1 style="padding-right: 10px;

margin-top: -60px;

text-align: center !important;

font-size: 20px !important;

color: #293571 !important;

line-height: 34px !important;

margin-right: -40px;
font-weight: bold;
    

margin-left: 620px;">
                    	 आई. सी. एम. आर. - राष्ट्रीय जनजाति स्वास्थ्य अनुसंधान संस्थान
                    	    </h1>

<!--

<h1 style="background: rgba(0,0,0,0.6);

padding-right: 10px;

margin-top: -60px;

text-align: center !important;

font-size: 20px !important;

color: #ffffff !important;

line-height: 34px !important;

margin-right: -40px;

margin-left: 620px;">आई. सी. एम. आर. - राष्ट्रीय जनजाति स्वास्थ अनुसंधान संस्थान</h1>

-->
						
                        
                        <p style="padding-right: 10px;

font-size: 20px !important;

text-align: center !important;

color: #293571 !important;

line-height: 34px !important;

margin-right: -40px;

margin-left: 620px;

font-weight: bold;
    margin-top: -15px;


">ICMR-National Institute of Research in Tribal Health</p>
						
                      
                      
                        <p  style="padding-right: 10px;
text-align: center !important;
font-size: 13px !important;
line-height: 34px !important;
color: #293571 !important;
font-weight: 400 !important;
margin-bottom: 30px;
margin-right: -40px;
margin-left: 620px;
font-weight: bold;
    margin-top: -15px;



">Dept. of Health Research, Mininstry of Health and Family Welfare, Govt. of India
</p>


<div>
    <marquee>
<ul><li style="color:#fff; font-weight:bold">This is NIRTH's new website and we are still in the process of porting content from the old one. | It will be updated soon | The old website can be accessed using <a style="color:#fff; font-weight:bold" href='https://nirth.res.in/old'>https://nirth.res.in/old.</a> If you are facing any problem you may email to  <a  style="color:#fff; font-weight:bold" href='mailto: nirthjabalpur@gmail.com'>nirthjabalpur@gmail.com</a>
</li>
<li style="color:#fff; font-weight:bold">Result of Written Examination held on 25/8/2019 for recruitment to the post of Lower Division Clerk & Staff Car Driver (Ordinary Grade) have been declared and candidates may view their result by login website www.nirth.res.in. Candidates are advised to visit regularly ICMR-NIRTH, Jabalpur website to know further information regarding Skill/Trade Test and other update of recruitment.<a style="color:#fff; font-weight:bold" href='https://nirth.res.in/result.php'>https://nirth.res.in/result</a> If you are facing any problem you may email to  <a  style="color:#fff; font-weight:bold" href='mailto: nirthjabalpur@gmail.com'>nirthjabalpur@gmail.com</a>
</li>
<li style="color:#fff; font-weight:bold">Syllabus, pattern for written examination and list of short listed candidates for selection for six months dissertation from
Jan -June 2020.<a style="color:#fff; font-weight:bold" href='https://nirth.res.in/old/studentsconer.php'>https://nirth.res.in/old/studentsconer.php</a> If you are facing any problem you may email to  <a  style="color:#fff; font-weight:bold" href='mailto: nirthjabalpur@gmail.com'>nirthjabalpur@gmail.com</a>
</li>
</ul></marquee></div>



                        <p  style="
padding-right: 10px;
text-align: right !important;
font-size: 15px !important;
line-height: 34px !important;
color: #FFF !important;
font-weight: 400 !important;
margin-bottom: 30px;
margin-right: -70px;
margin-left: 700px;">&nbsp;</p>


                        <p  style="
padding-right: 10px;
text-align: right !important;
font-size: 15px !important;
line-height: 34px !important;
color: #293571 !important;
font-weight: 400 !important;
margin-bottom: 30px;
margin-right: -70px;
margin-left: 700px;">&nbsp;</p>


                        <p  style="padding-right: 10px;

text-align: right !important;

font-size: 15px !important;

line-height: 34px !important;

color: #293571 !important;

font-weight: bold !important;

margin-bottom: -60px;

margin-right: 40px;

margin-left: 320px;

margin-top: 130px;">Video Documentary of NIRTH-  </p>
						
						<!-- Button HTML (to Trigger Modal) -->
    <a href="#myModal" class="btn btn-lg btn-primary" data-toggle="modal"><i class="icon-play"></i> Play Video (Hindi)</a>
    <a href="#myModal2" class="btn btn-lg btn-primary" data-toggle="modal"><i class="icon-play"></i> Play Video (English)</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Banner End --> 
	<!-- Main Start -->
	<div class="main-section">
		<div class="page-section" style="margin-bottom:45px;margin-top:-60px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<ul class="cs-top-categories">
							<li><a href="about.php" style="background:#8a9045;"><i class="icon-office"></i>NIRTH Profile</a></li>
							<li><a href="staff.php" style="background:#a88b60;"><i class="icon-uniF1032"></i>Research Division</a></li>
							<li><a href="scientists.php" style="background:#c16622;"><i class="icon-user-tie"></i>Scientists</a></li>
							<li><a href="publications.php" style="background:#896ca9;"><i class="icon-books"></i>Publications</a></li>
							<li><a href="vacancies.php" style="background:#3e769a;"><i class="icon-bullhorn"></i>Vacancies</a></li>
							
							
							<li><a href="#" style="background:#dd9d13;"><i class="icon-uniF1002"></i>What's New</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="page-section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
								 <div class="cs-team">
							 		<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-element-title" style="margin-bottom:30px;">
										<h2>Director</h2>
									</div>
									</div>
									<div class="cs-team fancy">
										<div class="cs-media">
											<figure><img src="assets/extra-images/director.jpg" alt=""></figure>
										</div>
										<div class="cs-text">
											<h5><a class="cs-color" href="#">Dr. Aparup Das</a></h5>
											<span>Director</span>

											<p style="text-align: justify;">The National Institute of Research in Tribal Health (NIRTH), Jabalpur is one of the 30 health research institutes working under the aegis of the Indian Council of Medical Research (ICMR), Department of Health Research, Ministry of Health and Family Welfare, Government of India. Sprawling in a lush-green 44 acre campus located in the state of Madhya Pradesh - the heart of India, ICMR-NIRTH is surrounded by thickly-forested tribal dominated areas, 
												<br><br>
											<a style="font-size:13px;font-weight:700;line-height:19px;padding:10px 28px;border-radius:50px;color:#FFF;text-decoration:none;outline:none;" class="cs-bgcolor" href="director.php">Read More</a></p>
										</div>
									</div>
								</div>
							</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-6 col-xs-12">
					<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="cs-element-title" style="margin-bottom:30px;">
									<h2>Photo Gallary</h2>
								</div>
							</div>
							<ul class="cs-bloggrid-slider-sm">
								
                                <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog blog-grid">
									<div class="cs-media">
										<figure><a href="#"><img src="assets/extra-images/gandhi.jpg" alt=""></a><figcaption>Activities</figcaption></figure>
									</div>
									<div class="cs-blog-text">
										<div class="post-options">
											<span class="post-date">03.10.2018</span>
										</div>
										<span class="post-comments">10</span>
										<div class="post-title"><h6><a href="#">Activities</a></h6></div>
										<a href="#" class="cs-readmore-btn">Read more</a>
									</div>
								  </div>
								</li>
                                
                                
                                
                                <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog blog-grid">
									<div class="cs-media">
										<figure><a href="#"><img src="assets/extra-images/Blogs-grid-img3.jpg" alt=""></a><figcaption>Activities</figcaption></figure>
									</div>
									<div class="cs-blog-text">
										<div class="post-options">
											<span class="post-date">23.12.2014</span>
										</div>
										<span class="post-comments">10</span>
										<div class="post-title"><h6><a href="#">Activities</a></h6></div>
										<a href="#" class="cs-readmore-btn">Read more</a>
									</div>
								  </div>
								</li>
								<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog blog-grid">
									<div class="cs-media">
										<figure><a href="#"><img src="assets/extra-images/Blogs-grid-img2.jpg" alt=""></a><figcaption>Activities</figcaption></figure>
									</div>
									<div class="cs-blog-text">
										<div class="post-options">
											<span class="post-date">23.12.2014</span>
										</div>
										<span class="post-comments">10</span>
										<div class="post-title"><h6><a href="#">Activities</a></h6></div>
										<a href="#" class="cs-readmore-btn">Read more</a>
									</div>
								  </div>
								</li>
								<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog blog-grid">
									<div class="cs-media">
										<figure><a href="#"><img src="assets/extra-images/Blogs-grid-img1.jpg" alt=""></a><figcaption>Activities</figcaption></figure>
									</div>
									<div class="cs-blog-text">
										<div class="post-options">
											<span class="post-date">23.12.2014</span>
										</div>
										<span class="post-comments">10</span>
										<div class="post-title"><h6><a href="#">Activities</a></h6></div>
										<a href="#" class="cs-readmore-btn">Read more</a>
									</div>
								  </div>
								</li>
								<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog blog-grid">
									<div class="cs-media">
										<figure><a href="#"><img src="assets/extra-images/Blogs-grid-img3.jpg" alt=""></a><figcaption>Activities</figcaption></figure>
									</div>
									<div class="cs-blog-text">
										<div class="post-options">
											<span class="post-date">23.12.2014</span>
										</div>
										<span class="post-comments">10</span>
										<div class="post-title"><h6><a href="#">Activities</a></h6></div>
										<a href="#" class="cs-readmore-btn">Read more</a>
									</div>
								  </div>
								</li>
								<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog blog-grid">
									<div class="cs-media">
										<figure><a href="#"><img src="assets/extra-images/Blogs-grid-img2.jpg" alt=""></a><figcaption>Activities</figcaption></figure>
									</div>
									<div class="cs-blog-text">
										<div class="post-options">
											<span class="post-date">23.12.2014</span>
										</div>
										<span class="post-comments">10</span>
										<div class="post-title"><h6><a href="#">Activities</a></h6></div>
										<a href="#" class="cs-readmore-btn">Read more</a>
									</div>
								  </div>
								</li>
								<li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
									<div class="cs-blog blog-grid">
									<div class="cs-media">
										<figure><a href="#"><img src="assets/extra-images/Blogs-grid-img1.jpg" alt=""></a><figcaption>Activities</figcaption></figure>
									</div>
									<div class="cs-blog-text">
										<div class="post-options">
											<span class="post-date">23.12.2014</span>
										</div>
										<span class="post-comments">10</span>
										<div class="post-title"><h6><a href="#">Activities</a></h6></div>
										<a href="#" class="cs-readmore-btn">Read more</a>
									</div>
								  </div>
								</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-6 col-xs-12">
						<div class="widget cs-widget-links">
                	<ul>
                    	<li><a href="admitcard.php">Admit Card</a></li>
                        <li><a href="result.php">Result</a></li>
                        <li><a href="vacancies.php">Vacancies</a></li>
                        <li><a href="employees_corner.php">Downloads</a></li>
                        <li><a href="staff.php">Staff Directory</a></li>
                        <li><a href="research.php">Research Opportunities</a></li>
                        <li><a href="analytical_instrument_facility.php">Sophisticated Analytical Instrument Facility</a></li>
                        <li><a href="tenders.php">Tenders</a></li>
                        
                    </ul> 

                </div>


            </div>
            		<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
	                    <div class="cs-element-title" style="margin-bottom:30px;">
	                        <h2>Scientists <a href="scientists.php"><small>View All</small></a></h2>
	                    </div>
					</div>

					<ul class="cs-teamlist-slider">
						 <?php 
               
                $sql = "SELECT * FROM scientists ORDER BY sc_designation DESC LIMIT 9";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result)) {

                ?>
						<li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                    	<div class="cs-team listing loop">
	                        	<div class="cs-media">
	                            	<figure>
	                                	<a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>"><img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt="#"></a>
	                                </figure>
	                            </div>
	                            <div class="cs-text">
	                            	<h5><a href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>" class="cs-color"><?php echo $row['sc_name'];?></a></h5>
	                                <span><?php echo $row['sc_designation'];?></span>
	                                <p><?php echo $row['sc_headline'];?></p>
	                                
	                                <a style="font-size:13px;font-weight:700;line-height:19px;padding:10px 28px;border-radius:50px;color:#FFF;text-decoration:none;outline:none;" class="cs-bgcolor" href="scientist_profile.php?sid=<?php echo md5($row['sc_id']);?>">View Profile</a>
	                            </div>
	                        </div>
						</li>
				<?php } ?>
						
					</ul>

                </div>



					</div>

				</div>

			</div>

		</div> 

		
		<div class="page-section">
			<div class="container">
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-element-title" style="margin-bottom:30px;">
										<h2>Vigilance Awareness Week 2019</h2>
									</div>
									</div>
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								 <div class="cs-team">
							 		<div class="row">
									
									<div class="cs-team fancy">
										<div class="cs-media">
											<figure><img src="assets/images/vigilance/notice1.jpg" alt=""></figure>
										</div>
										<div class="cs-text">
											<h5><a class="cs-color" href="#">Integrity: A way of life (ईमानदारी - एक जीवन शैली)</a></h5>
											<span>28-10-2019 to 02-11-2019</span>
										</div>
									</div>
								</div>
							</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="row">
									<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									    
										<div class="cs-team grid">
											<div class="cs-media">
											    
											            <figure>
												            <img src="assets/images/vigilance/director_office.png">
												        </figure>
											        	</div>
											        	
								</div>
								
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									    
										<div class="cs-team grid">
											<div class="cs-media">
											    
											            <figure>
												            <img src="assets/images/vigilance/maingate2.jpg">
												        </figure>
											        </div>
											        
								</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									    
										<div class="cs-team grid">
											<div class="cs-media">
											    
											            <figure>
												            <img src="assets/images/vigilance/reception1.jpg">
												        </figure>
											        </div>
											        
								</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									    
										<div class="cs-team grid">
											<div class="cs-media">
											    
											            <figure>
												            <img src="assets/images/vigilance/main_gate_2.png">
												        </figure>
											        </div>
											        
								</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									    
										<div class="cs-team grid">
											<div class="cs-media">
											    
											            <figure>
												            <img src="assets/images/vigilance/estt1.jpg">
												        </figure>
											        </div>
											        
								</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									    
										<div class="cs-team grid">
											<div class="cs-media">
											    
											            <figure>
												            <img src="assets/images/vigilance/cashier1.jpg">
												        </figure>
											        </div>
											        
								</div>
								</div>
								
								
							</div>
							
            		

					

                </div>



					</div>

				</div>

			</div>

		</div>
		
		
		
		<div class="page-section" style="margin-bottom:90px;">
            <ul class="row cs-history-slider">
                 <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                     <div class="cs-media">
                         <figure>
                             <img src="assets/extra-images/1984.jpg" alt="" />
                             <figcaption>1984</figcaption>
                         </figure>
                      </div>
                      <div class="cs-text">
                       <h5>Began as RMRCT from three rooms in NSCB </h5>
                         
                      </div>
                 </li>
                 <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                     <div class="cs-media">
                         <figure>
                             <img src="assets/extra-images/2002.jpg" alt="" />
                             <figcaption>2002</figcaption>
                         </figure>
                      </div>
                      <div class="cs-text">
                         <h5>Shifted to New Building - RMRCT</h5>
                         
                      </div>
                 </li>
                 
        
                 
                 

               
                 <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                     <div class="cs-media">
                         <figure>
                             <img src="assets/extra-images/2014.jpg" alt="" />
                             <figcaption>2014</figcaption>
                         </figure>
                      </div>
                      <div class="cs-text">
                         <h5> Re-designated as NIRTH</h5>
                         
                      </div>
                 </li>
                 
                  <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                     <div class="cs-media">
                         <figure>
                             <img src="assets/extra-images/history-01.jpg" alt="" />
                             <figcaption>2016</figcaption>
                         </figure>
                      </div>
                      <div class="cs-text">
                         <h5>Mobile Lab Introduced</h5>
                         
                      </div>
                 </li>

                
                
               
                         <li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                     <div class="cs-media">
                         <figure>
                             <img src="assets/extra-images/history-03.jpg" alt="" />
                             <figcaption>2018</figcaption>
                         </figure>
                      </div>
                      <div class="cs-text">
                         <h5>Central Animal Facility added to NIRTH</h5>
                         
                      </div>
                 </li>
                
                
                 
            </ul>
        </div>
		
		<div class="page-section" style="background-color:#f9fafa; padding:50px 0;">
            <div class="container">
                <div class="row">
                    <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="row cs-counter-holder">
                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-counter simple center">
                                    <div class="cs-text">
                                        <strong class="counter cs-color">300+</strong>
                                        <span>Research & Publication</span>
                                        
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">

                                <div class="cs-counter simple center">
                                    <div class="cs-text">
                                        <strong class="counter cs-color">20+</strong>
                                        <span>Ongoing Research Projects</span>
                                        
                                    </div>
                                </div>
                            </li>
                            <li class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="cs-counter simple center">
                                    <div class="cs-text">
                                        <strong class="counter cs-color">21+</strong>
                                        <span>Scientists</span>
                                        
                                    </div>
                                </div>
                            </li>
                       </ul>
                    </div>
                </div>
            </div>
        </div>
		<div class="page-section" style="margin-bottom:80px;">
            <div class="section-fullwidtht col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <ul class="row cs-testimonial main-testimonial">
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-1.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                       
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-2.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-3.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-4.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-5.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-1.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-2.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-3.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-4.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                	<li class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
                    	<div class="cs-media">
                        	<figure>
                            	<img src="assets/extra-images/testimonial-img-5.jpg" alt="" />
                                <figcaption>
                                	<div class="cs-text">
                                    	<p>Sample Description</p>
                                    </div>
                                </figcaption>
                            </figure>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
		<div class="page-section" style="margin-bottom:40px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="cs-fancy-heading" style="margin-bottom:40px;">
							<h6 style="font-size:14px !important; color:#999 !important; text-transform:uppercase !important;">Aggrigations & Governing Organizations</h6>
						</div>
					</div>
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<ul class="cs-graduate-slider">
							<li>
								<div class="cs-media">
								    <figure> <a href='https://icmr.nic.in/'><img src="assets/extra-images/graduate-logo2.jpg" alt="NIRTH"/> </a> </figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <a href='http://www.who.int/'> <img src="assets/extra-images/graduate-logo1.jpg" alt="NIRTH"/> </a></figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <a href='https://www.nih.gov/'><img src="assets/extra-images/graduate-logo3.jpg" alt="NIRTH"/> </a></figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <a href='https://www.cdc.gov/'> <img src="assets/extra-images/graduate-logo4.jpg" alt="NIRTH"/> </a></figure>
								</div>
							</li>
							<li>
								<div class="cs-media">
									<figure> <a href='www.nvbdcp.gov.in/'> <img src="assets/extra-images/graduate-logo5.jpg" alt="NIRTH"/> </a> </figure>
								</div>
							</li>
							
							<li>
								<div class="cs-media">
									<figure> <a href='https://ic-impacts.com/'> <img src="assets/extra-images/graduate-logo6.jpg" alt=""/> </a> </figure>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<!-- Main End --> 
	
	<!-- Footer Start -->
	<?php include("footer.php"); ?>
	<!-- Footer End --> 
</div>
</div>
<script src="assets/scripts/responsive.menu.js"></script> <!-- Slick Nav js --> 
<script src="assets/scripts/chosen.select.js"></script> <!-- Chosen js --> 
<script src="assets/scripts/slick.js"></script> <!-- Slick Slider js --> 
<script src="assets/scripts/jquery.mCustomScrollbar.concat.min.js"></script> 
<script src="assets/scripts/jquery.mobile-menu.min.js"></script><!-- Side Menu js --> 
<script src="assets/scripts/counter.js"></script><!-- Counter js --> 

<!-- Put all Functions in functions.js --> 
<script src="assets/scripts/functions.js"></script>

<!-- Modal HTML -->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ICMR-NIRTH Hindi Documentary</h4>
                </div>
                <div class="modal-body">
                    <iframe id="cartoonVideo" width="560" height="315" src="//www.youtube.com/embed/7YjVdZyjGCI" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal2" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">ICMR-NIRTH English Documentary</h4>
                </div>
                <div class="modal-body">
                    <iframe id="cartoonVideo2" width="560" height="315" src="//www.youtube.com/embed/6k7jOdoqx_Y" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
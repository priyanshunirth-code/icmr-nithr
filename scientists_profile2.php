<?php 
session_start();
include("language.php");
?>
<?php 
include("config.php");
// SECURITY FIX 1.2: Prepared statement to prevent SQL Injection
$sid = $_REQUEST['sid'] ?? '';
$sid = trim($sid);
if (empty($sid)) {
    $row = [];
} else {
    $stmt = $conn->prepare("SELECT * FROM scientists WHERE sc_id = ?");
    $stmt->bind_param("s", $sid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc() ?: [];
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $row['sc_name']; ?>'s Profile - ICMR NIRTH</title>
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
		<!-- Side Menu Start -->
	
	<!-- Side Menu End -->
	<!-- Header Start -->
	<?php include("header.php");?>
	<!-- Header End -->
	<!-- Sub Header Start -->  
	
	<!-- Sub Header End --> 
	<!-- Breadcrumb Start -->
	<div class="page-section" style="border-bottom:1px solid #f4f4f4; margin-bottom:-40px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="index.php">Home</a></li>
						<li><a href="scientists.php">Scientists</a></li>
						
						<li><?php echo $row['sc_name']; ?>'s Profile</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- Breadcrumb End --> 
	<!-- Main Start -->
	<div class="main-section">
		<div class="page-section">
			<div class="container">
				<div class="row">
					<div class="page-sidebar col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        
						<div class="cs-user-sidebar">
							<div class="cs-profile-pic text-center">
								<div class="">
									<div class="cs-media">
										<figure> <img src="assets/images/scientists/<?php echo $row['sc_photo'];?>" alt=""/> </figure>
									</div>
								</div>
								
							</div>
							<div class="cs-usser-account-list">
								<ul>
									<li class="active"><a href="instructor-detail.html"><i class="icon-user3 cs-color"></i>Scientific Profile</a></li>
									<li><a href="instructor-courses.html"><i class="icon-graduation-cap cs-color"></i>Research Interests</a></li>
									<li><a href="instructor-statements.html"><i class="icon-file-text2 cs-color"></i>Scientific Staff</a></li>
									<li><a href="#"><i class="icon-file-text2 cs-color"></i>Past Research students</a></li>
                                    <li><a href="#"><i class="icon-file-text2 cs-color"></i>Ongoing research</a></li>
                                    <li><a href="#"><i class="icon-file-text2 cs-color"></i>Current research collaborators</a></li>
                                    <li><a href="#"><i class="icon-file-text2 cs-color"></i>Past research collaborators</a></li>
                                    <li><a href="#"><i class="icon-file-text2 cs-color"></i>Research in news</a></li>
                                    <li><a href="#"><i class="icon-file-text2 cs-color"></i>Award/Recognition/Honours</a></li>
                                    <li><a href="#"><i class="icon-file-text2 cs-color"></i>Workshop/Conference Organized</a></li>
                                    <li><a href="#"><i class="icon-file-text2 cs-color"></i>Academic contributions</a></li>
                                    <li><a href="#"><i class="icon-file-text2 cs-color"></i>Research Grants</a></li>
								</ul>
							 </div>
						</div>
                    </div>
					
					<div class="page-content col-lg-7 col-md-7 col-sm-12 col-xs-12">
						<div class="cs-user-content cs-instructor">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-section-title">
										<h2>Profile</h2>
									</div>
								</div>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="cs-user-detail">
										<div class="cs-author-info-list">
                         <ul>
                             <li>
                                 <i class="icon-uniF122 cs-color"></i>
                                    <span>
                                     Phone
                                        <em><?php echo $row['sc_phone'];?></em>
                                    </span>
                                </li>
                                <li>
                                 <i class="icon-uniF113 cs-color"></i>
                                    <span>
                                     Email
                                        <a href="mailto:<?php echo $row['sc_email'];?>"><?php echo $row['sc_email'];?></a>
                                    </span>
                                </li>
                                
                            </ul>
                        </div>
										<p class="text-justify"><?php echo $row['sc_profile'];?></p>
									</div>
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
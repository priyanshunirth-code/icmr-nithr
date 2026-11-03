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
<title>Research & Training</title>
    
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
	
	<!-- Header Start -->
	<?php include("header.php");?>	
    <!-- Sub Header Start -->  
    <div class="page-section" style="background:url('assets/images/sub-header-research-img.jpg'); background-size:cover;padding:247px 0 5px;">
        
    </div>
    <!-- Sub Header End -->
<!--	 
    <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<ul class="cs-breadcrumb">
						<li><a href="index.php"><?php echo $lang['home']; ?></a></li>
						<li><?php echo $lang['research_training']; ?></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Recent Publications</title>

  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
  /* Page background */
/* Page background */
/* General Styles */



/* Publication Highlight Box */
.publication-highlight-box {
    padding: 12px;
    background-color: #f4f4f4;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Marquee Animation */
.publication-marquee {
    width: 100%;
    overflow: hidden;
    position: relative;
    margin-top: 0px;
}

.publication-container {
    display: flex;
    animation: move 17s linear infinite;
    gap: 12px;
}

@keyframes move {
    0% { transform: translateX(100%); }
    100% { transform: translateX(-100%); }
}

.publication-container:hover {
    animation-play-state: paused;
}

/* Publication Card */
.publication-card {
    flex: 0 0 auto;
    width: 240px;
    height: 250px;
    border-radius: 12px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-color: #ffffff; /* fallback if image not set */
    color: #0099ff;
    padding: 12px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    text-align: left;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    box-sizing: border-box;
    overflow: hidden;
}

/* Optional: Style inner text */
.publication-card p,
.publication-card h4,
.publication-card span {
    margin: 0;
    color: #333;
    font-size: 14px;
    line-height: 1.4;
    word-wrap: break-word;
}


.publication-card:hover {
    transform: translateY(-7px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}
.card-text {
    color: red !important;  /* Makes text red */
    
}


</style>
</head>

<body>
  <div class="wrapper">
    <!-- Main Content -->
    <div class="container my-5">
      <h2 class="text-center mb-4">RECENT PUBLICATIONS</h2>

      <div class="publication-highlight-box">
        <div class="publication-marquee">
          <div class="publication-container" id="publicationMarquee">
            <!-- Publication 1 -->
           <div class="publication-card">
    <h5 class="card-title">Genetic Diversity of M. leprae: A Genomic View</h5>
    <p class="card-text">Genome-wide study revealing M. leprae strain diversity patterns.</p>
    <a href="https://pubmed.ncbi.nlm.nih.gov/38577854/" class="btn btn-primary" target="_blank">View More</a>
  </div>

  <div class="publication-card">
    <h5 class="card-title">Evaluation of Inactivated Antigens for Vector-Borne Diseases</h5>
    <p class="card-text">Assessment of antigens improving molecular diagnostics in infections.</p>
    <a href="https://doi.org/10.4103/jvbd.jvbd_79_25" class="btn btn-primary" target="_blank">View More</a>
  </div>

  <div class="publication-card">
    <h5 class="card-title">Molecular Detection of Drug Resistance in M. leprae</h5>
    <p class="card-text">Study detecting resistance mutations in M. leprae isolates.</p>
    <a href="https://doi.org/10.4103/ijmy.ijmy_35_25" class="btn btn-primary" target="_blank">View More</a>
  </div>

  <div class="publication-card">
    <h5 class="card-title">Genetic Variability and Genomics of M. leprae</h5>
    <p class="card-text">Review highlighting global genomic diversity in M. leprae.</p>
    <a href="#" class="btn btn-primary" target="_blank">View More</a>
  </div>

  <div class="publication-card">
    <h5 class="card-title">Vector Incrimination Studies on Lymphatic Filariasis</h5>
    <p class="card-text">Investigation on filariasis vectors in rural Madhya Pradesh.</p>
    <a href="https://doi.org/10.1093/trstmh/traf045" class="btn btn-primary" target="_blank">View More</a>
  </div>

  <div class="publication-card">
    <h5 class="card-title">Scrub Typhus Neurological Manifestations in Central India</h5>
    <p class="card-text">Report on emerging scrub typhus cases with neurological symptoms.</p>
    <a href="https://doi.org/10.1016/j.cegh.2025.102000" class="btn btn-primary" target="_blank">View More</a>
  </div>

  <div class="publication-card">
    <h5 class="card-title">Malaria and Malnutrition in Tribal India</h5>
    <p class="card-text">Study linking malnutrition with malaria among tribal children.</p>
    <a href="https://doi.org/10.3389/fgstr.2025.1526806" class="btn btn-primary" target="_blank">View More</a>
  </div>
<!--<div class="publication-highlight-box">
        <div class="publication-marquee">
          <div class="publication-container" id="publicationMarquee">
            <!-- Publication 1 -->
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Genetic Counseling for  Health Workers</h5>
                <p class="card-text">Enhancing rare disease care through trained community health workers.</p>
                <a href=https://pubmed.ncbi.nlm.nih.gov/38200260/ class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div><!--
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Drug Treatment for Type 2 Diabetes: Benefits & Risks</h5>
                <p class="card-text">Evaluating the effects of drug treatment for type 2 diabetes in tribal settings.</p>
                <a href="https://pubmed.ncbi.nlm.nih.gov/37996196/" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Genetic Diversity of M. leprae: A Genomic View</h5>
                <p class="card-text">Genome-wide exploration of *Mycobacterium leprae* diversity.</p>
                <a href="https://pubmed.ncbi.nlm.nih.gov/38577854/" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Hypertension and Cardiovascular Health</h5>
                <p class="card-text">Hypertension's significant impact on cardiovascular outcomes globally.</p>
                <a href="https://www.nature.com/articles/s41371-022-00742-5" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div><div class="publication-card">
         <div class="card-body">
        <h5 class="card-title">Health Profile of Gare Palma Mining Area</h5>
        <p class="card-text">Health study of residents in the Gare Palma mining area, Chhattisgarh.</p>
        <a href="https://www.frontiersin.org/articles/10.3389/fpubh.2023.1010025/full" class="btn btn-primary" target="_blank">View More</a>
          </div>
        </div>

     <div class="publication-card">
      <div class="card-body">
        <h5 class="card-title">Perinatal Risk in India’s Scheduled Tribe</h5>
        <p class="card-text">Analysis of perinatal risks among India's scheduled tribes in The Lancet.</p>
        <a href="https://www.thelancet.com/journals/lancet/article/PIIS0140-6736(24)01679-9/fulltext" class="btn btn-primary" target="_blank">View More</a>
        </div>
      </div><div class="publication-card">
  <div class="card-body">
    <h5 class="card-title">Challenges in Identifying Metabolic Syndrome</h5>
    <p class="card-text">Exploring the underreported metabolic syndrome issue in Indian tribes.</p>
    <a href="https://www.frontiersin.org/journals/clinical-diabetes-and-healthcare/articles/10.3389/fcdhc.2023.1194471/full" class="btn btn-primary" target="_blank">View More</a>
  </div>
</div>


            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Metabolic Diseases in India: Time to Act</h5>
                <p class="card-text">Time to act on metabolic non-communicable diseases in India.</p>
                <a href="https://pubmed.ncbi.nlm.nih.gov/37996196/" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
    

           
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Mental Health Issues in Sickle Cell</h5>
                <p class="card-text">Addressing mental health challenges in sickle cell disease patients.</p>
                <a href="https://www.tandfonline.com/doi/full/10.1080/03630269.2024.2356607" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
          
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Advances in Malaria Research</h5>
                <p class="card-text">Insights into new strategies for malaria prevention and treatment.</p>
                <a href="https://link.springer.com/article/10.1007/s13337-022-00789-5" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Exploring Pediatric Tuberculosis</h5>
                <p class="card-text">A comprehensive review of pediatric tuberculosis in urban regions.</p>
                <a href="https://www.sciencedirect.com/science/article/pii/S258900422400885X?via%3Dihub" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
            
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Hematology and Immune Disorders</h5>
                <p class="card-text">Latest research on hematological diseases and immune responses.</p>
                <a href="https://onlinelibrary.wiley.com/doi/10.1111/bjh.19829" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>

          
            
            <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Neonatal mortality in Indian tribal communities.</h5>
                <p class="card-text">Insights into neonatal mortality in tribal communities in India.</p>
                <a href="https://doi.org/10.1242/dev.201581" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div>
             <div class="publication-card">
              <div class="card-body">
                <h5 class="card-title">Hematology and Immune Disorders</h5>
                <p class="card-text">Latest research on hematological diseases and immune responses.</p>
                <a href="https://onlinelibrary.wiley.com/doi/10.1111/bjh.19829" class="btn btn-primary" target="_blank">View More</a>
              </div>
            </div><div class="publication-card">
    <div class="card-body">
        <h5 class="card-title">Dengue Control Through Therapeutics</h5>
        <p class="card-text">
            Dengue control through therapeutics beyond vaccination and vector strategies.
        </p>
         <a href="https://pubmed.ncbi.nlm.nih.gov/38244559/" class="btn btn-primary" target="_blank">View More</a>
    </div>-->
</div>

</div>


           
</div>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <script>
    // Pause animation when hovering over a publication card
    document.querySelectorAll('.publication-card').forEach(card => {
      card.addEventListener('mouseenter', function () {
        document.getElementById('publicationMarquee').classList.add('paused-animation');
      });

      card.addEventListener('mouseleave', function () {
        document.getElementById('publicationMarquee').classList.remove('paused-animation');
      });
    });
  </script>
</body>

</html>

	<!-- Main Start -->
	<div class="main-section"> 
		<div class="page-section">
          <div class="container">
            <div class="row">
              
              <div class="section-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<div class="cs-section-title text-center">
                        	<h4><?php echo $lang['research_training']; ?></h4>
                            <hr>
                   </div>

                    </div>
                   </div>
                   </div>
                   </div>
                    </div>
                </div>

              </div>

            </div>

          </div>
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
                </ul>
            </div>
        </div>
        </div>
	</div>-->
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
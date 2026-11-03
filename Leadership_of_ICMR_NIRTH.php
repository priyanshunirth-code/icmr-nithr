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
<title>Leadership of ICMR-NIHR, Jabalpur </title>
 
  <?php include("GlobalCss.php"); ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  
   <?php include("GlobalJs.php"); ?>
  
<style type="text/css">
            a{text-decoration:none}
h4{text-align:center;margin:30px 0;color:#444}
.main-timeline{position:relative}
.main-timeline:before{content:"";width:5px;height:100%;border-radius:20px;margin:0 auto;background:#242922;position:absolute;top:0;left:0;right:0}
.main-timeline .timeline{display:inline-block;margin-bottom:50px;position:relative}
.main-timeline .timeline:before{content:"";width:20px;height:20px;border-radius:50%;border:4px solid #fff;background:#ec496e;position:absolute;top:50%;left:50%;z-index:1;transform:translate(-50%,-50%)}
.main-timeline .timeline-icon{display:inline-block;width:130px;height:130px;border-radius:50%;border:3px solid #ec496e;padding:13px;text-align:center;position:absolute;top:50%;left:30%;transform:translateY(-50%)}
.main-timeline .timeline-icon i{display:block;border-radius:50%;background:#ec496e;font-size:64px;color:#fff;line-height:100px;z-index:1;position:relative}
.main-timeline .timeline-icon:after,.main-timeline .timeline-icon:before{content:"";width:100px;height:4px;background:#ec496e;position:absolute;top:50%;right:-100px;transform:translateY(-50%)}
.main-timeline .timeline-icon:after{width:70px;height:50px;background:#fff;top:89px;right:-30px}
.main-timeline .timeline-content{width:50%;padding:0 50px;margin:52px 0 0;float:right;position:relative}
.main-timeline .timeline-content:before{content:"";width:70%;height:100%;border:3px solid #ec496e;border-top:none;border-right:none;position:absolute;bottom:-13px;left:35px}
.main-timeline .timeline-content:after{content:"";width:37px;height:3px;background:#ec496e;position:absolute;top:13px;left:0}
.main-timeline .title{font-size:20px;font-weight:600;color:#ec496e;text-transform:uppercase;margin:0 0 5px}
.main-timeline .description{display:inline-block;font-size:16px;color:#404040;line-height:20px;letter-spacing:1px;margin:0}
.main-timeline .timeline:nth-child(even) .timeline-icon{left:auto;right:30%}
.main-timeline .timeline:nth-child(even) .timeline-icon:before{right:auto;left:-100px}
.main-timeline .timeline:nth-child(even) .timeline-icon:after{right:auto;left:-30px}
.main-timeline .timeline:nth-child(even) .timeline-content{float:left}
.main-timeline .timeline:nth-child(even) .timeline-content:before{left:auto;right:35px;transform:rotateY(180deg)}
.main-timeline .timeline:nth-child(even) .timeline-content:after{left:auto;right:0}
.main-timeline .timeline:nth-child(2n) .timeline-content:after,.main-timeline .timeline:nth-child(2n) .timeline-icon i,.main-timeline .timeline:nth-child(2n) .timeline-icon:before,.main-timeline .timeline:nth-child(2n):before{background:#f9850f}
.main-timeline .timeline:nth-child(2n) .timeline-icon{border-color:#f9850f}
.main-timeline .timeline:nth-child(2n) .title{color:#f9850f}
.main-timeline .timeline:nth-child(2n) .timeline-content:before{border-left-color:#f9850f;border-bottom-color:#f9850f}
.main-timeline .timeline:nth-child(3n) .timeline-content:after,.main-timeline .timeline:nth-child(3n) .timeline-icon i,.main-timeline .timeline:nth-child(3n) .timeline-icon:before,.main-timeline .timeline:nth-child(3n):before{background:#8fb800}
.main-timeline .timeline:nth-child(3n) .timeline-icon{border-color:#8fb800}
.main-timeline .timeline:nth-child(3n) .title{color:#8fb800}
.main-timeline .timeline:nth-child(3n) .timeline-content:before{border-left-color:#8fb800;border-bottom-color:#8fb800}
.main-timeline .timeline:nth-child(4n) .timeline-content:after,.main-timeline .timeline:nth-child(4n) .timeline-icon i,.main-timeline .timeline:nth-child(4n) .timeline-icon:before,.main-timeline .timeline:nth-child(4n):before{background:#2fcea5}
.main-timeline .timeline:nth-child(4n) .timeline-icon{border-color:#2fcea5}
.main-timeline .timeline:nth-child(4n) .title{color:#2fcea5}
.main-timeline .timeline:nth-child(4n) .timeline-content:before{border-left-color:#2fcea5;border-bottom-color:#2fcea5}
@media only screen and (max-width:1200px){.main-timeline .timeline-icon:before{width:50px;right:-50px}
.main-timeline .timeline:nth-child(even) .timeline-icon:before{right:auto;left:-50px}
.main-timeline .timeline-content{margin-top:75px}
}
@media only screen and (max-width:990px){.main-timeline .timeline{margin:0 0 10px}
.main-timeline .timeline-icon{left:25%}
.main-timeline .timeline:nth-child(even) .timeline-icon{right:25%}
.main-timeline .timeline-content{margin-top:115px}
}
@media only screen and (max-width:767px){.main-timeline{padding-top:50px}
.main-timeline:before{left:80px;right:0;margin:0}
.main-timeline .timeline{margin-bottom:70px}
.main-timeline .timeline:before{top:0;left:83px;right:0;margin:0}
.main-timeline .timeline-icon{width:60px;height:60px;line-height:40px;padding:5px;top:0;left:0}
.main-timeline .timeline:nth-child(even) .timeline-icon{left:0;right:auto}
.main-timeline .timeline-icon:before,.main-timeline .timeline:nth-child(even) .timeline-icon:before{width:25px;left:auto;right:-25px}
.main-timeline .timeline-icon:after,.main-timeline .timeline:nth-child(even) .timeline-icon:after{width:25px;height:30px;top:44px;left:auto;right:-5px}
.main-timeline .timeline-icon i{font-size:30px;line-height:45px}
.main-timeline .timeline-content,.main-timeline .timeline:nth-child(even) .timeline-content{width:100%;margin-top:-15px;padding-left:130px;padding-right:5px}
.main-timeline .timeline:nth-child(even) .timeline-content{float:right}
.main-timeline .timeline-content:before,.main-timeline .timeline:nth-child(even) .timeline-content:before{width:50%;left:120px}
.main-timeline .timeline:nth-child(even) .timeline-content:before{right:auto;transform:rotateY(0)}
.main-timeline .timeline-content:after,.main-timeline .timeline:nth-child(even) .timeline-content:after{left:85px}
}
@media only screen and (max-width:479px){.main-timeline .timeline-content,.main-timeline .timeline:nth-child(2n) .timeline-content{padding-left:110px}
.main-timeline .timeline-content:before,.main-timeline .timeline:nth-child(2n) .timeline-content:before{left:99px}
.main-timeline .timeline-content:after,.main-timeline .timeline:nth-child(2n) .timeline-content:after{left:65px}
}



/******************* Timeline Demo - 9 *****************/
.main-timeline9{position:relative}
.main-timeline9:after,.main-timeline9:before{content:"";display:block;width:100%;clear:both}
.main-timeline9:before{content:"";width:3px;height:100%;background:#302124;position:absolute;top:0;left:50%}
.main-timeline9 .timeline{width:50%;float:left;position:relative;z-index:1}
.main-timeline9 .timeline:after,.main-timeline9 .timeline:before{content:"";display:block;width:100%;clear:both}
.main-timeline9 .timeline:first-child:before,.main-timeline9 .timeline:last-child:before{content:"";width:25px;height:25px;border-radius:50%;background:#fff;border:4px solid #3488bf;position:absolute;top:0;right:-14px;z-index:1}
.main-timeline9 .timeline:last-child:before{top:auto;bottom:0}
.main-timeline9 .timeline:last-child:nth-child(even):before{right:auto;left:-12px;bottom:-2px}
.main-timeline9 .timeline-content{text-align:center;margin-top:8px;position:relative;transition:all .3s ease 0s}
.main-timeline9 .timeline-content:before{content:"";width:100%;height:5px;background:#3488bf;position:absolute;top:88px;left:0;z-index:-1}
.main-timeline9 .circle{width:180px;height:180px;border-radius:50%;background:#fff;border:8px solid #3488bf;float:left;margin-right:25px;position:relative}
.main-timeline9 .circle span:after,.main-timeline9 .circle span:before,.main-timeline9 .circle:before{content:"";margin:auto;position:absolute;right:-33px;bottom:0;z-index:-1}

.main-timeline9 .circle span{display:block;width:100%;height:100%;border-radius:50%;line-height:160px;border:3px solid #adabab;font-size:80px;color:#454344}
.main-timeline9 .circle span:after,.main-timeline9 .circle span:before{width:28px;height:50px;background:#fff;border-radius:0 0 0 21px;top:-54px}
.main-timeline9 .circle span:after{border-radius:21px 0 0;top:0;bottom:-56px}
.main-timeline9 .content{display:table;padding-right:40px;position:relative}
.main-timeline9 .year{display:block;padding:10px;margin:10px 0 50px;background:#3488bf;border-radius:7px;font-size:22px;color:#fff}
.main-timeline9 .title{font-size:25px;font-weight:700;color:#3488bf;margin-top:0}
.main-timeline9 .icon span:after,.main-timeline9 .icon span:before,.main-timeline9 .icon:before{content:"";height:25px;margin:auto;position:absolute;bottom:0;z-index:-1;left:-15px}
.main-timeline9 .description{font-size:14px;color:#333 !important;text-align:center}
.main-timeline9 .icon{width:25px;height:25px;border-radius:50%;background:#fff;border:4px solid #3488bf;position:absolute;top:78px;right:-14px}
.main-timeline9 .icon:before{width:15px;background:#3488bf;top:-1px}
.main-timeline9 .icon span:after,.main-timeline9 .icon span:before{width:21px;background:#fff;border-radius:0 0 21px;top:-30px}
.main-timeline9 .icon span:after{border-radius:0 21px 0 0;top:0;left:-15px;bottom:-30px}
.main-timeline9 .timeline:nth-child(2n) .circle,.main-timeline9 .timeline:nth-child(2n) .timeline-content{float:right}
.main-timeline9 .timeline:nth-child(2n) .circle{margin:0 0 0 25px}
.main-timeline9 .timeline:nth-child(2n) .circle:before{right:auto;left:-33px;box-shadow:-7px 0 9px -7px #444 inset}
.main-timeline9 .timeline:nth-child(2n) .circle span:after,.main-timeline9 .timeline:nth-child(2n) .circle span:before{right:auto;left:-33px;border-radius:0 0 21px}
.main-timeline9 .timeline:nth-child(2n) .circle span:after{border-radius:0 21px 0 0}
.main-timeline9 .timeline:nth-child(2n) .content{padding:0 0 0 40px;margin-left:2px}
.main-timeline9 .timeline:nth-child(2n) .icon{right:auto;left:-14px}
.main-timeline9 .timeline:nth-child(2n) .icon span:after,.main-timeline9 .timeline:nth-child(2n) .icon span:before,.main-timeline9 .timeline:nth-child(2n) .icon:before{left:auto;right:-15px}
.main-timeline9 .timeline:nth-child(2n) .icon span:before{border-radius:0 0 0 21px}
.main-timeline9 .timeline:nth-child(2n) .icon span:after{border-radius:21px 0 0}
.main-timeline9 .timeline:nth-child(2){margin-top:180px}
.main-timeline9 .timeline:nth-child(odd){margin:-175px 0 0}
.main-timeline9 .timeline:nth-child(even){margin-bottom:80px}
.main-timeline9 .timeline:first-child,.main-timeline9 .timeline:last-child:nth-child(even){margin:0}
@media only screen and (max-width:990px){.main-timeline9:before{left:100%}
.main-timeline9 .timeline{width:100%;float:none;margin-bottom:20px!important}
.main-timeline9 .timeline:first-child:before,.main-timeline9 .timeline:last-child:before{left:auto!important;right:-13px!important}
.main-timeline9 .timeline:nth-child(2n) .circle{float:left;margin:0 25px 0 0}
.main-timeline9 .timeline:nth-child(2n) .circle:before{right:-33px;left:auto;box-shadow:7px 0 9px -7px #444 inset}
.main-timeline9 .timeline:nth-child(2n) .circle span:after,.main-timeline9 .timeline:nth-child(2n) .circle span:before{right:-33px;left:auto;border-radius:0 0 0 21px}
.main-timeline9 .timeline:nth-child(2n) .circle span:after{border-radius:21px 0 0}
.main-timeline9 .timeline:nth-child(2n) .content{padding:0 40px 0 0;margin-left:0}
.main-timeline9 .timeline:nth-child(2n) .icon{right:-14px;left:auto}
.main-timeline9 .timeline:nth-child(2n) .icon span:after,.main-timeline9 .timeline:nth-child(2n) .icon span:before,.main-timeline9 .timeline:nth-child(2n) .icon:before{left:-15px;right:auto}
.main-timeline9 .timeline:nth-child(2n) .icon span:before{border-radius:0 0 21px}
.main-timeline9 .timeline:nth-child(2n) .icon span:after{border-radius:0 21px 0 0}
.main-timeline9 .timeline:nth-child(2),.main-timeline9 .timeline:nth-child(even),.main-timeline9 .timeline:nth-child(odd){margin:0}
}
@media only screen and (max-width:480px){.main-timeline9:before{left:0}
.main-timeline9 .timeline:first-child:before,.main-timeline9 .timeline:last-child:before{left:-12px!important;right:auto!important}
.main-timeline9 .circle,.main-timeline9 .timeline:nth-child(2n) .circle{width:130px;height:130px;float:none;margin:0 auto}
.main-timeline9 .timeline-content:before{width:99.5%;top:68px;left:.5%}
.main-timeline9 .circle span{line-height:115px;font-size:60px}
.main-timeline9 .circle span:after,.main-timeline9 .circle span:before,.main-timeline9 .circle:before,.main-timeline9 .icon{display:none}
.main-timeline9 .content,.main-timeline9 .timeline:nth-child(2n) .content{padding:0 10px}
.main-timeline9 .year{margin-bottom:15px}
.main-timeline9 .description{text-align:center}
}





        </style>
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
						<li><?php echo $lang['leadership_title'];?> </li>
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
                        	<h4><?php echo $lang['leadership_title'];?></h4>
                        	<h4>1984</h4>
                            <hr>
                        </div>

                    </div>
                    
            
                   
                            <div class="container">
           
            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline9">
                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/sd.png"/></div>
                                <div class="content">
                                    <span class="year">01 Apr 1984 - 14 May 1988</span>
                                    <h4 class="title"><?php echo $lang['s_d_verma']; ?><br/><span style='font-size:10px; margin-top:-12px;'><?php echo $lang['project_director'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/yn.png"/></div>
                                <div class="content">
                                    <span class="year">15 Jun 1988 - 30 Jun 1988</span>
                                    <h4 class="title"><?php echo $lang['y_n_mathur']; ?><br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['officer_in_charge'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/bn.png"/></div>
                                <div class="content">
                                    <span class="year">01 Jul 1988 - 16 Jul 1989</span>
                                    <h4 class="title"><?php echo $lang['b_n_saxena']; ?><br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['director_additional_charge']; ?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/rs.png"/></div>
                                <div class="content">
                                    <span class="year">17 Jul 1989 - 28 Feb 2002</span>
                                    <h4 class="title"><?php echo $lang['r_s_tiwary']; ?><br/><span style='font-size:10px; margin-top:-12px;'><?php echo $lang['director'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/neeru.png"/></div>
                                <div class="content">
                                    <span class="year">01 Mar 2002 - 27 Feb 2003</span>
                                    <h4 class="title"><?php echo $lang['neeru_singh']; ?><br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['officer_in_charge']; ?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/ap.png"/></div>
                                <div class="content">
                                    <span class="year">28 Feb 2003 - 24 Jul 2005</span>
                                    <h4 class="title"><?php echo $lang['a_p_das']; ?><br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['director'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/neeru.png"/></div>
                                <div class="content">
                                    <span class="year">25 Jul 2005 - 22 Feb 2006</span>
                                    <h4 class="title"><?php echo $lang['neeru_singh']; ?><br/><span style='font-size:10px; margin-top:-12px;'><?php echo $lang['officer_in_charge']; ?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>


                           <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/ma.png"/></div>
                                <div class="content">
                                     <span class="year">23 Feb 2006 - 04 May 2006</span>
                                    <h4 class="title"><?php echo $lang['m_a_ansari']; ?><br/><span style='font-size:10px; margin-top:-12px;'><?php echo $lang['director'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/neeru.png"/></div>
                                <div class="content">
                                    <span class="year">05 May 2006 - 19 Aug 2017</span>
                                    <h4 class="title"><?php echo $lang['neeru_singh']; ?><br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['oic_director']; ?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>

                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/dirc.png"/></div>
                                <div class="content">
                                    <span class="year">28 Aug 2017 - 14 March 2024</span>
                                    <h4 class="title"><?php echo $lang['aprup_das']; ?><br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['director'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="/assets/extra-images/director_r_r_tiwari4-modified.png"/></div>
                                <div class="content">
                                    <span class="year">15 March 2024 - 06 Oct 2025</span>
                                    <h4 class="title"><?php echo $lang['r_r_tiwari']; ?><br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['director_additional_charge'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="assets/extra-images/Babu_2024-modified.png"/></div>
                                <div class="content">
                                    <span class="year">06 October 2025 - 09 February 2026</span>
                                    <h4 class="title"><?php echo $lang['bontha_babu']; ?><br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['director_incharge'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="assets/extra-images/praveen_ sir-modified.png"/></div>
                                <div class="content">
                                    <span class="year">10 February 2026 - Present</span>
                                    <h4 class="title">Dr. Praveen Kumar Bharti<br/><span style='font-size:10px; margin-top:-12px;'> <?php echo $lang['director'];?></span></h4>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>

                         <!-- <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/ma.png"/><div>
                                <div class="content">
                                    <span class="year">23 Feb 2006 - 04 May 2006</span>
                                    <h4 class="title">Dr. M.A. Ansari</h4>
                                    <p class="description" style="color: #333;">
                                       Director
                                    </p>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>

                      <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/neeru.png"/></div>
                                <div class="content">
                                    <span class="year">05 May 2006 - 19 Aug 2017</span>
                                    <h4 class="title">Dr. Neeru Singh</h4>
                                    <p class="description" style="color: #333;">
                                     OIC/Director
                                    </p>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="timeline">
                            <div class="timeline-content">
                                <div class="circle"><img style="height:165px; width:165px;" src="dr/das.png"/></div>
                                <div class="content">
                                    <span class="year">28 Aug 2017 - Till to Date</span>
                                    <h4 class="title">Dr. Aparup Das</h4>
                                    <p class="description" style="color: #333;">
                                     Director
                                    </p>
                                    <div class="icon"><span></span></div>
                                </div>
                            </div>
                        </div>
                         
                        -->
                        
                        
                    </div>
                </div>
            </div>
        </div>

           
                    
                    <br><br>
                    
                    
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
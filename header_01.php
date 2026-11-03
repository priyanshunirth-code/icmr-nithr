<!-- Side Menu Start -->

    <!-- Side Menu End -->
<header id="header" class=""> 
		<div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <ul class="top-nav nav-left">
                            <li><a href="vacancies.php"><?php echo $lang['career_opportunity'];?></a></li>
                            <li><a href="tenders.php"><?php echo $lang['tenders'];?></a></li>
                            <li><a href="employees_corner.php"><?php echo $lang['employees_corner'];?></a></li>
                            
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 text-center">
                        <a href="https://indiainvestmentgrid.com" target="_blank"><img src="assets/images/iig-logo.png" height="40"/></a>
                        
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    	
                        
                        <ul class="top-nav nav-right">
                      <!--  	<li><a href="https://nirth.res.in/old/"><?php echo $lang['old_website']; ?></a></li>-->
                            <li><a href="rti.php"><?php echo $lang['rti']; ?></a></li>
                            <li><a href="contact.php"><?php echo $lang['contact_us']; ?></a></li> 
                            <li><a href="https://www.facebook.com/NIRTH.Jabalpur?ref=br_rs" target="_blank"><i class="icon-facebook2"></i></a></li>
                            <li><a href="https://twitter.com/NIRTH_Jabalpur" target="_blank"><i class="icon-twitter2"></i></a></li>
                            <li><a href="https://www.youtube.com/channel/UCB09DISRpmIJfisD3cQDo9g" target="_blank"><i class="icon-youtube3"></i></a></li>
                            <?php if($_SESSION['language']=='hi'){ ?>
                                <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?><?php  if(strpos($_SERVER['REQUEST_URI'],"?")){ echo "&"; } else { echo "?"; } ?>language=en">English Website</a></li>
                            <?php } else { ?>
                                <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?><?php  if(strpos($_SERVER['REQUEST_URI'],"?")){ echo "&"; } else { echo "?"; } ?>language=hi">हिंदी वेबसाइट</a></li>
                            <?php } ?>
                            
                        </ul>
                    </div>
                </div>
            </div>
		</div>
        <div class="main-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-6">
                        <div class="cs-logo cs-logo-dark">
                            <div class="cs-media">
                                <figure><a href="index.php"><img src="assets/images/icmr-new-logo.jpg" alt="" /></a></figure>
                            </div>
                        </div>
                        <div class="cs-logo cs-logo-light">
                            <div class="cs-media">
                                <figure><a href="index.php"><img src="assets/images/cs-logo-light.png" alt="" /></a></figure>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-6">
                        <div class="cs-main-nav pull-right">
                            <nav class="main-navigation">
                                <ul>
                                    
                                    
                                     <li class="menu-item-has-children"><a href="about.php"><?php echo $lang['about']; ?></a>
                                        <span><?php echo $lang['about_nirth']; ?></span>
                                        <ul>
                                            <li><a href="about.php"><?php echo $lang['profile']; ?></a></li>
                                            <li><a href="director.php"><?php echo $lang['directors_desk']; ?></a></li>
                                            <li><a href="Leadership_of_ICMR_NIRTH.php"><?php echo $lang['leadership_nirth']; ?></a></li>
                                            <li><a href="staff.php"><?php echo $lang['staff_list']?></a></li>
                                      
                                            
                                        </ul>
                                    </li>
                                    <li><a href="research.php"><?php echo $lang['research']?></a><span><?php echo $lang['latest_research']; ?></span></li>
                                    <li><a href="scientists.php"><?php echo $lang['scientist']; ?></a><span><?php echo $lang['profile']; ?></span></li>
                                    <li><a href="publications.php"><?php echo $lang['publication']; ?></a><span><?php echo $lang['institutional_publications']; ?></span></li>
                                    
                                    
                                     <li class="menu-item-has-children"><a href="press.php"><?php echo $lang['media']; ?></a>
                                        <span><?php echo $lang['nirth_news']; ?></span>
                                        <ul>
                                            <li><a href="press.php"><?php echo $lang['press_release']; ?></a></li>
                                            <li><a href="photos.php"><?php echo $lang['photo_gallery']; ?></a></li>
                                            <li><a href="video.php"><?php echo $lang['video_gallery']; ?></a></li>
                                            <li><a href="news.php"><?php echo $lang['nirth_news']; ?></a></li>
                                        </ul>
                                    </li>
                                    
                                    
                                   
                                </ul>
                            </nav>
                           
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</header>
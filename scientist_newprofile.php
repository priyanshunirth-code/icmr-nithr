<?php
session_start();
include("language.php");
?>
<?php
include("config.php");
// FIX 1.2: Use prepared statement to prevent SQL Injection
$sid = $_REQUEST['sid'] ?? '';
// Validate input: MD5 hash is 32 hex characters
if (!preg_match('/^[a-f0-9]{32}$/i', $sid)) {
    $row = [];
} else {
    $stmt = $conn->prepare("SELECT * FROM scientists_new WHERE md5(sc_id) = ?");
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
    <title><?php echo $row['sc_name']; ?>'s Profile - ICMR NITHR</title>
    <?php include("GlobalCss.php"); ?>


    <?php include("GlobalJs.php"); ?>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">
        <!-- Side Menu Start -->

        <!-- Side Menu End -->
        <!-- Header Start -->
        <?php include("header.php"); ?>
        <!-- Header End -->
        <!-- Sub Header Start -->

        <!-- Sub Header End -->
        <!-- Breadcrumb Start -->
        <div class="page-section" style="border-bottom:1px solid #f4f4f4; margin-bottom:-40px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <ul class="cs-breadcrumb">
                            <li><a href="index.php"><?php echo $lang['home']; ?></a></li>
                            <li><a href="scientists.php"><?php echo $lang['scientist']; ?></a></li>

                            <li><?php echo $row['sc_name']; ?> <?php echo $lang['s_profile']; ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <!-- Main Start -->
        <div class="main-section">
            <div class="page-section" style="padding-top: 60px; padding-bottom: 60px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="scientist-profile-card" style="display: flex; flex-wrap: wrap; background: #fff; padding: 0; margin-bottom: 30px;">
                                <!-- Left side: Photo -->
                                <div class="profile-photo" style="flex: 0 0 250px; margin-right: 30px; margin-bottom: 20px;">
                                    <div style="border: 1px solid #f2c07c; padding: 5px; width: 100%;">
                                        <?php if(!empty($row['sc_photo'])) { ?>
                                            <img src="assets/images/scientists/<?php echo $row['sc_photo']; ?>" alt="<?php echo $row['sc_name']; ?>" style="width: 100%; height: auto; display: block;" />
                                        <?php } else { ?>
                                            <img src="assets/images/scientists/default.jpg" alt="<?php echo $row['sc_name']; ?>" style="width: 100%; height: auto; display: block;" />
                                        <?php } ?>
                                    </div>
                                </div>
                                
                                <!-- Right side: Details -->
                                <div class="profile-details" style="flex: 1; min-width: 300px;">
                                    <h3 style="color: #003399; text-transform: uppercase; margin-top: 0; margin-bottom: 5px; font-weight: 700; font-size: 20px;">
                                        <?php echo $row['sc_name']; ?>
                                    </h3>
                                    <p style="text-transform: uppercase; color: #555; margin-bottom: 15px; font-size: 15px;">
                                        <?php echo $row['sc_designation']; ?>
                                    </p>
                                    
                                    <p style="margin-bottom: 10px; font-size: 14px; color: #333;">
                                        Educational Qualifications: <strong><?php echo $row['sc_education']; ?></strong> 
                                        <?php if(!empty($row['division'])) { ?>
                                        <span style="margin: 0 5px; color: #999;">|</span> Department: <strong><?php echo $row['division']; ?></strong>
                                        <?php } ?>
                                    </p>
                                    
                                    <?php if(!empty($row['sc_workexp'])) { ?>
                                    <p style="margin-bottom: 15px; font-size: 14px; color: #333;">
                                        Work Experience: <?php echo $row['sc_workexp']; ?>
                                    </p>
                                    <?php } ?>
                                    
                                    <p style="margin-bottom: 20px; display: flex; align-items: center; flex-wrap: wrap; gap: 15px; color: #555; font-size: 14px;">
                                        <?php if(!empty($row['sc_email'])) { ?>
                                        <span style="display: flex; align-items: center;">
                                            <i class="icon-uniF113" style="color: #999; margin-right: 8px; font-size: 16px;"></i>
                                            <a href="mailto:<?php echo $row['sc_email']; ?>" style="color: #003399; font-weight: bold;"><?php echo $row['sc_email']; ?></a>
                                        </span>
                                        <?php } ?>
                                        
                                        <?php if(!empty($row['sc_email']) && !empty($row['sc_phone'])) { ?>
                                        <span style="color: #ccc;">|</span>
                                        <?php } ?>
                                        
                                        <?php if(!empty($row['sc_phone'])) { ?>
                                        <span style="display: flex; align-items: center;">
                                            <i class="icon-uniF122" style="color: #999; margin-right: 8px; font-size: 16px;"></i> 
                                            <span style="color: #666;"><?php echo $row['sc_phone']; ?></span>
                                        </span>
                                        <?php } ?>
                                    </p>
                                    
                                    <?php if(!empty($row['sc_bio'])) { ?>
                                    <h5 style="text-transform: uppercase; font-weight: bold; margin-bottom: 10px; font-size: 15px; color: #003399;">BIOS:</h5>
                                    <div style="color: #555; line-height: 1.7; margin-bottom: 20px; font-size: 14px; text-align: justify;">
                                        <?php echo nl2br($row['sc_bio']); ?>
                                    </div>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['sc_keywords'])) { ?>
                                    <p style="margin-bottom: 25px; font-size: 14px; color: #003399; font-weight: bold;">
                                        Research Interests: <?php echo $row['sc_keywords']; ?>
                                    </p>
                                    <?php } ?>
                                    
                                    <?php if(!empty($row['sc_cv'])) { ?>
                                    <a href="<?php echo $row['sc_cv']; ?>" target="_blank" class="view-details-btn" style="display: inline-block; padding: 8px 25px; border: 1px solid #0056b3; color: #0056b3; text-decoration: none; font-weight: normal; border-radius: 2px; text-transform: uppercase; font-size: 14px; transition: all 0.3s; background: transparent;">VIEW DETAILS</a>
                                    <?php } else { ?>
                                    <a href="#" class="view-details-btn" style="display: inline-block; padding: 8px 25px; border: 1px solid #0056b3; color: #0056b3; text-decoration: none; font-weight: normal; border-radius: 2px; text-transform: uppercase; font-size: 14px; transition: all 0.3s; background: transparent;">VIEW DETAILS</a>
                                    <?php } ?>
                                    
                                    <style>
                                        .view-details-btn:hover {
                                            background-color: #0056b3 !important;
                                            color: #fff !important;
                                        }
                                        @media (max-width: 768px) {
                                            .scientist-profile-card {
                                                flex-direction: column;
                                            }
                                            .profile-photo {
                                                margin-right: 0;
                                                width: 100%;
                                                max-width: 300px;
                                            }
                                        }
                                    </style>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main End -->
        <!-- Footer Start -->
        <?php include("footer.php"); ?>
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
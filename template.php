<?php
session_start();
include("language.php");
include("config.php");
// SECURITY FIX 1.2: Prepared statement to prevent SQL Injection
$sid = $_REQUEST['sid'] ?? '';
$sid = trim($sid);
if (!preg_match('/^[a-f0-9]{32}$/i', $sid)) {
    $row = [];
} else {
    $stmt = $conn->prepare("SELECT * FROM scientists WHERE md5(sc_id) = ?");
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
    <title><?php echo $row['sc_name']; ?>'s Profile - ICMR NIRH</title>
    <?php include("GlobalCss.php"); ?>
    <style>
        .profile-main-card { background: #fff; padding: 30px; border-radius: 15px; box-shadow: 0 4px 20px rgba(0,0,0,0.08); margin: 30px 0; }
        .img-container { width: 100%; max-width: 250px; }
        .img-container img { width: 100%; height: auto; border-radius: 10px; }
        .data-container { padding-left: 20px; }
        .cv-btn { background: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px; display: inline-block; text-decoration: none; font-weight: bold; }
        .cv-btn:hover { background: #0056b3; color: #fff; }
    </style>
    <?php include("GlobalJs.php"); ?>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">
        <?php include("header.php"); ?>

        <div class="main-section" style="padding: 50px 0;">
            <div class="container">
                <div class="profile-main-card">
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="img-container">
                                <figure><img src="assets/images/scientists/<?php echo $row['sc_photo']; ?>" alt="Profile Photo"></figure>
                            </div>
                        </div>
                        <div class="col-md-8 col-sm-12 data-container">
                            <h2 class="fw-bold"><?php echo ($_SESSION['language'] == 'hi' && $row['sc_name_hindi'] != '') ? $row['sc_name_hindi'] : $row['sc_name']; ?></h2>
                            <h5 class="text-primary"><?php echo ($_SESSION['language'] == 'hi' && $row['sc_designation_hindi'] != '') ? $row['sc_designation_hindi'] : $row['sc_designation']; ?></h5>
                            <p><strong>Qualification:</strong> <?php echo ($_SESSION['language'] == 'hi' && $row['sc_education_hindi'] != '') ? $row['sc_education_hindi'] : $row['sc_education']; ?></p>
                            <p><strong>Email:</strong> <a href="mailto:<?php echo $row['sc_email']; ?>"><?php echo $row['sc_email']; ?></a></p>
                            <hr>
                            <p><?php echo ($_SESSION['language'] == 'hi' && $row['sc_profile_hindi'] != '') ? $row['sc_profile_hindi'] : $row['sc_profile']; ?></p>
                            
                            <a href="assets/cv/<?php echo $row['sc_cv_file']; ?>" class="cv-btn" target="_blank">Download CV</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>
    </div>
</body>
</html>
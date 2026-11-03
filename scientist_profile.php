<?php
session_start();
include("language.php");
?>
<?php
include("config.php");
// SECURITY FIX 1.2: Prepared statement to prevent SQL Injection
$sid = $_REQUEST['sid'] ?? '';
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

                            <li><?php if ($_SESSION['language'] == 'hi' && $row['sc_name_hindi'] != '') {
                                    echo $row['sc_name_hindi'];
                                } else {
                                    echo $row['sc_name'];
                                } ?><?php echo $lang['s_profile']; ?></li>
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
                                            <figure> <img src="assets/images/scientists/<?php echo $row['sc_photo']; ?>" alt="" /> </figure>
                                        </div>
                                    </div>

                                </div>
                                <div class="cs-usser-account-list">

                                    <ul role="tablist" id="myTab">
                                        <li role="presentation">
                                            <a data-toggle="tab" role="tab" aria-controls="profile" href="#profile" aria-expanded="true" aria-selected="true" class="active"><i class="icon-user3 cs-color"></i><?php echo $lang['scientific_profile']; ?></a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="research" href="#research" aria-expanded="false"><i class="icon-file-text2 cs-color"></i><?php echo $lang['research_interests']; ?></a>
                                        </li>
                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="staff" href="#staff" aria-expanded="false"><i class="icon-users cs-color"></i><?php echo $lang['scientific_staff']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="past" href="#past" aria-expanded="false"><i class="icon-profile cs-color"></i><?php echo $lang['past_research_students']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="ongoing" href="#ongoing" aria-expanded="false"><i class="icon-lab cs-color"></i><?php echo $lang['ongoing_research_projects']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="currentcollab" href="#currentcollab" aria-expanded="false"><i class="icon-user-plus cs-color"></i><?php echo $lang['current_research_collaborators']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="pastcollab" href="#pastcollab" aria-expanded="false"><i class="icon-user-check cs-color"></i><?php echo $lang['past_research_collaborators']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="news" href="#news" aria-expanded="false"><i class="icon-newspaper cs-color"></i><?php echo $lang['research_in_news']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="awards" href="#awards" aria-expanded="false"><i class="icon-trophy cs-color"></i><?php echo $lang['award_recognition_honours']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="workshop" href="#workshop" aria-expanded="false"><i class="icon-user-tie cs-color"></i><?php echo $lang['workshop_conference_organized']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="academic" href="#academic" aria-expanded="false"><i class="icon-books cs-color"></i><?php echo $lang['academic_contributions']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="researchgrants" href="#researchgrants" aria-expanded="false"><i class="icon-star-full cs-color"></i><?php echo $lang['research_grants']; ?></a>
                                        </li>

                                        <li role="presentation" class="">
                                            <a data-toggle="tab" role="tab" aria-controls="publications" href="#publications" aria-expanded="false"><i class="icon-book cs-color"></i><?php echo $lang['publications']; ?></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="page-content col-lg-7 col-md-7 col-sm-12 col-xs-12">
                            <div class="cs-user-content cs-instructor">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-section-title">
                                            <h2><?php if ($_SESSION['language'] == 'hi' && $row['sc_name_hindi'] != '') {
                                                    echo $row['sc_name_hindi'];
                                                } else {
                                                    echo $row['sc_name'];
                                                } ?> <small><?php if ($_SESSION['language'] == 'hi' && $row['sc_education_hindi'] != '') {
                                                                echo $row['sc_education_hindi'];
                                                            } else {
                                                                echo $row['sc_education'];
                                                            } ?></small></h2>
                                        </div>
                                        <div class="cs-text">


                                            <span>
                                                <h5><?php if ($_SESSION['language'] == 'hi' && $row['sc_designation_hindi'] != '') {
                                                        echo $row['sc_designation_hindi'];
                                                    } else {
                                                        echo $row['sc_designation'];
                                                    } ?></h5>
                                            </span>
                                            <p><?php if ($_SESSION['language'] == 'hi' && $row['sc_headline_hindi'] != '') {
                                                    echo $row['sc_headline_hindi'];
                                                } else {
                                                    echo $row['sc_headline'];
                                                } ?></p>

                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="cs-user-detail">
                                            <div class="cs-author-info-list">
                                                <ul>
                                                    <li>
                                                        <i class="icon-uniF122 cs-color"></i>
                                                        <span>
                                                            <?php echo $lang['phone']; ?>
                                                            <em><?php echo $row['sc_phone']; ?></em>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <i class="icon-uniF113 cs-color"></i>
                                                        <span>
                                                            <?php echo $lang['email'] ?>
                                                            <a href="mailto:<?php echo $row['sc_email']; ?>"><?php echo $row['sc_email']; ?></a>
                                                        </span>
                                                    </li>

                                                </ul>

                                            </div>
                                        </div>
                                        <hr>
                                        <div class="woocommerce-tabs wc-tabs-wrapper">

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div id="profile" class="tab-pane fade in active show" role="tabpanel">
                                                    <h5><?php echo $lang['profile']; ?></h5>
                                                    <p class="text-justify"><?php if ($_SESSION['language'] == 'hi' && $row['sc_profile_hindi'] != '') {
                                                                                echo $row['sc_profile_hindi'];
                                                                            } else {
                                                                                echo $row['sc_profile'];
                                                                            } ?></p>
                                                </div>

                                                <div id="research" class="tab-pane fade in" role="tabpanel">
                                                    <h5><?php echo $lang['research_interests']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_research_interests']; ?></p>
                                                </div>

                                                <div id="staff" class="tab-pane fade in" role="tabpanel">
                                                    <h5><?php echo $lang['scientific_staff']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_scientific_staff']; ?></p>
                                                </div>

                                                <div id="past" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['past_research_students']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_past_research']; ?></p>
                                                </div>

                                                <div id="ongoing" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['ongoing_research_projects']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_ongoing_research']; ?></p>
                                                </div>



                                                <div id="currentcollab" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['current_research_collaborators']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_research_collaborators']; ?></p>
                                                </div>

                                                <div id="pastcollab" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['past_research_collaborators']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_past_research_collaborators']; ?></p>
                                                </div>


                                                <div id="news" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['research_in_news']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_news']; ?></p>
                                                </div>


                                                <div id="awards" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['award_recognition_honours']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_award']; ?></p>
                                                </div>

                                                <div id="workshop" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['workshop_conference_organized']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_workshop']; ?></p>
                                                </div>

                                                <div id="academic" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['academic_contributions']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_academic']; ?></p>
                                                </div>

                                                <div id="researchgrants" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['research_grants']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_grants']; ?></p>
                                                </div>

                                                <div id="publications" class="tab-pane fade " role="tabpanel">
                                                    <h5><?php echo $lang['publications']; ?></h5>
                                                    <p class="text-justify"><?php echo $row['sc_publications']; ?></p>
                                                </div>




                                            </div>
                                        </div>

                                        <!-- Tab panes END-->

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
    <?php include("footer.php"); ?>
    <!-- Footer End -->
    </div>
    <script>
        const triggerTabList = document.querySelectorAll('#myTab a')
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl)

            triggerEl.addEventListener('click', event => {
                event.preventDefault()
                tabTrigger.show()
            })
        })
    </script>
    <script src="assets/scripts/responsive.menu.js"></script>
    <script src="assets/scripts/chosen.select.js"></script>
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script>
    <!-- Put all Functions in functions.js -->
    <script src="assets/scripts/functions.js"></script>
</body>

</html>
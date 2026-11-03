<?php
session_start();
include("language.php");
include("config.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Press Release | NIRH</title>
    
    <?php include("GlobalCss.php"); ?>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">

    <style>
        /* Modern Table & Page Styling */
        body { background-color: #f4f7f6; }
        
        .press-container { padding: 40px 0; }
        
        .cs-section-title h4 {
            font-size: 28px;
            font-weight: 700;
            color: #2c3e50;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .cs-section-title hr {
            width: 50px;
            height: 3px;
            background: #007bff;
            border: none;
            margin: 0 auto 30px;
        }

        /* The Custom Table */
        .news-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 20px; /* Space between rows */
        }

        .news-table tr {
            background: #ffffff;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }

        .news-table tr:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.1);
        }

        .news-table td {
            padding: 20px;
            vertical-align: middle;
            border: none !important;
        }

        .news-text-cell {
            border-left: 5px solid #007bff !important;
            border-radius: 8px 0 0 8px;
            font-size: 16px;
            color: #444;
            line-height: 1.6;
        }

        .news-gallery-cell {
            background: #fafafa;
            border-radius: 0 8px 8px 0;
            text-align: center;
        }

        /* Image Styling */
        .news-gallery-cell figure {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            margin: 0;
        }

        .news-gallery-cell img {
            border-radius: 5px;
            border: 2px solid #fff;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
            object-fit: cover;
        }

        .news-gallery-cell img:hover {
            transform: scale(1.05);
            border-color: #007bff;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .news-table td { display: block; width: 100% !important; text-align: left; }
            .news-text-cell { border-left: none !important; border-top: 5px solid #007bff !important; border-radius: 8px 8px 0 0; }
            .news-gallery-cell { border-radius: 0 0 8px 8px; }
        }
    </style>

    <?php include("GlobalJs.php"); ?>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">

        <?php include("header.php"); ?>

        <div style="border-bottom:1px solid #f4f4f4;" class="page-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="cs-breadcrumb">
                            <li><a href="index.php">Home</a></li>
                            <li>Press Release</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-section press-container">
            <div class="container">
                <div class="row">
                    <div class="section-content col-lg-12">

                        <div class="cs-section-title text-center">
                            <h4><?php echo $lang['news']; ?></h4>
                            <hr>
                        </div>

                        <table class="news-table">

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_22']; ?></td>
                                <td class="news-gallery-cell" style="width:450px;">
                                    <figure>
                                        <a href="assets/images/JP_NADDA2.jpeg" data-lightbox="JPNADDA"><img src="assets/images/JP_NADDA2.jpeg" width="160" height="120"></a>
                                        <a href="assets/images/JP_NADDA3.jpeg" data-lightbox="JPNADDA"><img src="assets/images/JP_NADDA3.jpeg" width="160" height="120"></a>
                                        <a href="assets/images/JP_NADDA4.jpeg" data-lightbox="JPNADDA"><img src="assets/images/JP_NADDA4.jpeg" width="160" height="120"></a>
                                        <a href="assets/images/JP_NADDA5.jpeg" data-lightbox="JPNADDA"><img src="assets/images/JP_NADDA5.jpeg" width="160" height="120"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_21']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/news021.jpeg" data-lightbox="news21"><img src="assets/images/news021.jpeg" width="200" height="150"></a>
                                        <a href="assets/images/news211.jpeg" data-lightbox="news21"><img src="assets/images/news211.jpeg" width="200" height="150"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_20']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/20.jpg" data-lightbox="news20"><img src="assets/images/20.jpg" width="150" height="180"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_19']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/img19.jpeg" data-lightbox="news19"><img src="assets/images/img19.jpeg" width="280" height="140"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_11']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/hitvada_181219.png" data-lightbox="news11"><img src="assets/images/hitvada_181219.png" width="140"></a>
                                        <a href="assets/images/navbharat_181219.png" data-lightbox="news11"><img src="assets/images/navbharat_181219.png" width="140"></a>
                                        <a href="assets/images/dainikbhaskar_181219.png" data-lightbox="news11"><img src="assets/images/dainikbhaskar_181219.png" width="140"></a>
                                        <a href="assets/images/patrika_181219.png" data-lightbox="news11"><img src="assets/images/patrika_181219.png" width="140"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_10']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/foundation_1.png" data-lightbox="news10"><img src="assets/images/foundation_1.png" width="150"></a>
                                        <a href="assets/images/foundation_2.png" data-lightbox="news10"><img src="assets/images/foundation_2.png" width="150"></a>
                                        <a href="assets/images/foundation_3.png" data-lightbox="news10"><img src="assets/images/foundation_3.png" width="150"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_1']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/news2.jpeg" data-lightbox="news1"><img src="assets/images/news2.jpeg" width="150"></a>
                                        <a href="assets/images/news1.jpeg" data-lightbox="news1"><img src="assets/images/news1.jpeg" width="150"></a>
                                        <a href="assets/images/news3.jpeg" data-lightbox="news1"><img src="assets/images/news3.jpeg" width="150"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_2']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/news.jpeg" data-lightbox="news2"><img src="assets/images/news.jpeg" width="200"></a></figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_3']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/Innovations.jpeg" data-lightbox="news3"><img src="assets/images/Innovations.jpeg" width="200"></a></figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_4']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/Capture.JPG" data-lightbox="news4"><img src="assets/images/Capture.JPG" width="250"></a></figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_5']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/News_clip.jpeg" data-lightbox="news5"><img src="assets/images/News_clip.jpeg" width="200"></a></figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_6']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/190520_1.png" data-lightbox="news6"><img src="assets/images/190520_1.png" width="200"></a></figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_7']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/190520_2.png" data-lightbox="news7"><img src="assets/images/190520_2.png" width="160"></a>
                                        <a href="assets/images/gwl_2.png" data-lightbox="news7"><img src="assets/images/gwl_2.png" width="160"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_8']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/director.png" data-lightbox="news8"><img src="assets/images/director.png" width="200"></a></figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_9']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/250320_news_2.png" data-lightbox="news9"><img src="assets/images/250320_news_2.png" width="200"></a></figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_12']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/news_clip_1.png" data-lightbox="news12"><img src="assets/images/news_clip_1.png" width="180"></a>
                                        <a href="assets/images/news_clip_2.png" data-lightbox="news12"><img src="assets/images/news_clip_2.png" width="180"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_13']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/tribal_day_19_1.png" data-lightbox="news13"><img src="assets/images/tribal_day_19_1.png" width="180"></a>
                                        <a href="assets/images/tribal_day_19_2.png" data-lightbox="news13"><img src="assets/images/tribal_day_19_2.png" width="180"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_14']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/24032019.png" data-lightbox="news14"><img src="assets/images/24032019.png" width="200"></a></figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_15']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/27022019_1.png" data-lightbox="news15"><img src="assets/images/27022019_1.png" width="180"></a>
                                        <a href="assets/images/27022019_2.png" data-lightbox="news15"><img src="assets/images/27022019_2.png" width="180"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_16']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/10052018_1.png" data-lightbox="news16"><img src="assets/images/10052018_1.png" width="180"></a>
                                        <a href="assets/images/10052018_2.png" data-lightbox="news16"><img src="assets/images/10052018_2.png" width="180"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_17']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure>
                                        <a href="assets/images/02032018_1.png" data-lightbox="news17"><img src="assets/images/02032018_1.png" width="180"></a>
                                        <a href="assets/images/02032018_2.png" data-lightbox="news17"><img src="assets/images/02032018_2.png" width="180"></a>
                                    </figure>
                                </td>
                            </tr>

                            <tr>
                                <td class="news-text-cell"><?php echo $lang['news_18']; ?></td>
                                <td class="news-gallery-cell">
                                    <figure><a href="assets/images/17082017.png" data-lightbox="news18"><img src="assets/images/17082017.png" width="200"></a></figure>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>

        <?php include("footer.php"); ?>
    </div>

    <script src="assets/scripts/responsive.menu.js"></script>
    <script src="assets/scripts/chosen.select.js"></script>
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script>
    <script src="assets/scripts/functions.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

</body>
</html>
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
    <title>Sitemap | ICMR-NITHR</title>
    <meta name="description" content="Browse the main pages and services of ICMR-NITHR, Jabalpur.">

    <?php include("GlobalCss.php"); ?>

    <?php include("GlobalJs.php"); ?>

    <style>
        :root {
            --sitemap-navy: #09203f;
            --sitemap-blue: #2583bd;
            --sitemap-ink: #263445;
            --sitemap-line: #dbe3eb;
            --sitemap-surface: #ffffff;
            --sitemap-background: #f4f7f6;
        }

        body {
            background: var(--sitemap-background);
            color: var(--sitemap-ink);
        }

        .sitemap-hero {
            padding: 48px 20px;
            margin-bottom: 36px;
            background: linear-gradient(135deg, #537895 0%, var(--sitemap-navy) 100%);
            color: #ffffff;
            text-align: center;
        }

        .sitemap-hero h1 {
            margin: 0;
            color: #ffffff;
            font-size: clamp(2rem, 4vw, 2.75rem);
            font-weight: 700;
        }

        .sitemap-hero p {
            margin: 10px 0 0;
            color: rgba(255, 255, 255, 0.88);
            font-size: 1rem;
        }

        .sitemap-content {
            padding: 0 0 48px;
        }

        .sitemap-home {
            display: inline-block;
            margin-bottom: 20px;
            color: var(--sitemap-blue);
            font-weight: 600;
            text-decoration: none;
        }

        .sitemap-home:hover,
        .sitemap-home:focus {
            color: var(--sitemap-navy);
            text-decoration: underline;
        }

        .sitemap-grid {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            align-items: stretch;
            gap: 20px;
        }

        .sitemap-card {
            height: 100%;
            padding: 22px;
            border: 1px solid var(--sitemap-line);
            border-radius: 8px;
            background: var(--sitemap-surface);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.05);
        }

        .sitemap-card h2 {
            margin: 0 0 14px;
            padding: 0 0 12px;
            border-bottom: 2px solid var(--sitemap-blue);
            color: var(--sitemap-navy);
            font-size: 1.2rem;
            font-weight: 700;
        }

        .sitemap-card ul {
            display: grid;
            gap: 10px;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .sitemap-card a {
            display: inline-flex;
            align-items: baseline;
            gap: 8px;
            color: var(--sitemap-ink);
            line-height: 1.5;
            text-decoration: none;
        }

        .sitemap-card a::before {
            color: var(--sitemap-blue);
            content: "\203A";
            font-size: 1.15em;
            font-weight: 700;
        }

        .sitemap-card a:hover,
        .sitemap-card a:focus {
            color: var(--sitemap-blue);
            text-decoration: underline;
        }

        @media (max-width: 991px) {
            .sitemap-grid {
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }
        }

        @media (max-width: 575px) {
            .sitemap-hero {
                padding: 36px 16px;
            }

            .sitemap-grid {
                grid-template-columns: 1fr;
                gap: 14px;
            }

            .sitemap-card {
                padding: 18px;
            }
        }
    </style>
</head>

<body class="wp-smartstudy">
    <div class="wrapper">
        <?php include("header.php"); ?>

        <div class="sitemap-hero">
            <h1>Website Sitemap</h1>
            <p>Quick links to ICMR-NITHR pages and services</p>
        </div>

        <main class="main-section sitemap-content">
            <div class="container">
                <a class="sitemap-home" href="/index.php">Home</a>

                <?php
                $siteMap = [
                    "Institute" => [
                        "About NITHR" => "/about.php",
                        "Director's Desk" => "/director.php",
                        "Leadership of ICMR-NITHR" => "/Leadership_of_ICMR_NIRTH.php",
                        "Staff List" => "/staff.php",
                    ],
                    "Research and Learning" => [
                        "Research" => "/research.php",
                        "Research Publications" => "/research_publications.php",
                        "Scientists" => "/scientists.php",
                        "Scientist Profiles" => "/scientist_profile.php",
                        "Publications and Resources" => "/publications.php",
                        "Student Corner" => "/student_corner.php",
                        "AcSIR PhD Program" => "/phd_program.php",
                        "Analytical Instrument Facility" => "/analytical_instrument_facility.php",
                    ],
                    "Notices and Services" => [
                        "Vacancies and Careers" => "/vacancies.php",
                        "Results" => "/result.php",
                        "Tenders" => "/tenders.php",
                        "Tenders Archive" => "/tenders_archive.php",
                        "Employee's Corner" => "/employees_corner.php",
                        "Employee Links" => "/emloyeelinks.php",
                        "Circulars" => "/circulars.php",
                        "Right to Information" => "/rti.php",
                    ],
                    "News and Media" => [
                        "News" => "/news.php",
                        "NITHR in the News" => "/press.php",
                        "Photo Gallery" => "/photos.php",
                        "Video Gallery" => "/video.php",
                        "Facilities Gallery" => "/facility-gallery.php",
                    ],
                    "Contact" => [
                        "Contact Us" => "/contact.php",
                    ],
                ];
                ?>

                <div class="sitemap-grid">
                    <?php foreach ($siteMap as $section => $links): ?>
                        <section
                            class="sitemap-card"
                            aria-label="<?php echo htmlspecialchars($section, ENT_QUOTES, "UTF-8"); ?>">
                            <h2><?php echo htmlspecialchars($section, ENT_QUOTES, "UTF-8"); ?></h2>
                            <ul>
                                <?php foreach ($links as $label => $href): ?>
                                    <li>
                                        <a href="<?php echo htmlspecialchars($href, ENT_QUOTES, "UTF-8"); ?>">
                                            <?php echo htmlspecialchars($label, ENT_QUOTES, "UTF-8"); ?>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </section>
                    <?php endforeach; ?>
                </div>
            </div>
        </main>
    </div>
</body>

</html>

<?php 
session_start();
include("language.php");
?>
<?php include("config.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Publications | Research & Training</title>
    
    <!-- External Libraries -->
    <?php include("GlobalCss.php"); ?>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <?php include("GlobalJs.php"); ?>

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #2a9d8f 0%, #264653 100%);
            --accent-color: #2a9d8f;
            --text-dark: #1a1a1a;
            --text-muted: #6c757d;
            --bg-light: #f8fbfa;
            --card-shadow: 0 10px 30px rgba(0,0,0,0.05);
            --card-shadow-hover: 0 20px 40px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Inter', sans-serif;
            background: url('assets/extra-images/background-img.avif') no-repeat center center fixed;
            background-size: cover;
            color: var(--text-dark);
            overflow-x: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(248, 251, 250, 0.9); /* Subtle overlay for readability */
            z-index: -1;
        }

        .articles-grid-section {
            padding: 80px 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title-main {
            font-family: 'Outfit', sans-serif;
            font-size: 52px;
            font-weight: 700;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 15px;
        }

        .section-divider {
            width: 80px;
            height: 4px;
            background: var(--primary-gradient);
            margin: 0 auto 30px;
            border-radius: 2px;
        }

        /* Search & Filter Bar */
        .search-container {
            max-width: 600px;
            margin: 0 auto 50px;
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 18px 25px 18px 55px;
            border-radius: 50px;
            border: 1px solid #e0e0e0;
            background: #fff;
            box-shadow: var(--card-shadow);
            font-size: 16px;
            transition: all 0.3s ease;
            outline: none;
        }

        .search-input:focus {
            border-color: var(--accent-color);
            box-shadow: 0 0 0 4px rgba(42, 157, 143, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 22px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent-color);
            font-size: 18px;
        }

        /* Grid Layout */
        .articles-grid-container {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 35px;
        }

        @media (max-width: 1200px) { .articles-grid-container { grid-template-columns: repeat(3, 1fr); } }
        @media (max-width: 991px) { .articles-grid-container { grid-template-columns: repeat(2, 1fr); } }
        @media (max-width: 575px) { .articles-grid-container { grid-template-columns: 1fr; } }

        /* Article Card Styles */
        .article-card {
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            height: 100%;
            position: relative;
        }

        .article-card::after {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            border-radius: 12px;
            box-shadow: var(--card-shadow-hover);
            opacity: 0;
            transition: opacity 0.4s ease;
            pointer-events: none;
        }

        .article-card:hover {
            transform: translateY(-8px);
        }

        .article-card:hover::after {
            opacity: 1;
        }


        .article-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }

        .article-category {
            font-size: 10px;
            font-weight: 700;
            color: var(--accent-color);
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: inline-block;
        }

        .article-date {
            font-size: 13px;
            color: var(--text-muted);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .article-title {
            font-family: 'Outfit', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--text-dark);
            line-height: 1.3;
            margin-bottom: 12px;
            transition: color 0.3s ease;
        }

        .article-card:hover .article-title {
            color: var(--accent-color);
        }

        .article-author {
            font-size: 14px;
            color: #555;
            margin-bottom: 15px;
            font-weight: 500;
        }

        .article-excerpt {
            font-size: 14px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 25px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-footer {
            margin-top: auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }

        .article-link {
            font-size: 14px;
            font-weight: 600;
            color: var(--accent-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: gap 0.3s ease;
        }

        .article-link i {
            font-size: 12px;
        }

        .article-link:hover {
            gap: 12px;
            color: #264653;
        }

        /* Back to Top */
        #backToTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background: var(--primary-gradient);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
        }

        #backToTop.show {
            opacity: 1;
            visibility: visible;
        }

        #backToTop:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 25px rgba(0,0,0,0.2);
        }

        /* No Results Message */
        .no-results {
            grid-column: 1 / -1;
            text-align: center;
            padding: 50px;
            font-size: 18px;
            color: var(--text-muted);
            display: none;
        }
    </style>
</head>

<body class="wp-smartstudy">
    <div class="wrapper"> 
        <!-- Header Start -->
        <?php include("header.php");?>   
        
        <!-- Sub Header -->  
        
        <div class="articles-grid-section">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="section-title-main">Research Publications</h2>
                    <div class="section-divider"></div>
                    <p class="text-muted">Exploring the frontiers of medical research and tribal healthcare breakthroughs.</p>
                </div>

                <!-- Search Bar -->
                <div class="search-container" data-aos="fade-up" data-aos-delay="100">
                    <input type="text" id="articleSearch" class="search-input" placeholder="Search by title, author or keywords...">
                </div>

                <!-- Articles Grid -->
                <div class="articles-grid-container" id="gridContainer">

                    <!-- Article 9 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Hematology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Musculoskeletal complications in sickle cell disease: Pathophysiology, diagnosis and management</h3>
                            <div class="article-author">Best Pract Res Clin Rheumatol</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.berh.2025.102033" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 10 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Antifeedant effect of emulsifiable concentrate formulation of Ageratum conyzoides (L.) (Asteraceae) extracts against Plutella xylostella (L.) (Lepidoptera: Plutellidae)</h3>
                            <div class="article-author">Research Journal of Chemistry and Environment</div>
                            <div class="article-footer">
                                <a href="#" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 11 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Hematology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Protocol for a Multi-centric Cohort Study on Neonatal Screening and Early Interventions for Sickle Cell Disease among high prevalence states of India</h3>
                            <div class="article-author">Diagnostics (Basel)</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3390/diagnostics15060730" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 12 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Evaluating the multi-period operating efficiency of logistics firms in East Asia</h3>
                            <div class="article-author">Asia Pacific Business Review</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1080/13602381.2025.2454951" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 13 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2017</div>
                            <h3 class="article-title">Plasmodium falciparum histidine-rich protein 2/3 gene deletions and repeat motifs in Chhattisgarh, India (2017-18)</h3>
                            <div class="article-author">Trans R Soc Trop Med Hyg</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1093/trstmh/traf029" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 14 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Hematology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Protocol for a Multicentric Cohort Study on Neonatal Screening and Early Interventions for Sickle Cell Disease Among High-Prevalence States of India</h3>
                            <div class="article-author">Diagnostics</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3390/diagnostics15060730" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 15 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Public Health</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2018</div>
                            <h3 class="article-title">Population-based surveillance for hypertension awareness, treatment, and control in nine districts—India Hypertension Control Initiative, 2018–19</h3>
                            <div class="article-author">Journal of Human Hypertension</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1038/s41371-025-01005-9" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 16 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Public Health</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">The growing risk of hypertension in India’s Scheduled tribes</h3>
                            <div class="article-author">Hypertension Research</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1038/s41440-025-02178-z" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 17 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Mental Health</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Children Under 5-year Mortality and the Risk of Maternal Mental Illness among India’s Scheduled tribe</h3>
                            <div class="article-author">Indian Journal of Psychiatry</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.4103/indianjpsychiatry.indianjpsychiatry_1136_2" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 18 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Genomics</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Genetic variability, genotyping and genomics of Mycobacterium leprae</h3>
                            <div class="article-author">FEMS Microbiol Rev</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1093/femsre/fuaf012" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 19 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Mental Health</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Food scarcity and decrease in income are associated with depression after COVID-19 pandemic in rural settings</h3>
                            <div class="article-author">Front Public Health</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3389/fpubh.2025.1526300" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 20 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Hematology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">MicroRNAs in sickle cell disease: A comprehensive review</h3>
                            <div class="article-author">Gene</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.gene.2025.149470" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 21 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Vector incrimination studies on Lymphatic filariasis in rural areas of endemic Datia District in Madhya Pradesh, India</h3>
                            <div class="article-author">Trans R Soc Trop Med Hyg</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1093/trstmh/traf045" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 22 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Malaria and malnutrition in tribal areas of India: implications for paediatric health</h3>
                            <div class="article-author">Front Gastroenterol</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3389/fgstr.2025.1526806" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 23 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Emergence of scrub typhus-associated neurological signs in central India: An unusual manifestation in febrile illness cases in Madhya Pradesh, India</h3>
                            <div class="article-author">Clinical Epidemiology and Global Health</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.cegh.2025.102000" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 24 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Hepatobiliary Manifestations in Thalassemia Patients: A Narrative Review</h3>
                            <div class="article-author">Hemoglobin</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1080/03630269.2025.2493946" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 25 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Secondary Metabolites from a New Antibiotic-Producing Endophytic Streptomyces Isolate Inhibited Pathogenic and Multidrug-Resistant Mycobacterium tuberculosis Strains</h3>
                            <div class="article-author">Tropical Medicine and Infectious Disease</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3390/tropicalmed10050117" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 26 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Reverse vaccinology-based design of multivalent multiepitope mRNA vaccines targeting key viral proteins of Herpes Simplex Virus type-2</h3>
                            <div class="article-author">Frontiers in Immunology</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3389/fimmu.2025.1586271" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 27 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Association of socio-demographic and dietary factors for metabolic syndrome: A comparative study among tribal and non-tribal population</h3>
                            <div class="article-author">Clinical Epidemiology and Global Health</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.cegh.2025.102087" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 28 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Genomics</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Molecular Detection of Gene Mutation Related to Drug Resistance in Mycobacterium leprae</h3>
                            <div class="article-author">Int J Mycobacteriol</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.4103/ijmy.ijmy_35_25" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 29 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Hematology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Socioeconomic health and impact of sickle cell disease and vaso-occlusive crises in India: results from B-VOCAL study</h3>
                            <div class="article-author">BMJ Glob Health</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1136/bmjgh-2024-017887" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 30 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Complications During Pregnancy among Indian Tribal Women: A Mini-Review</h3>
                            <div class="article-author">J M Med Stu</div>
                            <div class="article-footer">
                                <a href="#" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 31 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">miRNA in Diagnosis and Therapeutics of Tuberculosis: Importance in Latent and Brain Associated Pathologies</h3>
                            <div class="article-author">Curr Pharm Des</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.2174/0113816128362931250619113617" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 32 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Genomics</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Editorial: Advances in the molecular epidemiology and diagnostics of leprosy and other mycobacterial diseases</h3>
                            <div class="article-author">Frontiers in Tropical Diseases</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3389/fitd.2025.1622530" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 33 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Genomics</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Advancing Mycobacterium leprae transmission research: Insights from the R2STOP fund</h3>
                            <div class="article-author">PLoS Negl Trop Dis</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1371/journal.pntd.0013370" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 34 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Preliminary evaluation of inactivated antigens as diagnostic controls in molecular detection of vector-borne diseases in low-resource settings</h3>
                            <div class="article-author">J Vector Borne Dis</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.4103/jvbd.jvbd_79_25" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 35 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Hematology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Barriers, facilitators and recommendations for the implementation of Newborn Sickle Cell screening program in tribal communities: Findings from a qualitative multi-centric study in India</h3>
                            <div class="article-author">Lancet Regional Health Southeast Asia</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.lansea.2025.100664" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 36 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Host-Directed Therapeutic for the treatment of Mycobacterium tuberculosis</h3>
                            <div class="article-author">Microbiol Res</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.micres.2025.128253" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 37 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Can added strategy influence adequate healthcare accessibility among India’s Scheduled Tribes</h3>
                            <div class="article-author">IJQHC Communications</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1093/ijcoms/lyaf009" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 38 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Evaluation of GDH and HDP as novel serological biomarkers for Plasmodium falciparum malaria diagnosis across varying parasitemia and transmission settings in India</h3>
                            <div class="article-author">PLoS One</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1371/journal.pone.0334313" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 39 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Inverse association between serum vitamin B12 level and abundance of potential B12-producing gut microbes in Indian children. bioRxiv 2025.04.21.649764</h3>
                            <div class="article-author">bioRxiv</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.tjnut.2025.10.02" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 40 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Associations between HIV, sexually transmitted diseases, and antimicrobial resistance in the era of combination antiretroviral therapy and antibiotics</h3>
                            <div class="article-author">Microbes & Immunity</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.36922/MI025250057" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 41 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Utilization of antenatal care (ANC) services among tribal mothers in central India: A cross-sectional study</h3>
                            <div class="article-author">J Commun Health Manag</div>
                            <div class="article-footer">
                                <a href="https://doi:10.18231/j.jchm.13632.1760769655" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 42 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Hematology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Association of cell adhesion molecules levels & single nucleotide polymorphisms with vaso-occlusive crisis in sickle cell disease: A cross sectional study</h3>
                            <div class="article-author">Indian J Med Res</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.25259/IJMR_406_2025" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 43 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Hematology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Association of Cell Adhesion Molecules with Vaso-occlusive crisis in Sickle Cell Disease</h3>
                            <div class="article-author">Biomarkers</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1080/1354750X.2025.2586746" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 44 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">DapB is a conserved target for tackling antimicrobial resistance in Mycobacterium tuberculosis</h3>
                            <div class="article-author">J Biomol Struct Dyn</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1080/07391102.2025.2581074" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 45 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Exosomes and Extracellular vesicles, potential tools in the effective management of tuberculosis infection</h3>
                            <div class="article-author">The Microbe</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.microb.2025.100520" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 46 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Possible Crosstalk and Alterations in Gut Bacteriome and Virome in HIV-1 Infection and the Associated Comorbidities Related to Metabolic Disorder</h3>
                            <div class="article-author">Viruses</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3390/v17070990" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 47 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">A scoping review exploring the Role of Homoeopathic Drugs as a Host Directed Therapy in the Management of Drug-resistant Tuberculosis</h3>
                            <div class="article-author">Advances in Integrative Medicine</div>
                            <div class="article-footer">
                                <a href="#" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 48 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">The Genetic Fingerprint of HIV in the Brain: Insights into Neurocognitive Dysfunction</h3>
                            <div class="article-author">Neuroglia</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3390/neuroglia6020023" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 49 (New) -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Research</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> 2025</div>
                            <h3 class="article-title">Microbial Forensic DNA Analysis Book Advances in Forensic Biology and DNA Typing</h3>
                            <div class="article-author">CRC Press</div>
                            <div class="article-footer">
                                <a href="#" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Original Articles -->
<!-- Article 1 -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Genomics</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> February 2024</div>
                            <h3 class="article-title">Genetic diversity of Mycobacterium leprae: Need to move towards genome-wide approaches</h3>
                            <div class="article-author">Indian Journal of Medical Research</div>
                            <div class="article-footer">
                                <a href="https://pubmed.ncbi.nlm.nih.gov/38577854/" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 2 -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Infectious Disease</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> August 2025</div>
                            <h3 class="article-title">Preliminary evaluation of inactivated antigens as diagnostic controls in molecular detection of vector-borne diseases in low-resource settings</h3>
                            <div class="article-author">Journal of Vector Borne Diseases</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.4103/jvbd.jvbd_79_25" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 3 -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Molecular Biology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> June 2025</div>
                            <h3 class="article-title">Molecular Detection of Gene Mutation Related to Drug Resistance in Mycobacterium leprae</h3>
                            <div class="article-author">International Journal of Mycobacteriology</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.4103/ijmy.ijmy_35_25" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 4 -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Genomics</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> January 2025</div>
                            <h3 class="article-title">Genetic variability, genotyping, and genomics of Mycobacterium leprae</h3>
                            <div class="article-author">FEMS Microbiology Reviews</div>
                            <div class="article-footer">
                                <a href="https://pubmed.ncbi.nlm.nih.gov/40280733/" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 5 -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="100">
                        <div class="article-content">
                            <span class="article-category">Public Health</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> April 2025</div>
                            <h3 class="article-title">Vector incrimination studies of lymphatic filariasis in rural areas of endemic Datia district of Madhya Pradesh, India</h3>
                            <div class="article-author">Transactions of The Royal Society of Tropical Medicine and Hygiene</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1093/trstmh/traf045" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 6 -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="200">
                        <div class="article-content">
                            <span class="article-category">Clinical Medicine</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> June 2025</div>
                            <h3 class="article-title">Emergence of scrub typhus-associated neurological signs in central India: An unusual manifestation in febrile illness cases in Madhya Pradesh, India</h3>
                            <div class="article-author">Clinical Epidemiology and Global Health</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.1016/j.cegh.2025.102000" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 7 -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="300">
                        <div class="article-content">
                            <span class="article-category">Gastroenterology</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> May 2025</div>
                            <h3 class="article-title">Malaria and malnutrition in tribal areas of India: implications for paediatric health</h3>
                            <div class="article-author">Frontiers in Gastroenterology</div>
                            <div class="article-footer">
                                <a href="https://doi.org/10.3389/fgstr.2025.1526806" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Article 8 -->
                    <div class="article-card" data-aos="fade-up" data-aos-delay="400">
                        <div class="article-content">
                            <span class="article-category">Community Health</span>
                            <div class="article-date"><i class="far fa-calendar-alt"></i> February 2024</div>
                            <h3 class="article-title">Community health workers in India should be trained to offer genetic counselling for rare diseases</h3>
                            <div class="article-author">Nature Medicine</div>
                            <div class="article-footer">
                                <a href="https://pubmed.ncbi.nlm.nih.gov/38200260/" class="article-link" target="_blank">Abstract <i class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="noResults" class="no-results">No publications found matching your criteria.</div>
            </div>
        </div>

        <!-- Back to Top -->
        <div id="backToTop"><i class="fas fa-chevron-up"></i></div>

        <!-- Footer -->
        <?php include("footer.php");?>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <!-- Site Core Scripts -->
    <script src="assets/scripts/responsive.menu.js"></script> 
    <script src="assets/scripts/chosen.select.js"></script> 
    <script src="assets/scripts/slick.js"></script>
    <script src="assets/scripts/jquery.mobile-menu.min.js"></script> 
    <script src="assets/scripts/functions.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize AOS
            AOS.init({
                duration: 800,
                offset: 100,
                once: true
            });

            // Live Search Logic
            $('#articleSearch').on('keyup', function() {
                const value = $(this).val().toLowerCase();
                let hasResults = false;

                $('.article-card').each(function() {
                    const title = $(this).find('.article-title').text().toLowerCase();
                    const author = $(this).find('.article-author').text().toLowerCase();
                    const excerpt = $(this).find('.article-excerpt').text().toLowerCase();
                    const category = $(this).find('.article-category').text().toLowerCase();

                    if (title.includes(value) || author.includes(value) || excerpt.includes(value) || category.includes(value)) {
                        $(this).fadeIn(300);
                        hasResults = true;
                    } else {
                        $(this).fadeOut(200);
                    }
                });

                if (hasResults) {
                    $('#noResults').fadeOut(200);
                } else {
                    $('#noResults').delay(200).fadeIn(300);
                }
            });

            // Back to Top Logic
            $(window).scroll(function() {
                if ($(this).scrollTop() > 300) {
                    $('#backToTop').addClass('show');
                } else {
                    $('#backToTop').removeClass('show');
                }
            });

            $('#backToTop').click(function() {
                $('html, body').animate({scrollTop: 0}, 600);
                return false;
            });
        });
    </script>
</body>
</html>
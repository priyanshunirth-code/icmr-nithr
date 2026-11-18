<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <nav class="main-navigation">
                <ul class="top-nav" style="display: flex; flex-wrap: wrap; align-items: center; gap: -1px; list-style: none;">

                    <!-- About Dropdown -->
                    <li class="menu-item-has-children">
                        <a href="about.php" class="menu-link <?php echo ($_SERVER['PHP_SELF'] == '/about.php') ? 'active' : ''; ?>">
                            <?php echo $lang['about']; ?> </a>
                            <ul class="submenu">
                                <li><a href="about.php"><?php echo $lang['profile']; ?></a></li><BR>
                                <li><a href="director.php"><?php echo $lang['directors_desk']; ?></a></li>
                                <li><a href="Leadership_of_ICMR_NIRTH.php"><?php echo $lang['leadership_nithr']; ?></a></li>
                                <li><a href="staff.php"><?php echo $lang['staff_list']; ?></a></li>
                            </ul>
                    </li>
                    <li><a href="research_publications.php" class="menu-link <?php echo ($_SERVER['PHP_SELF'] == '/research.php') ? 'active' : ''; ?>"><?php echo $lang['research']; ?></a></li>
                    <li><a href="vacancies.php" class="menu-link <?php echo ($_SERVER['PHP_SELF'] == '/vacancies.php') ? 'active' : ''; ?>"><?php echo $lang['career_opportunity']; ?></a></li>
                    <li><a href="tenders.php" class="menu-link <?php echo ($_SERVER['PHP_SELF'] == '/tenders.php') ? 'active' : ''; ?>"><?php echo $lang['tenders']; ?></a></li>
                    <li><a href="employees_corner.php" class="menu-link <?php echo ($_SERVER['PHP_SELF'] == '/employees_corner.php') ? 'active' : ''; ?>"><?php echo $lang['employees_corner']; ?></a></li>
                    <li><a href="rti.php" class="menu-link"><?php echo $lang['rti']; ?></a></li>
                    <li><a href="contact.php" class="menu-link"><?php echo $lang['contact_us']; ?></a></li>

                    <!-- Social Media Links -->
                    <li><a href="https://www.facebook.com/ICMRNITHR" target="_blank" class="menu-link social-link"><i class="icon-facebook2 social-icon-default"></i><svg class="social-icon-hover" viewBox="0 0 24 24" aria-label="Facebook" role="img" xmlns="http://www.w3.org/2000/svg"><path fill="#1877F2" d="M24 12.073C24 5.405 18.627 0 12 0S0 5.405 0 12.073C0 18.1 4.388 23.094 10.125 24v-8.437H7.078v-3.49h3.047V9.413c0-3.025 1.792-4.697 4.533-4.697 1.312 0 2.686.235 2.686.235v2.973h-1.514c-1.491 0-1.956.93-1.956 1.885v2.264h3.328l-.532 3.49h-2.796V24C19.612 23.094 24 18.1 24 12.073Z"/></svg></a></li>
             <li>
                 <a href="https://x.com/ICMRNITHR" target="_blank" class="menu-link"><svg viewBox="0 0 1200 1227" width="15" height="15" xmlns="http://www.w3.org/2000/svg">
      <path fill="#000"  d="M714.163 519.284L1160.89 0H1054.07L667.137 450.887L358.497 0H0L468.492 682.997L0 1226.37H106.82L515.515 751.907L841.503 1226.37H1200L714.137 519.284H714.163ZM568.548 687.828L521.05 619.857L132.671 64.455H297.87L611.12 513.42L658.618 581.391L1067.64 1162.04H902.441L568.548 687.854V687.828Z"/>
    </svg></a></li>
    <li><a href="https://www.youtube.com/channel/UCB09DISRpmIJfisD3cQDo9g" target="_blank" class="menu-link social-link"><i class="icon-youtube3 social-icon-default"></i><svg class="social-icon-hover" viewBox="0 0 24 24" aria-label="YouTube" role="img" xmlns="http://www.w3.org/2000/svg"><path fill="#FF0000" d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.376.505A3.016 3.016 0 0 0 .502 6.186C0 8.065 0 12 0 12s0 3.935.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.376-.505a3.016 3.016 0 0 0 2.122-2.136C24 15.935 24 12 24 12s0-3.935-.502-5.814ZM9.545 15.568V8.432L15.818 12l-6.273 3.568Z"/></svg></a></li>

                    <!-- GTranslate Widget ADDED HERE (Fixes Refresh Issue & UI) -->
                    <li>
                        <div class="gtranslate_wrapper"></div>
                        <script>window.gtranslateSettings = {"default_language":"en","native_language_names":true,"languages":["en","hi","te","ta","bn","mr","gu","pa"],"wrapper_selector":".gtranslate_wrapper","flag_size":20,"alt_flags":{"en":"usa"}}</script>
                        <script src="https://cdn.gtranslate.net/widgets/latest/dropdown.js" defer></script>
                    </li>
                    <!-- END GTranslate -->

                    <!-- Language Switch -->
                    <!--
                    <?php if($_SESSION['language']=='hi'){ ?>
                        <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?><?php echo (strpos($_SERVER['REQUEST_URI'], "?")) ? "&" : "?"; ?>language=en" class="menu-link">English Website</a></li>
                    <?php } else { ?>
                        <li><a href="<?php echo $_SERVER['REQUEST_URI']; ?><?php echo (strpos($_SERVER['REQUEST_URI'], "?")) ? "&" : "?"; ?>language=hi" class="menu-link">हिंदी वेबसाइट</a></li>
                    <?php } ?>-->

                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
/* Import Google Font */
/* Import Google Font */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap');
.main-header{
     background-color:  #ffffff !important; /* Light gray background */
}
/* Wrapper */
/* Wrapper Styling */
.wrapper {
    background-color: #ffffff !important; /* Light gray background */
   /
    max-width: 1000px !important; /* Limit max width */


/* Global Styles */
body {
    color:  #ffffff;
    background-color: #ffffff;
    font-family: 'Poppins', sans-serif;
    transition: background 0.3s ease-in-out;


}
.top-nav {
    display: inline-flex; /* Keeps items inline */
    align-items: center;
    list-style: none;
    font-size: 1px;
    margin: -2px; /* Adjust this to remove more gap */
    padding: 0;
}

.top-nav li {
    display: inline-block; /* Keeps items inline */
    margin: 5PX; /* Removes space */
    padding: 0; /* Removes extra spacing */
}

.top-nav li a {
    text-decoration: none;
    padding: 2px 5px; /* Adjust padding as needed */
    color: black;
}

/* Highlight menu item on hover */
.top-nav li a:hover {
    background-color: #66a3ff;
    color: white;
}

.social-link .social-icon-hover {
    display: none;
    width: 22px;
    height: 22px;
    vertical-align: middle;
}

.social-link,
.social-link:hover {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 28px;
    height: 28px;
    padding: 0 !important;
    background: transparent !important;
    color: inherit !important;
    transform: none !important;
}

.social-link:hover .social-icon-default {
    display: none;
}

.social-link:hover .social-icon-hover {
    display: inline-block;
}

/* Navigation Bar */
.navbar {
    background: #ffffff; /* Light background */
    width: 100vw; /* Full width of the viewport */
    margin: -5; /* Remove any margins */
    padding: 10px 0; /* Adjust padding as needed */
    box-shadow: none; /* Remove any shadow */
     margin-top: 8px;
}

.navbar ul {
    list-style: none;
    display: flex;
    gap: 20px;
    margin: 0;
    padding: 0;
    justify-content: center;
}

.navbar ul li {
    display: inline-block;
}

.navbar ul li a {
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    color: #333;
    padding: 10px 18px;
    transition: all 0.3s ease-in-out;
    border-radius: 5px;
    display: inline-block;
}

/* Hover Effect */
.navbar ul li a:hover {
    background: rgba(0, 0, 0, 0.08);
    color: #000;
    transform: scale(1.05);
    font-weight: 700;
}
.top-nav {

    padding: 0px;
    display: flex;
    justify-content: space-between;
}
/* Header Content */
.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 15px 30px;
    gap: 30px;
}

/* Logo Protection Styles */
.cs-logo {
    position: relative;
    display: inline-block;
}

.cs-logo-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 10;
    background: transparent;
    cursor: pointer;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    user-select: none;
}

.cs-logo img {
    display: block;
    max-width: 100%;
    height: auto;
    transition: transform 0.13s ease-in-out, box-shadow 0.3s ease-in-out;
    border-radius: 10px;
    -webkit-touch-callout: none;
    -webkit-user-select: none;
    user-select: none;
    -webkit-user-drag: none;
    pointer-events: none;
}

/* Logo Hover Effect via Parent */
.cs-logo:hover img {
    transform: scale(1.06);
    box-shadow: 0px 8px 18px rgba(0, 0, 0, 0.15);
}

/* Header Text */
.text-center {
    text-align: center;
    font-weight: 400;  /* Use a valid font weight */
    color: #111;
    margin: 0; /* Remove unnecessary space */
    padding: 5px 0; /* Adjust padding */
    line-height: 1.2; /* Reduce space between lines */
}

/* First Line - Hindi Text */
.text-center p:first-child {
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 1px;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
    margin: 0; /* Remove extra space */
}

/* Second Line - English */
.text-center p:nth-child(2) {
    font-size: 14px;
    font-weight: 600;
    color: #222;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin: 0px 0; /* Reduce spacing */
}

/* Third Line - Department Info */
.text-center p:last-child {
    font-size: 11px;
    font-weight: 500;
    color: #444;
    text-transform: uppercase;
    letter-spacing:1px;
    margin: 0px 0; /* Reduce spacing */
}

/* Call-to-Action Button */
.cta-button {
    background: #333;
    color: white;
    padding: 12px 24px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 600;
    text-transform: uppercase;
    text-decoration: none;
    transition: all 0.3s ease-in-out;
    display: inline-block;
    margin-top: 10px;
}

/* CTA Button Hover */
.cta-button:hover {
    background: #222;
    transform: scale(1.05);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .cs-logo img {
        width: 80%;
        height: auto;
    }

    .header-content {
        flex-direction: column;
        text-align: center;
    }

    .text-center p {
        font-size: 14px;
    }
}

@media (max-width: 768px) {
    .main-header {

       background: #f4f4f4 !important; /* Same background as .main-header */

    }
    .navbar {
        padding: 10px 15px;
    }
    .navbar ul {
        flex-direction: column;
        text-align: center;
    }

    .navbar ul li {
        margin-bottom: 8px;
    }

    .text-center p {
        font-size: 13px;
    }

    .cta-button {
        font-size: 13px;
        padding: 10px 20px;
    }
}
.main-header {

}
</style>

<div class="main-header">
    <div class="container">
        <div class="header-content">
            <!-- Logo Section -->
            <div class="cs-logo">
                <a href="index.php" style="position: relative; display: block;" oncontextmenu="return false;" ondragstart="return false;">
                    <div class="cs-logo-overlay" oncontextmenu="return false;" ondragstart="return false;"></div>
                    <img src="assets/images/NIHR-Jabalpur-01.jpg" alt="ICMR Logo" oncontextmenu="return false;" ondragstart="return false;">
                </a>
            </div>

            <!-- Text Section -->
            <div class="text-center">
                <p><strong>आई. सी. एम. आर. - राष्ट्रीय जनजातीय स्वास्थ्य अनुसंधान संस्थान, जबलपुर</strong></p>
                <p>I C M R - National Institute for Tribal Health Research, Jabalpur</p>
                <p>Dept. of Health Research, Ministry of Health and Family Welfare, Govt. of India</p>
            </div>


        </div>
    </div>
</div>      </div>
        </div>
    </div>
</header>

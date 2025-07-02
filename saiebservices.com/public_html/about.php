<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - صيب لخدمات الاعمال</title>
    <link rel="stylesheet" href="style-rtl.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body class="stretched rtl">
    <header id="header" class="full-header transparent-header" data-sticky-class="not-dark">
        <div id="header-wrap">
            <div class="container">
                <div class="header-row">
                    <div id="logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="Logo" />
                        </a>
                    </div>
                    <nav class="primary-menu">
                        <ul class="menu-container">
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'index.php') ? 'active-link' : ''?>" href="index.php">
                                    <div>الرئيســـية</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'about.php') ? 'active-link' : ''?>" href="about.php">
                                    <div>من نحن</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'training.php' || $current_page == 'service-business.php' || $current_page == 'service-individual.php') ? 'active-link' : ''?>" href="#">
                                    <div>خدماتنا</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'blog3.php' || $current_page == 'blog-single.php') ? 'active-link' : ''?>" href="blog3.php">
                                    <div>انجازتنا</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'contact.php') ? 'active-link' : ''?>" href="contact.php">
                                    <div>تواصــل معنا</div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>من نحن</h1>
        <p>نحن شركة متخصصة في تقديم خدمات الأعمال والتدريب، نسعى لتقديم أفضل الحلول لعملائنا.</p>
        <h2>رؤيتنا</h2>
        <p>أن نكون الخيار الأول في تقديم خدمات الأعمال والتدريب في المنطقة.</p>
        <h2>مهمتنا</h2>
        <p>تقديم خدمات مبتكرة وفعالة تلبي احتياجات عملائنا وتساعدهم على تحقيق أهدافهم.</p>
    </div>

    <footer>
        <p>&copy; 2023 صيب لخدمات الاعمال. جميع الحقوق محفوظة.</p>
    </footer>
</body>

</html>
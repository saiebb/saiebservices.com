<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html dir="rtl" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="description" content="Training services offered by our organization." />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style-rtl.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/font-icons.css" />
    <link rel="stylesheet" href="css/swiper.css" />
    <link rel="icon" type="image/png" href="images/favicon-32x32.png" />
    <title>خدمات التدريب</title>
</head>

<body class="stretched rtl">
    <header id="header" class="full-header transparent-header" data-sticky-class="not-dark">
        <div id="header-wrap">
            <div class="container">
                <div class="header-row">
                    <div id="logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="" />
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
                                <a class="menu-link <?=($current_page == 'training.php') ? 'active-link' : ''?>" href="training.php">
                                    <div>خدماتنا</div>
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

    <div id="content">
        <div class="container">
            <h1>خدمات التدريب</h1>
            <p>نقدم مجموعة متنوعة من خدمات التدريب التي تهدف إلى تطوير المهارات وزيادة الكفاءة.</p>
            <h2>التدريب المتخصص</h2>
            <p>نقدم برامج تدريبية متخصصة في مجالات متعددة، تشمل:</p>
            <ul>
                <li>التدريب الإداري</li>
                <li>التدريب الفني</li>
                <li>التدريب على المهارات الشخصية</li>
            </ul>
            <h2>التسجيل</h2>
            <p>للتسجيل في برامج التدريب، يرجى التواصل معنا عبر صفحة <a href="contact.php">تواصل معنا</a>.</p>
        </div>
    </div>

    <footer>
        <div class="container">
            <p>© 2023 جميع الحقوق محفوظة.</p>
        </div>
    </footer>
</body>
</html>
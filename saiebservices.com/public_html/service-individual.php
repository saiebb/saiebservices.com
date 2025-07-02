<?php
// This file details services available for individuals.

$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خدمات الأفراد</title>
    <link rel="stylesheet" href="css/style-rtl.css">
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
                                <a class="menu-link <?=($current_page == 'service-business.php') ? 'active-link' : ''?>" href="service-business.php">
                                    <div>خدمات الأعمال</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'service-individual.php') ? 'active-link' : ''?>" href="service-individual.php">
                                    <div>خدمات الأفراد</div>
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

    <div class="content">
        <h1>خدمات الأفراد</h1>
        <p>نقدم مجموعة متنوعة من الخدمات المصممة خصيصًا للأفراد، بما في ذلك:</p>
        <ul>
            <li>استشارات شخصية</li>
            <li>تدريب مهني</li>
            <li>دورات تعليمية</li>
            <li>خدمات الدعم النفسي</li>
        </ul>
        <p>للمزيد من المعلومات، لا تتردد في <a href="contact.php">التواصل معنا</a>.</p>
    </div>

    <footer>
        <p>&copy; 2023 جميع الحقوق محفوظة.</p>
    </footer>
</body>

</html>
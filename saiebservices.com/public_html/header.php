<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NK4L62NP');</script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PELEW7CW99"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-PELEW7CW99');
    </script>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="description"
        content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today." />

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap"
        rel="stylesheet" />

    <!-- Core Style -->
    <link rel="stylesheet" href="style-rtl.css" />

    <!-- Font Icons -->
    <link rel="stylesheet" href="css/font-icons.css" />

    <!-- Plugins/Components CSS -->
    <link rel="stylesheet" href="css/swiper.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" type="image/png" href="images/favicon-32x32.png" />
    <!-- تحميل خط Cairo مع تحسينات للجوال -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet" />
    <!-- تحميل احتياطي للخط -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=fallback" rel="stylesheet" />
    
    <!-- تحسين تحميل الخط للجوال -->
    <style>
        /* تعريف احتياطي للخط */
        body, * {
            font-family: "Cairo", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif !important;
        }
        
        /* تحسين عرض الخط */
        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
    </style>

    <!-- Document Title
	============================================= -->
    <title>صيب لخدمات الاعمال</title>
</head>

<body class="stretched rtl">
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NK4L62NP"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!-- Document Wrapper
	============================================= -->
    <div id="wrapper">
        <!-- Header
		============================================= -->
        <header id="header" class="full-header transparent-header" data-sticky-class="not-dark">
            <div id="header-wrap">
                <div class="container">
                    <div class="header-row">

                        <!-- Logo
						============================================= -->
                        <div id="logo">
                            <a href="index.php">
                                <img src="images/logo.png" alt="" />
                            </a>
                        </div><!-- #logo end -->

                        <div class="header-misc">

                            <!-- Top Search
							============================================= -->
                            <div id="top-search" class="header-misc-icon">
                                <a href="#" id="top-search-trigger"><i class="uil uil-search"></i><i
                                        class="bi-x-lg"></i></a>
                            </div><!-- #top-search end -->

                        </div>

                        <div class="primary-menu-trigger">
                            <button class="cnvs-hamburger" type="button" title="Open Mobile Menu">
                                <span class="cnvs-hamburger-box"><span class="cnvs-hamburger-inner"></span></span>
                            </button>
                        </div>

                        <!-- Primary Navigation
						============================================= -->

                        <nav class="primary-menu">
                            <ul class="menu-container">
                                <li class="menu-item">
                                    <a class="menu-link <?=($current_page == 'index.php') ? 'active-link' : ''?>"
                                        href="index.php">
                                        <div>الرئيســـية</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link <?=($current_page == 'about.php') ? 'active-link' : ''?>"
                                        href="about.php">
                                        <div>من نحن</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link <?=($current_page == 'training.php' || $current_page == 'service-business.php' || $current_page == 'service-individual.php') ? 'active-link' : ''?>"
                                        href="#">
                                        <div>خدماتنا</div>
                                    </a>

                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="training.php">
                                                <div>التدريب</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="service-business.php">
                                                <div>خدمات الاعمــال</div>
                                            </a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="service-individual.php">
                                                <div>الخدمات العامة</div>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link <?=($current_page == 'blog3.php' || $current_page == 'blog-single.php') ? 'active-link' : ''?>"
                                        href="blog3.php">
                                        <div>انجازتنا</div>
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link <?=($current_page == 'contact.php') ? 'active-link' : ''?>"
                                        href="contact.php">
                                        <div>تواصــل معنا</div>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                        <!-- #primary-menu end -->

                        <form class="top-search-form" action="search.php" method="get">
                            <input type="text" name="q" class="form-control" value=""
                                placeholder="ابحث ثم اضغط Enter ...." autocomplete="off">
                        </form>

                    </div>
                </div>
            </div>
            <div class="header-wrap-clone"></div>
        </header><!-- #header end -->
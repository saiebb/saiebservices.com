<?php
$current_page = basename($_SERVER['PHP_SELF']);

// تضمين ملف المسار الأساسي
include_once 'action/base.php';

// تضمين ملف وظائف الروابط SEO
include_once 'action/seo_url.php';
?>
<!DOCTYPE html>
<html dir="rtl" lang="en-US">

<head>
    <!-- Base URL -->
    <base href="<?php echo BASE_URL; ?>/">
    <!-- Base URL for JavaScript -->
    <script src="<?php echo ASSETS_URL; ?>/js/base-url.js"></script>
    
    <!-- Google Tag Manager مع معالجة محسنة للأخطاء -->
    <script>
        (function(w,d,s,l,i){
            try {
                // التحقق من الاتصال بالإنترنت
                if (!navigator.onLine) {
                    return;
                }
                
                w[l]=w[l]||[];
                w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});
                
                var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
                j.async=true;
                j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;
                
                // معالجة أخطاء التحميل
                j.onerror = function() {
                    // تجاهل الأخطاء بصمت
                };
                
                f.parentNode.insertBefore(j,f);
            } catch (error) {
                // تجاهل أخطاء GTM بصمت
            }
        })(window,document,'script','dataLayer','GTM-NK4L62NP');
    </script>
    <!-- End Google Tag Manager -->

    <!-- Google tag (gtag.js) مع معالجة محسنة للأخطاء -->
    <script>
        // تحميل Google Analytics مع معالجة أفضل للأخطاء
        (function() {
            // التحقق من الاتصال بالإنترنت
            if (!navigator.onLine) {
                console.warn('لا يوجد اتصال بالإنترنت - تم تخطي Google Analytics');
                return;
            }
            
            window.dataLayer = window.dataLayer || [];
            function gtag(){
                try {
                    if (window.dataLayer) {
                        dataLayer.push(arguments);
                    }
                } catch (error) {
                    // تجاهل الأخطاء بصمت لتجنب إزعاج المستخدم
                }
            }
            
            // تحميل سكريبت Google Analytics مع timeout
            var script = document.createElement('script');
            script.async = true;
            script.src = 'https://www.googletagmanager.com/gtag/js?id=G-PELEW7CW99';
            
            var loadTimeout = setTimeout(function() {
                console.warn('انتهت مهلة تحميل Google Analytics');
            }, 10000);
            
            script.onload = function() {
                clearTimeout(loadTimeout);
                try {
                    gtag('js', new Date());
                    gtag('config', 'G-PELEW7CW99', {
                        'transport_type': 'beacon',
                        'anonymize_ip': true,
                        'send_page_view': true,
                        'custom_map': {},
                        'allow_google_signals': false
                    });
                } catch (error) {
                    // تجاهل أخطاء التكوين
                }
            };
            
            script.onerror = function() {
                clearTimeout(loadTimeout);
                // تجاهل أخطاء التحميل بصمت
            };
            
            document.head.appendChild(script);
            
            // جعل gtag متاحة عالمياً
            window.gtag = gtag;
        })();
    </script>

    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="x-ua-compatible" content="IE=edge" />
    <meta name="author" content="SemiColonWeb" />
    <meta name="description"
        content="Get Canvas to build powerful websites easily with the Highly Customizable &amp; Best Selling Bootstrap Template, today." />
    
    <!-- Google Site Verification -->
    <meta name="google-site-verification" content="-nu_pz27v0fxcLY9mFOF-ymVgGra8d0ovT06122k0Do" />

    <!-- Font Imports -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital@0;1&display=swap"
        rel="stylesheet" />

    <!-- Core Style -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/style-rtl.css" />

    <!-- Font Icons -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/font-icons.css" />
    
    <!-- Font Awesome CDN as fallback -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Social Icons Fix -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/social-icons-fix.css" />

    <!-- Plugins/Components CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/swiper.css" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo ASSETS_URL; ?>/css/custom.css" />
    
    <!-- Google Customer Reviews Badge CSS -->
    <style>
        #google-reviews-badge {
            margin: 15px auto !important;
            text-align: center !important;
        }
        
        #google-reviews-badge iframe {
            width: 100% !important;
            min-width: 200px !important;
            max-width: 300px !important;
            height: auto !important;
            min-height: 50px !important;
            border: none !important;
            margin: 0 auto !important;
            display: block !important;
        }
        
        /* تحسين مظهر الشارة على الشاشات الصغيرة */
        @media (max-width: 768px) {
            #google-reviews-badge {
                margin: 10px 0 !important;
            }
            
            #google-reviews-badge iframe {
                min-width: 180px !important;
                max-width: 250px !important;
            }
        }
        
        /* إضافة حدود للشارة للتأكد من ظهورها أثناء التطوير */
        .google-badge-debug #google-reviews-badge {
            border: 2px dashed #007bff !important;
            background: rgba(0, 123, 255, 0.1) !important;
            border-radius: 8px !important;
        }
        
        /* تنسيق الشارة في وسط الفوتر */
        .google-badge-center-container {
            background: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 25px;
            margin: 15px auto;
            max-width: 500px;
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
        }
        
        .google-badge-center-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
            border-color: rgba(255, 255, 255, 0.3);
        }
        
        .google-badge-center-container iframe {
            width: 100% !important;
            min-width: 300px !important;
            max-width: 450px !important;
            height: auto !important;
            min-height: 80px !important;
            border: none !important;
            margin: 0 auto !important;
            display: block !important;
            border-radius: 12px !important;
            background: white !important;
        }
        
        /* تحسين عنوان التقييمات */
        #copyrights h5 {
            font-weight: 600;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px !important;
        }
        
        /* تحسين النجوم في العنوان */
        #copyrights .uil-star {
            font-size: 1.2em;
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
            animation: starGlow 2s ease-in-out infinite alternate;
        }
        
        @keyframes starGlow {
            from { 
                text-shadow: 0 0 5px #ffc107, 0 0 10px #ffc107; 
            }
            to { 
                text-shadow: 0 0 10px #ffc107, 0 0 20px #ffc107, 0 0 30px #ffc107; 
            }
        }
        
        /* تحسين الاستجابة للشارة المركزية */
        @media (max-width: 768px) {
            .google-badge-center-container {
                margin: 10px 15px;
                padding: 20px 15px;
                max-width: none;
            }
            
            .google-badge-center-container iframe {
                min-width: 250px !important;
                max-width: 350px !important;
                min-height: 70px !important;
            }
            
            #copyrights h5 {
                font-size: 1.1rem;
            }
        }
        
        @media (max-width: 480px) {
            .google-badge-center-container {
                padding: 15px 10px;
            }
            
            .google-badge-center-container iframe {
                min-width: 200px !important;
                max-width: 280px !important;
                min-height: 60px !important;
            }
        }
    </style>
    
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

    <!-- Document Title & Meta Tags
	============================================= -->
    <title><?php echo isset($pageTitle) ? $pageTitle : 'صيب لخدمات الاعمال'; ?></title>
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="<?php echo isset($pageDescription) ? $pageDescription : 'صيب لخدمات الاعمال - نقدم خدمات متميزة للأفراد والشركات في مجالات متعددة بما في ذلك الاستشارات المالية والتدريب وخدمات الأعمال.'; ?>">
    <meta name="keywords" content="<?php echo isset($pageKeywords) ? $pageKeywords : 'صيب, خدمات اعمال, استشارات مالية, تدريب, خدمات افراد, خدمات شركات'; ?>">
    
    <!-- Canonical URL -->
    <?php if (isset($canonicalUrl)): ?>
    <link rel="canonical" href="<?php echo $canonicalUrl; ?>">
    <?php else: ?>
    <link rel="canonical" href="<?php echo BASE_URL . $_SERVER['REQUEST_URI']; ?>">
    <?php endif; ?>
    
    <!-- Open Graph Meta Tags -->
    <meta property="og:title" content="<?php echo isset($pageTitle) ? $pageTitle : 'صيب لخدمات الاعمال'; ?>">
    <meta property="og:description" content="<?php echo isset($pageDescription) ? $pageDescription : 'صيب لخدمات الاعمال - نقدم خدمات متميزة للأفراد والشركات في مجالات متعددة بما في ذلك الاستشارات المالية والتدريب وخدمات الأعمال.'; ?>">
    <meta property="og:url" content="<?php echo isset($canonicalUrl) ? $canonicalUrl : BASE_URL . '/'; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image" content="<?php echo BASE_URL; ?>/images/logo.png">
    
    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo isset($pageTitle) ? $pageTitle : 'صيب لخدمات الاعمال'; ?>">
    <meta name="twitter:description" content="<?php echo isset($pageDescription) ? $pageDescription : 'صيب لخدمات الاعمال - نقدم خدمات متميزة للأفراد والشركات في مجالات متعددة بما في ذلك الاستشارات المالية والتدريب وخدمات الأعمال.'; ?>">
    <meta name="twitter:image" content="<?php echo BASE_URL; ?>/images/logo.png">
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
        <!-- <header id="header" class="full-header" data-sticky-class="not-dark">
        <div id="header-wrap">
          <div class="container">
            <div class="header-row">


              <div id="logo">
                <a href="<?php echo getStaticPageUrl('home'); ?>">
                  <img src="<?php echo ASSETS_URL; ?>/images/logo.png" alt="صيب لخدمات الاعمال" />
                </a>
              </div>


              <div class="primary-menu-trigger">
                <button
                  class="cnvs-hamburger"
                  type="button"
                  title="Open Mobile Menu"
                >
                  <span class="cnvs-hamburger-box"
                    ><span class="cnvs-hamburger-inner"></span
                  ></span>
                </button>
              </div>

              <nav class="primary-menu">
                <ul class="menu-container">
                  <li class="menu-item">
                    <a class="menu-link <?=($current_page == 'index.php') ? 'active-link' : ''?>" href="<?php echo getStaticPageUrl('home'); ?>">
                      <div>الرئيســـية</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a class="menu-link <?=($current_page == 'about.php') ? 'active-link' : ''?>" href="<?php echo getStaticPageUrl('about'); ?>">
                      <div>من نحن</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a class="menu-link <?=($current_page == 'training.php' || $current_page == 'service-business.php' || $current_page == 'service-individual.php') ? 'active-link' : ''?>" href="#">
                      <div>خدماتنا</div>
                    </a>

                    <ul class="sub-menu-container">
                      <li class="menu-item">
                        <a class="menu-link" href="<?php echo getStaticPageUrl('training'); ?>">
                          <div>التدريب</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a class="menu-link" href="<?php echo getStaticPageUrl('business'); ?>">
                          <div>خدمات الاعمــال</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a class="menu-link" href="<?php echo getStaticPageUrl('individual'); ?>">
                          <div>خدمات الأفراد و المنشآت</div>
                        </a>
                      </li>
                      <li class="menu-item">
                        <a class="menu-link" href="<?php echo getStaticPageUrl('financial'); ?>">
                          <div>الاستشـــارات المالية   </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="menu-item">
                    <a class="menu-link <?=($current_page == 'blog3.php' || $current_page == 'blog-single.php') ? 'active-link' : ''?>" href="blog3.php">
                      <div>انجازنتا</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a class="menu-link <?=($current_page == 'library_cat.php') ? 'active-link' : ''?>" href="library_cat.php">
                      <div>مكتبة صــــيب</div>
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
        <div class="header-wrap-clone"></div>
      </header> -->
        <!-- #header end -->



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
                                        <li class="menu-item">
                                            <!--<a class="menu-link" href="financial.php">-->
                                            <!--    <div>الاستشـــارات المالية </div>-->
                                            <!--</a>-->
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
                                    <!--<a class="menu-link <?=($current_page == 'library_cat.php') ? 'active-link' : ''?>"-->
                                    <!--    href="library_cat.php">-->
                                    <!--    <div>مكتبة صــــيب</div>-->
                                    <!--</a>-->
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
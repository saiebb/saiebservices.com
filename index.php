<?php
// إضافة وسوم meta للـ SEO
$pageTitle = "صيب لخدمات الاعمال | خدمات متميزة للأفراد والشركات";
$pageDescription = "صيب لخدمات الاعمال - نقدم خدمات متميزة للأفراد والشركات في مجالات متعددة بما في ذلك الاستشارات المالية والتدريب وخدمات الأعمال.";
$pageKeywords = "صيب, خدمات اعمال, استشارات مالية, تدريب, خدمات افراد, خدمات شركات";
$canonicalUrl = "https://saiebservices.com/";

include 'header.php';
include 'action/slider.php';
include 'action/clients.php';
include 'action/home_text.php';
include 'action/latest_news.php';
include 'action/clientsoponions.php';
?>

<section id="slider" class="slider-element slider-parallax swiper_wrapper min-vh-60 min-vh-md-100 include-header"
    data-autoplay="3000">
    <div class="slider-inner">
        <div class="swiper swiper-parent" dir="rtl">
            <div class="swiper-wrapper">


                <?php
while ($rowsSlider = $reultSlider->fetch_assoc()) {
    ?>

                <div class="swiper-slide dark">
                    <div class="container-fluid slider-transparent-bg">
                        <div class="slider-caption slider-caption-center">
                            <h2 data-animate="fadeInUp">
                                <?php echo $rowsSlider['sl_title']; ?>
                            </h2>
                            <p class="d-none d-sm-block" data-animate="fadeInUp" data-delay="200">
                                <?php echo $rowsSlider['sl_text']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="swiper-slide-bg"
                        style="background-image: url('images/<?php echo $rowsSlider['sl_img']; ?>')"></div>
                </div>

                <?php
}

?>



            </div>
            <div class="slider-arrow-left">
                <i class="uil uil-angle-right-b"></i>
            </div>
            <div class="slider-arrow-right">
                <i class="uil uil-angle-left-b"></i>
            </div>
        </div>

        <a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i
                class="bi-chevron-down infinite animated fadeInDown"></i></a>
    </div>
</section>

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="heading-block">
                        <h1> <?php echo $rowsText[0]["te_title"]; ?> </h1>
                    </div>
                    <p class="lead">
                        <?php echo $rowsText[0]["te_text"]; ?>
                    </p>
                    <a href="about.php" class="button button-rounded button-reveal button-large tleft"><span>اقرأ
                            المزيد</span><i class="uil uil-arrow-left"></i></a>
                </div>

                <div class="col-lg-7 align-self-end">
                    <div class="position-relative overflow-hidden text-center">
                        <img src="images/<?php echo $rowsText[0]["te_img"]; ?>" class="about-img img-fluid" height="400"
                            data-animate="fadeInUp" data-delay="100" alt="Chrome" />
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-7 align-self-end">
                        <div class="position-relative overflow-hidden text-center">
                            <img src="images/<?php echo $rowsText[1]["te_img"]; ?>" class="about-img img-fluid"
                                height="400" data-animate="fadeInUp" data-delay="100" alt="Chrome" />
                        </div>
                    </div>

                    <div class="col-lg-5">
                        <div class="heading-block">
                            <h1> <?php echo $rowsText[1]["te_title"]; ?> </h1>
                        </div>
                        <p class="lead">
                            <?php echo $rowsText[1]["te_text"]; ?>
                        </p>

                        <a href="service-business.php"
                            class="button button-rounded button-reveal button-large tleft"><span> المزيد</span><i
                                class="uil uil-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="heading-block">
                <h1>عملائنا</h1>
            </div>

            <div id="oc-clients" class="owl-carousel image-carousel carousel-widget" data-margin="60" data-loop="true"
                data-nav="false" data-autoplay="3000" data-pagi="false" data-items-xs="2" data-items-sm="3"
                data-items-md="4" data-items-lg="5" data-items-xl="6">


                <?php
while ($rowscClient = $reultClient->fetch_assoc()) {
    ?>
                <div class="oc-item">
                    <img src="images/<?php echo $rowscClient['cli_img']; ?>" class="about-img img-fluid" />
                </div>

                <?php
}
?>

            </div>
        </div>

        <div class="section">
            <div class="container">
                <div class="row align-items-center col-mb-50">
                    <div class="col-md-4 text-center">
                        <img data-animate="fadeInLeft" class="about-img"
                            src="images/<?php echo $rowsText[2]["te_img"]; ?>" class="about-img img-fluid" />
                    </div>

                    <div class="col-md-8 text-center text-md-start">
                        <div class="heading-block">
                            <h3> <?php echo $rowsText[2]["te_title"]; ?> </h3>
                        </div>

                        <p>
                            <?php echo $rowsText[2]["te_text"]; ?>
                        </p>



                        <a href="service-individual.php"
                            class="button button-rounded button-reveal button-large tleft"><span> المزيد</span><i
                                class="uil uil-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
        <div class="heading-block">
                            <h3>آراء العمـــلاء</h3>
                        </div>

            <div class="row justify-content-center ">
                <div class="col-lg-12">
                    <div class=" p-5">
                        <div id="oc-testi" class="owl-carousel testimonials-carousel carousel-widget" data-margin="0"
                            data-nav="false" data-items="1">

                            <?php
while ($rowsLatestClientsoponions = $reultLatestClientsoponions->fetch_assoc()) {
    ?>

                            <div class="oc-item oc-item-full-width">
                                <div class="row flex-row-reverse g-0 align-items-center">
                                    <div class="col-md-4 d-flex flex-column text-center align-items-center">
                                        <img src="images/<?php  echo $rowsLatestClientsoponions['ar_image']; ?>" class="testominial-author"
                                            class="rounded-circle border border-width-2 border-white mb-3 w-auto"
                                            width="75" height="75">
                                        <h4 class="mb-0"> <?php  echo $rowsLatestClientsoponions['ar_title']; ?> </h4>
                                        <h5 class="text-white-50 mb-0 fw-normal"><?php  echo $rowsLatestClientsoponions['ar_position']; ?></h5>
                                    </div>
                                    <div class="col-md-8">
                                        <p class="text-larger mb-0">  

                                        <?php  echo $rowsLatestClientsoponions['ar_text']; ?> 
                                        </p>
                                    </div>
                                </div>
                            </div>

                           <?php
}
?>

                        </div>
                    </div>
                </div>
            </div>
        </div>





        <div class="section">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5">                        <div class="heading-block">
                            <h1><?php echo $rowsText[3]["te_title"]; ?></h1>
                        </div>
                        <p class="lead">
                            <?php echo $rowsText[3]["te_text"]; ?>
                        </p>
                        <a href="training.php" class="button button-rounded button-reveal button-large tleft"><span>
                                المزيد</span><i class="uil uil-arrow-left"></i></a>
                    </div>

                    <div class="col-lg-7 align-self-end">
                        <div class="position-relative overflow-hidden text-center">
                            <img src="images/<?php echo $rowsText[3]["te_img"]; ?>" class="about-img img-fluid"
                                data-animate="fadeInUp" data-delay="100" alt="Chrome" />
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="container">
            <div class="heading-block text-center m-0">
                <h3>أحدث إنجازاتنا</h3>
            </div>
        </div>


        <div class="container mt-3">
            <div class="row posts-md col-mb-30">


                <?php
while ($rowsLatestNews = $reultLatestNews->fetch_assoc()) {
    ?>
                <div class="col-lg-3 col-md-6">
                    <div class="entry">
                        <div class="entry-image">
                            <a href="<?php echo getBlogUrl($rowsLatestNews["ar_id"], $rowsLatestNews["ar_title"], $rowsLatestNews["ar_slug"]); ?>"><img
                                    src="images/<?php echo $rowsLatestNews["ar_image"]; ?>" alt="<?php echo $rowsLatestNews["ar_title"]; ?>"
                                    class="rounded news-home-img img-fluid" /></a>
                        </div>

                        <div class="entry-meta px-2">
                            <ul>
                                <li><i class="uil uil-schedule"></i> <?php echo $rowsLatestNews["ar_date"]; ?></li>
                            </ul>
                        </div>
                        <div class="entry-title title-xs text-transform-none px-2">
                            <h3 class="training-list-title">
                                <a href="<?php echo getBlogUrl($rowsLatestNews["ar_id"], $rowsLatestNews["ar_title"], $rowsLatestNews["ar_slug"]); ?>">
                                    <?php echo $rowsLatestNews["ar_title"]; ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>

                <?php
}
?>



            </div>
        </div>
    </div>
</section>
<!-- #content end -->
<?php
include 'footer.php';
?>
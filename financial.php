<?php
// إضافة وسوم meta للـ SEO
$pageTitle = "الاستشارات المالية | صيب لخدمات الاعمال";
$pageDescription = "استفد من خدمات الاستشارات المالية المتخصصة التي نقدمها في صيب لخدمات الاعمال. نساعدك على تحقيق أهدافك المالية من خلال استشارات احترافية.";
$pageKeywords = "صيب, استشارات مالية, خدمات مالية, تخطيط مالي, استشارات ضريبية";
$canonicalUrl = "https://saiebservices.com/financial-services";

include 'header.php';
include 'action/financial.php';
?>

<!-- Page Title
		============================================= -->
<section class="page-title bg-transparent border-1">
    <div class="container">
        <div class="page-title-row pt-3 pb-3">

            <div class="page-title-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">الرئيســـية</a></li>
                        <li class="breadcrumb-item"><a href="index.php">خدماتنا</a></li>

                        <li class="breadcrumb-item active" aria-current="page">الاستشـــارات المالية
                        </li>
                    </ol>
                </nav>
                <h5>
                    <div class=" nocolor"> الاستشـــارات المالية </div>
                </h5>
            </div>





        </div>
    </div>
</section><!-- .page-title end -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">

            <div class="row col-mb-50">



                <?php
while ($rowscfinancial = $reultfinancial->fetch_assoc()) {
    ?>
                <div class="col-md-4">
                    <div class="feature-box media-box">
                        <div class="fbox-media">
                            <?php if(  $rowscfinancial['ar_image'] != '' ){
                ?>

                            <img src="images/<?php echo $rowscfinancial['ar_image']; ?>"
                                class="indv-img-business img-fluid">
                            <?php
            } ?>


                            <?php if(  $rowscfinancial['ar_image'] == '' ){
                ?>

                            <img src="images/library.png" class="indv-img-business img-fluid">
                            <?php
            } ?>
                        </div>
                        <div class="fbox-content px-0">
                            <h3 class="training-list-title"> <?php echo $rowscfinancial['ar_title']; ?> </h3>
                            <p class="training-list-text"><?php 
         $text = strip_tags($rowscfinancial['ar_text']);
         $words = explode(' ', $text);
         $firstTwentyWords = array_slice($words, 0, 18);
         $shortenedText = implode(' ', $firstTwentyWords);
         echo $shortenedText." ...";  
           ?> </p>
                        </div>
                        <a href="<?php echo getServiceUrl($rowscfinancial['ar_id'], $rowscfinancial['ar_title'], 4); ?>"
                            class="button button-rounded button-reveal button-large width96  tleft"><span>
                                اشــترك الآن</span><i class="uil uil-money-bill "></i></a>
                    </div>
                </div>

                <?php
        }
        ?>



            </div>

        </div>

        <div class="section">
            <div class="container">

                <div class="heading-block text-center">
                    <h2>كيف يمكنني التســجيل.</h2>

                </div>

                <div class="row col-mb-50">


                    <div class="col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="i-alt">1.</i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>اختر الاستشـــارات المالية</h3>
                                <p>اختر تدريبًا يناسب أهدافك من الاستشـــارات الماليةات المتاحة، فهو خطوة مهمة للتطوير
                                    واكتساب مهارات
                                    جديدة.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="i-alt">2.</i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>بيانات التواصل.</h3>
                                <p> اكتب بيانات التواصل الخاصة بك، مثل رقم الهاتف أو البريد الإلكتروني، لتسهيل التواصل
                                    والمتابعة الفعالة.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="feature-box fbox-plain">
                            <div class="fbox-icon">
                                <a href="#"><i class="i-alt">3.</i></a>
                            </div>
                            <div class="fbox-content">
                                <h3>ادفع بالفيزا.</h3>
                                <p>يمكنك الدفع بسهولة باستخدام بطاقة الفيزا، لتأكيد الحجز بأمان وسرعة في خطوات بسيطة.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



        <a href="contact.php" class="button button-full text-center text-end mt-6 footer-stick">
            <div class="container">
                هل تحتاج لمســـاعدة ؟ <strong>تواصل معنا</strong> <i class="fa-solid fa-caret-right"
                    style="top:4px;"></i>
            </div>
        </a>

    </div>
</section><!-- #content end -->





<?php
include 'footer.php';
?>
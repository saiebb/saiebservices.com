<?php
include 'header.php';
include "action/about_by_id.php";
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
                        <li class="breadcrumb-item active" aria-current="page">من نحن</li>
                    </ol>
                </nav>
                <h5>
                    <div class=" nocolor"> من نحن </div>
                </h5>
            </div>





        </div>
    </div>
</section><!-- .page-title end -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap pt-5">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-lg-7">
                    <div class="heading-block">
                        <h1>نبذة عن صـــيب</h1>
                    </div>
                    <p class="lead">
                        <?php echo $rows['ab_about'] ?>
                    </p>

                </div>

                <div class="col-lg-5 align-self-end">

                    <div class="position-relative overflow-hidden text-center ">
                        <img src="images/<?php echo $rows['ab_about_img'] ?>" class="about-img" height="400"
                            data-animate="fadeInUp" data-delay="100" alt="Chrome">

                    </div>

                </div>

            </div>
        </div>




    </div>


    <div class="content-wrap p-0">
        <div class="section m-0">
            <div class="container ">
                <div class="row align-items-center">
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 align-self-end">
                        <div class="heading-block">
                            <h1> الرؤية </h1>
                        </div>
                        <p class="lead">

                            <?php echo $rows['ab_vision'] ?>
                    </div>
                    <div class="col-lg-1"></div>

                    <div class="col-lg-5">
                        <div class="heading-block">
                            <h1> الرســالة </h1>
                        </div>
                        <p class="lead">

                            <?php echo $rows['ab_message'] ?>

                        </p>
                    </div>

                </div>
            </div>

        </div>


    </div>




    <div class="container">

        <div class="heading-block mt-6 text-center">
            <h2> القيم </h2>

        </div>

        <div class="row align-items-center col-mb-50 mb-4">
            <div class="col-lg-4 col-md-6">

                <div class="feature-box flex-md-row-reverse text-md-end" data-animate="fadeIn">
                    <div class="fbox-icon">
                        <a href="#"> <i class="bi bi-exclude"></i> </a>
                    </div>
                    <div class="fbox-content">
                        <h3> اﻻﻟﺘــــﺰام</h3>
                        <p> <?php echo $rows['ab_value_1'] ?> </p>
                    </div>
                </div>

                <div class="feature-box flex-md-row-reverse text-md-end mt-5" data-animate="fadeIn" data-delay="200">
                    <div class="fbox-icon">
                        <a href="#"> <i class="bi bi-file-ruled-fill"></i> </a>
                    </div>
                    <div class="fbox-content">
                        <h3> اﻟﻄﻤـــﻮح </h3>
                        <p> <?php echo $rows['ab_value_3'] ?> </p>
                    </div>
                </div>



            </div>

            <div class="col-lg-4 d-md-none d-lg-block text-center">
                <img src="images/library.png" alt="about" class="about-img">
            </div>

            <div class="col-lg-4 col-md-6">

                <div class="feature-box" data-animate="fadeIn">
                    <div class="fbox-icon">
                        <a href="#"><i class="bi bi-hand-thumbs-up"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3> اﻻﺑﺘـــــﻜﺎر </h3>
                        <p> <?php echo $rows['ab_value_2'] ?> </p>
                    </div>
                </div>

                <div class="feature-box mt-5" data-animate="fadeIn" data-delay="200">
                    <div class="fbox-icon">
                        <a href="#"><i class="bi-check-lg"></i></a>
                    </div>
                    <div class="fbox-content">
                        <h3> اﻟﺪﻗـــــﺔ </h3>
                        <p> <?php echo $rows['ab_value_4'] ?> </p>
                    </div>
                </div>


            </div>
        </div>

    </div>






    <div class="section m-0">
        <div class=" container ">
            <div class="heading-block mt-6 text-center">
                <h2> ﻟﻤﺎذا ﻧﺤﻦ </h2>

            </div>
            <div class="row col-mb-50">
                <div class="col-sm-6 col-lg-6">
                    <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn">
                        <div class="fbox-icon">
                            <a href="#"> <i class="bi bi-people-fill"></i> </a>
                        </div>
                        <div class="fbox-content">
                            <h3> ﺧﺒﺮة وﻛﻔﺎءة اﻟﻔﺮﻳﻖ </h3>
                            <p> <?php echo $rows['ab_why_1'] ?> </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="200">
                        <div class="fbox-icon">
                            <a href="#"> <i class="bi bi-hand-index-fill"></i> </a>
                        </div>
                        <div class="fbox-content">
                            <h3> اﻻﺳﺘﺮاﺗﻴﺠﻴﺔ اﻟﺸﺎﻣﻠﺔ </h3>
                            <p> <?php echo $rows['ab_why_2'] ?> </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="400">
                        <div class="fbox-icon">
                            <a href="#"><i class="bi bi-exclude"></i></a>
                        </div>
                        <div class="fbox-content">
                            <h3> اﻻﻟﺘـــــــﺰام</h3>
                            <p> <?php echo $rows['ab_why_3'] ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-6">
                    <div class="feature-box fbox-sm fbox-plain" data-animate="fadeIn" data-delay="600">
                        <div class="fbox-icon">
                            <a href="#"> <i class="bi bi-magic"></i> </a>
                        </div>
                        <div class="fbox-content">
                            <h3> اﻟﻘﻴﻤﺔ اﻟﺘﻨﺎﻓﺴﻴﺔ </h3>
                            <p> <?php echo $rows['ab_why_4'] ?> </p>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>


</section><!-- #content end -->
<?php
include 'footer.php';
?>
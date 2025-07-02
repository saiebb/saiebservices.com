<?php
include 'header.php';
include "action/news_list_buiness.php";
include "action/news_list_training.php";
?>
<!-- Page Title
		============================================= -->
<section class="page-title bg-transparent border-1">
    <div class="container">
        <div class="page-title-row pt-3 pb-3">

            <div class="page-title-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.php">الرئيســـية</a>
                        </li>
                        <li class="breadcrumb-item active">الانجازات</li>
                    </ol>
                </nav>
                <h5>
                    <div class="nocolor">الانجازات</div>
                </h5>
            </div>


        </div>
    </div>
</section>
<!-- .page-title end -->
<div id="wrapper">

    <!-- Content
		============================================= -->
    <section id="content">
        <div class="content-wrap">

            <div class="container">

                <div class="row justify-content-between">
                    <div class="col-lg-3 mb-5 mb-lg-0">
                        <div class="nav nav-pills flex-column" id="side-tab" role="tablist" aria-orientation="vertical">
                       
                       <!-- 1 -->
                        <a class="nav-link
                             <?php
if (isset($_GET['tab'])) {
    if ($_GET['tab'] == 1) {
        echo 'active';
    }

} else {
    echo 'active';
}?>" id="side-tab-1-tab" data-bs-toggle="tab" href="#side-tab-1" role="tab" aria-controls="side-tab-1"
                                aria-selected="true">
                                <h3>خدمات الاعمال</h3>
                            </a>



                            <!-- 2 -->
                            <a class="nav-link <?php
if (isset($_GET['tab'])) {
    if ($_GET['tab'] == 2) {
        echo 'active';
    }

}?> " id="side-tab-2-tab" data-bs-toggle="tab" href="#side-tab-2" role="tab" aria-controls="side-tab-2"
                                aria-selected="false">
                                <h3>التدريب</h3>
                            </a>


<!-- 3 -->
                            <a class="nav-link   <?php
if (isset($_GET['tab'])) {
    if ($_GET['tab'] == 3) {
        echo 'active';
    }

}?>" id="side-tab-3-tab" data-bs-toggle="tab" href="#side-tab-3" role="tab" aria-controls="side-tab-3"
                                aria-selected="false">

                                <h3 class="mb-0">خدمات افراد ومنشــآت</h3>
                            </a>

<!-- 4 -->
                            <a class="nav-link   <?php
if (isset($_GET['tab'])) {
    if ($_GET['tab'] == 3) {
        echo 'active';
    }

}?>" id="side-tab-4-tab" data-bs-toggle="tab" href="#side-tab-4" role="tab" aria-controls="side-tab-4"
                                aria-selected="false">

                                <h3 class="mb-0"> استشــارات مالية </h3>
                            </a>


                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="tab-content" id="side-tab-tabContent">

                            <!-- Tab Pane 1 -->
                            <div class="tab-pane fade <?php
if (isset($_GET['tab'])) {
    if ($_GET['tab'] == 1) {
        echo 'show active';
    }

} else {
    echo 'show active';
}?> " id="side-tab-1" role="tabpanel" aria-labelledby="side-tab-1-tab">
                           
                          <?php include('blog2-business.php'); ?>

                          
                            </div>

                            <!-- Tab Pane 2 -->
                            <div class="tab-pane fade <?php
if (isset($_GET['tab'])) {
    if ($_GET['tab'] == 2) {
        echo 'show active';
    }

}?> " id="side-tab-2" role="tabpanel" aria-labelledby="side-tab-2-tab">
                               
                               
                               <?php include('blog2-training.php'); ?>


                            </div>

                            <!-- Tab Pane 3 -->
                            <div class="tab-pane fade <?php
                                            if (isset($_GET['tab'])) {
                                                if ($_GET['tab'] == 3) {
                                                    echo 'show active';
                                                }

                                            }?>" id="side-tab-3" role="tabpanel" aria-labelledby="side-tab-3-tab">
                                            cccccccccccccc
                            </div>


                              <!-- Tab Pane 4 -->
                              <div class="tab-pane fade <?php
                                            if (isset($_GET['tab'])) {
                                                if ($_GET['tab'] == 3) {
                                                    echo 'show active';
                                                }

                                            }?>" id="side-tab-4" role="tabpanel" aria-labelledby="side-tab-4-tab">
                                            dddd
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- #content end -->


</div><!-- #wrapper end -->
<!-- Content
		============================================= -->

<!-- #content end -->
<?php
include 'footer.php';
?>
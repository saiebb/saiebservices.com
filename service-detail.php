<?php
include 'header.php';
include 'action/service_item.php';
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
                        <li class="breadcrumb-item">
                            <?php
if($rows['ar_type'] == 1 ){
?>
                            <a href="training.php">التدريب</a>
                            <?php
}
?>



                            <?php
if($rows['ar_type'] == 2 ){
?>
                            <a href="service-business.php">خدمات الاعمال</a>
                            <?php
}
?>


                            <?php
if($rows['ar_type'] == 3 ){
?>
                            <a href="service-business.php"> خدمات افراد ومنشآت </a>
                            <?php
}
?>


                            <?php
if($rows['ar_type'] == 6 ){
?>
                            <a href="financial.php"> الاستشـــارات المالية </a>
                            <?php
}
?>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $rows['ar_title'] ; ?></li>
                    </ol>
                </nav>

                <h5>
                    <div class=" nocolor"> <?php echo $rows['ar_title'] ?> 
                        
                    </div>
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

            <div class="single-post mb-0">

                <!-- Single Post
						============================================= -->
                <div class="entry">

                    <!-- Entry Title
							============================================= -->
                    <div class="entry-title ">
                        <div class="serv-title-flex">
                            <div>
                                <h2><?php echo $rows['ar_title'] ?></h2>
                            </div>

                            <div> <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"
                                    class="button button-rounded button-reveal button-large width96  tleft"
                                    data-service-id="<?php echo $rows['ar_id']; ?>"
                                    data-service-type="<?php echo $rows['ar_type']; ?>"><span>
                                        احصــل على الخدمة</span><i class="uil uil-money-bill "></i></a></div>
                        </div>

                    </div><!-- .entry-title end -->


                    <!-- Entry Image
							============================================= -->
                    <div class="entry-image mb-5">

                        <?php if(  $rows['ar_image'] != '' ){
								?>

                        <img src="images/<?php echo $rows['ar_image']; ?>" class="blog-img">
                        <?php
							} ?>


                        <?php if(  $rows['ar_image'] == '' ){
								?>

                        <img src="images/library.png" class="blog-img">
                        <?php
							} ?>
                    </div><!-- .entry-image end -->

                    <!-- Entry Content
							============================================= -->
                    <div class="entry-content mt-0">
                        <?php echo $rows['ar_text'] ?>


                        <div class="col-lg-4" style="margin: 0 auto;">


                            <a href="#" data-bs-toggle="modal" data-bs-target=".bs-example-modal-lg"
                                class="button button-rounded button-reveal button-large width96 tleft"
                                data-service-id="<?php echo $rows['ar_id']; ?>"
                                data-service-type="<?php echo $rows['ar_type']; ?>"><span>احصــل على الخدمة</span><i
                                    class="uil uil-money-bill"></i></a>
                        </div>
                    </div>





                </div><!-- .entry end -->


            </div>

        </div>
    </div>
</section><!-- #content end -->
<script src="saiebadmin25/plugins/jquery/jquery.min.js"></script>
<?php
include 'footer.php';
?>
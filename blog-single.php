<?php
include 'header.php';
include 'action/news_item.php';
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
                        <li class="breadcrumb-item"><a href="blog.php">الانجازات</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $rows['ar_title'] ?></li>
                    </ol>
                </nav>
                <h5>
                    <div class=" nocolor"> <?php echo $rows['ar_title'] ?> </div>
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
                    <div class="entry-title">
                        <h2><?php echo $rows['ar_title'] ?></h2>
                    </div><!-- .entry-title end -->

                    <!-- Entry Meta
							============================================= -->
                    <div class="entry-meta">
                        <ul>
                            <li><i class="uil uil-schedule"></i> <?php echo $rows['ar_date'] ?> </li>

                        </ul>
                    </div><!-- .entry-meta end -->

                    <!-- Entry Image
							============================================= -->
                    <div class="entry-image mb-5">
                        <a href="#"><img src="images/<?php echo $rows['ar_image'] ?>" class="blog-img" alt="Blog Single"
                                width="500px"></a>
                    </div><!-- .entry-image end -->

                    <!-- Entry Content
							============================================= -->
                    <div class="entry-content mt-0">
                        <?php echo $rows['ar_text'] ?>



                    </div>
                </div><!-- .entry end -->


            </div>

        </div>
    </div>
</section><!-- #content end -->
<?php
include 'footer.php';
?>
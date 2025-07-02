<?php
include 'header.php';
include "action/library_detail.php";
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
                        <li class="breadcrumb-item " aria-current="page"> <a href="library_cat.php"> مكتبة صــــيب </a>
                        </li>
                        <li class="breadcrumb-item active"><?php echo $rowName["lib_cat_name"]; ?></li>
                    </ol>
                </nav>
                <h5>
                    <div class=" nocolor"> مكتبة صــــيب </div>
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

            <!-- Posts
					============================================= -->
            <div id="posts" class="post-grid row gutter-30">




                <?php
while ($rows= $result->fetch_assoc()) {
    ?>



                <div class="entry col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="grid-inner">
                        <div class="entry-image">
                            <img src="images/library.png">
                        </div>


                        <a href="library/<?php echo $rows["lib_file"]; ?>"
                            class="button button-rounded button-reveal button-large width96  tleft"><span>
                                تحميل</span><i class="uil uil-file-download"></i></a>
                        <div class="entry-title text-center ">
                            <h2> <?php echo $rows["lib_title"]; ?> </h2>
                        </div>
                    </div>
                </div>


                <?php
}
?>









            </div><!-- #posts end -->

            <ul class="pagination mt-5 pagination-circle justify-content-center">
                <?php
    // Previous page link
    if ($page > 1) {
        echo '<li class="page-item"><a class="page-link" href="library_cat.php?page=' . ($page - 1) . '"><i class="uil uil-angle-right-b"></i></a></li>';
    } else {
        echo '<li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-right-b"></i></a></li>';
    }

    // Page number links
    for ($i = 1; $i <= $totalPages; $i++) {
        if ($i == $page) {
            echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
        } else {
            echo '<li class="page-item"><a class="page-link" href="library_cat.php?page=' . $i . '">' . $i . '</a></li>';
        }
    }

    // Next page link
    if ($page < $totalPages) {
        echo '<li class="page-item"><a class="page-link" href="library_cat.php?page=' . ($page + 1) . '"><i class="uil uil-angle-left-b"></i></a></li>';
    } else {
        echo '<li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-left-b"></i></a></li>';
    }
    ?>
            </ul>

        </div>
    </div>
</section><!-- #content end -->
<?php
include 'footer.php';
?>
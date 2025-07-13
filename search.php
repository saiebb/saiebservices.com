<?php
include 'header.php';
include 'action/search.php';

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


                        <li class="breadcrumb-item active" aria-current="page"> البحث
                        </li>
                    </ol>
                </nav>
                <h5>
                    <div class=" nocolor"> البحـــث عن : <?php echo $_GET['q']; ?> </div>
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

            <form action="search.php" method="get">
                <div class="row ">
                    <div class="col-lg-8 col-sm-12 mb-3">
                        <input type="text" name="q" class="form-control" placeholder="بحـــث" value="<?php echo $_GET['q']; ?>">
                    </div>
                    <div class="col-lg-4 col-sm-12 ">
                        <button class="btn btn-dark">بحـــث</button>
                    </div>
                </div>
            </form>




            <div class="row ">




                <div class=" col-lg-12">
                    <div class="row ">


                        <?php
while ($rowscIndividual = $resultIndividual->fetch_assoc()) {
    ?>




                        <div class="entry col-lg-3 col-md-6 mt-3">
                            <div class="grid-inner shadow-sm card rounded-5">
                                <?php

    if ($rowscIndividual['ar_type'] == 4) {
        ?>
                                <a href="<?php echo getBlogUrl($rowscIndividual['ar_id'], $rowscIndividual['ar_title']); ?>">
                                    <img src="images/<?php echo $rowscIndividual['ar_image']; ?>" alt="Image"
                                        class="card-img-top img-fluid">
                                </a>
                                <?php
} else {
        ?>
                                <a href="<?php echo getServiceUrl($rowscIndividual['ar_id'], $rowscIndividual['ar_title'], $rowscIndividual['ar_type']); ?>">
                                    <img src="images/<?php echo $rowscIndividual['ar_image']; ?>" alt="Image"
                                        class="card-img-top img-fluid">
                                </a>
                                <?php
}
    ?>

                                <div class="p-3">

                                    <div class="entry-meta">
                                        <ul>
                                            <li>


                                                <?php
switch ($rowscIndividual['ar_type']) {
        case '1':
            echo "تدريب";
            break;
        case '2':
            echo "خدمات اعمال";
            break;

        case '3':
            echo " خدمات افراد ومنشآت ";
            break;

        case '4':
            echo " انجازات   ";
            break;

        case '6':
            echo " استشارات مالية   ";
            break;
        default:
            # code...
            break;
    }
    ?>

                                            </li>

                                        </ul>
                                    </div>
                                    <div class="entry-title">

                                        <h3 class=" blog3-title">


                                            <?php

    if ($rowscIndividual['ar_type'] == 4) {
        ?>
                                            <a href="<?php echo getBlogUrl($rowscIndividual['ar_id'], $rowscIndividual['ar_title']); ?>"
                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                title="<?php echo $rowscIndividual['ar_title']; ?>">
                                                <?php
} else {
        ?>
                                                <a href="<?php echo getServiceUrl($rowscIndividual['ar_id'], $rowscIndividual['ar_title'], $rowscIndividual['ar_type']); ?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="<?php echo $rowscIndividual['ar_title']; ?>">
                                                    <?php
}
    ?>




                                                    <?php
$text = strip_tags($rowscIndividual['ar_title']);
    $words = explode(' ', $text);
    $firstTwentyWords = array_slice($words, 0, 6);
    $shortenedText = implode(' ', $firstTwentyWords);
    echo $shortenedText;
    if (count($firstTwentyWords) > 7) {
        echo " ...";
    }

    ?>
                                                </a>
                                        </h3>
                                    </div>
                                    <div class="entry-content blog3-content">
                                        <p class="mb-0">
                                            <?php
$text = strip_tags($rowscIndividual['ar_text']);
    $words = explode(' ', $text);
    $firstTwentyWords = array_slice($words, 0, 10);
    $shortenedText = implode(' ', $firstTwentyWords);
    echo $shortenedText . " ...";
    ?>
                                        </p>
                                    </div>
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




        <!-- Pagination
					============================================= -->
        <ul class="pagination mt-5 pagination-circle justify-content-center">
            <?php
$catParam = isset($_GET['cat']) ? '&cat=' . $_GET['cat'] : '';
$basePageUrl = BASE_URL . '/search';
if ($currentPage > 1): ?>
            <li class="page-item"><a class="page-link"
                    href="<?php echo $basePageUrl; ?>?q=<?php echo $_GET['q']; ?>&page=<?php echo $currentPage - 1 . $catParam; ?>"><i
                        class="uil uil-angle-right-b"></i></a></li>
            <?php else: ?>
            <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-right-b"></i></a></li>
            <?php endif;?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php if ($i == $currentPage) {
    echo 'active';
}
?>"><a class="page-link" href="<?php echo $basePageUrl; ?>?q=<?php echo $_GET['q']; ?>&page=<?php echo $i . $catParam; ?>"><?php echo $i; ?></a>
            </li>
            <?php endfor;?>

            <?php if ($currentPage < $totalPages): ?>
            <li class="page-item"><a class="page-link"
                    href="<?php echo $basePageUrl; ?>?q=<?php echo $_GET['q']; ?>&page=<?php echo $currentPage + 1 . $catParam; ?>"><i
                        class="uil uil-angle-left-b"></i></a></li>
            <?php else: ?>
            <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-left-b"></i></a></li>
            <?php endif;?>
        </ul>


        <a href="contact.php" class="button button-full text-center text-end mt-6 footer-stick">
            <div class="container">
                هل تحتاج لمســـاعدة ؟ <strong>تواصل معنا</strong> <i class="fa-solid fa-caret-left"
                    style="top:4px;"></i>
            </div>
        </a>

    </div>
</section>

<!-- #content end -->

<?php
include 'footer.php';
?>
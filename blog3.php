<?php
include 'header.php';
include 'action/news_list2.php';

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

                        <li class="breadcrumb-item active" aria-current="page"> انجــازتنا
                        </li>
                    </ol>
                </nav>
                <h5>
                    <div class=" nocolor">  انجــازتنا   </div>
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

            <div class="row ">


                <div class=" col-lg-3">

                    <ul class="list-group list-group-flush">


                        <li class="list-group-item  <?php if (isset($_GET['cat'])) {if ($_GET['cat'] == 2) {echo "active-sidebar";}}?>">
                            <a href="blog3.php?cat=2">خدمات الاعمــال</a>
                        </li>

                        <li class="list-group-item  <?php if (isset($_GET['cat'])) {if ($_GET['cat'] == 1) {echo "active-sidebar";}}?> ">
                            <a href="blog3.php?cat=1" > التدريب </a>
                        </li>


                    </ul>
                </div>

                <div class=" col-lg-9">
                    <div class="row col-mb-50">


                        <?php
while ($rowscIndividual = $resultIndividual->fetch_assoc()) {
    ?>




<div class="entry col-lg-4 col-md-6">
							<div class="grid-inner shadow-sm card rounded-5">
                            <a href="<?php echo getBlogUrl($rowscIndividual['ar_id'], $rowscIndividual['ar_title']); ?>">
									<img src="images/<?php echo $rowscIndividual['ar_image']; ?>" alt="Image" class="card-img-top img-fluid">
								</a>
								<div class="p-3">

									<div class="entry-meta">
										<ul>
											<li><i class="uil uil-schedule"></i> <?php echo $rowscIndividual['ar_date']; ?> </li>

										</ul>
									</div>
                                    <div class="entry-title">

										<h3 class=" blog3-title"><a href="<?php echo getBlogUrl($rowscIndividual['ar_id'], $rowscIndividual['ar_title']); ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $rowscIndividual['ar_title']; ?>" >
                                        <?php echo truncate_words($rowscIndividual['ar_title'], 8); ?>
                                    </a></h3>
									</div>
									<div class="entry-content blog3-content">
										<p class="mb-0">
                                        <?php echo truncate_words($rowscIndividual['ar_text'], 13); ?>
                                        </p>
									</div>
								</div>
							</div>
						</div>


<!--
                        <div class="col-lg-4 col-md-6 col-sm-12">
                            <div class="feature-box media-box">
                                <div class="fbox-media">
                                    <?php if ($rowscIndividual['ar_image'] != '') {
        ?>

                                    <img src="images/<?php echo $rowscIndividual['ar_image']; ?>"
                                        class="indv-img-business img-fluid">
                                    <?php
}?>


                                    <?php if ($rowscIndividual['ar_image'] == '') {
        ?>

                                    <img src="images/default.jpg" class="indv-img-business img-fluid">
                                    <?php
}?>


                                </div>
                                <div class="fbox-content px-0">
                                    <h3 class="training-list-title"> <?php echo $rowscIndividual['ar_title']; ?> </h3>
                                    <p class="training-list-text"><?php
$text = strip_tags($rowscIndividual['ar_text']);
    $words = explode(' ', $text);
    $firstTwentyWords = array_slice($words, 0, 9);
    $shortenedText = implode(' ', $firstTwentyWords);
    echo $shortenedText . " ...";
    ?> </p>
                                </div>
                                <a href="service-detail.php?id=<?php echo $rowscIndividual['ar_id']; ?>"
                                    class="button button-rounded button-reveal button-large width96  tleft"><span>
                                        اشــترك الآن</span><i class="uil uil-money-bill "></i></a>
                            </div>
                        </div> -->

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
$basePageUrl = BASE_URL . '/blog3.php';
if ($currentPage > 1): ?>
            <li class="page-item"><a class="page-link" href="<?php echo $basePageUrl; ?>?page=<?php echo $currentPage - 1 . $catParam; ?>"><i
                        class="uil uil-angle-right-b"></i></a></li>
            <?php else: ?>
            <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-right-b"></i></a></li>
            <?php endif;?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php if ($i == $currentPage) {
    echo 'active';
}
?>"><a class="page-link"
                    href="<?php echo $basePageUrl; ?>?page=<?php echo $i . $catParam; ?>"><?php echo $i; ?></a></li>
            <?php endfor;?>

            <?php if ($currentPage < $totalPages): ?>
            <li class="page-item"><a class="page-link" href="<?php echo $basePageUrl; ?>?page=<?php echo $currentPage + 1 . $catParam; ?>"><i
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
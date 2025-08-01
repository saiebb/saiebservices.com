<?php
include "action/news_list.php";
include "action/news_list_training.php";
include "action/seo_url.php";
?>

<!-- Posts
					============================================= -->
<div id="posts" class="row gutter-40">


    <?php
    while ($rows1 = $reult1->fetch_assoc()) {
    ?>
    <div class=" col-12">
        <div class="grid-inner row g-0">
            <div class="col-md-4">
                <div class="entry-image">
                    <a href="<?php echo getBlogUrl($rows1["ar_id"], $rows1["ar_title"], $rows1["ar_slug"]); ?>">
                        <img src="images/<?php echo $rows1["ar_image"]; ?>" class="news-list-img"
                            alt="Standard Post with Image" />
                    </a>
                </div>
            </div>
            <div class="col-md-8 ps-md-4">
                <div class="entry-title title-sm">
                    <h2>
                        <a href="<?php echo getBlogUrl($rows1["ar_id"], $rows1["ar_title"], $rows1["ar_slug"]); ?>">
                            <?php echo $rows1["ar_title"]; ?>

                        </a>
                    </h2>
                </div>
                <div class="entry-meta">
                    <ul>
                        <li><i class="uil uil-schedule"></i> <?php echo $rows1["ar_date"]; ?></li>
                    </ul>
                </div>
                <div class="">
                    <a href="<?php echo getBlogUrl($rows1["ar_id"], $rows1["ar_title"], $rows1["ar_slug"]); ?>">
                        <p class="individual-list-text"><?php
    $text = strip_tags($rows1['ar_text']);
    $words = explode(' ', $text);
    $firstTwentyWords = array_slice($words, 0, 40);
    $shortenedText = implode(' ', $firstTwentyWords);
    echo $shortenedText . " ...";
    ?> </p>
                    </a>
                    <a href="<?php echo getBlogUrl($rows1["ar_id"], $rows1["ar_title"]); ?>" class="more-link"> المزيد</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

</div>



<!-- Pagination
    ============================================= -->
<ul class="pagination mt-5 pagination-circle justify-content-center">
    <?php if ($page1 > 1): ?>
    <li class="page-item"><a class="page-link" href="?tab=2&page=<?php echo $page1 - 1; ?>"><i
                class="uil uil-angle-right-b"></i></a></li>
    <?php else: ?>
    <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-right-b"></i></a>
    </li>
    <?php endif;?>

    <?php for ($i = 1; $i <= $totalPages1; $i++): ?>
    <li class="page-item <?php if ($i == $page1) {
    echo 'active';
}
?>"><a class="page-link" href="?tab=2&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
    <?php endfor;?>

    <?php if ($page1 < $totalPages1): ?>
    <li class="page-item"><a class="page-link" href="?tab=2&page=<?php echo $page1 + 1; ?>"><i
                class="uil uil-angle-left-b"></i></a></li>
    <?php else: ?>
    <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-left-b"></i></a>
    </li>
    <?php endif;?>
</ul>
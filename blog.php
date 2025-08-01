<?php
// إضافة وسوم meta للـ SEO
$pageTitle = "أحدث إنجازاتنا وأخبارنا | صيب لخدمات الاعمال";
$pageDescription = "تعرف على أحدث إنجازات وأخبار صيب لخدمات الاعمال. نقدم لك آخر المستجدات والأخبار عن خدماتنا وإنجازاتنا.";
$pageKeywords = "صيب, خدمات الاعمال, إنجازات, أخبار, مدونة";
$canonicalUrl = "https://saiebservices.com/blog";

include 'header.php';
include "action/news_list.php";
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

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">
            <!-- Posts
					============================================= -->
            <div id="posts" class="row gutter-40">


                <?php
                    while ($rows = $reult->fetch_assoc()) {
                        ?>
                <div class=" col-12">
                    <div class="grid-inner row g-0">
                        <div class="col-md-4">
                            <div class="entry-image">
                                <a href="<?php echo getBlogUrl($rows["ar_id"], $rows["ar_title"], $rows['ar_slug']); ?>">
                                    <img src="images/<?php echo $rows["ar_image"]; ?>" class="news-list-img"
                                        alt="<?php echo $rows["ar_title"]; ?>" />
                                </a>
                            </div>
                        </div>
                        <div class="col-md-8 ps-md-4">
                            <div class="entry-title title-sm">
                                <h2>
                                    <a href="<?php echo getBlogUrl($rows["ar_id"], $rows["ar_title"], $rows['ar_slug']); ?>">
                                        <?php echo $rows["ar_title"]; ?>
                                    </a>
                                </h2>
                            </div>
                            <div class="entry-meta">
                                <ul>
                                    <li><i class="uil uil-schedule"></i> <?php echo $rows["ar_date"]; ?></li>
                                </ul>
                            </div>
                            <div class="">
                                <a href="<?php echo getBlogUrl($rows["ar_id"], $rows["ar_title"], $rows['ar_slug']); ?>">
                                    <p class="individual-list-text"><?php echo truncate_words($rows['ar_text'], 40); ?> </p>
                                </a>
                                <a href="<?php echo getBlogUrl($rows["ar_id"], $rows["ar_title"], $rows['ar_slug']); ?>" class="more-link"> المزيد</a>
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
                <?php 
                $basePageUrl = BASE_URL . '/blog';
                if ($page > 1): ?>
                <li class="page-item"><a class="page-link" href="<?php echo $basePageUrl; ?>?page=<?php echo $page - 1; ?>"><i
                            class="uil uil-angle-right-b"></i></a></li>
                <?php else: ?>
                <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-right-b"></i></a>
                </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link"
                        href="<?php echo $basePageUrl; ?>?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                <li class="page-item"><a class="page-link" href="<?php echo $basePageUrl; ?>?page=<?php echo $page + 1; ?>"><i
                            class="uil uil-angle-left-b"></i></a></li>
                <?php else: ?>
                <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-left-b"></i></a>
                </li>
                <?php endif; ?>
            </ul>


        </div>
    </div>
</section>
<!-- #content end -->
<?php
include 'footer.php';
?>
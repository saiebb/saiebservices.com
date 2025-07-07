<?php
include 'header.php';
?>

<section class="page-title bg-transparent border-1">
    <div class="container">
        <div class="page-title-row pt-3 pb-3">
            <div class="page-title-content">
                <h5>
                    <div class="nocolor">اختبار الروابط الجديدة</div>
                </h5>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>روابط الصفحات الثابتة</h2>
                    <ul class="list-group mb-5">
                        <li class="list-group-item"><a href="<?php echo getStaticPageUrl('home'); ?>">الصفحة الرئيسية</a></li>
                        <li class="list-group-item"><a href="<?php echo getStaticPageUrl('about'); ?>">من نحن</a></li>
                        <li class="list-group-item"><a href="<?php echo getStaticPageUrl('contact'); ?>">اتصل بنا</a></li>
                        <li class="list-group-item"><a href="<?php echo getStaticPageUrl('training'); ?>">التدريب</a></li>
                        <li class="list-group-item"><a href="<?php echo getStaticPageUrl('business'); ?>">خدمات الأعمال</a></li>
                        <li class="list-group-item"><a href="<?php echo getStaticPageUrl('individual'); ?>">خدمات الأفراد</a></li>
                        <li class="list-group-item"><a href="<?php echo getStaticPageUrl('financial'); ?>">الاستشارات المالية</a></li>
                        <li class="list-group-item"><a href="<?php echo getStaticPageUrl('blog'); ?>">المدونة</a></li>
                    </ul>
                    
                    <h2>روابط المقالات</h2>
                    <ul class="list-group mb-5">
                        <?php
                        // استعلام للحصول على بعض المقالات
                        include 'action/db.php';
                        $tableName = $prefix . "articles";
                        $sql = "SELECT ar_id, ar_title FROM $tableName WHERE ar_type = 4 AND ar_status <> 3 LIMIT 5";
                        $result = $conn->query($sql);
                        
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<li class="list-group-item">';
                                echo '<a href="' . getBlogUrl($row['ar_id'], $row['ar_title']) . '">' . $row['ar_title'] . '</a>';
                                echo ' - <small>الرابط القديم: <a href="blog-single.php?id=' . $row['ar_id'] . '">blog-single.php?id=' . $row['ar_id'] . '</a></small>';
                                echo '</li>';
                            }
                        } else {
                            echo '<li class="list-group-item">لا توجد مقالات</li>';
                        }
                        ?>
                    </ul>
                    
                    <h2>روابط الخدمات</h2>
                    <ul class="list-group mb-5">
                        <?php
                        // استعلام للحصول على بعض الخدمات
                        $sql = "SELECT ar_id, ar_title, ar_type FROM $tableName WHERE ar_type IN (1, 2, 3, 4, 6) AND ar_status <> 3 LIMIT 10";
                        $result = $conn->query($sql);
                        
                        if ($result && $result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<li class="list-group-item">';
                                echo '<a href="' . getServiceUrl($row['ar_id'], $row['ar_title'], $row['ar_type']) . '">' . $row['ar_title'] . '</a>';
                                echo ' - <small>الرابط القديم: <a href="service-detail.php?id=' . $row['ar_id'] . '&type=' . $row['ar_type'] . '">service-detail.php?id=' . $row['ar_id'] . '&type=' . $row['ar_type'] . '</a></small>';
                                echo '</li>';
                            }
                        } else {
                            echo '<li class="list-group-item">لا توجد خدمات</li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
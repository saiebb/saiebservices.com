<?php
include 'header.php';
?>

<section class="page-title bg-transparent border-1">
    <div class="container">
        <div class="page-title-row pt-3 pb-3">
            <div class="page-title-content">
                <h5>
                    <div class="nocolor">اختبار المسار الأساسي</div>
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
                    <div class="card p-4 mb-5">
                        <h2>معلومات المسار الأساسي</h2>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>المسار الأساسي (BASE_URL)</th>
                                    <td><code><?php echo BASE_URL; ?></code></td>
                                </tr>
                                <tr>
                                    <th>مسار الأصول (ASSETS_URL)</th>
                                    <td><code><?php echo ASSETS_URL; ?></code></td>
                                </tr>
                                <tr>
                                    <th>المسار الحالي (REQUEST_URI)</th>
                                    <td><code><?php echo $_SERVER['REQUEST_URI']; ?></code></td>
                                </tr>
                                <tr>
                                    <th>اسم المضيف (HTTP_HOST)</th>
                                    <td><code><?php echo $_SERVER['HTTP_HOST']; ?></code></td>
                                </tr>
                                <tr>
                                    <th>بروتوكول الموقع</th>
                                    <td><code><?php echo isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http'; ?></code></td>
                                </tr>
                                <tr>
                                    <th>اسم السكريبت (SCRIPT_NAME)</th>
                                    <td><code><?php echo $_SERVER['SCRIPT_NAME']; ?></code></td>
                                </tr>
                                <tr>
                                    <th>مجلد السكريبت</th>
                                    <td><code><?php echo dirname($_SERVER['SCRIPT_NAME']); ?></code></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    
                    <div class="card p-4 mb-5">
                        <h2>اختبار تحميل الملفات</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>ملفات CSS</h4>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="<?php echo ASSETS_URL; ?>/style-rtl.css" target="_blank">style-rtl.css</a>
                                        <span class="badge bg-<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/style-rtl.css') ? 'success' : 'danger'; ?> float-end">
                                            <?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/style-rtl.css') ? 'موجود' : 'غير موجود'; ?>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?php echo ASSETS_URL; ?>/css/font-icons.css" target="_blank">css/font-icons.css</a>
                                        <span class="badge bg-<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/css/font-icons.css') ? 'success' : 'danger'; ?> float-end">
                                            <?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/css/font-icons.css') ? 'موجود' : 'غير موجود'; ?>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?php echo ASSETS_URL; ?>/css/custom.css" target="_blank">css/custom.css</a>
                                        <span class="badge bg-<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/css/custom.css') ? 'success' : 'danger'; ?> float-end">
                                            <?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/css/custom.css') ? 'موجود' : 'غير موجود'; ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>ملفات JavaScript</h4>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="<?php echo ASSETS_URL; ?>/js/plugins.min.js" target="_blank">js/plugins.min.js</a>
                                        <span class="badge bg-<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/js/plugins.min.js') ? 'success' : 'danger'; ?> float-end">
                                            <?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/js/plugins.min.js') ? 'موجود' : 'غير موجود'; ?>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?php echo ASSETS_URL; ?>/js/functions.bundle.js" target="_blank">js/functions.bundle.js</a>
                                        <span class="badge bg-<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/js/functions.bundle.js') ? 'success' : 'danger'; ?> float-end">
                                            <?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/js/functions.bundle.js') ? 'موجود' : 'غير موجود'; ?>
                                        </span>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?php echo ASSETS_URL; ?>/js/jquery.validate.js" target="_blank">js/jquery.validate.js</a>
                                        <span class="badge bg-<?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/js/jquery.validate.js') ? 'success' : 'danger'; ?> float-end">
                                            <?php echo file_exists($_SERVER['DOCUMENT_ROOT'] . '/js/jquery.validate.js') ? 'موجود' : 'غير موجود'; ?>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card p-4 mb-5">
                        <h2>اختبار الروابط</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <h4>روابط الصفحات الثابتة</h4>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="<?php echo getStaticPageUrl('home'); ?>">الصفحة الرئيسية</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?php echo getStaticPageUrl('about'); ?>">من نحن</a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="<?php echo getStaticPageUrl('contact'); ?>">اتصل بنا</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h4>روابط المقالات والخدمات</h4>
                                <ul class="list-group">
                                    <?php
                                    // استعلام للحصول على مقال
                                    include 'action/db.php';
                                    $tableName = $prefix . "articles";
                                    $sql = "SELECT ar_id, ar_title FROM $tableName WHERE ar_type = 4 AND ar_status <> 3 LIMIT 1";
                                    $result = $conn->query($sql);
                                    
                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        echo '<li class="list-group-item">';
                                        echo '<a href="' . getBlogUrl($row['ar_id'], $row['ar_title']) . '">' . $row['ar_title'] . '</a>';
                                        echo '</li>';
                                    }
                                    
                                    // استعلام للحصول على خدمة
                                    $sql = "SELECT ar_id, ar_title, ar_type FROM $tableName WHERE ar_type IN (1, 2, 3, 4) AND ar_status <> 3 LIMIT 1";
                                    $result = $conn->query($sql);
                                    
                                    if ($result && $result->num_rows > 0) {
                                        $row = $result->fetch_assoc();
                                        echo '<li class="list-group-item">';
                                        echo '<a href="' . getServiceUrl($row['ar_id'], $row['ar_title'], $row['ar_type']) . '">' . $row['ar_title'] . '</a>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include 'footer.php';
?>
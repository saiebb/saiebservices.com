<?php
/**
 * إصلاح مشكلة الروابط للتشغيل المحلي
 */

echo "<h2>🔗 إصلاح مشكلة الروابط</h2>";

// إنشاء ملف .htaccess مبسط للتشغيل المحلي
$htaccessContent = '# إعدادات مبسطة للتشغيل المحلي
DirectoryIndex index.php

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    
    # استثناء مجلد الإدارة
    RewriteRule ^saiebadmin25/ - [L]
    
    # روابط الخدمات المبسطة للتشغيل المحلي
    # خدمات الأفراد
    RewriteRule ^individual-services/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2&type=3 [L,QSA]
    
    # خدمات الأعمال
    RewriteRule ^business-services/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2&type=2 [L,QSA]
    
    # الخدمات المالية
    RewriteRule ^financial-services/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2&type=4 [L,QSA]
    
    # التدريب
    RewriteRule ^training-programs/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2&type=1 [L,QSA]
    
    # الخدمات العامة
    RewriteRule ^service/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2 [L,QSA]
    
    # المقالات
    RewriteRule ^blog/([a-zA-Z0-9_-]+)-([0-9]+)/?$ blog-single.php?id=$2 [L,QSA]
    
    # الصفحات الثابتة
    RewriteRule ^about-us/?$ about.php [L]
    RewriteRule ^contact-us/?$ contact.php [L]
    RewriteRule ^training-programs/?$ training.php [L,QSA]
    RewriteRule ^financial-services/?$ financial.php [L,QSA]
    RewriteRule ^business-services/?$ service-business.php [L,QSA]
    RewriteRule ^individual-services/?$ service-individual.php [L,QSA]
    RewriteRule ^blog/?$ blog.php [L,QSA]
    
    # إخفاء امتدادات PHP
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME}.php -f
    RewriteRule ^(.+?)/?$ $1.php [QSA,L]
</IfModule>

# صفحات الأخطاء
ErrorDocument 404 /404.php
ErrorDocument 500 /500.php';

// إنشاء نسخة احتياطية من .htaccess الحالي
if (file_exists('.htaccess')) {
    copy('.htaccess', '.htaccess.backup');
    echo "<p style='color: blue;'>📋 تم إنشاء نسخة احتياطية من .htaccess</p>";
}

// كتابة .htaccess الجديد
file_put_contents('.htaccess', $htaccessContent);
echo "<p style='color: green;'>✅ تم إنشاء .htaccess مبسط للتشغيل المحلي</p>";

// إنشاء بيانات تجريبية في قاعدة البيانات
echo "<h3>📊 إضافة بيانات تجريبية</h3>";

try {
    include 'config/database.php';
    
    // إدراج خدمة تجريبية برقم 138
    $sql = "INSERT IGNORE INTO sa_articles (ar_id, ar_title, ar_content, ar_type, ar_status, ar_slug) VALUES 
    (138, 'خدمة تأشيرات الزيارة والإنجاز', 'خدمة متخصصة في تأشيرات الزيارة وإنجاز المعاملات الحكومية', 3, 1, 'sdd-tashyrat-alzyara-anjaz')";
    
    if ($conn->query($sql)) {
        echo "<p style='color: green;'>✅ تم إضافة الخدمة التجريبية (ID: 138)</p>";
    } else {
        echo "<p style='color: orange;'>⚠️ الخدمة موجودة بالفعل أو حدث خطأ: " . $conn->error . "</p>";
    }
    
    // إضافة المزيد من البيانات التجريبية
    $moreSamples = [
        "INSERT IGNORE INTO sa_articles (ar_id, ar_title, ar_content, ar_type, ar_status, ar_slug) VALUES 
        (1, 'دورة إدارة المشاريع', 'دورة تدريبية شاملة في إدارة المشاريع', 1, 1, 'dwra-adara-almshary')",
        
        "INSERT IGNORE INTO sa_articles (ar_id, ar_title, ar_content, ar_type, ar_status, ar_slug) VALUES 
        (2, 'استشارات الأعمال', 'خدمات استشارية متخصصة للأعمال', 2, 1, 'astsharat-alaamal')",
        
        "INSERT IGNORE INTO sa_articles (ar_id, ar_title, ar_content, ar_type, ar_status, ar_slug) VALUES 
        (3, 'الاستشارات المالية', 'خدمات استشارية مالية متخصصة', 4, 1, 'alastsharat-almalya')"
    ];
    
    foreach ($moreSamples as $sql) {
        $conn->query($sql);
    }
    
    echo "<p style='color: green;'>✅ تم إضافة المزيد من البيانات التجريبية</p>";
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ خطأ في قاعدة البيانات: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<h3>🧪 اختبار الروابط</h3>";

$testUrls = [
    'http://localhost:8000/service-detail.php?id=138' => 'رابط مباشر',
    'http://localhost:8000/individual-services/sdd-tashyrat-alzyara-anjaz-138' => 'رابط SEO للأفراد',
    'http://localhost:8000/service-detail.php?id=1' => 'خدمة تجريبية 1',
    'http://localhost:8000/service-detail.php?id=2' => 'خدمة تجريبية 2'
];

echo "<ul>";
foreach ($testUrls as $url => $description) {
    echo "<li><a href='$url' target='_blank'>$description</a> - <code>$url</code></li>";
}
echo "</ul>";

echo "<div style='margin-top: 20px; padding: 15px; background-color: #e7f3ff; border: 1px solid #b3d9ff;'>";
echo "<h4>💡 ملاحظات مهمة:</h4>";
echo "<ul>";
echo "<li>تم تبسيط .htaccess للتشغيل المحلي</li>";
echo "<li>تم إنشاء نسخة احتياطية من الملف الأصلي</li>";
echo "<li>تم إضافة بيانات تجريبية لاختبار الروابط</li>";
echo "<li>الآن يمكنك اختبار الروابط أعلاه</li>";
echo "</ul>";
echo "</div>";
?>
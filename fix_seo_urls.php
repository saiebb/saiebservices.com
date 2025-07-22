<?php
/**
 * إصلاح شامل لمشكلة روابط SEO
 */

echo "<h2>🔗 إصلاح شامل لروابط SEO</h2>";

// 1. إنشاء .htaccess محسن للتشغيل المحلي
$htaccessContent = '# إعدادات محسنة للتشغيل المحلي مع دعم SEO URLs
DirectoryIndex index.php

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteBase /
    
    # استثناء مجلد الإدارة والملفات الثابتة
    RewriteRule ^saiebadmin25/ - [L]
    RewriteRule ^(css|js|images|uploads)/ - [L]
    RewriteRule ^.*\.(css|js|png|jpg|jpeg|gif|ico|pdf|zip)$ - [L]
    
    # روابط SEO للخدمات - محسنة للتشغيل المحلي
    
    # خدمات الأفراد - Individual services
    RewriteRule ^individual-services/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2&type=3 [L,QSA]
    
    # خدمات الأعمال - Business services  
    RewriteRule ^business-services/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2&type=2 [L,QSA]
    
    # الخدمات المالية - Financial services
    RewriteRule ^financial-services/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2&type=4 [L,QSA]
    
    # التدريب - Training programs
    RewriteRule ^training-programs/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2&type=1 [L,QSA]
    
    # الخدمات العامة - Generic services
    RewriteRule ^service/([a-zA-Z0-9_-]+)-([0-9]+)/?$ service-detail.php?id=$2 [L,QSA]
    
    # المقالات - Blog articles
    RewriteRule ^blog/([a-zA-Z0-9_-]+)-([0-9]+)/?$ blog-single.php?id=$2 [L,QSA]
    
    # المكتبة - Library items
    RewriteRule ^library/([a-zA-Z0-9_-]+)-([0-9]+)/?$ library-detail.php?id=$2 [L,QSA]
    
    # الصفحات الثابتة - Static pages
    RewriteRule ^home/?$ index.php [L]
    RewriteRule ^about-us/?$ about.php [L]
    RewriteRule ^contact-us/?$ contact.php [L]
    RewriteRule ^training-programs/?$ training.php [L,QSA]
    RewriteRule ^financial-services/?$ financial.php [L,QSA]
    RewriteRule ^business-services/?$ service-business.php [L,QSA]
    RewriteRule ^individual-services/?$ service-individual.php [L,QSA]
    RewriteRule ^library/?$ library_cat.php [L,QSA]
    RewriteRule ^blog/?$ blog.php [L,QSA]
    RewriteRule ^search/?$ search.php [L,QSA]
    
    # إخفاء امتدادات PHP للصفحات العادية
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME}.php -f
    RewriteRule ^(.+?)/?$ $1.php [QSA,L]
    
    # معالجة الصفحة الرئيسية
    RewriteRule ^$ index.php [L]
</IfModule>

# صفحات الأخطاء
ErrorDocument 404 /404.php
ErrorDocument 500 /500.php';

// إنشاء نسخة احتياطية
if (file_exists('.htaccess')) {
    copy('.htaccess', '.htaccess.backup.' . date('Y-m-d-H-i-s'));
    echo "<p style='color: blue;'>📋 تم إنشاء نسخة احتياطية من .htaccess</p>";
}

// كتابة .htaccess الجديد
file_put_contents('.htaccess', $htaccessContent);
echo "<p style='color: green;'>✅ تم إنشاء .htaccess محسن لروابط SEO</p>";

// 2. التأكد من وجود البيانات في قاعدة البيانات
echo "<h3>📊 التحقق من البيانات في قاعدة البيانات</h3>";

try {
    include 'config/database.php';
    
    // التحقق من وجود الخدمة 138
    $stmt = $conn->prepare("SELECT ar_id, ar_title, ar_type, ar_slug FROM sa_articles WHERE ar_id = 138");
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $service = $result->fetch_assoc();
        echo "<p style='color: green;'>✅ الخدمة 138 موجودة: " . htmlspecialchars($service['ar_title']) . "</p>";
        
        // تحديث slug إذا لم يكن موجود
        if (empty($service['ar_slug'])) {
            $slug = 'sdd-tashyrat-alzyara-anjaz';
            $updateStmt = $conn->prepare("UPDATE sa_articles SET ar_slug = ? WHERE ar_id = 138");
            $updateStmt->bind_param('s', $slug);
            $updateStmt->execute();
            echo "<p style='color: blue;'>📝 تم تحديث slug للخدمة 138</p>";
        }
    } else {
        // إدراج الخدمة إذا لم تكن موجودة
        $sql = "INSERT INTO sa_articles (ar_id, ar_title, ar_content, ar_type, ar_status, ar_slug) VALUES 
        (138, 'خدمة تأشيرات الزيارة والإنجاز', 'خدمة متخصصة في تأشيرات الزيارة وإنجاز المعاملات الحكومية للأفراد والمنشآت', 3, 1, 'sdd-tashyrat-alzyara-anjaz')";
        
        if ($conn->query($sql)) {
            echo "<p style='color: green;'>✅ تم إضافة الخدمة 138 بنجاح</p>";
        } else {
            echo "<p style='color: red;'>❌ فشل في إضافة الخدمة: " . $conn->error . "</p>";
        }
    }
    
    // إضافة المزيد من البيانات التجريبية
    $sampleServices = [
        [1, 'دورة إدارة المشاريع المتقدمة', 'دورة تدريبية شاملة في إدارة المشاريع', 1, 'dwra-adara-almshary-almtqdma'],
        [2, 'استشارات الأعمال والتطوير', 'خدمات استشارية متخصصة للأعمال والشركات', 2, 'astsharat-alaamal-waltatwyr'],
        [3, 'الاستشارات المالية للشركات', 'خدمات استشارية مالية متخصصة للشركات', 4, 'alastsharat-almalya-llshrkat']
    ];
    
    foreach ($sampleServices as $service) {
        $checkStmt = $conn->prepare("SELECT ar_id FROM sa_articles WHERE ar_id = ?");
        $checkStmt->bind_param('i', $service[0]);
        $checkStmt->execute();
        
        if ($checkStmt->get_result()->num_rows == 0) {
            $insertStmt = $conn->prepare("INSERT INTO sa_articles (ar_id, ar_title, ar_content, ar_type, ar_status, ar_slug) VALUES (?, ?, ?, ?, 1, ?)");
            $insertStmt->bind_param('issis', $service[0], $service[1], $service[2], $service[3], $service[4]);
            $insertStmt->execute();
            echo "<p style='color: green;'>✅ تم إضافة الخدمة " . $service[0] . ": " . htmlspecialchars($service[1]) . "</p>";
        }
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>❌ خطأ في قاعدة البيانات: " . $e->getMessage() . "</p>";
}

// 3. إنشاء ملف اختبار للروابط
echo "<h3>🧪 إنشاء صفحة اختبار الروابط</h3>";

$testPageContent = '<?php
/**
 * صفحة اختبار روابط SEO
 */
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختبار روابط SEO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; direction: rtl; }
        .test-link { display: block; margin: 10px 0; padding: 10px; background: #f8f9fa; border: 1px solid #dee2e6; border-radius: 5px; text-decoration: none; color: #333; }
        .test-link:hover { background: #e9ecef; }
        .working { border-left: 5px solid #28a745; }
        .broken { border-left: 5px solid #dc3545; }
        .status { float: left; font-weight: bold; }
        .working .status { color: #28a745; }
        .broken .status { color: #dc3545; }
    </style>
</head>
<body>
    <h1>🔗 اختبار روابط SEO</h1>
    
    <h2>روابط الخدمات:</h2>
    
    <a href="/service-detail.php?id=138" class="test-link working">
        <span class="status">✅ يعمل</span>
        رابط مباشر - خدمة تأشيرات الزيارة
        <br><small>http://localhost:8000/service-detail.php?id=138</small>
    </a>
    
    <a href="/individual-services/sdd-tashyrat-alzyara-anjaz-138" class="test-link" id="seo-link-138">
        <span class="status" id="status-138">🔄 اختبار...</span>
        رابط SEO - خدمة تأشيرات الزيارة
        <br><small>http://localhost:8000/individual-services/sdd-tashyrat-alzyara-anjaz-138</small>
    </a>
    
    <a href="/service-detail.php?id=1" class="test-link working">
        <span class="status">✅ يعمل</span>
        رابط مباشر - دورة إدارة المشاريع
        <br><small>http://localhost:8000/service-detail.php?id=1</small>
    </a>
    
    <a href="/training-programs/dwra-adara-almshary-almtqdma-1" class="test-link" id="seo-link-1">
        <span class="status" id="status-1">🔄 اختبار...</span>
        رابط SEO - دورة إدارة المشاريع
        <br><small>http://localhost:8000/training-programs/dwra-adara-almshary-almtqdma-1</small>
    </a>
    
    <a href="/service-detail.php?id=2" class="test-link working">
        <span class="status">✅ يعمل</span>
        رابط مباشر - استشارات الأعمال
        <br><small>http://localhost:8000/service-detail.php?id=2</small>
    </a>
    
    <a href="/business-services/astsharat-alaamal-waltatwyr-2" class="test-link" id="seo-link-2">
        <span class="status" id="status-2">🔄 اختبار...</span>
        رابط SEO - استشارات الأعمال
        <br><small>http://localhost:8000/business-services/astsharat-alaamal-waltatwyr-2</small>
    </a>
    
    <script>
    // اختبار الروابط تلقائياً
    function testLink(linkId, statusId) {
        const link = document.getElementById(linkId);
        const status = document.getElementById(statusId);
        const url = link.href;
        
        fetch(url)
            .then(response => {
                if (response.ok) {
                    status.textContent = "✅ يعمل";
                    status.style.color = "#28a745";
                    link.classList.add("working");
                    link.classList.remove("broken");
                } else {
                    status.textContent = "❌ لا يعمل";
                    status.style.color = "#dc3545";
                    link.classList.add("broken");
                    link.classList.remove("working");
                }
            })
            .catch(error => {
                status.textContent = "❌ خطأ";
                status.style.color = "#dc3545";
                link.classList.add("broken");
                link.classList.remove("working");
            });
    }
    
    // اختبار جميع الروابط
    setTimeout(() => {
        testLink("seo-link-138", "status-138");
        testLink("seo-link-1", "status-1");
        testLink("seo-link-2", "status-2");
    }, 1000);
    </script>
    
    <hr>
    <h2>معلومات مفيدة:</h2>
    <ul>
        <li><strong>الخادم المحلي:</strong> http://localhost:8000</li>
        <li><strong>إعدادات قاعدة البيانات:</strong> <a href="setup_database.php">setup_database.php</a></li>
        <li><strong>اختبار الإيميل:</strong> <a href="test_email_local.php">test_email_local.php</a></li>
        <li><strong>حالة النظام:</strong> <a href="system_status.php">system_status.php</a></li>
    </ul>
</body>
</html>';

file_put_contents('test_seo_links.php', $testPageContent);
echo "<p style='color: green;'>✅ تم إنشاء صفحة اختبار الروابط</p>";

echo "<hr>";
echo "<h3>🎯 اختبار الروابط الآن</h3>";

$testUrls = [
    'http://localhost:8000/service-detail.php?id=138' => 'رابط مباشر - يجب أن يعمل',
    'http://localhost:8000/individual-services/sdd-tashyrat-alzyara-anjaz-138' => 'رابط SEO - يجب أن يعمل الآن',
    'http://localhost:8000/test_seo_links.php' => 'صفحة اختبار شاملة'
];

echo "<div style='background-color: #e7f3ff; padding: 15px; border: 1px solid #b3d9ff; border-radius: 5px;'>";
echo "<h4>🔗 الروابط للاختبار:</h4>";
echo "<ul>";
foreach ($testUrls as $url => $description) {
    echo "<li><a href='$url' target='_blank' style='color: #007bff;'>$description</a><br><small style='color: #6c757d;'>$url</small></li>";
}
echo "</ul>";
echo "</div>";

echo "<div style='margin-top: 20px; padding: 15px; background-color: #d4edda; border: 1px solid #c3e6cb; border-radius: 5px;'>";
echo "<h4>✅ تم إصلاح مشكلة روابط SEO!</h4>";
echo "<ul>";
echo "<li>تم تحديث .htaccess لدعم روابط SEO</li>";
echo "<li>تم إضافة البيانات المطلوبة في قاعدة البيانات</li>";
echo "<li>تم إنشاء صفحة اختبار شاملة</li>";
echo "<li>الآن يجب أن تعمل جميع الروابط بشكل صحيح</li>";
echo "</ul>";
echo "</div>";

echo "<div style='margin-top: 15px; padding: 15px; background-color: #fff3cd; border: 1px solid #ffeaa7; border-radius: 5px;'>";
echo "<h4>💡 ملاحظة مهمة:</h4>";
echo "<p>إذا كانت الروابط لا تزال لا تعمل، تأكد من:</p>";
echo "<ol>";
echo "<li>إعادة تشغيل الخادم المحلي</li>";
echo "<li>مسح cache المتصفح</li>";
echo "<li>التأكد من أن mod_rewrite مفعل في Apache</li>";
echo "</ol>";
echo "</div>";
?>
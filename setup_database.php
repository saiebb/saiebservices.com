<?php
/**
 * إعداد قاعدة البيانات للتشغيل المحلي
 */

// محاولة الاتصال بـ MySQL بدون قاعدة بيانات محددة
$portsToTest = [3307, 3306, 3308];
$workingPort = null;
$conn = null;

echo "<h2>🔧 إعداد قاعدة البيانات للتشغيل المحلي</h2>";

// البحث عن المنفذ الذي يعمل
foreach ($portsToTest as $port) {
    echo "<p>🔍 اختبار المنفذ $port...</p>";
    try {
        $testConn = new mysqli('localhost', 'root', '', '', $port);
        if (!$testConn->connect_error) {
            $workingPort = $port;
            $conn = $testConn;
            echo "<p style='color: green;'>✅ تم العثور على MySQL على المنفذ $port</p>";
            break;
        }
    } catch (Exception $e) {
        echo "<p style='color: orange;'>⚠️ المنفذ $port غير متاح</p>";
        continue;
    }
}

if (!$conn) {
    echo "<div style='color: red; padding: 20px; border: 1px solid red; background-color: #ffe6e6;'>";
    echo "<h3>❌ لم يتم العثور على MySQL</h3>";
    echo "<p>يرجى التأكد من تشغيل XAMPP أو WAMP أو أي خادم MySQL آخر</p>";
    echo "<p><strong>خطوات الحل:</strong></p>";
    echo "<ol>";
    echo "<li>تشغيل XAMPP Control Panel</li>";
    echo "<li>تشغيل Apache و MySQL</li>";
    echo "<li>إعادة تحديث هذه الصفحة</li>";
    echo "</ol>";
    echo "</div>";
    exit;
}

// إنشاء قاعدة البيانات إذا لم تكن موجودة
$databaseName = 'saiebservices';
echo "<p>🗄️ التحقق من وجود قاعدة البيانات '$databaseName'...</p>";

$result = $conn->query("SHOW DATABASES LIKE '$databaseName'");
if ($result->num_rows == 0) {
    echo "<p>📝 إنشاء قاعدة البيانات '$databaseName'...</p>";
    if ($conn->query("CREATE DATABASE $databaseName CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci")) {
        echo "<p style='color: green;'>✅ تم إنشاء قاعدة البيانات بنجاح</p>";
    } else {
        echo "<p style='color: red;'>❌ فشل في إنشاء قاعدة البيانات: " . $conn->error . "</p>";
        exit;
    }
} else {
    echo "<p style='color: green;'>✅ قاعدة البيانات موجودة بالفعل</p>";
}

// الاتصال بقاعدة البيانات
$conn->select_db($databaseName);

// التحقق من وجود الجداول الأساسية
$tables = [
    'sa_articles' => "
        CREATE TABLE `sa_articles` (
            `ar_id` int(11) NOT NULL AUTO_INCREMENT,
            `ar_title` varchar(255) NOT NULL,
            `ar_content` text,
            `ar_type` int(11) NOT NULL DEFAULT 1,
            `ar_status` int(11) NOT NULL DEFAULT 1,
            `ar_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `ar_slug` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`ar_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    ",
    'sa_requests' => "
        CREATE TABLE `sa_requests` (
            `req_id` int(11) NOT NULL AUTO_INCREMENT,
            `req_ser_id` int(11) NOT NULL,
            `req_ser_type` int(11) NOT NULL,
            `req_cli_name` varchar(255) NOT NULL,
            `req_cli_email` varchar(255) NOT NULL,
            `req_cli_phone` varchar(50) NOT NULL,
            `req_cli_time_to_call` varchar(255) DEFAULT NULL,
            `req_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `req_status` int(11) NOT NULL DEFAULT 1,
            `google_reviews_consent` tinyint(1) DEFAULT 0,
            PRIMARY KEY (`req_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci
    "
];

foreach ($tables as $tableName => $createSQL) {
    echo "<p>🔍 التحقق من جدول '$tableName'...</p>";
    $result = $conn->query("SHOW TABLES LIKE '$tableName'");
    if ($result->num_rows == 0) {
        echo "<p>📝 إنشاء جدول '$tableName'...</p>";
        if ($conn->query($createSQL)) {
            echo "<p style='color: green;'>✅ تم إنشاء الجدول بنجاح</p>";
        } else {
            echo "<p style='color: red;'>❌ فشل في إنشاء الجدول: " . $conn->error . "</p>";
        }
    } else {
        echo "<p style='color: green;'>✅ الجدول موجود بالفعل</p>";
    }
}

// إدراج بيانات تجريبية
echo "<p>📊 إضافة بيانات تجريبية...</p>";

$sampleData = [
    "INSERT IGNORE INTO sa_articles (ar_id, ar_title, ar_content, ar_type, ar_status) VALUES 
    (1, 'خدمة استشارات الأعمال', 'خدمة استشارات شاملة للأعمال والشركات', 2, 1),
    (2, 'دورة إدارة المشاريع', 'دورة تدريبية متخصصة في إدارة المشاريع', 1, 1),
    (3, 'خدمات الأفراد المالية', 'خدمات مالية متخصصة للأفراد', 3, 1),
    (4, 'استشارات مالية', 'استشارات مالية متخصصة', 4, 1)"
];

foreach ($sampleData as $sql) {
    if ($conn->query($sql)) {
        echo "<p style='color: green;'>✅ تم إدراج البيانات التجريبية</p>";
    } else {
        if (strpos($conn->error, 'Duplicate entry') === false) {
            echo "<p style='color: orange;'>⚠️ " . $conn->error . "</p>";
        }
    }
}

$conn->close();

echo "<hr>";
echo "<div style='color: green; padding: 20px; border: 1px solid green; background-color: #f0fff0;'>";
echo "<h3>🎉 تم إعداد قاعدة البيانات بنجاح!</h3>";
echo "<p><strong>معلومات الاتصال:</strong></p>";
echo "<ul>";
echo "<li><strong>الخادم:</strong> localhost</li>";
echo "<li><strong>المنفذ:</strong> $workingPort</li>";
echo "<li><strong>قاعدة البيانات:</strong> $databaseName</li>";
echo "<li><strong>المستخدم:</strong> root</li>";
echo "<li><strong>كلمة المرور:</strong> (فارغة)</li>";
echo "</ul>";
echo "</div>";

echo "<hr>";
echo "<h3>🚀 الخطوات التالية:</h3>";
echo "<ol>";
echo "<li><strong>تشغيل الموقع:</strong> <a href='http://localhost:8000' target='_blank'>http://localhost:8000</a></li>";
echo "<li><strong>اختبار الإيميل:</strong> <a href='test_email.php' target='_blank'>test_email.php</a></li>";
echo "<li><strong>فحص النظام:</strong> <a href='system_status.php' target='_blank'>system_status.php</a></li>";
echo "<li><strong>صفحة خدمة تجريبية:</strong> <a href='service-detail.php?id=1' target='_blank'>service-detail.php?id=1</a></li>";
echo "</ol>";

echo "<div style='margin-top: 20px; padding: 15px; background-color: #e7f3ff; border: 1px solid #b3d9ff;'>";
echo "<h4>💡 نصائح:</h4>";
echo "<ul>";
echo "<li>تأكد من تشغيل Apache و MySQL في XAMPP</li>";
echo "<li>يمكنك الوصول للموقع عبر: <code>http://localhost:8000</code></li>";
echo "<li>لوحة إدارة قاعدة البيانات: <a href='http://localhost/phpmyadmin' target='_blank'>phpMyAdmin</a></li>";
echo "</ul>";
echo "</div>";
?>

<style>
body { font-family: Arial, sans-serif; margin: 20px; direction: rtl; }
h2, h3 { color: #333; }
p { margin: 10px 0; }
code { background-color: #f4f4f4; padding: 2px 5px; border-radius: 3px; }
a { color: #007bff; text-decoration: none; }
a:hover { text-decoration: underline; }
</style>
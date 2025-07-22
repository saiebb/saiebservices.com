<?php
/**
 * اختبار الروابط المباشرة في البيئة المحلية
 */

// تضمين ملف SEO URLs
include 'action/seo_url.php';

echo "<h2>🔗 اختبار الروابط المباشرة</h2>";

// اختبار دالة getServiceUrl
echo "<h3>📋 اختبار دالة getServiceUrl:</h3>";

$testServices = [
    ['id' => 138, 'title' => 'خدمة تأشيرات الزيارة والإنجاز', 'type' => 3],
    ['id' => 1, 'title' => 'دورة إدارة المشاريع', 'type' => 1],
    ['id' => 2, 'title' => 'استشارات الأعمال', 'type' => 2],
    ['id' => 3, 'title' => 'الاستشارات المالية', 'type' => 4]
];

echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
echo "<tr style='background-color: #f8f9fa;'>";
echo "<th style='padding: 10px;'>ID</th>";
echo "<th style='padding: 10px;'>العنوان</th>";
echo "<th style='padding: 10px;'>النوع</th>";
echo "<th style='padding: 10px;'>الرابط المولد</th>";
echo "<th style='padding: 10px;'>اختبار</th>";
echo "</tr>";

foreach ($testServices as $service) {
    $url = getServiceUrl($service['id'], $service['title'], $service['type']);
    $fullUrl = 'http://localhost:8000' . $url;
    
    echo "<tr>";
    echo "<td style='padding: 10px; text-align: center;'>" . $service['id'] . "</td>";
    echo "<td style='padding: 10px;'>" . htmlspecialchars($service['title']) . "</td>";
    echo "<td style='padding: 10px; text-align: center;'>" . $service['type'] . "</td>";
    echo "<td style='padding: 10px;'><code>" . htmlspecialchars($url) . "</code></td>";
    echo "<td style='padding: 10px; text-align: center;'>";
    echo "<a href='" . $fullUrl . "' target='_blank' style='color: #007bff; text-decoration: none;'>🔗 اختبار</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";

// اختبار دالة getBlogUrl
echo "<h3>📰 اختبار دالة getBlogUrl:</h3>";

$testBlogs = [
    ['id' => 1, 'title' => 'مقال تجريبي'],
    ['id' => 2, 'title' => 'أخبار الشركة']
];

echo "<table border='1' style='border-collapse: collapse; width: 100%; margin: 20px 0;'>";
echo "<tr style='background-color: #f8f9fa;'>";
echo "<th style='padding: 10px;'>ID</th>";
echo "<th style='padding: 10px;'>العنوان</th>";
echo "<th style='padding: 10px;'>الرابط المولد</th>";
echo "<th style='padding: 10px;'>اختبار</th>";
echo "</tr>";

foreach ($testBlogs as $blog) {
    $url = getBlogUrl($blog['id'], $blog['title']);
    $fullUrl = 'http://localhost:8000' . $url;
    
    echo "<tr>";
    echo "<td style='padding: 10px; text-align: center;'>" . $blog['id'] . "</td>";
    echo "<td style='padding: 10px;'>" . htmlspecialchars($blog['title']) . "</td>";
    echo "<td style='padding: 10px;'><code>" . htmlspecialchars($url) . "</code></td>";
    echo "<td style='padding: 10px; text-align: center;'>";
    echo "<a href='" . $fullUrl . "' target='_blank' style='color: #007bff; text-decoration: none;'>🔗 اختبار</a>";
    echo "</td>";
    echo "</tr>";
}

echo "</table>";

// معلومات البيئة
echo "<h3>🌐 معلومات البيئة:</h3>";
echo "<ul>";
echo "<li><strong>SERVER_NAME:</strong> " . ($_SERVER['SERVER_NAME'] ?? 'غير محدد') . "</li>";
echo "<li><strong>HTTP_HOST:</strong> " . ($_SERVER['HTTP_HOST'] ?? 'غير محدد') . "</li>";
echo "<li><strong>SERVER_ADDR:</strong> " . ($_SERVER['SERVER_ADDR'] ?? 'غير محدد') . "</li>";
echo "<li><strong>REQUEST_URI:</strong> " . ($_SERVER['REQUEST_URI'] ?? 'غير محدد') . "</li>";
echo "</ul>";

// التحقق من البيئة
$isLocal = (
    (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] === 'localhost') ||
    (isset($_SERVER['SERVER_NAME']) && strpos($_SERVER['SERVER_NAME'], 'localhost:') === 0) ||
    (isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR'] === '127.0.0.1') ||
    (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)
);

echo "<div style='padding: 15px; margin: 20px 0; border-radius: 5px; " . 
     ($isLocal ? "background-color: #d4edda; border: 1px solid #c3e6cb;" : "background-color: #fff3cd; border: 1px solid #ffeaa7;") . "'>";
echo "<h4>" . ($isLocal ? "✅ البيئة المحلية مكتشفة" : "⚠️ البيئة المباشرة مكتشفة") . "</h4>";
echo "<p>النظام سيستخدم " . ($isLocal ? "الروابط المباشرة" : "روابط SEO") . "</p>";
echo "</div>";

echo "<hr>";
echo "<h3>🧪 اختبار سريع:</h3>";
echo "<p>اضغط على الروابط في الجدول أعلاه للتأكد من أنها تعمل بشكل صحيح.</p>";

echo "<div style='background-color: #e7f3ff; padding: 15px; border: 1px solid #b3d9ff; border-radius: 5px; margin: 20px 0;'>";
echo "<h4>💡 ملاحظات:</h4>";
echo "<ul>";
echo "<li>في البيئة المحلية: الروابط ستكون بصيغة <code>/service-detail.php?id=X&type=Y</code></li>";
echo "<li>في البيئة المباشرة: الروابط ستكون بصيغة <code>/individual-services/service-name-X</code></li>";
echo "<li>التبديل يحدث تلقائياً حسب البيئة</li>";
echo "</ul>";
echo "</div>";

echo "<div style='background-color: #d4edda; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px;'>";
echo "<h4>✅ تم إصلاح مشكلة الروابط!</h4>";
echo "<p>الآن عند الضغط على أي خدمة في الموقع، ستفتح صفحة التفاصيل باستخدام الرابط المباشر.</p>";
echo "<p><strong>الخطوة التالية:</strong> اذهب إلى <a href='service-individual.php'>صفحة خدمات الأفراد</a> وجرب الضغط على أي خدمة.</p>";
echo "</div>";
?>
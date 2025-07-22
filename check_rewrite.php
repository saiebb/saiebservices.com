<?php
/**
 * فحص حالة mod_rewrite
 */

echo "<h2>🔧 فحص حالة mod_rewrite</h2>";

// فحص إذا كان mod_rewrite مفعل
if (function_exists('apache_get_modules')) {
    $modules = apache_get_modules();
    $rewrite_enabled = in_array('mod_rewrite', $modules);
    
    if ($rewrite_enabled) {
        echo "<p style='color: green;'>✅ mod_rewrite مفعل</p>";
    } else {
        echo "<p style='color: red;'>❌ mod_rewrite غير مفعل</p>";
        echo "<div style='background-color: #fff3cd; padding: 15px; border: 1px solid #ffeaa7; border-radius: 5px;'>";
        echo "<h4>⚠️ كيفية تفعيل mod_rewrite في XAMPP:</h4>";
        echo "<ol>";
        echo "<li>افتح ملف <code>C:\\xampp\\apache\\conf\\httpd.conf</code></li>";
        echo "<li>ابحث عن السطر: <code>#LoadModule rewrite_module modules/mod_rewrite.so</code></li>";
        echo "<li>احذف علامة # من بداية السطر</li>";
        echo "<li>أعد تشغيل Apache</li>";
        echo "</ol>";
        echo "</div>";
    }
} else {
    echo "<p style='color: orange;'>⚠️ لا يمكن فحص mod_rewrite (قد يكون مفعل)</p>";
}

// فحص إذا كان .htaccess يعمل
echo "<h3>🔍 فحص .htaccess</h3>";

if (file_exists('.htaccess')) {
    echo "<p style='color: green;'>✅ ملف .htaccess موجود</p>";
    
    // فحص محتوى .htaccess
    $htaccess_content = file_get_contents('.htaccess');
    if (strpos($htaccess_content, 'RewriteEngine On') !== false) {
        echo "<p style='color: green;'>✅ RewriteEngine مفعل في .htaccess</p>";
    } else {
        echo "<p style='color: red;'>❌ RewriteEngine غير مفعل في .htaccess</p>";
    }
    
    if (strpos($htaccess_content, 'individual-services') !== false) {
        echo "<p style='color: green;'>✅ قواعد individual-services موجودة</p>";
    } else {
        echo "<p style='color: red;'>❌ قواعد individual-services مفقودة</p>";
    }
} else {
    echo "<p style='color: red;'>❌ ملف .htaccess غير موجود</p>";
}

// اختبار URL rewriting
echo "<h3>🧪 اختبار URL Rewriting</h3>";

// إنشاء ملف اختبار بسيط
$test_content = '<?php echo "URL Rewriting يعمل!"; ?>';
file_put_contents('rewrite_test.php', $test_content);

echo "<p>تم إنشاء ملف اختبار: <code>rewrite_test.php</code></p>";

// إضافة قاعدة اختبار إلى .htaccess
$test_rule = "\n# قاعدة اختبار\nRewriteRule ^test-rewrite/?$ rewrite_test.php [L]\n";

if (file_exists('.htaccess')) {
    $current_htaccess = file_get_contents('.htaccess');
    if (strpos($current_htaccess, 'test-rewrite') === false) {
        file_put_contents('.htaccess', $current_htaccess . $test_rule);
        echo "<p style='color: blue;'>📝 تم إضافة قاعدة اختبار إلى .htaccess</p>";
    }
}

echo "<div style='background-color: #e7f3ff; padding: 15px; border: 1px solid #b3d9ff; border-radius: 5px;'>";
echo "<h4>🔗 اختبار الروابط:</h4>";
echo "<ul>";
echo "<li><a href='rewrite_test.php' target='_blank'>رابط مباشر للاختبار</a> - يجب أن يعمل</li>";
echo "<li><a href='test-rewrite' target='_blank'>رابط معاد كتابته</a> - إذا عمل فإن URL Rewriting يعمل</li>";
echo "</ul>";
echo "</div>";

// معلومات الخادم
echo "<h3>ℹ️ معلومات الخادم</h3>";
echo "<ul>";
echo "<li><strong>الخادم:</strong> " . $_SERVER['SERVER_SOFTWARE'] . "</li>";
echo "<li><strong>PHP Version:</strong> " . phpversion() . "</li>";
echo "<li><strong>Document Root:</strong> " . $_SERVER['DOCUMENT_ROOT'] . "</li>";
echo "<li><strong>Request URI:</strong> " . $_SERVER['REQUEST_URI'] . "</li>";
echo "</ul>";

// فحص متغيرات البيئة
echo "<h3>🌐 متغيرات البيئة</h3>";
echo "<ul>";
echo "<li><strong>SERVER_NAME:</strong> " . ($_SERVER['SERVER_NAME'] ?? 'غير محدد') . "</li>";
echo "<li><strong>SERVER_PORT:</strong> " . ($_SERVER['SERVER_PORT'] ?? 'غير محدد') . "</li>";
echo "<li><strong>HTTPS:</strong> " . (isset($_SERVER['HTTPS']) ? 'مفعل' : 'غير مفعل') . "</li>";
echo "</ul>";

echo "<hr>";
echo "<div style='background-color: #d4edda; padding: 15px; border: 1px solid #c3e6cb; border-radius: 5px;'>";
echo "<h4>✅ الخطوات التالية:</h4>";
echo "<ol>";
echo "<li><strong>اختبر الرابط المعاد كتابته أعلاه</strong></li>";
echo "<li>إذا عمل، فإن المشكلة في قواعد .htaccess المحددة</li>";
echo "<li>إذا لم يعمل، فإن mod_rewrite غير مفعل</li>";
echo "<li><a href='fix_seo_urls.php'>شغل إصلاح روابط SEO</a></li>";
echo "</ol>";
echo "</div>";

// تنظيف ملف الاختبار بعد 5 ثوان
echo "<script>";
echo "setTimeout(function() {";
echo "  fetch('cleanup_test.php');";
echo "}, 5000);";
echo "</script>";

// إنشاء ملف تنظيف
$cleanup_content = '<?php
if (file_exists("rewrite_test.php")) {
    unlink("rewrite_test.php");
}
echo "تم تنظيف ملفات الاختبار";
?>';
file_put_contents('cleanup_test.php', $cleanup_content);
?>
<?php
// ملف اختبار لقواعد إعادة الكتابة
echo "تم الوصول إلى test-rewrite.php\n";
echo "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
echo "GET parameters: " . print_r($_GET, true) . "\n";
echo "POST parameters: " . print_r($_POST, true) . "\n";

// كتابة في ملف التتبع
$debug_content = "TEST REWRITE: Accessed at " . date('Y-m-d H:i:s') . "\n";
$debug_content .= "REQUEST_URI: " . $_SERVER['REQUEST_URI'] . "\n";
$debug_content .= "GET: " . print_r($_GET, true) . "\n";
file_put_contents('debug.log', $debug_content, FILE_APPEND | LOCK_EX);
?>
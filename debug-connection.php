<?php
/**
 * تشخيص مشكلة الاتصال بقاعدة البيانات
 * Database Connection Debugging
 */

echo "=== تشخيص اتصال قاعدة البيانات ===\n";
echo "Database Connection Debugging\n\n";

// معلومات الخادم
echo "📊 معلومات الخادم:\n";
echo "SERVER_NAME: " . ($_SERVER['SERVER_NAME'] ?? 'غير محدد') . "\n";
echo "HTTP_HOST: " . ($_SERVER['HTTP_HOST'] ?? 'غير محدد') . "\n";
echo "DOCUMENT_ROOT: " . ($_SERVER['DOCUMENT_ROOT'] ?? 'غير محدد') . "\n";
echo "SERVER_ADDR: " . ($_SERVER['SERVER_ADDR'] ?? 'غير محدد') . "\n";

// فحص مسارات XAMPP
echo "\n🔍 فحص مسارات XAMPP:\n";
$xamppPaths = [
    'C:/xampp/mysql/bin/my.ini',
    'C:/Program Files/xampp/mysql/bin/my.ini',
    'C:/Program Files (x86)/xampp/mysql/bin/my.ini',
    'D:/xampp/mysql/bin/my.ini'
];

$foundConfig = false;
$detectedPort = 3306;

foreach ($xamppPaths as $path) {
    echo "فحص: $path - ";
    if (file_exists($path)) {
        echo "موجود ✓\n";
        $foundConfig = true;
        
        $content = file_get_contents($path);
        if (preg_match('/port\s*=\s*(\d+)/', $content, $matches)) {
            $detectedPort = (int)$matches[1];
            echo "  المنفذ المكتشف: $detectedPort\n";
        }
        break;
    } else {
        echo "غير موجود ✗\n";
    }
}

if (!$foundConfig) {
    echo "⚠️ لم يتم العثور على ملف إعدادات XAMPP\n";
    echo "سيتم استخدام المنفذ الافتراضي: 3306\n";
}

// اختبار الاتصال المباشر
echo "\n🔌 اختبار الاتصال المباشر:\n";

// اختبار المنفذ 3306
echo "اختبار المنفذ 3306: ";
try {
    $conn1 = new mysqli('localhost', 'root', '', '', 3306);
    if ($conn1->connect_error) {
        echo "فشل - " . $conn1->connect_error . "\n";
    } else {
        echo "نجح ✓\n";
        $conn1->close();
    }
} catch (Exception $e) {
    echo "فشل - " . $e->getMessage() . "\n";
}

// اختبار المنفذ 3307
echo "اختبار المنفذ 3307: ";
try {
    $conn2 = new mysqli('localhost', 'root', '', '', 3307);
    if ($conn2->connect_error) {
        echo "فشل - " . $conn2->connect_error . "\n";
    } else {
        echo "نجح ✓\n";
        $conn2->close();
    }
} catch (Exception $e) {
    echo "فشل - " . $e->getMessage() . "\n";
}

// اختبار بدون تحديد منفذ
echo "اختبار بدون منفذ: ";
try {
    $conn3 = new mysqli('localhost', 'root', '');
    if ($conn3->connect_error) {
        echo "فشل - " . $conn3->connect_error . "\n";
    } else {
        echo "نجح ✓\n";
        $conn3->close();
    }
} catch (Exception $e) {
    echo "فشل - " . $e->getMessage() . "\n";
}

// فحص العمليات النشطة
echo "\n🔄 فحص عمليات MySQL النشطة:\n";
$output = shell_exec('tasklist /FI "IMAGENAME eq mysqld.exe" 2>NUL');
if ($output && strpos($output, 'mysqld.exe') !== false) {
    echo "عملية MySQL نشطة ✓\n";
    echo $output;
} else {
    echo "لا توجد عملية MySQL نشطة ✗\n";
}

// فحص المنافذ المستخدمة
echo "\n🌐 فحص المنافذ المستخدمة:\n";
$netstat = shell_exec('netstat -an | findstr :330');
if ($netstat) {
    echo $netstat;
} else {
    echo "لا توجد منافذ MySQL مفتوحة\n";
}

echo "\n" . str_repeat("=", 50) . "\n";
echo "© 2024 SAIEB Services - Database Debug\n";
?>
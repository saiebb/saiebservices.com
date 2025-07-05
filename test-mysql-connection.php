<?php
/**
 * اختبار الاتصال بـ MySQL مع المنفذ الجديد
 * MySQL Connection Test with New Port
 */

// تضمين ملف إعدادات قاعدة البيانات
require_once 'config/database.php';

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختبار اتصال MySQL - SAIEB Services</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            margin: 0;
            padding: 20px;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            max-width: 700px;
            width: 100%;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .logo {
            font-size: 28px;
            margin-bottom: 10px;
        }
        .status {
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            font-weight: bold;
            text-align: center;
            font-size: 18px;
        }
        .success {
            background: #d4edda;
            color: #155724;
            border: 2px solid #c3e6cb;
        }
        .error {
            background: #f8d7da;
            color: #721c24;
            border: 2px solid #f5c6cb;
        }
        .info {
            background: #d1ecf1;
            color: #0c5460;
            border: 2px solid #bee5eb;
        }
        .details {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }
        .detail-row {
            display: flex;
            justify-content: space-between;
            margin: 12px 0;
            padding: 8px 0;
            border-bottom: 1px solid #e9ecef;
        }
        .detail-label {
            font-weight: bold;
            color: #495057;
        }
        .detail-value {
            color: #6c757d;
            font-family: 'Courier New', monospace;
        }
        .test-section {
            margin: 25px 0;
            padding: 20px;
            border: 2px solid #dee2e6;
            border-radius: 10px;
        }
        .test-title {
            font-weight: bold;
            color: #495057;
            margin-bottom: 15px;
            font-size: 18px;
        }
        .test-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin: 8px 0;
            background: #f8f9fa;
            border-radius: 6px;
        }
        .test-result {
            padding: 5px 12px;
            border-radius: 15px;
            font-size: 12px;
            font-weight: bold;
        }
        .result-success {
            background: #d4edda;
            color: #155724;
        }
        .result-error {
            background: #f8d7da;
            color: #721c24;
        }
        .btn {
            background: #667eea;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            text-decoration: none;
            display: inline-block;
            margin: 10px 5px;
        }
        .btn:hover {
            background: #5a67d8;
        }
        .celebration {
            text-align: center;
            font-size: 48px;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">🔗 SAIEB Services</div>
            <h2>اختبار اتصال MySQL مع المنفذ الجديد</h2>
            <p>التحقق من الاتصال بقاعدة البيانات بعد تغيير المنفذ إلى 3307</p>
        </div>

        <?php
        $connectionSuccess = false;
        $connectionDetails = [];
        $testResults = [];
        
        try {
            // الحصول على معلومات الإعدادات
            $config = $dbConfig->getConfig();
            $connectionDetails = [
                'البيئة' => $config['environment'],
                'الخادم' => $config['host'],
                'المنفذ' => $config['port'],
                'المستخدم' => $config['username'],
                'قاعدة البيانات' => $config['database'],
                'الترميز' => $config['charset']
            ];
            
            // اختبار الاتصال الأساسي
            if ($conn && !$conn->connect_error) {
                $connectionSuccess = true;
                
                echo '<div class="celebration">🎉</div>';
                echo '<div class="status success">';
                echo '✅ ممتاز! تم الاتصال بقاعدة البيانات بنجاح!';
                echo '<br><small>المنفذ الجديد 3307 يعمل بشكل مثالي</small>';
                echo '</div>';
                
                // اختبارات إضافية
                $testResults['الاتصال الأساسي'] = ['نجح', 'success'];
                
                // اختبار إصدار MySQL
                $result = $conn->query("SELECT VERSION() as version");
                if ($result && $row = $result->fetch_assoc()) {
                    $testResults['إصدار MySQL'] = [$row['version'], 'success'];
                    $connectionDetails['إصدار MySQL'] = $row['version'];
                }
                
                // اختبار الترميز
                $result = $conn->query("SELECT @@character_set_database as charset");
                if ($result && $row = $result->fetch_assoc()) {
                    $testResults['ترميز قاعدة البيانات'] = [$row['charset'], 'success'];
                }
                
                // اختبار الجداول
                $result = $conn->query("SHOW TABLES");
                if ($result) {
                    $tableCount = $result->num_rows;
                    $testResults['عدد الجداول'] = [$tableCount . ' جدول', $tableCount > 0 ? 'success' : 'error'];
                }
                
                // اختبار جدول محدد
                $result = $conn->query("SHOW TABLES LIKE '{$prefix}about'");
                if ($result && $result->num_rows > 0) {
                    $testResults['جدول معلومات الشركة'] = ['موجود', 'success'];
                } else {
                    $testResults['جدول معلومات الشركة'] = ['غير موجود', 'error'];
                }
                
                // اختبار البيانات
                $result = $conn->query("SELECT COUNT(*) as count FROM {$prefix}about");
                if ($result && $row = $result->fetch_assoc()) {
                    $testResults['بيانات معلومات الشركة'] = [$row['count'] . ' سجل', $row['count'] > 0 ? 'success' : 'error'];
                }
                
            } else {
                throw new Exception($conn->connect_error ?? 'خطأ غير محدد في الاتصال');
            }
            
        } catch (Exception $e) {
            echo '<div class="status error">';
            echo '❌ فشل الاتصال بقاعدة البيانات!';
            echo '<br><br><strong>تفاصيل الخطأ:</strong><br>';
            echo htmlspecialchars($e->getMessage());
            echo '</div>';
            
            $testResults['الاتصال الأساسي'] = ['فشل: ' . $e->getMessage(), 'error'];
        }
        ?>

        <!-- تفاصيل الاتصال -->
        <div class="details">
            <h3>تفاصيل الاتصال:</h3>
            <?php foreach ($connectionDetails as $label => $value): ?>
            <div class="detail-row">
                <span class="detail-label"><?php echo $label; ?>:</span>
                <span class="detail-value"><?php echo htmlspecialchars($value); ?></span>
            </div>
            <?php endforeach; ?>
        </div>

        <!-- نتائج الاختبارات -->
        <div class="test-section">
            <div class="test-title">نتائج الاختبارات:</div>
            <?php foreach ($testResults as $test => $result): ?>
            <div class="test-item">
                <span><?php echo $test; ?></span>
                <span class="test-result result-<?php echo $result[1]; ?>">
                    <?php echo $result[0]; ?>
                </span>
            </div>
            <?php endforeach; ?>
        </div>

        <?php if ($connectionSuccess): ?>
        <!-- اختبار إنشاء قاعدة البيانات -->
        <div class="test-section">
            <div class="test-title">اختبار إنشاء قاعدة البيانات المحلية:</div>
            <?php
            // التحقق من وجود قاعدة البيانات المحلية
            $localDbExists = false;
            $result = $conn->query("SHOW DATABASES LIKE 'saiebservices'");
            if ($result && $result->num_rows > 0) {
                $localDbExists = true;
                echo '<div class="test-item">';
                echo '<span>قاعدة البيانات المحلية</span>';
                echo '<span class="test-result result-success">موجودة ✓</span>';
                echo '</div>';
            } else {
                echo '<div class="test-item">';
                echo '<span>قاعدة البيانات المحلية</span>';
                echo '<span class="test-result result-error">غير موجودة ✗</span>';
                echo '</div>';
                
                echo '<div class="info">';
                echo '<strong>ملاحظة:</strong> يبدو أنك متصل بقاعدة بيانات أخرى. ';
                echo 'لإنشاء قاعدة البيانات المحلية، اتبع الخطوات التالية:';
                echo '<ol>';
                echo '<li>افتح phpMyAdmin: <a href="http://localhost/phpmyadmin" target="_blank">http://localhost/phpmyadmin</a></li>';
                echo '<li>أنشئ قاعدة بيانات جديدة باسم: <code>saiebservices</code></li>';
                echo '<li>استورد ملف: <code>27_11_2024.sql</code></li>';
                echo '</ol>';
                echo '</div>';
            }
            ?>
        </div>

        <!-- اختبار الصفحات -->
        <div class="test-section">
            <div class="test-title">اختبار صفحات المشروع:</div>
            <div class="test-item">
                <span>الصفحة الرئيسية</span>
                <a href="index.php" class="btn" target="_blank">اختبار</a>
            </div>
            <div class="test-item">
                <span>لوحة التحكم</span>
                <a href="saiebadmin25/" class="btn" target="_blank">اختبار</a>
            </div>
            <div class="test-item">
                <span>معلومات النظام</span>
                <a href="system-info.php" class="btn" target="_blank">عرض</a>
            </div>
        </div>

        <div class="status success">
            <strong>🎉 تهانينا!</strong><br>
            تم حل مشكلة MySQL بنجاح وتغيير المنفذ إلى 3307.<br>
            النظام جاهز للعمل الآن!
        </div>

        <?php else: ?>
        <div class="info">
            <strong>خطوات الإصلاح:</strong>
            <ol>
                <li>تأكد من تشغيل XAMPP</li>
                <li>تحقق من أن MySQL يعمل على المنفذ 3307</li>
                <li>أنشئ قاعدة البيانات المحلية إذا لزم الأمر</li>
            </ol>
            <a href="setup-local-db.php" class="btn">دليل الإعداد</a>
            <a href="mysql-fix-guide.html" class="btn">دليل الإصلاح</a>
        </div>
        <?php endif; ?>

        <div style="text-align: center; margin-top: 30px; color: #6c757d;">
            <small>© 2024 SAIEB Services - MySQL Connection Test (Port 3307)</small>
        </div>
    </div>
</body>
</html>
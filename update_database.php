<?php
/**
 * سكريبت تحديث قاعدة البيانات لإضافة نظام معرف الطلبات
 * Database Update Script for Order ID System
 */

include 'action/db.php';

echo "<h2>تحديث قاعدة البيانات - إضافة نظام معرف الطلبات</h2>";
echo "<hr>";

try {
    // التحقق من وجود العمود
    $tableName = $prefix . "requests";
    $checkColumn = "SHOW COLUMNS FROM $tableName LIKE 'req_order_id'";
    $result = $conn->query($checkColumn);
    
    if ($result->num_rows == 0) {
        echo "<p>إضافة عمود معرف الطلب...</p>";
        
        // إضافة العمود
        $addColumn = "ALTER TABLE $tableName 
                     ADD COLUMN req_order_id VARCHAR(50) NULL UNIQUE AFTER req_status,
                     ADD INDEX idx_order_id (req_order_id)";
        
        if ($conn->query($addColumn)) {
            echo "<p style='color: green;'>✓ تم إضافة عمود معرف الطلب بنجاح</p>";
            
            // تحديث الطلبات الموجودة
            echo "<p>تحديث الطلبات الموجودة بمعرفات فريدة...</p>";
            
            $updateExisting = "UPDATE $tableName 
                              SET req_order_id = CONCAT('SAIEB-', DATE_FORMAT(req_time, '%Y%m%d'), '-', UPPER(SUBSTRING(MD5(CONCAT(req_id, req_time)), 1, 6)))
                              WHERE req_order_id IS NULL";
            
            if ($conn->query($updateExisting)) {
                $affectedRows = $conn->affected_rows;
                echo "<p style='color: green;'>✓ تم تحديث $affectedRows طلب موجود بمعرفات فريدة</p>";
            } else {
                echo "<p style='color: orange;'>⚠ تحذير: لم يتم تحديث الطلبات الموجودة - " . $conn->error . "</p>";
            }
            
        } else {
            echo "<p style='color: red;'>✗ خطأ في إضافة العمود: " . $conn->error . "</p>";
        }
        
    } else {
        echo "<p style='color: blue;'>ℹ عمود معرف الطلب موجود بالفعل</p>";
        
        // التحقق من الطلبات التي لا تحتوي على معرف
        $checkEmpty = "SELECT COUNT(*) as count FROM $tableName WHERE req_order_id IS NULL OR req_order_id = ''";
        $result = $conn->query($checkEmpty);
        $row = $result->fetch_assoc();
        
        if ($row['count'] > 0) {
            echo "<p>تحديث {$row['count']} طلب بدون معرف...</p>";
            
            $updateEmpty = "UPDATE $tableName 
                           SET req_order_id = CONCAT('SAIEB-', DATE_FORMAT(req_time, '%Y%m%d'), '-', UPPER(SUBSTRING(MD5(CONCAT(req_id, req_time)), 1, 6)))
                           WHERE req_order_id IS NULL OR req_order_id = ''";
            
            if ($conn->query($updateEmpty)) {
                echo "<p style='color: green;'>✓ تم تحديث الطلبات بنجاح</p>";
            } else {
                echo "<p style='color: red;'>✗ خطأ في التحديث: " . $conn->error . "</p>";
            }
        } else {
            echo "<p style='color: green;'>✓ جميع الطلبات تحتوي على معرفات</p>";
        }
    }
    
    echo "<hr>";
    echo "<h3>معلومات قاعدة البيانات:</h3>";
    echo "<p><strong>البيئة:</strong> " . ($isLocal ? 'تطوير محلي' : 'خادم مباشر') . "</p>";
    echo "<p><strong>قاعدة البيانات:</strong> $dbName</p>";
    echo "<p><strong>جدول الطلبات:</strong> $tableName</p>";
    
    // عرض عينة من الطلبات
    echo "<h3>عينة من الطلبات:</h3>";
    $sample = "SELECT req_id, req_order_id, req_cli_name, req_time FROM $tableName ORDER BY req_id DESC LIMIT 5";
    $result = $conn->query($sample);
    
    if ($result->num_rows > 0) {
        echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
        echo "<tr><th>ID</th><th>معرف الطلب</th><th>اسم العميل</th><th>وقت الطلب</th></tr>";
        
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['req_id'] . "</td>";
            echo "<td>" . $row['req_order_id'] . "</td>";
            echo "<td>" . $row['req_cli_name'] . "</td>";
            echo "<td>" . $row['req_time'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>لا توجد طلبات في قاعدة البيانات</p>";
    }
    
} catch (Exception $e) {
    echo "<p style='color: red;'>خطأ: " . $e->getMessage() . "</p>";
}

echo "<hr>";
echo "<p><strong>ملاحظة:</strong> يمكنك حذف هذا الملف بعد التأكد من نجاح التحديث</p>";
echo "<p><a href='index.php'>العودة للموقع</a></p>";
?>
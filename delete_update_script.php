<?php
/**
 * سكربت حذف ملفات التحديث للأمان
 * Delete Update Scripts for Security
 */

// قائمة الملفات المراد حذفها
$files_to_delete = [
    'update_slugs.php',
    'delete_update_script.php',
    'slug_functions.php',
    'add_slug_column.sql',
    'update_slugs.lock'
];

$deleted_files = [];
$failed_files = [];

foreach ($files_to_delete as $file) {
    if (file_exists($file)) {
        if (unlink($file)) {
            $deleted_files[] = $file;
        } else {
            $failed_files[] = $file;
        }
    }
}
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حذف ملفات التحديث - SAIEB Services</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 20px; background: #f8f9fa; }
        .container { max-width: 600px; margin: 0 auto; background: white; padding: 30px; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { text-align: center; margin-bottom: 30px; }
        .status { padding: 15px; margin: 10px 0; border-radius: 5px; }
        .success { background: #d4edda; color: #155724; border: 1px solid #c3e6cb; }
        .error { background: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; margin: 10px 5px; }
        .btn:hover { background: #0056b3; }
        ul { text-align: right; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🗑️ حذف ملفات التحديث</h1>
        </div>

        <?php if (!empty($deleted_files)): ?>
        <div class="status success">
            <h3>✅ تم حذف الملفات التالية بنجاح:</h3>
            <ul>
                <?php foreach ($deleted_files as $file): ?>
                <li><?php echo htmlspecialchars($file); ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php endif; ?>

        <?php if (!empty($failed_files)): ?>
        <div class="status error">
            <h3>❌ فشل في حذف الملفات التالية:</h3>
            <ul>
                <?php foreach ($failed_files as $file): ?>
                <li><?php echo htmlspecialchars($file); ?></li>
                <?php endforeach; ?>
            </ul>
            <p>يرجى حذف هذه الملفات يدوياً من الخادم.</p>
        </div>
        <?php endif; ?>

        <div style="text-align: center; margin-top: 30px;">
            <a href="blog.php" class="btn">العودة إلى المدونة</a>
            <a href="index.php" class="btn">الصفحة الرئيسية</a>
        </div>
    </div>
</body>
</html>
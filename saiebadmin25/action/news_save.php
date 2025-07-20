<?php
include 'db.php';
include_once "resize_class.php";
include_once "../../action/seo_url.php"; // تضمين ملف الـ slug

$tableName = $prefix . "articles";
$ar_title = strip_tags($_POST['ar_title']);
$ar_date = strip_tags($_POST['ar_date']);
$ar_blog_type = strip_tags($_POST['ar_blog_type']);
$ar_text = $_POST['ar_text'];
$ar_status = strip_tags($_POST['ar_status']);
$ar_slug = generateUniqueSlug($ar_title, $conn); // إنشاء الـ slug الفريد
// upload files
// pic 1
$new_file_name1 = "noimage.png"; // القيمة الافتراضية

if (isset($_FILES["ar_image"]) && $_FILES["ar_image"]["name"] != '') {
    // تسجيل معلومات الملف المرفوع
    error_log("بدء معالجة الصورة: " . $_FILES["ar_image"]["name"]);
    error_log("حجم الملف: " . $_FILES["ar_image"]["size"] . " بايت");
    error_log("نوع الملف: " . $_FILES["ar_image"]["type"]);
    
    //upload image
    $target_dir = "../../images/";
    
    // التحقق من وجود مجلد الصور
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
        error_log("تم إنشاء مجلد الصور: $target_dir");
    }
    
    $original_filename = $_FILES["ar_image"]["name"];
    $filename = rand(0, 100000000) . "_" . $original_filename;
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    error_log("نوع الملف المستخرج: $imageFileType");
    error_log("مسار الحفظ: $target_file");
    
    // التحقق من أخطاء الرفع
    if ($_FILES["ar_image"]["error"] !== UPLOAD_ERR_OK) {
        error_log("خطأ في رفع الملف: " . $_FILES["ar_image"]["error"]);
        $uploadOk = 0;
    }
    
    // التحقق من حجم الملف (أقل من 2MB لتتوافق مع إعدادات PHP)
    if ($_FILES["ar_image"]["size"] > 2000000) {
        error_log("الملف كبير جداً: " . $_FILES["ar_image"]["size"] . " بايت (الحد الأقصى 2MB)");
        $uploadOk = 0;
    }

    // Allow certain file formats (Corrected logic)
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $allowed_types) && $uploadOk == 1) {

        if (move_uploaded_file($_FILES["ar_image"]["tmp_name"], $target_file)) {
            try {
                $file_full_path = $target_dir . $filename;
                
                // التحقق من وجود الملف بعد الرفع
                if (!file_exists($file_full_path)) {
                    throw new Exception("الملف لم يتم رفعه بنجاح: $file_full_path");
                }
                
                $resizeObj = new resize($file_full_path);
                $resizeObj->resizeImage(800, 500, 'auto');
                $new_file_name1 = rand(0, 100000) . ".jpg";
                
                $final_image_path = "../../images/" . $new_file_name1;
                $resizeObj->saveImage($final_image_path, 100);
                
                // التحقق من نجاح حفظ الصورة
                if (file_exists($final_image_path)) {
                    error_log("تم حفظ الصورة بنجاح: $final_image_path");
                } else {
                    error_log("فشل في حفظ الصورة: $final_image_path");
                    $new_file_name1 = "noimage.png";
                }
                
                // حذف الملف الأصلي بعد تغيير الحجم
                if (file_exists($file_full_path)) {
                    unlink($file_full_path);
                }
                
            } catch (Exception $e) {
                // في حالة فشل معالجة الصورة، استخدم الصورة الافتراضية
                error_log("خطأ في معالجة الصورة: " . $e->getMessage());
                $new_file_name1 = "noimage.png";
                
                // حذف الملف المرفوع في حالة الفشل
                if (file_exists($file_full_path)) {
                    unlink($file_full_path);
                }
            }
        } else {
            $new_file_name1 = "noimage.png";
        }

    } else {
        error_log("نوع الملف غير مدعوم أو فشل في التحقق: $imageFileType");
    }
} else {
    // لا يوجد ملف مرفوع أو الملف فارغ
    if (isset($_FILES["ar_image"])) {
        error_log("لا يوجد ملف مرفوع أو اسم الملف فارغ");
    }
}

// التأكد من وجود اسم الصورة
if (!isset($new_file_name1) || empty($new_file_name1)) {
    $new_file_name1 = "noimage.png";
}

// إدراج البيانات في قاعدة البيانات
$sql = "INSERT INTO $tableName
    ( `ar_type`,  `ar_title`, `ar_slug`, `ar_date` ,  `ar_blog_type` , `ar_text`, `ar_image` ,`ar_status`)
    VALUES
    ( ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$ar_type = 4; // نوع المقال
$stmt->bind_param("isssissi", $ar_type, $ar_title, $ar_slug, $ar_date, $ar_blog_type, $ar_text, $new_file_name1, $ar_status);


if ($stmt->execute()) {
    header("location:../news.php?s=1");
} else {
    header("location:../news-add.php?e=1");

}

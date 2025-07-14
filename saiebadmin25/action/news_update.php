<?php
include 'db.php';
include_once "resize_class.php";
include_once "../../action/seo_url.php"; // تضمين ملف الـ slug

$tableName = $prefix . "articles";
$ar_title = strip_tags($_POST['ar_title']);
$ar_date = strip_tags($_POST['ar_date']);
$ar_text = $_POST['ar_text'];
$ar_status = strip_tags($_POST['ar_status']);
$ar_id = strip_tags($_POST['ar_id']);
$ar_blog_type = strip_tags($_POST['ar_blog_type']);
$ar_slug = slugify($ar_title); // إنشاء الـ slug

// pic 1
if ($_FILES["ar_image"]["name"] != '') {
    //upload image
    $target_dir = "../../images/";
    $filename = rand(0, 100000000) . $_FILES["ar_image"]["name"];
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    // Allow certain file formats
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $allowed_types)) {

        if (move_uploaded_file($_FILES["ar_image"]["tmp_name"], $target_file)) {
            $file_full_path = $target_dir . $filename;
            $resizeObj = new resize($file_full_path);

            $resizeObj->resizeImage(800, 500, 'auto');
            $new_file_name1 = rand(0, 100000) . ".jpg";

            $resizeObj->saveImage("../../images/" . $new_file_name1, 100);
        } else {
            $new_file_name1 = "noimage.png";
        }

    } else {
        $new_file_name1 = "noimage.png";
    }

    $sql = "UPDATE $tableName SET ar_title = ?, ar_date = ?, ar_slug = ?, ar_text = ?, ar_image = ?, ar_blog_type = ?, ar_status = ? WHERE ar_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssiii", $ar_title, $ar_date, $ar_slug, $ar_text, $new_file_name1, $ar_blog_type, $ar_status, $ar_id);

} else {

    $sql = "UPDATE $tableName SET ar_title = ?, ar_date = ?, ar_slug = ?, ar_text = ?, ar_blog_type = ?, ar_status = ? WHERE ar_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssiii", $ar_title, $ar_date, $ar_slug, $ar_text, $ar_blog_type, $ar_status, $ar_id);
}
// check if email already exist

if ($stmt->execute()) {
  
    ?>
   <script> window.location.href = "../news.php?s=3"; </script>
    <?php
} else {

 ?>
   <script> 
   window.location.href = "<?php echo "news-edit.php?item=".$ar_id."&e=1";  ?>"; </script>
    <?php
}

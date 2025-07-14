<?php
include 'db.php';
include_once "resize_class.php";
include_once "../../action/seo_url.php";

$tableName = $prefix . "articles";
$ar_title = strip_tags($_POST['ar_title']);

$ar_text = $_POST['ar_text'];
$ar_status = strip_tags($_POST['ar_status']);
$ar_cat = strip_tags($_POST['ar_cat']);
$ar_price = strip_tags($_POST['ar_price']);
$ar_slug = slugify($ar_title);
// upload files
$new_file_name1 = "default.jpg";
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
            $new_file_name1 = "default.jpg";
        }

    } else {
        $new_file_name1 = "default.jpg";
    }
}

// check if email already exist


$sql = "INSERT INTO $tableName
    ( `ar_type`, `ar_price` ,  `ar_title`, `ar_slug`, `ar_cat` ,  `ar_text`, `ar_image` ,`ar_status`)
    VALUES
    (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$ar_type = 3; // Service for individuals
$stmt->bind_param("isssissi", $ar_type, $ar_price, $ar_title, $ar_slug, $ar_cat, $ar_text, $new_file_name1, $ar_status);

if ($stmt->execute()) {
    header("location:../individual.php?s=1");
} else {
    header("location:../individual-add.php?e=1");

}

<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "home_clients";

// upload files
// pic 1
if ($_FILES["cli_img"]["name"] != '') {
    //upload image
    $target_dir = "../../images/";
    $filename = rand(0, 100000000) . $_FILES["cli_img"]["name"];
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    // Allow certain file formats
    if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
        && $imageFileType || "gif") {

        if (move_uploaded_file($_FILES["cli_img"]["tmp_name"], $target_file)) {
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
}

// check if email already exist


$sql = "INSERT INTO $tableName
    (  `cli_img` )
    VALUES
    ( '$new_file_name1');";

if ($conn->query($sql)) {
    header("location:../clients.php?s=1");
} else {
    header("location:../clients.php?e=1");

}

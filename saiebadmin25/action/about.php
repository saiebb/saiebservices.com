<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "about";
$ab_about = $_POST['ab_about'];
$ab_vision =  $_POST['ab_vision'];
$ab_message = $_POST['ab_message'];

$ab_value_1 = $_POST['ab_value_1'];
$ab_value_2 = $_POST['ab_value_2'];
$ab_value_3 = $_POST['ab_value_3'];
$ab_value_4 = $_POST['ab_value_4'];

$ab_why_1 = $_POST['ab_why_1'];
$ab_why_2 = $_POST['ab_why_2'];
$ab_why_3 = $_POST['ab_why_3'];
$ab_why_4 = $_POST['ab_why_4'];

// pic 1
if ($_FILES["ab_about_img"]["name"] != '') {
    //upload image
    $target_dir = "../../front/images/";
    $filename = rand(0, 100000000) . $_FILES["ab_about_img"]["name"];
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    // Allow certain file formats
    if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
        && $imageFileType || "gif") {

        if (move_uploaded_file($_FILES["ab_about_img"]["tmp_name"], $target_file)) {
            $file_full_path = $target_dir . $filename;
            $resizeObj = new resize($file_full_path);

            $resizeObj->resizeImage(800, 500, 'auto');
            $new_file_name1 = rand(0, 100000) . ".jpg";

            $resizeObj->saveImage("../../front/images/" . $new_file_name1, 100);
        } else {
            $new_file_name1 = "noimage.png";
        }

    } else {
        $new_file_name1 = "noimage.png";
    }

    $sql = "update $tableName
set
ab_about = '$ab_about' ,
ab_vision =  '$ab_vision' ,
ab_message =  '$ab_message',
ab_about_img = '$new_file_name1',
ab_value_1 =  '$ab_value_1',
ab_value_2 =  '$ab_value_2',
ab_value_3 =  '$ab_value_3',
ab_value_4 =  '$ab_value_4',
ab_why_1 =  '$ab_why_1',
ab_why_2 =  '$ab_why_2',
ab_why_3 =  '$ab_why_3',
ab_why_4 =  '$ab_why_4'
where
ab_id = 1 " ;

} else {

    $sql = "update $tableName
set
ab_about = '$ab_about' ,
ab_vision =  '$ab_vision' ,
ab_message =  '$ab_message',

ab_value_1 =  '$ab_value_1',
ab_value_2 =  '$ab_value_2',
ab_value_3 =  '$ab_value_3',
ab_value_4 =  '$ab_value_4',
ab_why_1 =  '$ab_why_1',
ab_why_2 =  '$ab_why_2',
ab_why_3 =  '$ab_why_3',
ab_why_4 =  '$ab_why_4'
where
ab_id = 1 " ;
}

// check if email already exist

if ($conn->query($sql)) {
  
    ?>
<script>
window.location.href = "../about.php?s=3";
</script>
<?php
} else {

 ?>
<script>
window.location.href = "<?php echo "about.php?e=1";  ?>";
</script>
<?php
}
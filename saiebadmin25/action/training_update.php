<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "articles";
$ar_title = strip_tags($_POST['ar_title']);
$ar_date = strip_tags($_POST['ar_date']);
$ar_price = strip_tags($_POST['ar_price']);
$ar_text = $_POST['ar_text'];
$ar_status = strip_tags($_POST['ar_status']);
$ar_id = strip_tags($_POST['ar_id']);

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
    if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
        && $imageFileType || "gif") {

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

    $sql = "update $tableName
set
ar_title = '$ar_title' ,
ar_date =  '$ar_date' ,
ar_price =  '$ar_price' ,
ar_text =  '$ar_text',
ar_image = '$new_file_name1',
ar_status =  '$ar_status'
where
ar_id = " . $ar_id;

} else {

    $sql = "update $tableName
set
ar_title = '$ar_title' ,
ar_date =  '$ar_date' ,
ar_price =  '$ar_price' ,
ar_text =  '$ar_text',

ar_status =  '$ar_status'
where
ar_id = " . $ar_id;
}

// check if email already exist

if ($conn->query($sql)) {
  
    ?>
   <script> window.location.href = "../training.php?s=3"; </script>
    <?php
} else {

 ?>
   <script> 
   window.location.href = "<?php echo "training-edit.php?item=".$ar_id."&e=1";  ?>"; </script>
    <?php
}

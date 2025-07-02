<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "library";
$lib_cat = strip_tags($_POST['lib_cat']);
$lib_title = strip_tags($_POST['lib_title']);

$lib_status = strip_tags($_POST['lib_status']);
$lib_id = strip_tags($_POST['lib_id']);

// pic 1
if ($_FILES["lib_file"]["name"] != '') {
     //upload image
     $target_dir = "../../library/";
     $filename = rand(0, 100000000) . $_FILES["lib_file"]["name"];
     $target_file = $target_dir . basename($filename);
     $uploadOk = 1;
     $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
     // Check if image file is a actual image or fake image
 
     
 
         if (move_uploaded_file($_FILES["lib_file"]["tmp_name"], $target_file)) {
           
             // $resizeObj = new resize($file_full_path);
 
             // $resizeObj->resizeImage(800, 500, 'auto');
             // $new_file_name1 = rand(0, 100000) . ".jpg";
 
             // $resizeObj->saveImage("../../images/" . $new_file_name1, 100);
         } else {
             $new_file_name1 = "noimage.png";
         }

    $sql = "update $tableName
set
lib_cat = '$lib_cat' ,
lib_title =  '$lib_title' ,

lib_file = '$filename',
lib_status =  '$lib_status'
where
lib_id = " . $lib_id;

} else {

    $sql = "update $tableName
set
lib_cat = '$lib_cat' ,
lib_title =  '$lib_title' ,


lib_status =  '$lib_status'
where
lib_id = " . $lib_id;
}

// check if email already exist

if ($conn->query($sql)) {
  
    ?>
   <script> window.location.href = "../library.php?s=3"; </script>
    <?php
} else {

 ?>
   <script> 
   window.location.href = "<?php echo "library-edit.php?item=".$lib_id."&e=1";  ?>"; </script>
    <?php
}

<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "home_slider";

// slider 1
$sl_title1 = strip_tags($_POST['sl_title1']);
$sl_text1 = $_POST['sl_text1'];

// slider 2
$sl_title2 = strip_tags($_POST['sl_title2']);
$sl_text2 = $_POST['sl_text2'];

// slider 3
$sl_title3 = strip_tags($_POST['sl_title3']);
$sl_text3 = $_POST['sl_text3'];


// sql
$sql1 = "update $tableName
set
sl_title = '$sl_title1' ,
sl_text =  '$sl_text1' 
where
sl_id =  1" ;
$conn->query($sql1) ;



$sql2 = "update $tableName
set
sl_title = '$sl_title2' ,
sl_text =  '$sl_text2' 
where
sl_id =  2" ;
$conn->query($sql2) ;



$sql3 = "update $tableName
set
sl_title = '$sl_title3' ,
sl_text =  '$sl_text3' 
where
sl_id =  3" ;
$conn->query($sql3) ;




// pic 1
if ($_FILES["sl_img1"]["name"] != '') {
        //upload image
        $target_dir = "../../images/";
        $filename = rand(0, 100000000) . $_FILES["sl_img1"]["name"];
        $target_file = $target_dir . basename($filename);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image

        // Allow certain file formats
    if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
            && $imageFileType || "gif") {

            if (move_uploaded_file($_FILES["sl_img1"]["tmp_name"], $target_file)) {
                $file_full_path = $target_dir . $filename;
                $resizeObj = new resize($file_full_path);

                $resizeObj->resizeImage(1200, 500, 'auto');
                $new_file_name1 = rand(0, 100000) . ".jpg";

                $resizeObj->saveImage("../../images/" . $new_file_name1, 100);
            } else {
                $new_file_name1 = "noimage.png";
            }


         

    } 


    $sqlimg1 = "update $tableName
    set
  
    sl_img =  '$new_file_name1' 
    where
    sl_id =  1" ;
    $conn->query($sqlimg1) ;
    

     

} 



// pic 2
if ($_FILES["sl_img2"]["name"] != '') {
    //upload image
    $target_dir = "../../images/";
    $filename = rand(0, 100000000) . $_FILES["sl_img2"]["name"];
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    // Allow certain file formats
if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
        && $imageFileType || "gif") {

        if (move_uploaded_file($_FILES["sl_img2"]["tmp_name"], $target_file)) {
            $file_full_path = $target_dir . $filename;
            $resizeObj = new resize($file_full_path);

            $resizeObj->resizeImage(800, 500, 'auto');
            $new_file_name1 = rand(0, 100000) . ".jpg";

            $resizeObj->saveImage("../../images/" . $new_file_name1, 100);
        } else {
            $new_file_name1 = "noimage.png";
        }


} 



$sqlimg2 = "update $tableName
set
sl_img = '$new_file_name1' 

where
sl_id =  2" ;
$conn->query($sqlimg2) ;

 

} 


// pic 3
if ($_FILES["sl_img3"]["name"] != '') {
    //upload image
    $target_dir = "../../images/";
    $filename = rand(0, 100000000) . $_FILES["sl_img3"]["name"];
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    // Allow certain file formats
if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
        && $imageFileType || "gif") {

        if (move_uploaded_file($_FILES["sl_img3"]["tmp_name"], $target_file)) {
            $file_full_path = $target_dir . $filename;
            $resizeObj = new resize($file_full_path);

            $resizeObj->resizeImage(800, 500, 'auto');
            $new_file_name1 = rand(0, 100000) . ".jpg";

            $resizeObj->saveImage("../../images/" . $new_file_name1, 100);
        } else {
            $new_file_name1 = "noimage.png";
        }



} 




$sqlimg3 = "update $tableName
set
sl_img = '$new_file_name1' 

where
sl_id =  3" ;
$conn->query($sqlimg3) ;
 

} 


if ($conn->query($sql1)) {
  
    ?>
<script>
window.location.href = "../slider.php?s=3";
</script>
<?php
} else {

 ?>
<script>
window.location.href = "<?php echo "../slider.php&e=1";  ?>";
</script>
<?php
}
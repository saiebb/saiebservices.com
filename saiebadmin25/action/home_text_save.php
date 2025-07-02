<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "home_text";

// slider 1
$te_title1 = strip_tags($_POST['te_title1']);
$te_text1 = $_POST['te_text1'];

// slider 2
$te_title2 = strip_tags($_POST['te_title2']);
$te_text2 = $_POST['te_text2'];

// slider 3
$te_title3 = strip_tags($_POST['te_title3']);
$te_text3 = $_POST['te_text3'];


// slider 3
$te_title4 = strip_tags($_POST['te_title4']);
$te_text4 = $_POST['te_text4'];


// sql
$sql1 = "update $tableName
set
te_title = '$te_title1' ,
te_text =  '$te_text1' 
where
te_id =  1" ;
$conn->query($sql1) ;



$sql2 = "update $tableName
set
te_title = '$te_title2' ,
te_text =  '$te_text2' 
where
te_id =  2" ;
$conn->query($sql2) ;



$sql3 = "update $tableName
set
te_title = '$te_title3' ,
te_text =  '$te_text3' 
where
te_id =  3" ;
$conn->query($sql3) ;


$sql4 = "update $tableName
set
te_title = '$te_title4' ,
te_text =  '$te_text4' 
where
te_id =  4" ;
$conn->query($sql4) ;


// pic 1
if ($_FILES["te_img1"]["name"] != '') {
        //upload image
        $target_dir = "../../images/";
        $filename = rand(0, 100000000) . $_FILES["te_img1"]["name"];
        $target_file = $target_dir . basename($filename);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image

        // Allow certain file formats
    if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
            && $imageFileType || "gif") {

            if (move_uploaded_file($_FILES["te_img1"]["tmp_name"], $target_file)) {
                $file_full_path = $target_dir . $filename;
                $resizeObj = new resize($file_full_path);

                $resizeObj->resizeImage(800, 500, 'auto');
                $new_file_name1 = rand(0, 100000) . ".jpg";

                $resizeObj->saveImage("../../images/" . $new_file_name1, 100);
            } else {
                $new_file_name1 = "noimage.png";
            }


         

    } 


    $sqlimg1 = "update $tableName
    set
  
    te_img =  '$new_file_name1' 
    where
    te_id =  1" ;
    $conn->query($sqlimg1) ;
    

     

} 



// pic 2
if ($_FILES["te_img2"]["name"] != '') {
    //upload image
    $target_dir = "../../images/";
    $filename = rand(0, 100000000) . $_FILES["te_img2"]["name"];
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    // Allow certain file formats
if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
        && $imageFileType || "gif") {

        if (move_uploaded_file($_FILES["te_img2"]["tmp_name"], $target_file)) {
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
te_img = '$new_file_name1' 

where
te_id =  2" ;
$conn->query($sqlimg2) ;

 

} 


// pic 3
if ($_FILES["te_img3"]["name"] != '') {
    //upload image
    $target_dir = "../../images/";
    $filename = rand(0, 100000000) . $_FILES["te_img3"]["name"];
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    // Allow certain file formats
if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
        && $imageFileType || "gif") {

        if (move_uploaded_file($_FILES["te_img3"]["tmp_name"], $target_file)) {
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
te_img = '$new_file_name1' 

where
te_id =  3" ;
$conn->query($sqlimg3) ;
 

} 





// pic 4
if ($_FILES["te_img4"]["name"] != '') {
    //upload image
    $target_dir = "../../images/";
    $filename = rand(0, 100000000) . $_FILES["te_img4"]["name"];
    $target_file = $target_dir . basename($filename);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image

    // Allow certain file formats
if ($imageFileType == "jpg" || $imageFileType || "png" || $imageFileType || "jpeg"
        && $imageFileType || "gif") {

        if (move_uploaded_file($_FILES["te_img4"]["tmp_name"], $target_file)) {
            $file_full_path = $target_dir . $filename;
            $resizeObj = new resize($file_full_path);

            $resizeObj->resizeImage(800, 500, 'auto');
            $new_file_name1 = rand(0, 100000) . ".jpg";

            $resizeObj->saveImage("../../images/" . $new_file_name1, 100);
        } else {
            $new_file_name1 = "noimage.png";
        }



} 




$sqlimg4 = "update $tableName
set
te_img = '$new_file_name1' 
where
te_id =  4" ;
$conn->query($sqlimg4) ;
 

} 

if ($conn->query($sql1)) {
  
    ?>
<script>
window.location.href = "../home-text.php?s=3";
</script>
<?php
} else {

 ?>
<script>
window.location.href = "<?php echo "../home-text.php&e=1";  ?>";
</script>
<?php
}
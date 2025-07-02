<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "library_cat";
$lib_cat_name = strip_tags($_POST['lib_cat_name']);

$lib_cat_status = strip_tags($_POST['lib_cat_status']);
$lib_cat_id = strip_tags($_POST['lib_cat_id']);



    $sql = "update $tableName
set
lib_cat_name = '$lib_cat_name' ,
lib_cat_status =  '$lib_cat_status'
where
lib_cat_id = " . $lib_cat_id;

// check if email already exist

if ($conn->query($sql)) {

    ?>
   <script> window.location.href = "../library-cat.php?s=3"; </script>
    <?php
} else {

 ?>
   <script> 
   window.location.href = "<?php echo "library-cat.php?item=".$lib_cat_id."&e=1";  ?>"; </script>
    <?php
}

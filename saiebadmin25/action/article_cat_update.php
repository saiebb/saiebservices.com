<?php
include 'db.php';
include_once "resize_class.php";

$tableName = $prefix . "articles_cat";
$ar_cat_name = strip_tags($_POST['ar_cat_name']);

$ar_cat_status = strip_tags($_POST['ar_cat_status']);
$ar_cat_id = strip_tags($_POST['ar_cat_id']);



    $sql = "update $tableName
set
ar_cat_name = '$ar_cat_name' ,
ar_cat_status =  '$ar_cat_status'
where
ar_cat_id = " . $ar_cat_id;

// check if email already exist

if ($conn->query($sql)) {

    ?>
<script>
window.location.href = "../article-cat.php?s=3";
</script>
<?php
} else {

 ?>
<script>
window.location.href = "<?php echo "article-cat.php?item=".$ar_cat_id."&e=1";  ?>";
</script>
<?php
}
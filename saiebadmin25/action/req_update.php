<?php
include 'db.php';


$tableName = $prefix . "requests";
$req_status = strip_tags($_POST['req_status']);
$req_id = strip_tags($_POST['req_id']);
$req_type = strip_tags($_POST['req_type']);




    $sql = "update $tableName
set

req_status =  '$req_status'
where
req_id = " . $req_id;

// check if email already exist

if ($conn->query($sql)) {

    ?>
   <script> window.location.href = "../requests.php?type=<?php echo $req_type ;?>"; </script>
    <?php
} else {

 ?>
   <script> 
   window.location.href = "<?php echo "requests.php?type=". $req_type ;  ?>"; </script>
    <?php
}

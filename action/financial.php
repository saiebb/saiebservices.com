<?php
include 'db.php';

$tableName = $prefix . "articles";

$sqlfinancial = " SELECT * FROM $tableName  where ar_type = 6  and ar_status = 1 order by ar_id desc";

$reultfinancial = $conn->query($sqlfinancial);

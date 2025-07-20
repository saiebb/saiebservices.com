<?php
include 'action/db.php';

echo "أول 3 مقالات في قاعدة البيانات:\n";
$result = $conn->query('SELECT ar_id, ar_title, ar_slug FROM sa_articles ORDER BY ar_id DESC LIMIT 3');
while($row = $result->fetch_assoc()) {
    echo "ID: " . $row['ar_id'] . " - العنوان: " . $row['ar_title'] . " - Slug: " . ($row['ar_slug'] ?: 'NULL') . "\n";
}
?>
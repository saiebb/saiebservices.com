<?php
include 'action/db.php';

echo "<h2>حالة نظام Google Customer Reviews</h2>";

// فحص آخر 10 طلبات
$query = "SELECT req_id, req_cli_name, req_cli_email, google_reviews_consent, req_time 
          FROM sa_requests 
          ORDER BY req_id DESC 
          LIMIT 10";

$result = mysqli_query($conn, $query);

if ($result) {
    echo "<h3>آخر 10 طلبات:</h3>";
    echo "<table border='1' style='border-collapse: collapse; width: 100%;'>";
    echo "<tr style='background: #f0f0f0;'>
            <th>رقم الطلب</th>
            <th>الاسم</th>
            <th>البريد الإلكتروني</th>
            <th>موافقة Google</th>
            <th>وقت الطلب</th>
          </tr>";
    
    while ($row = mysqli_fetch_assoc($result)) {
        $googleStatus = $row['google_reviews_consent'] == 1 ? '✅ موافق' : '❌ غير موافق';
        $emailStatus = !empty($row['req_cli_email']) ? '✅' : '❌ فارغ';
        
        echo "<tr>";
        echo "<td>" . $row['req_id'] . "</td>";
        echo "<td>" . $row['req_cli_name'] . "</td>";
        echo "<td>" . $emailStatus . " " . $row['req_cli_email'] . "</td>";
        echo "<td>" . $googleStatus . "</td>";
        echo "<td>" . $row['req_time'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
    // إحصائيات
    $statsQuery = "SELECT 
                    COUNT(*) as total_requests,
                    SUM(CASE WHEN google_reviews_consent = 1 THEN 1 ELSE 0 END) as google_consent_yes,
                    SUM(CASE WHEN google_reviews_consent = 0 OR google_reviews_consent IS NULL THEN 1 ELSE 0 END) as google_consent_no,
                    SUM(CASE WHEN req_cli_email IS NOT NULL AND req_cli_email != '' THEN 1 ELSE 0 END) as with_email,
                    SUM(CASE WHEN req_cli_email IS NULL OR req_cli_email = '' THEN 1 ELSE 0 END) as without_email
                   FROM sa_requests";
    
    $statsResult = mysqli_query($conn, $statsQuery);
    $stats = mysqli_fetch_assoc($statsResult);
    
    echo "<h3>الإحصائيات:</h3>";
    echo "<ul>";
    echo "<li><strong>إجمالي الطلبات:</strong> " . $stats['total_requests'] . "</li>";
    echo "<li><strong>موافقة على Google Reviews:</strong> " . $stats['google_consent_yes'] . "</li>";
    echo "<li><strong>عدم الموافقة:</strong> " . $stats['google_consent_no'] . "</li>";
    echo "<li><strong>طلبات بها بريد إلكتروني:</strong> " . $stats['with_email'] . "</li>";
    echo "<li><strong>طلبات بدون بريد إلكتروني:</strong> " . $stats['without_email'] . "</li>";
    echo "</ul>";
    
} else {
    echo "خطأ في الاستعلام: " . mysqli_error($conn);
}

mysqli_close($conn);
?>

<style>
body { font-family: Arial, sans-serif; margin: 20px; }
table { margin: 20px 0; }
th, td { padding: 8px; text-align: right; }
th { background: #f0f0f0; }
</style>

<p><a href="index.php">← العودة للموقع</a></p>
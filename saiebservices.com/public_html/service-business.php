<?php
// filepath: c:\Users\user\OneDrive - EGY Melamine\Projects\public_html\public_html\service-business.php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>خدمات الأعمال - صيب</title>
    <link rel="stylesheet" href="css/style-rtl.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h1>خدمات الأعمال</h1>
        <p>نحن نقدم مجموعة متنوعة من الخدمات المصممة خصيصًا لتلبية احتياجات الأعمال. تشمل خدماتنا:</p>
        <ul>
            <li>استشارات الأعمال</li>
            <li>تطوير استراتيجيات الأعمال</li>
            <li>تدريب الموظفين</li>
            <li>تحليل السوق</li>
            <li>خدمات الدعم الإداري</li>
        </ul>
        <p>للمزيد من المعلومات حول خدماتنا، لا تتردد في <a href="contact.php">التواصل معنا</a>.</p>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>
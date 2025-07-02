<?php
// filepath: c:\Users\user\OneDrive - EGY Melamine\Projects\public_html\public_html\library_cat.php

$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Catalog</title>
    <link rel="stylesheet" href="css/style-rtl.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body class="stretched rtl">
    <?php include 'header.php'; ?>

    <div id="content">
        <div class="container">
            <h1>Library Catalog</h1>
            <p>Welcome to our library catalog. Here you can find a variety of resources available for you.</p>
            <ul>
                <li><a href="resource1.php">Resource 1</a></li>
                <li><a href="resource2.php">Resource 2</a></li>
                <li><a href="resource3.php">Resource 3</a></li>
                <li><a href="resource4.php">Resource 4</a></li>
                <li><a href="resource5.php">Resource 5</a></li>
            </ul>
        </div>
    </div>

    <?php include 'footer.php'; ?>
</body>

</html>
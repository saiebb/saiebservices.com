<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - صيب لخدمات الاعمال</title>
    <link rel="stylesheet" href="css/style-rtl.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body class="stretched rtl">
    <?php include 'header.php'; ?>

    <div id="content">
        <div class="container">
            <h1>Blog Posts</h1>
            <div class="blog-posts">
                <article class="post">
                    <h2><a href="blog-single.php?id=1">Blog Post Title 1</a></h2>
                    <p>Excerpt from blog post 1. This is a brief description of the content.</p>
                </article>
                <article class="post">
                    <h2><a href="blog-single.php?id=2">Blog Post Title 2</a></h2>
                    <p>Excerpt from blog post 2. This is a brief description of the content.</p>
                </article>
                <article class="post">
                    <h2><a href="blog-single.php?id=3">Blog Post Title 3</a></h2>
                    <p>Excerpt from blog post 3. This is a brief description of the content.</p>
                </article>
                <!-- Add more blog posts as needed -->
            </div>
        </div>
    </div>

    <?php include 'footer.php'; ?>
    <script src="js/main.js"></script>
</body>

</html>
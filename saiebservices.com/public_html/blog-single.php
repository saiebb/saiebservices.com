<?php
// filepath: /saiebservices.com/saiebservices.com/public_html/blog-single.php

$current_page = basename($_SERVER['PHP_SELF']);

// Sample blog post data (this could be fetched from a database)
$blog_post = [
    'title' => 'Sample Blog Post Title',
    'date' => 'October 1, 2023',
    'author' => 'Author Name',
    'content' => '<p>This is the content of the blog post. It can include <strong>HTML</strong> elements, images, and more.</p>',
    'tags' => ['tag1', 'tag2', 'tag3']
];
?>

<!DOCTYPE html>
<html lang="en-US">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $blog_post['title']; ?></title>
    <link rel="stylesheet" href="css/style-rtl.css">
    <link rel="stylesheet" href="css/custom.css">
</head>

<body class="stretched rtl">
    <?php include 'header.php'; ?>

    <div id="wrapper">
        <div class="container">
            <h1><?php echo $blog_post['title']; ?></h1>
            <p><em>Posted on <?php echo $blog_post['date']; ?> by <?php echo $blog_post['author']; ?></em></p>
            <div class="blog-content">
                <?php echo $blog_post['content']; ?>
            </div>
            <div class="blog-tags">
                <strong>Tags:</strong>
                <?php foreach ($blog_post['tags'] as $tag): ?>
                    <span class="tag"><?php echo $tag; ?></span>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <script src="js/main.js"></script>
</body>

</html>
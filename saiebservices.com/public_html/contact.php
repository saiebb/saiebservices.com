<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html dir="rtl" lang="en-US">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>تواصل معنا</title>
    <link rel="stylesheet" href="css/custom.css" />
    <link rel="stylesheet" href="css/font-icons.css" />
    <link rel="stylesheet" href="css/swiper.css" />
    <link rel="stylesheet" href="style-rtl.css" />
</head>

<body class="stretched rtl">
    <header id="header" class="full-header transparent-header" data-sticky-class="not-dark">
        <div id="header-wrap">
            <div class="container">
                <div class="header-row">
                    <div id="logo">
                        <a href="index.php">
                            <img src="images/logo.png" alt="" />
                        </a>
                    </div>
                    <nav class="primary-menu">
                        <ul class="menu-container">
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'index.php') ? 'active-link' : ''?>" href="index.php">
                                    <div>الرئيســـية</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'about.php') ? 'active-link' : ''?>" href="about.php">
                                    <div>من نحن</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a class="menu-link <?=($current_page == 'contact.php') ? 'active-link' : ''?>" href="contact.php">
                                    <div>تواصــل معنا</div>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div id="wrapper">
        <div class="container">
            <h1>تواصل معنا</h1>
            <form action="send_contact.php" method="post">
                <div class="form-group">
                    <label for="name">الاسم:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">البريد الإلكتروني:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">الرسالة:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <button type="submit">إرسال</button>
            </form>
        </div>
    </div>
</body>

</html>
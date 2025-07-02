<!-- Main Sidebar Container -->
<?php

$current_url = $_SERVER['REQUEST_URI'];

?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class=" mt-3 pb-3 mb-3 d-flex-center">

            <div class="info text-center">
                <a href="#">
                    <img src="images/whitelogo.png" width="90" />
                </a>
            </div>
        </div>



        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="index.php"
                        class="nav-link  <?php if (strpos($current_url, 'index.php') !== false  || strpos($current_url, 'requests.php') !== false) {echo "active";}?>">
                        <i class="nav-icon fas fa-th"></i>

                        <p>
                            طلبات العملاء
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="training.php"
                        class="nav-link <?php if (strpos($current_url, 'training.php') !== false || strpos($current_url, 'training-add.php') !== false || strpos($current_url, 'training-edit.php') !== false) {echo "active";}?>">
                        <i class="fa fa-graduation-cap" aria-hidden="true"></i>

                        <p>
                            التدريب
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="buinsess-service.php"
                        class="nav-link <?php if (strpos($current_url, 'buinsess-service.php') !== false || strpos($current_url, 'buinsess-service-add.php') !== false || strpos($current_url, 'buinsess-service-edit.php') !== false) {echo "active";}?>">
                        <i class="fa fa-briefcase" aria-hidden="true"></i>
                        <p>
                            خدمات الاعمال
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="individual.php"
                        class="nav-link <?php if (strpos($current_url, 'individual.php') !== false ||  strpos($current_url, 'individual-edit') !== false) {echo "active";}?>">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>
                            خدمات الافراد والمنشــآت
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="financial.php"
                        class="nav-link <?php if (strpos($current_url, 'financial.php') !== false || strpos($current_url, 'financial-add.php') !== false || strpos($current_url, 'financial-edit.php') !== false) {echo "active";}?>">
                        <i class="fa fa-credit-card" aria-hidden="true"></i>




                        <p>
                            الاستشـــارات المالية
                        </p>
                    </a>
                </li>







                <li class="nav-item menu-open">
                    <a href="#"
                        class="nav-link <?php if (strpos($current_url, 'library-cat.php') !== false ||  strpos($current_url, 'library-cat-add.php') !== false   ||  strpos($current_url, 'library-cat-edit.php') !== false   ||  strpos($current_url, 'library') !== false ||  strpos($current_url, 'library-add') !== false  ||  strpos($current_url, 'library-edit') !== false   ) {echo "active";}?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            مكتبة صــيب
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item ">
                            <a href="library-cat.php"
                                class="nav-link  sublinksmall <?php if (strpos($current_url, 'library-cat.php') !== false ||  strpos($current_url, 'library-cat-add.php') !== false ||  strpos($current_url, 'library-cat-edit.php') !== false) {echo "active";}?>">
                                <i class="fa fa-building" aria-hidden="true"></i>

                                <p>الاقســام</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="library.php"
                                class="nav-link sublinksmall <?php if (strpos($current_url, 'library.php') !== false ||  strpos($current_url, 'library-edit') !== false) {echo "active";}?>">
                                <i class="fa fa-book" aria-hidden="true"></i>

                                <p>الملفات</p>
                            </a>
                        </li>


                    </ul>
                </li>


                <li class="nav-item menu-open">
                    <a href="#"
                        class="nav-link <?php if (strpos($current_url, 'slider.php') !== false ||  strpos($current_url, 'home-text.php') !== false   ||  strpos($current_url, 'clients.php') !== false    ) {echo "active";}?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            الرئيســــية
                            <i class="fas fa-angle-left right"></i>

                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="slider.php"
                                class="nav-link  sublinksmall <?php if (strpos($current_url, 'slider.php') !== false) {echo "active";}?>">
                                <i class="fa fa-file-image" aria-hidden="true"></i>
                                <p>
                                    الصور المتحركة
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="home-text.php"
                                class="nav-link sublinksmall <?php if (strpos($current_url, 'home-text') !== false ) {echo "active";}?>">
                                <i class="fa fa-book" aria-hidden="true"></i>
                                <p> نص الصفحة الرئيســــية </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="clients.php"
                                class="nav-link sublinksmall <?php if (strpos($current_url, 'clients.php') !== false ||  strpos($current_url, 'clients-add.php') !== false) {echo "active";}?>">
                                <i class="fa fa-book" aria-hidden="true"></i>
                                <p>العملاء</p>
                            </a>
                        </li>

                    </ul>
                </li>




                <li class="nav-item">
                    <a href="news.php"
                        class="nav-link <?php if (strpos($current_url, 'news.php') !== false || strpos($current_url, 'news-add.php') !== false || strpos($current_url, 'news-edit.php') !== false) {echo "active";}?>">
                        <i class="fa fa-newspaper" aria-hidden="true"></i>

                        <p>
                            انجـــازتنا
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="clientsoponions.php"
                        class="nav-link <?php if (strpos($current_url, 'clientsoponions.php') !== false || strpos($current_url, 'clientsoponions-add.php') !== false || strpos($current_url, 'clientsoponions-edit.php') !== false) {echo "active";}?>">
                        <i class="fa fa-newspaper" aria-hidden="true"></i>

                        <p>
                            اراء العملاء
                        </p>
                    </a>
                </li>

               


                <li class="nav-item">
                    <a href="about.php"
                        class="nav-link <?php if (strpos($current_url, 'about.php') !== false ) {echo "active";}?>">
                        <i class="fa fa-compass" aria-hidden="true"></i>

                        <p>
                            من نحن
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="contact.php"
                        class="nav-link <?php if (strpos($current_url, 'contact.php') !== false ) {echo "active";}?>">
                        <i class="fa fa-envelope" aria-hidden="true"></i>


                        <p>
                            اتصــل بنــا
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
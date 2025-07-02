<?php
include 'header.php';
include 'action/business.php';
?>

<!-- Page Title
		============================================= -->
<section class="page-title bg-transparent border-1">
    <div class="container">
        <div class="page-title-row pt-3 pb-3">

            <div class="page-title-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">الرئيســـية</a></li>
                        <li class="breadcrumb-item"><a href="index.php">خدماتنا</a></li>

                        <li class="breadcrumb-item active" aria-current="page"> خدمات الاعمــال
                        </li>
                    </ol>
                </nav>

                <h5>
                    <div class=" nocolor"> خدمات الاعمــال </div>
                </h5>
            </div>




        </div>
    </div>
</section><!-- .page-title end -->

<!-- Content
		============================================= -->
<section id="content">
    <div class="content-wrap">
        <div class="container">

            <div class="row">
                <!-- منطقة الخدمات -->
                <div class="col-12">
                    <!-- شريط الفرز والنتائج -->
                    <div class="services-header">
                        <div class="services-count">
                            <?php 
                            $totalServices = $reultBusiness->num_rows;
                            echo "عرض 1 إلى {$totalServices} من إجمالي {$totalRows} خدمة";
                            ?>
                        </div>
                        
                        <div class="header-controls">
                            <!-- أزرار التحكم في التخطيط -->
                            <div class="layout-controls">
                                <span>عرض:</span>
                                <button class="layout-btn" 
                                        data-grid="2" 
                                        title="عرض عمودين" 
                                        aria-label="تغيير التخطيط إلى عمودين"
                                        onclick="changeLayout(2)" 
                                        type="button">
                                    <span class="sr-only">عمودين</span>
                                </button>
                                <button class="layout-btn" 
                                        data-grid="3" 
                                        title="عرض 3 أعمدة" 
                                        aria-label="تغيير التخطيط إلى 3 أعمدة"
                                        onclick="changeLayout(3)" 
                                        type="button">
                                    <span class="sr-only">3 أعمدة</span>
                                </button>
                                <button class="layout-btn active" 
                                        data-grid="4" 
                                        title="عرض 4 أعمدة" 
                                        aria-label="تغيير التخطيط إلى 4 أعمدة"
                                        onclick="changeLayout(4)" 
                                        type="button">
                                    <span class="sr-only">4 أعمدة</span>
                                </button>
                                <button class="layout-btn" 
                                        data-grid="6" 
                                        title="عرض 6 أعمدة" 
                                        aria-label="تغيير التخطيط إلى 6 أعمدة"
                                        onclick="changeLayout(6)" 
                                        type="button">
                                    <span class="sr-only">6 أعمدة</span>
                                </button>
                            </div>
                            
                            <!-- قائمة الفرز -->
                            <div class="services-sort">
                                <label for="sort-select" class="sr-only">ترتيب الخدمات</label>
                                <select id="sort-select" 
                                        onchange="sortServices(this.value)"
                                        title="ترتيب الخدمات"
                                        aria-label="اختر طريقة ترتيب الخدمات">
                                    <option value="featured">ترتيب حسب: المميزة</option>
                                    <option value="price-low">السعر: من الأقل للأعلى</option>
                                    <option value="price-high">السعر: من الأعلى للأقل</option>
                                    <option value="name">الاسم: أ-ي</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- شبكة الخدمات -->
                    <div class="services-grid">
                        <?php
                        // إعادة تعيين المؤشر للخدمات
                        $reultBusiness->data_seek(0);
                        $serviceCount = 0;
                        while ($rowscBusiness = $reultBusiness->fetch_assoc()) {
                            $serviceCount++;
                            
                            // تحديد نوع الشارة
                            $badgeClass = '';
                            $badgeText = '';
                            if ($serviceCount <= 3) {
                                $badgeClass = 'popular';
                                $badgeText = 'الأكثر طلباً';
                            } elseif ($serviceCount <= 6) {
                                $badgeClass = 'new';
                                $badgeText = 'جديد';
                            }
                        ?>
                            <div class="service-card" data-price="<?php echo isset($rowscBusiness['ar_price']) ? $rowscBusiness['ar_price'] : '0'; ?>" data-name="<?php echo $rowscBusiness['ar_title']; ?>">
                                <?php if ($badgeText): ?>
                                    <div class="service-badge <?php echo $badgeClass; ?>">
                                        <?php echo $badgeText; ?>
                                    </div>
                                <?php endif; ?>
                                
                                <div class="service-image">
                                    <?php if (!empty($rowscBusiness['ar_image'])): ?>
                                        <img src="images/<?php echo $rowscBusiness['ar_image']; ?>" 
                                             alt="<?php echo $rowscBusiness['ar_title']; ?>">
                                    <?php else: ?>
                                        <img src="images/default.jpg" 
                                             alt="<?php echo $rowscBusiness['ar_title']; ?>">
                                    <?php endif; ?>
                                </div>
                                
                                <div class="service-content">
                                    <h3 class="service-title">
                                        <?php echo $rowscBusiness['ar_title']; ?>
                                    </h3>
                                    
                                    <div class="service-price-area">
                                        <div class="service-price">
                                            <?php echo isset($rowscBusiness['ar_price']) ? $rowscBusiness['ar_price'] : ''; ?>
                                            <span class="currency">ر.س</span>
                                        </div>
                                    </div>
                                    
                                    <a href="service-detail.php?id=<?php echo $rowscBusiness['ar_id']; ?>" 
                                       class="service-btn">
                                        <i class="uil uil-shopping-cart"></i>
                                        اشترك الآن
                                    </a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination
        ============================================= -->
        <ul class="pagination mt-5 pagination-circle justify-content-center">
            <?php if ($currentPage > 1): ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage - 1; ?>"><i
                        class="uil uil-angle-right-b"></i></a></li>
            <?php else: ?>
            <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-right-b"></i></a></li>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <li class="page-item <?php if ($i == $currentPage) echo 'active'; ?>"><a class="page-link"
                    href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
            <li class="page-item"><a class="page-link" href="?page=<?php echo $currentPage + 1; ?>"><i
                        class="uil uil-angle-left-b"></i></a></li>
            <?php else: ?>
            <li class="page-item disabled"><a class="page-link" href="#"><i class="uil uil-angle-left-b"></i></a></li>
            <?php endif; ?>
        </ul>

        <div class="section">
            <div class="container">

                <div class="heading-block text-center">
                    <h2>كيف يمكنني الحصــول على الخدمة .</h2>

                </div>

                <div class="row col-mb-50">


                    <div class="col-md-12">
                        <div class="feature-box fbox-plain">

                            <div class="fbox-content text-center ">

                                <p class="text-center "> يتم تقديم عرض السعر للخدمة بعد زيارة المنشاة والاطلاع على حجم
                                    العمل المطلوب. </p>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>



        <a href="contact.php" class="button button-full text-center text-end mt-6 footer-stick">
            <div class="container">
                هل تحتاج لمســـاعدة ؟ <strong>تواصل معنا</strong> <i class="fa-solid fa-caret-left"
                    style="top:4px;"></i>
            </div>
        </a>

    </div>
</section><!-- #content end -->

<script>
// وظيفة الفرز
function sortServices(sortType) {
    const grid = document.querySelector('.services-grid');
    const cards = Array.from(grid.querySelectorAll('.service-card'));
    
    cards.sort((a, b) => {
        switch(sortType) {
            case 'price-low':
                return parseFloat(a.dataset.price) - parseFloat(b.dataset.price);
            case 'price-high':
                return parseFloat(b.dataset.price) - parseFloat(a.dataset.price);
            case 'name':
                return a.dataset.name.localeCompare(b.dataset.name, 'ar');
            default:
                return 0;
        }
    });
    
    // إضافة تأثير انتقالي
    grid.style.opacity = '0.7';
    
    setTimeout(() => {
        // إعادة ترتيب العناصر
        cards.forEach(card => grid.appendChild(card));
        grid.style.opacity = '1';
    }, 200);
}

// وظيفة تغيير التخطيط
function changeLayout(columns) {
    const grid = document.querySelector('.services-grid');
    const buttons = document.querySelectorAll('.layout-btn');
    
    // إزالة جميع كلاسات التخطيط
    grid.className = grid.className.replace(/grid-\d+/g, '');
    
    // إضافة التخطيط الجديد
    if (columns !== 4) { // 4 هو الافتراضي
        grid.classList.add(`grid-${columns}`);
    }
    
    // تحديث الأزرار
    buttons.forEach(btn => btn.classList.remove('active'));
    document.querySelector(`[data-grid="${columns}"]`).classList.add('active');
    
    // حفظ التفضيل في localStorage
    localStorage.setItem('businessLayout', columns);
    
    // إضافة تأثير انتقالي
    grid.style.opacity = '0.7';
    setTimeout(() => {
        grid.style.opacity = '1';
    }, 200);
}

// تحسين تجربة المستخدم
document.addEventListener('DOMContentLoaded', function() {
    // استرجاع التخطيط المحفوظ
    const savedLayout = localStorage.getItem('businessLayout');
    if (savedLayout && savedLayout !== '4') {
        changeLayout(parseInt(savedLayout));
    }
    
    // إضافة تأثير تحميل متدرج للبطاقات
    const cards = document.querySelectorAll('.service-card');
    cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 0.1}s`;
    });
});
</script>

<style>
/* تعديلات إضافية لتقليل المسافات في بطاقات الخدمات */
.service-content {
    padding-top: 8px !important;
    padding-bottom: 8px !important;
}

.service-title {
    min-height: 28px !important;
    margin-bottom: 0 !important;
}

.service-price-area {
    margin: 0 0 2px 0 !important;
}

.service-btn {
    padding: 5px 10px !important;
}
</style>

<?php
include 'footer.php';
?>
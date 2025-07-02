<?php include 'header.php'; ?>

<style>
/* ===== تصميم متجر إلكتروني احترافي للخدمات ===== */

/* شريط الفرز والنتائج */
.services-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 30px;
    padding: 20px 0;
    border-bottom: 1px solid #eee;
}

.services-count {
    color: #666;
    font-size: 14px;
}

.services-sort select {
    padding: 8px 15px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background: white;
    font-family: "Cairo", serif;
}

/* بطاقة الخدمة - تصميم متجر إلكتروني */
.service-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    overflow: hidden;
    position: relative;
    margin-bottom: 30px;
    height: 100%;
    display: flex;
    flex-direction: column;
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15);
}

/* صورة الخدمة */
.service-image {
    position: relative;
    overflow: hidden;
    height: 220px;
}

.service-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.service-card:hover .service-image img {
    transform: scale(1.05);
}

/* شارة الخصم أو الحالة */
.service-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: #e74c3c;
    color: white;
    padding: 5px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: bold;
    z-index: 2;
}

.service-badge.new {
    background: #27ae60;
}

.service-badge.popular {
    background: #f39c12;
}

/* محتوى البطاقة */
.service-content {
    padding: 20px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.service-title {
    font-size: 16px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 10px;
    line-height: 1.4;
    min-height: 44px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

/* منطقة السعر */
.service-price-area {
    margin: 15px 0;
    flex-grow: 1;
    display: flex;
    align-items: flex-end;
}

.service-price {
    font-size: 20px;
    font-weight: bold;
    color: #b9845a;
}

.service-price .currency {
    font-size: 14px;
    margin-right: 5px;
}

/* زر الاشتراك */
.service-btn {
    width: 100%;
    background: #b9845a;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    text-align: center;
    display: block;
    font-family: "Cairo", serif;
}

.service-btn:hover {
    background: #a67c52;
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

.service-btn i {
    margin-right: 8px;
}

/* شبكة الخدمات */
.services-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    margin-bottom: 40px;
}

/* القائمة الجانبية المحسنة */
.services-sidebar {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 15px rgba(0,0,0,0.08);
    padding: 25px;
    margin-bottom: 30px;
    position: sticky;
    top: 20px;
}

.sidebar-title {
    font-size: 18px;
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #b9845a;
}
</style>

<section id="content">
    <div class="content-wrap">
        <div class="container">
            <div class="row">
                <!-- القائمة الجانبية -->
                <div class="col-lg-3 col-md-4">
                    <div class="services-sidebar">
                        <div class="sidebar-header">
                            <h4 class="sidebar-title">تصنيفات الخدمات</h4>
                            <button class="sidebar-close-btn" 
                                    onclick="toggleSidebar()" 
                                    title="إغلاق قائمة التصنيفات"
                                    aria-label="إغلاق قائمة التصنيفات"
                                    type="button">
                                <i class="uil uil-times" aria-hidden="true"></i>
                            </button>
                        </div>
                        <ul class="list-group list-group-flush sidebar-categories">
                            <li class="list-group-item active-sidebar">
                                <a href="#"><span>جميع الخدمات</span></a>
                            </li>
                            <li class="list-group-item">
                                <a href="#"><span>خدمات الأفراد</span></a>
                            </li>
                            <li class="list-group-item">
                                <a href="#"><span>خدمات المنشآت</span></a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- منطقة الخدمات -->
                <div class="col-lg-9 col-md-8">
                    <!-- زر إظهار/إخفاء القائمة الجانبية -->
                    <div class="sidebar-toggle-container">
                        <button class="sidebar-toggle-btn" 
                                onclick="toggleSidebar()" 
                                title="إظهار/إخفاء قائمة التصنيفات"
                                aria-label="إظهار/إخفاء قائمة التصنيفات"
                                type="button">
                            <i class="uil uil-bars" aria-hidden="true"></i>
                            <span class="toggle-text">التصنيفات</span>
                        </button>
                    </div>
                    
                    <!-- شريط الفرز والنتائج -->
                    <div class="services-header">
                        <div class="services-count">
                            عرض 1 إلى 8 من إجمالي 8 خدمات
                        </div>
                        
                        <div class="header-controls">
                            <!-- أزرار التحكم في التخطيط -->
                            <div class="layout-controls">
                                <span>عرض:</span>
                                <button class="layout-btn" data-grid="2" title="عمودين" onclick="changeLayout(2)"></button>
                                <button class="layout-btn" data-grid="3" title="3 أعمدة" onclick="changeLayout(3)"></button>
                                <button class="layout-btn active" data-grid="4" title="4 أعمدة" onclick="changeLayout(4)"></button>
                                <button class="layout-btn" data-grid="6" title="6 أعمدة" onclick="changeLayout(6)"></button>
                            </div>
                            
                            <!-- قائمة الفرز -->
                            <div class="services-sort">
                                <select onchange="sortServices(this.value)">
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
                        <!-- بطاقة خدمة 1 -->
                        <div class="service-card">
                            <div class="service-badge popular">الأكثر طلباً</div>
                            <div class="service-image">
                                <img src="images/default.jpg" alt="حصر ورثة">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">حصر ورثة</h3>
                                <div class="service-price-area">
                                    <div class="service-price">
                                        500 <span class="currency">ر.س</span>
                                    </div>
                                </div>
                                <a href="#" class="service-btn">
                                    <i class="uil uil-shopping-cart"></i>
                                    اشترك الآن
                                </a>
                            </div>
                        </div>

                        <!-- بطاقة خدمة 2 -->
                        <div class="service-card">
                            <div class="service-badge new">جديد</div>
                            <div class="service-image">
                                <img src="images/default.jpg" alt="شهادة منشآت">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">شهادة منشآت</h3>
                                <div class="service-price-area">
                                    <div class="service-price">
                                        300 <span class="currency">ر.س</span>
                                    </div>
                                </div>
                                <a href="#" class="service-btn">
                                    <i class="uil uil-shopping-cart"></i>
                                    اشترك الآن
                                </a>
                            </div>
                        </div>

                        <!-- بطاقة خدمة 3 -->
                        <div class="service-card">
                            <div class="service-image">
                                <img src="images/default.jpg" alt="خدمات المعاشات">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">خدمات المعاشات</h3>
                                <div class="service-price-area">
                                    <div class="service-price">
                                        250 <span class="currency">ر.س</span>
                                    </div>
                                </div>
                                <a href="#" class="service-btn">
                                    <i class="uil uil-shopping-cart"></i>
                                    اشترك الآن
                                </a>
                            </div>
                        </div>

                        <!-- بطاقة خدمة 4 -->
                        <div class="service-card" data-price="400" data-name="تأمين مركبات">
                            <div class="service-image">
                                <img src="images/default.jpg" alt="تأمين مركبات">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">تأمين مركبات</h3>
                                <div class="service-price-area">
                                    <div class="service-price">
                                        400 <span class="currency">ر.س</span>
                                    </div>
                                </div>
                                <a href="#" class="service-btn">
                                    <i class="uil uil-shopping-cart"></i>
                                    اشترك الآن
                                </a>
                            </div>
                        </div>

                        <!-- بطاقة خدمة 5 -->
                        <div class="service-card" data-price="350" data-name="استخراج رخصة قيادة">
                            <div class="service-badge new">جديد</div>
                            <div class="service-image">
                                <img src="images/default.jpg" alt="استخراج رخصة قيادة">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">استخراج رخصة قيادة</h3>
                                <div class="service-price-area">
                                    <div class="service-price">
                                        350 <span class="currency">ر.س</span>
                                    </div>
                                </div>
                                <a href="#" class="service-btn">
                                    <i class="uil uil-shopping-cart"></i>
                                    اشترك الآن
                                </a>
                            </div>
                        </div>

                        <!-- بطاقة خدمة 6 -->
                        <div class="service-card" data-price="200" data-name="تجديد الهوية">
                            <div class="service-image">
                                <img src="images/default.jpg" alt="تجديد الهوية">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">تجديد الهوية</h3>
                                <div class="service-price-area">
                                    <div class="service-price">
                                        200 <span class="currency">ر.س</span>
                                    </div>
                                </div>
                                <a href="#" class="service-btn">
                                    <i class="uil uil-shopping-cart"></i>
                                    اشترك الآن
                                </a>
                            </div>
                        </div>

                        <!-- بطاقة خدمة 7 -->
                        <div class="service-card" data-price="450" data-name="تأسيس شركة">
                            <div class="service-badge popular">الأكثر طلباً</div>
                            <div class="service-image">
                                <img src="images/default.jpg" alt="تأسيس شركة">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">تأسيس شركة</h3>
                                <div class="service-price-area">
                                    <div class="service-price">
                                        450 <span class="currency">ر.س</span>
                                    </div>
                                </div>
                                <a href="#" class="service-btn">
                                    <i class="uil uil-shopping-cart"></i>
                                    اشترك الآن
                                </a>
                            </div>
                        </div>

                        <!-- بطاقة خدمة 8 -->
                        <div class="service-card" data-price="180" data-name="استخراج جواز سفر">
                            <div class="service-image">
                                <img src="images/default.jpg" alt="استخراج جواز سفر">
                            </div>
                            <div class="service-content">
                                <h3 class="service-title">استخراج جواز سفر</h3>
                                <div class="service-price-area">
                                    <div class="service-price">
                                        180 <span class="currency">ر.س</span>
                                    </div>
                                </div>
                                <a href="#" class="service-btn">
                                    <i class="uil uil-shopping-cart"></i>
                                    اشترك الآن
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- طبقة الخلفية للقائمة الجانبية -->
    <div class="sidebar-overlay" onclick="toggleSidebar()"></div>
</section>

<script>
// وظيفة إظهار/إخفاء القائمة الجانبية مع معالجة الأخطاء
function toggleSidebar() {
    try {
        const sidebar = document.querySelector('.services-sidebar');
        const overlay = document.querySelector('.sidebar-overlay');
        const body = document.body;
        
        // التحقق من وجود العناصر قبل التعامل معها
        if (!sidebar) {
            console.warn('Sidebar element not found');
            return;
        }
        
        if (sidebar.classList.contains('active')) {
            // إخفاء القائمة الجانبية
            sidebar.classList.remove('active');
            if (overlay) {
                overlay.classList.remove('active');
            }
            body.style.overflow = '';
        } else {
            // إظهار القائمة الجانبية
            sidebar.classList.add('active');
            if (overlay) {
                overlay.classList.add('active');
            }
            body.style.overflow = 'hidden'; // منع التمرير في الخلفية
        }
    } catch (error) {
        console.error('Error in toggleSidebar function:', error);
    }
}

// إغلاق القائمة عند الضغط على Escape
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const sidebar = document.querySelector('.services-sidebar');
        if (sidebar.classList.contains('active')) {
            toggleSidebar();
        }
    }
});

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
    localStorage.setItem('servicesLayout', columns);
    
    // إضافة تأثير انتقالي
    grid.style.opacity = '0.7';
    setTimeout(() => {
        grid.style.opacity = '1';
    }, 200);
}

// تحسين تجربة المستخدم
document.addEventListener('DOMContentLoaded', function() {
    // استرجاع التخطيط المحفوظ
    const savedLayout = localStorage.getItem('servicesLayout');
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

<?php include 'footer.php'; ?>
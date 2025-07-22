-- سكريبت تحديث قاعدة البيانات من المحلي إلى المباشر
-- Database Update Script from Local to Live
-- تاريخ الإنشاء: 2025-01-21

-- ===================================
-- 1. إضافة العمود الجديد google_reviews_consent في جدول sa_requests
-- ===================================

-- التحقق من وجود العمود أولاً
SET @column_exists = (
    SELECT COUNT(*)
    FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_SCHEMA = 'saiebser_saiebservices' 
    AND TABLE_NAME = 'sa_requests' 
    AND COLUMN_NAME = 'google_reviews_consent'
);

-- إضافة العمود إذا لم يكن موجوداً
SET @sql = IF(@column_exists = 0, 
    'ALTER TABLE sa_requests ADD COLUMN google_reviews_consent tinyint(1) DEFAULT 0 COMMENT \'موافقة العميل على آراء Google\'',
    'SELECT "العمود google_reviews_consent موجود بالفعل" as message'
);

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- ===================================
-- 2. إضافة العمود الجديد ar_slug في جدول sa_articles
-- ===================================

-- التحقق من وجود العمود أولاً
SET @column_exists_slug = (
    SELECT COUNT(*)
    FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_SCHEMA = 'saiebser_saiebservices' 
    AND TABLE_NAME = 'sa_articles' 
    AND COLUMN_NAME = 'ar_slug'
);

-- إضافة العمود إذا لم يكن موجوداً
SET @sql_slug = IF(@column_exists_slug = 0, 
    'ALTER TABLE sa_articles ADD COLUMN ar_slug varchar(255) DEFAULT NULL COMMENT \'URL slug for SEO-friendly URLs\' AFTER ar_title',
    'SELECT "العمود ar_slug موجود بالفعل" as message'
);

PREPARE stmt_slug FROM @sql_slug;
EXECUTE stmt_slug;
DEALLOCATE PREPARE stmt_slug;

-- ===================================
-- 3. تحديث بيانات جدول sa_articles مع العمود الجديد ar_slug
-- ===================================

-- تحديث البيانات الموجودة بإضافة قيم ar_slug
DELETE FROM sa_articles WHERE ar_id IN (14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 34, 35, 36, 37, 38, 39, 40, 41);

REPLACE INTO `sa_articles` (`ar_id`, `ar_cat`, `ar_type`, `ar_blog_type`, `ar_title`, `ar_slug`, `ar_date`, `ar_text`, `ar_image`, `ar_price`, `ar_position`, `ar_status`) VALUES
(14, 0, 4, 1, 'دورة إدارة وتقييم الاداء', 'dwra-adara-wtqyym-alada', '2023-12-24', '    <p>دورة تدريبية تهدف إلى تحسين مهارات إدارة الأداء المؤسسي وتقييمه باستخدام أساليب واستراتيجيات مبتكرة. نظمها جمعية عنيزة بالتعاون مع جامعة أم القرى وصندوق تنمية الموارد البشرية، وقدّمها الدكتور سليمان العطية.</p><p><strong>البيانات الأساسية</strong>:</p><ul><li><strong>اسم الدورة</strong>: إدارة وتقييم الأداء</li><li><span style=\"font-weight: bolder;\">عدد الساعات:</span>&nbsp;20 ساعة</li><li><strong>المدة</strong>: 5 أيام</li><li><strong>تاريخ الإقامة</strong>: 24-12-2023</li><li><strong>المدرب</strong>: د. سليمان بن صالح العطية</li><li><strong>الجهة المنظمة</strong>: جمعية عنيزة للخدمات الإنسانية</li><li><strong>الشركاء</strong>: جامعة أم القرى وصندوق تنمية الموارد البشرية</li><li><strong>الأهداف</strong>:<ul><li>تطوير أساليب تقييم الأداء المؤسسي</li><li>تحسين مهارات التخطيط والتنفيذ</li></ul></li><li><strong>المحاور</strong>:<ol><li>تعريف الأداء وأهميته في العمل المؤسسي</li><li>معايير تقييم الأداء وتحليل النتائج</li><li>آليات تحسين الأداء الفردي والجماعي</li></ol></li><li><strong>الفئة المستهدفة</strong>: مدراء الموارد البشرية والقادة.</li></ul>    ', '52316.jpg', NULL, '', 1),
[... باقي البيانات ...]

-- ===================================
-- 4. تحديث باقي الجداول
-- ===================================

REPLACE INTO `sa_about` [...];
REPLACE INTO `sa_articles_cat` [...];
REPLACE INTO `sa_contact` [...];
REPLACE INTO `sa_home_clients` [...];
REPLACE INTO `sa_home_slider` [...];
REPLACE INTO `sa_home_text` [...];
REPLACE INTO `sa_library` [...];
REPLACE INTO `sa_library_cat` [...];
REPLACE INTO `sa_type` [...];

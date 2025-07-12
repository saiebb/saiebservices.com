-- إضافة حقل ar_slug إلى جدول sa_articles
-- Add ar_slug field to sa_articles table

-- إضافة العمود الجديد
ALTER TABLE `sa_articles` 
ADD COLUMN `ar_slug` VARCHAR(255) NULL AFTER `ar_title`;

-- إضافة فهرس للبحث السريع
ALTER TABLE `sa_articles` 
ADD INDEX `idx_ar_slug` (`ar_slug`);

-- إضافة فهرس مركب للبحث بالـ slug والحالة
ALTER TABLE `sa_articles` 
ADD INDEX `idx_slug_status` (`ar_slug`, `ar_status`);

-- تعليق على العمود الجديد
ALTER TABLE `sa_articles` 
MODIFY COLUMN `ar_slug` VARCHAR(255) NULL COMMENT 'URL slug for SEO-friendly URLs';
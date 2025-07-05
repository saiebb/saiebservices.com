-- إضافة عمود معرف الطلب إلى جدول الطلبات
-- Add order ID column to requests table

-- للبيئة المحلية (Local Environment)
ALTER TABLE `saiebservices`.`sa_requests` 
ADD COLUMN `req_order_id` VARCHAR(50) NULL UNIQUE AFTER `req_status`,
ADD INDEX `idx_order_id` (`req_order_id`);

-- للخادم المباشر (Production Environment)  
ALTER TABLE `saiebser_saiebservices`.`sa_requests` 
ADD COLUMN `req_order_id` VARCHAR(50) NULL UNIQUE AFTER `req_status`,
ADD INDEX `idx_order_id` (`req_order_id`);

-- تحديث الطلبات الموجودة بمعرفات فريدة
-- Update existing requests with unique order IDs

-- للبيئة المحلية
UPDATE `saiebservices`.`sa_requests` 
SET `req_order_id` = CONCAT('SAIEB-', DATE_FORMAT(req_time, '%Y%m%d'), '-', UPPER(SUBSTRING(MD5(CONCAT(req_id, req_time)), 1, 6)))
WHERE `req_order_id` IS NULL;

-- للخادم المباشر
UPDATE `saiebser_saiebservices`.`sa_requests` 
SET `req_order_id` = CONCAT('SAIEB-', DATE_FORMAT(req_time, '%Y%m%d'), '-', UPPER(SUBSTRING(MD5(CONCAT(req_id, req_time)), 1, 6)))
WHERE `req_order_id` IS NULL;
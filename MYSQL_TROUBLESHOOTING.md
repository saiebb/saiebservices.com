# حل مشكلة توقف MySQL في XAMPP

## 🚨 المشكلة
```
[mysql] Status change detected: stopped
[mysql] Error: MySQL shutdown unexpectedly.
```

## ⚡ الحل السريع (5 دقائق)

### 1. إعادة تشغيل سريعة
```bash
# أغلق XAMPP تماماً
# افتح Task Manager (Ctrl + Shift + Esc)
# أنهي جميع عمليات mysql.exe
# أعد تشغيل XAMPP كـ Administrator
```

### 2. تشغيل سكريبت الإصلاح التلقائي
```powershell
# اضغط Win + X واختر "Windows PowerShell (Admin)"
# انتقل لمجلد المشروع
cd "C:\Users\user\OneDrive - EGY Melamine\Projects\public_html\public_html"

# شغل سكريبت الإصلاح
.\fix-mysql.ps1
```

### 3. حل المنفذ المحجوز
```bash
# افتح Command Prompt كـ Admin
netstat -ano | findstr :3306

# إذا كان المنفذ محجوز، غير إعدادات MySQL:
# XAMPP Control Panel > MySQL Config > my.ini
# غير port=3306 إلى port=3307
```

## 🔧 الحلول التفصيلية

### الحل الأول: حذف ملفات Log المعطوبة
1. أوقف MySQL تماماً
2. اذهب إلى: `C:\xampp\mysql\data\`
3. احذف الملفات:
   - `ib_logfile0`
   - `ib_logfile1`
4. أعد تشغيل MySQL

### الحل الثاني: إصلاح قاعدة البيانات
```bash
# افتح CMD كـ Admin
cd C:\xampp\mysql\bin

# شغل MySQL في وضع الإصلاح
mysqld --console --skip-grant-tables --skip-external-locking
```

### الحل الثالث: تغيير المنفذ
```ini
# في ملف C:\xampp\mysql\bin\my.ini
[mysqld]
port=3307

[mysql]
port=3307
```

## 🚀 بدائل سريعة

### استخدام WAMP بدلاً من XAMPP
1. حمل WAMP من: https://www.wampserver.com/
2. ثبته وشغله
3. النظام سيتعرف عليه تلقائياً

### استخدام MySQL Workbench منفصل
1. حمل MySQL Community Server
2. ثبت MySQL Workbench
3. أنشئ قاعدة بيانات جديدة

## 🧪 اختبار الحل

### اختبار سريع
```bash
# افتح المتصفح واذهب إلى:
http://localhost/your-project/test-connection.php
```

### اختبار من Command Line
```bash
cd C:\xampp\mysql\bin
mysql -u root -p
```

## 📋 قائمة التحقق

- [ ] إيقاف جميع عمليات MySQL
- [ ] حذف ملفات ib_logfile
- [ ] فحص المنفذ 3306
- [ ] تشغيل XAMPP كـ Administrator
- [ ] اختبار الاتصال
- [ ] إنشاء قاعدة البيانات المحلية
- [ ] استيراد ملف SQL

## 🔄 إعداد قاعدة البيانات المحلية

### إنشاء قاعدة البيانات
```sql
CREATE DATABASE `saiebservices` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

### استيراد البيانات
1. افتح phpMyAdmin: `http://localhost/phpmyadmin`
2. اختر قاعدة البيانات `saiebservices`
3. اذهب إلى تبويب "Import"
4. اختر ملف `27_11_2024.sql`
5. اضغط "Go"

## 🎯 نصائح لتجنب المشكلة

1. **تشغيل XAMPP كـ Administrator دائماً**
2. **إغلاق XAMPP بشكل صحيح**
3. **عدم إيقاف تشغيل الكمبيوتر أثناء عمل MySQL**
4. **التأكد من وجود مساحة كافية على القرص**
5. **عمل نسخة احتياطية دورية**

## 📞 إذا لم تنجح الحلول

### خيارات أخرى:
1. **استخدام Docker**: تشغيل MySQL في حاوية
2. **استخدام خدمة سحابية**: مثل MySQL على AWS
3. **إعادة تثبيت XAMPP**: حل جذري

### ملفات المساعدة في المشروع:
- `mysql-fix-guide.html` - دليل مرئي شامل
- `fix-mysql.ps1` - سكريبت إصلاح تلقائي
- `test-connection.php` - اختبار الاتصال
- `setup-local-db.php` - دليل الإعداد

---

## ✅ التأكد من نجاح الحل

بعد تطبيق أي حل:

1. **اختبر الاتصال**: `http://localhost/your-project/test-connection.php`
2. **تحقق من phpMyAdmin**: `http://localhost/phpmyadmin`
3. **اختبر المشروع**: `http://localhost/your-project/`

---

© 2024 SAIEB Services - MySQL Troubleshooting Guide
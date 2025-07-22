# 🚀 دليل تشغيل المشروع محلياً

## الطريقة السريعة (الأسهل)

### 1. تشغيل الخادم المحلي
```bash
cd c:/xampp/htdocs/saieb_production
php -S localhost:8000
```

### 2. إعداد قاعدة البيانات
افتح في المتصفح: `http://localhost:8000/setup_database.php`

### 3. تشغيل الموقع
افتح في المتصفح: `http://localhost:8000`

---

## الطريقة التفصيلية

### المتطلبات:
- ✅ PHP 7.4 أو أحدث
- ✅ MySQL/MariaDB
- ✅ XAMPP أو WAMP (اختياري)

### خطوات التشغيل:

#### 1️⃣ تشغيل قاعدة البيانات
```bash
# إذا كان لديك XAMPP
cd c:/xampp
./mysql/bin/mysqld.exe

# أو تشغيل XAMPP Control Panel وتفعيل MySQL
```

#### 2️⃣ تشغيل الخادم المحلي
```bash
# الانتقال لمجلد المشروع
cd c:/xampp/htdocs/saieb_production

# تشغيل الخادم المحلي
php -S localhost:8000
```

#### 3️⃣ إعداد قاعدة البيانات
زر الرابط: `http://localhost:8000/setup_database.php`

---

## 🔧 الأوامر المفيدة

### تشغيل الخادم على منافذ مختلفة:
```bash
php -S localhost:8000    # المنفذ 8000
php -S localhost:3000    # المنفذ 3000  
php -S localhost:9000    # المنفذ 9000
```

### التحقق من إصدار PHP:
```bash
php -v
```

### التحقق من إعدادات PHP:
```bash
php -m  # عرض الوحدات المثبتة
php -i  # عرض معلومات PHP
```

---

## 🌐 الروابط المهمة

بعد تشغيل الخادم:

| الصفحة | الرابط | الوصف |
|---------|---------|--------|
| **الموقع الرئيسي** | `http://localhost:8000` | الصفحة الرئيسية |
| **إعداد قاعدة البيانات** | `http://localhost:8000/setup_database.php` | إعداد قاعدة البيانات |
| **اختبار الإيميل** | `http://localhost:8000/test_email.php` | اختبار نظام الإيميل |
| **فحص النظام** | `http://localhost:8000/system_status.php` | فحص حالة النظام |
| **صفحة خدمة تجريبية** | `http://localhost:8000/service-detail.php?id=1` | اختبار طلب الخدمة |

---

## 🛠️ استكشاف الأخطاء

### المشكلة: "Address already in use"
```bash
# جرب منفذ آخر
php -S localhost:8001
php -S localhost:8002
```

### المشكلة: "MySQL connection failed"
1. تأكد من تشغيل MySQL
2. تحقق من المنفذ في XAMPP Control Panel
3. زر `setup_database.php` لإعداد قاعدة البيانات

### المشكلة: "Permission denied"
```bash
# تشغيل PowerShell كمدير
# أو تغيير مجلد المشروع
```

---

## 📧 اختبار نظام الإيميل

### 1. اختبار تلقائي:
1. اذهب إلى: `http://localhost:8000/service-detail.php?id=1`
2. اضغط "احصل على الخدمة"
3. املأ النموذج واضغط "سجل الطلب"

### 2. اختبار يدوي:
زر: `http://localhost:8000/test_email.php`

---

## 🗂️ هيكل المشروع

```
saieb_production/
├── index.php              # الصفحة الرئيسية
├── service-detail.php     # صفحة تفاصيل الخدمة
├── setup_database.php     # إعداد قاعدة البيانات
├── test_email.php         # اختبار الإيميل
├── system_status.php      # فحص النظام
├── action/
│   ├── savereq.php       # حفظ طلبات الخدمة
│   ├── send_email_notification.php  # إرسال الإيميل
│   └── email_fallback.php           # نظام احتياطي
├── config/
│   ├── database.php      # إعدادات قاعدة البيانات
│   └── email_config.php  # إعدادات الإيميل
└── js/
    └── service-request-enhancement.js  # تحسينات JS
```

---

## ✅ التحقق من نجاح التشغيل

1. **الخادم يعمل**: `http://localhost:8000` يفتح الموقع
2. **قاعدة البيانات متصلة**: لا توجد رسائل خطأ
3. **نظام الإيميل يعمل**: `test_email.php` يرسل إيميل
4. **طلب الخدمة يعمل**: يمكن تسجيل طلب جديد

---

## 🎯 الخطوة التالية

بعد التشغيل الناجح:
1. جرب طلب خدمة من الموقع
2. تحقق من وصول الإيميل إلى `mostaql.dev@gmail.com`
3. راجع ملفات السجل للتأكد من عمل النظام

**🚀 المشروع جاهز للتشغيل المحلي!**
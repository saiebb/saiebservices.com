# دليل إعداد Google Customer Reviews لموقع صيب

## نظرة عامة
تم دمج نظام آراء العملاء مع Google في موقع صيب بطريقة بسيطة ومتكاملة مع النظام الحالي.

## الميزات المضافة

### 1. خيار الموافقة في النموذج
- تم إضافة خيار اختياري في نموذج الطلبات للموافقة على مشاركة آراء العملاء
- النص: "أوافق على مشاركة تجربتي مع خدمات صيب عبر آراء العملاء في Google"
- الخيار اختياري ولا يؤثر على إرسال الطلب

### 2. حفظ موافقة العميل
- يتم حفظ موافقة العميل في قاعدة البيانات
- عمود جديد: `google_reviews_consent` (TINYINT)
- القيم: 1 = موافق، 0 = غير موافق

### 3. عرض نموذج Google Reviews
- يظهر نموذج Google Customer Reviews تلقائياً بعد نجاح الطلب
- فقط للعملاء الذين وافقوا على المشاركة
- يتم إنشاء معرف طلب فريد لكل طلب

## خطوات الإعداد

### الخطوة 1: إضافة العمود لقاعدة البيانات
```bash
# افتح المتصفح وانتقل إلى:
http://localhost/public_html/add_google_reviews_column.php
```

### الخطوة 2: الحصول على معرف التاجر من Google
1. انتقل إلى [Google Merchant Center](https://merchants.google.com/)
2. أنشئ حساب تاجر أو سجل الدخول
3. احصل على معرف التاجر (Merchant ID)

### الخطوة 3: تحديث معرف التاجر في الكود
في ملف `footer.php`، ابحث عن السطر:
```javascript
"merchant_id": 123456789, // ضع معرف التاجر الخاص بك من Google Merchant Center
```
واستبدل `123456789` بمعرف التاجر الحقيقي.

### الخطوة 4: اختبار النظام
1. انتقل إلى إحدى صفحات الخدمات
2. اضغط على "اطلب الخدمة"
3. املأ النموذج وفعّل خيار Google Reviews
4. أرسل الطلب
5. يجب أن يظهر نموذج Google Customer Reviews

## الملفات المعدلة

### 1. footer.php
- إضافة خيار الموافقة في النموذج
- إضافة JavaScript لـ Google Customer Reviews
- تحديث معالج AJAX لإرسال موافقة العميل

### 2. action/savereq.php
- إضافة حفظ موافقة العميل
- التحقق من وجود العمود قبل الإدراج (للتوافق)

### 3. قاعدة البيانات
- عمود جديد: `google_reviews_consent`
- نوع البيانات: TINYINT(1)
- القيمة الافتراضية: 0

## كيفية عمل النظام

### 1. عند إرسال الطلب
```javascript
// يتم إرسال موافقة العميل مع بيانات الطلب
google_reviews_consent: $('#google_reviews_consent').is(':checked') ? 1 : 0
```

### 2. بعد نجاح الطلب
```javascript
// إذا وافق العميل، يتم عرض نموذج Google
if ($('#google_reviews_consent').is(':checked')) {
    setTimeout(() => {
        showGoogleCustomerReviews();
    }, 1500);
}
```

### 3. عرض نموذج Google
```javascript
gapi.surveyoptin.render({
    "merchant_id": YOUR_MERCHANT_ID,
    "order_id": "SAIEB-" + timestamp + "-" + random,
    "email": customerEmail,
    "delivery_country": "SA",
    "estimated_delivery_date": deliveryDate
});
```

## المعلومات المرسلة لـ Google

### البيانات المطلوبة
- **معرف التاجر**: من Google Merchant Center
- **معرف الطلب**: فريد لكل طلب (SAIEB-TIMESTAMP-RANDOM)
- **بريد العميل**: من النموذج
- **بلد التسليم**: السعودية (SA)
- **تاريخ التسليم المتوقع**: 7 أيام من تاريخ الطلب

### البيانات الاختيارية
- **معرف المنتج/الخدمة**: SAIEB_SERVICE_TYPE_ID
- **نمط العرض**: مربع حوار في المنتصف

## الأمان والخصوصية

### 1. موافقة العميل
- الخيار اختياري تماماً
- نص واضح يشرح الغرض
- لا يؤثر على معالجة الطلب

### 2. البيانات المرسلة
- فقط البيانات الضرورية لـ Google Reviews
- لا يتم إرسال معلومات حساسة
- البريد الإلكتروني فقط للعملاء الموافقين

### 3. التحكم
- يمكن للعميل رفض المشاركة
- يمكن إيقاف النظام بسهولة
- البيانات محفوظة محلياً في قاعدة البيانات

## استكشاف الأخطاء

### 1. لا يظهر نموذج Google
- تأكد من صحة معرف التاجر
- تحقق من تحميل Google API
- افتح Developer Tools وتحقق من الأخطاء

### 2. خطأ في حفظ الطلب
- تأكد من إضافة العمود للجدول
- تحقق من صلاحيات قاعدة البيانات
- راجع ملف error log

### 3. لا يعمل الخيار
- تأكد من تحديث ملف footer.php
- تحقق من JavaScript console
- تأكد من تحميل jQuery

## الصيانة

### 1. مراقبة الإحصائيات
```sql
SELECT 
    COUNT(*) as total_requests,
    COUNT(CASE WHEN google_reviews_consent = 1 THEN 1 END) as consented,
    COUNT(CASE WHEN google_reviews_consent = 0 THEN 1 END) as declined
FROM sa_requests;
```

### 2. تنظيف البيانات القديمة
- يمكن حذف الطلبات القديمة حسب الحاجة
- الاحتفاظ بالإحصائيات للتحليل

### 3. تحديث النظام
- مراجعة تحديثات Google API
- تحديث معرف التاجر عند الحاجة
- اختبار النظام دورياً

## الدعم الفني

### مراجع مفيدة
- [Google Customer Reviews Documentation](https://developers.google.com/customer-reviews)
- [Google Merchant Center Help](https://support.google.com/merchants/)
- [Google API Console](https://console.developers.google.com/)

### ملفات مهمة
- `footer.php` - النموذج والـ JavaScript
- `action/savereq.php` - معالج الطلبات
- `add_google_reviews_column.php` - سكريبت إعداد قاعدة البيانات

---

**ملاحظة**: تأكد من اختبار النظام في بيئة التطوير قبل النشر في الخادم المباشر.
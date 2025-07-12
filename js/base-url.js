/**
 * ملف تحديد المسار الأساسي للموقع في JavaScript
 * Base URL configuration for JavaScript
 */

// تحديد المسار الأساسي للموقع
var BASE_URL = (function() {
    // الحصول على المسار الأساسي من وسم base إذا كان موجودًا
    var baseTag = document.querySelector('base');
    if (baseTag && baseTag.href) {
        return baseTag.href.replace(/\/$/, '');
    }
    
    // الحصول على المسار الأساسي من الرابط الحالي
    var currentUrl = window.location.href;
    var urlParts = currentUrl.split('/');
    
    // إذا كان الموقع في بيئة التطوير المحلية (localhost)
    if (urlParts[2].includes('localhost') || urlParts[2].includes('127.0.0.1')) {
        // استخدام المسار الأساسي فقط بدون مجلدات فرعية لتجنب مشاكل SEO URLs
        return urlParts[0] + '//' + urlParts[2];
    } else {
        // في بيئة الإنتاج، استخدم المجال الرئيسي فقط
        return 'https://saiebservices.com';
    }
})();

// تحديد مسار الأصول (CSS, JS, Images)
var ASSETS_URL = BASE_URL;

// طباعة المسار الأساسي في وحدة التحكم للتصحيح
console.log('BASE_URL:', BASE_URL);
console.log('ASSETS_URL:', ASSETS_URL);

/**
 * دالة للحصول على المسار الكامل لملف
 * @param {string} path - المسار النسبي للملف
 * @returns {string} المسار الكامل للملف
 */
function getAssetUrl(path) {
    // إزالة الشرطة المائلة من بداية المسار إذا كانت موجودة
    path = path.replace(/^\//, '');
    return ASSETS_URL + '/' + path;
}
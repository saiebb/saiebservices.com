<?php
/**
 * وظائف إنشاء روابط SEO - SEO URL Generation Functions
 * 
 * هذا الملف يحتوي على وظائف لإنشاء روابط صديقة لمحركات البحث
 * This file contains functions to generate SEO-friendly URLs
 */

// استخراج معرف المقال أو الخدمة من الرابط
// Extract ID from URL
if (!function_exists('extractIdFromUrl')) {
    function extractIdFromUrl($path) {
        // استخراج معرف المقال من الرابط مثل /blog/article-title-123
        if (preg_match('/\/blog\/[a-zA-Z0-9_-]+-([0-9]+)$/', $path, $matches)) {
            $_GET['id'] = $matches[1];
            return true;
        }
        
        // استخراج معرف الخدمة من الرابط مثل /business-services/service-title-123
        if (preg_match('/\/business-services\/[a-zA-Z0-9_-]+-([0-9]+)$/', $path, $matches)) {
            $_GET['id'] = $matches[1];
            $_GET['type'] = 2;
            return true;
        }
        
        // استخراج معرف خدمة الأفراد من الرابط مثل /individual-services/service-title-123
        if (preg_match('/\/individual-services\/[a-zA-Z0-9_-]+-([0-9]+)$/', $path, $matches)) {
            $_GET['id'] = $matches[1];
            $_GET['type'] = 3;
            return true;
        }
        
        // استخراج معرف الخدمة المالية من الرابط مثل /financial-services/service-title-123
        if (preg_match('/\/financial-services\/[a-zA-Z0-9_-]+-([0-9]+)$/', $path, $matches)) {
            $_GET['id'] = $matches[1];
            $_GET['type'] = 4;
            return true;
        }
        
        // استخراج معرف التدريب من الرابط مثل /training-programs/program-title-123
        if (preg_match('/\/training-programs\/[a-zA-Z0-9_-]+-([0-9]+)$/', $path, $matches)) {
            $_GET['id'] = $matches[1];
            $_GET['type'] = 1;
            return true;
        }
        
        // استخراج معرف الخدمة العامة من الرابط مثل /service/item-123
        if (preg_match('/\/service\/[a-zA-Z0-9_-]+-([0-9]+)$/', $path, $matches)) {
            $_GET['id'] = $matches[1];
            return true;
        }
        
        return false;
    }
    
    // تطبيق الوظيفة على الرابط الحالي
    extractIdFromUrl($_SERVER['REQUEST_URI']);
}

/**
 * تحويل النص إلى شكل مناسب للروابط
 * Convert text to URL-friendly format
 * 
 * @param string $text النص المراد تحويله
 * @return string النص بعد التحويل
 */
function slugify($text) {
    // تحويل الأحرف العربية إلى أحرف إنجليزية (اختياري)
    $arabic_replacements = [
        'أ' => 'a', 'إ' => 'a', 'آ' => 'a', 'ا' => 'a',
        'ب' => 'b', 'ت' => 't', 'ث' => 'th',
        'ج' => 'j', 'ح' => 'h', 'خ' => 'kh',
        'د' => 'd', 'ذ' => 'th',
        'ر' => 'r', 'ز' => 'z',
        'س' => 's', 'ش' => 'sh', 'ص' => 's', 'ض' => 'd',
        'ط' => 't', 'ظ' => 'z',
        'ع' => 'a', 'غ' => 'gh',
        'ف' => 'f', 'ق' => 'q', 'ك' => 'k',
        'ل' => 'l', 'م' => 'm', 'ن' => 'n',
        'ه' => 'h', 'و' => 'w', 'ي' => 'y', 'ى' => 'a',
        'ة' => 'a', 'ء' => '', 'ؤ' => 'o', 'ئ' => 'e'
    ];
    
    // استبدال الأحرف العربية
    $text = str_replace(array_keys($arabic_replacements), array_values($arabic_replacements), $text);
    
    // إزالة الأحرف الخاصة
    $text = preg_replace('/[^\p{L}\p{N}\s-]/u', '', $text);
    
    // استبدال المسافات بشرطات
    $text = preg_replace('/[\s-]+/', '-', $text);
    
    // تحويل إلى أحرف صغيرة
    $text = strtolower(trim($text, '-'));
    
    // إذا كان النص فارغًا، استخدم قيمة افتراضية
    if (empty($text)) {
        return 'item';
    }
    
    return $text;
}

/**
 * إنشاء رابط لمقال في المدونة
 * Generate URL for a blog article
 * 
 * @param int $id معرف المقال
 * @param string $title عنوان المقال
 * @return string الرابط النهائي
 */
function getBlogUrl($id, $title) {
    $slug = slugify($title);
    // إذا كان العنوان فارغًا، استخدم "article" كقيمة افتراضية
    if (empty($slug)) {
        $slug = "article";
    }
    return "/blog/{$slug}-{$id}";
}

/**
 * إنشاء رابط لخدمة
 * Generate URL for a service
 * 
 * @param int $id معرف الخدمة
 * @param string $title عنوان الخدمة
 * @param int $type نوع الخدمة (1: تدريب، 2: أعمال، 3: أفراد، 4: مالية)
 * @return string الرابط النهائي
 */
function getServiceUrl($id, $title, $type) {
    $slug = slugify($title);
    
    // إذا كان العنوان فارغًا، استخدم قيمة افتراضية حسب نوع الخدمة
    if (empty($slug)) {
        switch ($type) {
            case 1:
                $slug = "program";
                break;
            case 2:
            case 3:
            case 4:
                $slug = "service";
                break;
            default:
                $slug = "item";
                break;
        }
    }
    
    switch ($type) {
        case 1:
            return "/training-programs/{$slug}-{$id}";
        case 2:
            return "/business-services/{$slug}-{$id}";
        case 3:
            return "/individual-services/{$slug}-{$id}";
        case 4:
        case 6:
            return "/financial-services/{$slug}-{$id}";
        default:
            return "/service/{$slug}-{$id}";
    }
}

/**
 * إنشاء رابط لعنصر في المكتبة
 * Generate URL for a library item
 * 
 * @param int $id معرف العنصر
 * @param string $title عنوان العنصر
 * @return string الرابط النهائي
 */
function getLibraryUrl($id, $title) {
    $slug = slugify($title);
    return "/library/{$slug}-{$id}";
}

/**
 * الحصول على روابط الصفحات الثابتة
 * Get URLs for static pages
 * 
 * @param string $page اسم الصفحة
 * @return string الرابط النهائي
 */
function getStaticPageUrl($page) {
    $urls = [
        'home' => '/home',
        'about' => '/about-us',
        'contact' => '/contact-us',
        'training' => '/training-programs',
        'financial' => '/financial-services',
        'business' => '/business-services',
        'individual' => '/individual-services',
        'library' => '/library',
        'blog' => '/blog',
        'search' => '/search'
    ];
    
    return isset($urls[$page]) ? $urls[$page] : "/{$page}";
}
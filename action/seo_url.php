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
        // التحقق من وجود المسار
        if (empty($path)) {
            return false;
        }
        
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
    
    // تطبيق الوظيفة على الرابط الحالي (فقط في بيئة الويب)
    if (isset($_SERVER['REQUEST_URI'])) {
        extractIdFromUrl($_SERVER['REQUEST_URI']);
    }
}

/**
 * تحويل النص إلى شكل مناسب للروابط
 * Convert text to URL-friendly format
 * 
 * @param string $text النص المراد تحويله
 * @return string النص بعد التحويل
 */
function slugify($text) {
    // كلمات التوقف العربية التي يجب حذفها
    $arabic_stop_words = [
        'في', 'من', 'إلى', 'على', 'عن', 'مع', 'بعد', 'قبل', 'عند', 'لدى',
        'بين', 'خلال', 'أمام', 'خلف', 'تحت', 'فوق', 'ضد', 'حول', 'دون', 'حتى',
        'لكن', 'لكن', 'غير', 'سوى', 'عدا', 'خلا', 'حاشا', 'فقط', 'قد', 'لقد',
        'كان', 'أن', 'إن', 'ذلك', 'التي', 'الذي', 'اللتان', 'اللذان', 'اللتين', 'اللذين',
        'اللاتي', 'اللواتي', 'ما', 'هو', 'هي', 'هم', 'هن', 'أنت', 'أنتم', 'أنتن',
        'نحن', 'أنا', 'هذا', 'هذه', 'هؤلاء', 'ذاك', 'تلك', 'أولئك', 'ال', 'للـ', 'بـ'
    ];
    
    // كلمات التوقف الإنجليزية التي يجب حذفها
    $english_stop_words = [
        'a', 'an', 'and', 'are', 'as', 'at', 'be', 'by', 'for', 'from',
        'has', 'he', 'in', 'is', 'it', 'its', 'of', 'on', 'that', 'the',
        'to', 'was', 'will', 'with', 'the', 'this', 'but', 'they', 'have',
        'had', 'what', 'when', 'where', 'who', 'which', 'why', 'how'
    ];
    
    // تحويل النص إلى أحرف صغيرة للمعالجة
    $text_lower = mb_strtolower($text, 'UTF-8');
    
    // حذف كلمات التوقف العربية (مع تحسين الأداء)
    $arabic_pattern = '/\b(' . implode('|', array_map(function($word) {
        return preg_quote($word, '/');
    }, $arabic_stop_words)) . ')\b/u';
    $text_lower = preg_replace($arabic_pattern, '', $text_lower);
    
    // حذف كلمات التوقف الإنجليزية (مع تحسين الأداء)
    $english_pattern = '/\b(' . implode('|', array_map(function($word) {
        return preg_quote($word, '/');
    }, $english_stop_words)) . ')\b/i';
    $text_lower = preg_replace($english_pattern, '', $text_lower);
    
    // تنظيف المسافات المتعددة
    $text = preg_replace('/\s+/', ' ', trim($text_lower));
    
    // تحويل الأحرف العربية إلى أحرف إنجليزية
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
    
    // تحويل إلى أحرف صغيرة وإزالة الشرطات من البداية والنهاية
    $text = strtolower(trim($text, '-'));
    
    // التحقق من طول الرابط (يفضل ألا يتجاوز 60 حرف)
    if (strlen($text) > 60) {
        $text = substr($text, 0, 60);
        // إزالة آخر كلمة جزئية
        $text = substr($text, 0, strrpos($text, '-'));
    }
    
    // إذا كان النص فارغًا، استخدم قيمة افتراضية
    if (empty($text)) {
        return 'service';
    }
    
    return $text;
}

/**
 * إنشاء slug فريد للمقال
 * Generate unique slug for article
 * 
 * @param string $title عنوان المقال
 * @param mysqli $conn اتصال قاعدة البيانات
 * @param int $exclude_id معرف المقال المستبعد (للتحديث)
 * @return string الـ slug الفريد
 */
function generateUniqueSlug($title, $conn, $exclude_id = 0) {
    $base_slug = slugify($title);
    $slug = $base_slug;
    $counter = 1;
    
    // التحقق من تفرد الـ slug
    while (true) {
        $sql = "SELECT ar_id FROM sa_articles WHERE ar_slug = ?";
        if ($exclude_id > 0) {
            $sql .= " AND ar_id != ?";
        }
        
        $stmt = $conn->prepare($sql);
        if ($exclude_id > 0) {
            $stmt->bind_param('si', $slug, $exclude_id);
        } else {
            $stmt->bind_param('s', $slug);
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        
        // إذا لم يوجد slug مطابق، فهو فريد
        if ($result->num_rows == 0) {
            break;
        }
        
        // إضافة رقم للـ slug
        $slug = $base_slug . '-' . $counter;
        $counter++;
        
        // حماية من اللوب اللانهائي
        if ($counter > 1000) {
            $slug = $base_slug . '-' . time();
            break;
        }
    }
    
    return $slug;
}

/**
 * إنشاء رابط لمقال في المدونة
 * Generate URL for a blog article
 * 
 * @param int $id معرف المقال
 * @param string $title عنوان المقال (اختياري - للتوافق مع الكود القديم)
 * @param string $slug الـ slug المحفوظ في قاعدة البيانات (اختياري)
 * @return string الرابط النهائي
 */
function getBlogUrl($id, $title = '', $slug = '') {
    // التحقق من البيئة المحلية
    $isLocal = (
        (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] === 'localhost') ||
        (isset($_SERVER['SERVER_NAME']) && strpos($_SERVER['SERVER_NAME'], 'localhost:') === 0) ||
        (isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR'] === '127.0.0.1') ||
        (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)
    );
    
    // في البيئة المحلية، استخدم الروابط المباشرة
    if ($isLocal) {
        $relativePath = "/blog-single.php?id={$id}";
        
        // إذا كان BASE_URL معرف، استخدمه لإنشاء الرابط الكامل
        if (defined('BASE_URL')) {
            return BASE_URL . $relativePath;
        }
        
        return $relativePath;
    }
    
    // في البيئة المباشرة، استخدم روابط SEO
    $relativePath = '';
    $finalSlug = '';
    
    // إذا تم تمرير slug وليس فارغاً، استخدمه مباشرة
    if (!empty($slug) && trim($slug) !== '') {
        $finalSlug = $slug;
    } else {
        // إذا لم يتم تمرير slug، جلبه من قاعدة البيانات
        global $conn;
        if ($conn) {
            $stmt = $conn->prepare("SELECT ar_slug, ar_title FROM sa_articles WHERE ar_id = ? LIMIT 1");
            $stmt->bind_param('i', $id);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($row = $result->fetch_assoc()) {
                // استخدم الـ slug من قاعدة البيانات إذا كان موجوداً وليس فارغاً
                if (!empty($row['ar_slug']) && trim($row['ar_slug']) !== '') {
                    $finalSlug = $row['ar_slug'];
                } else {
                    // إذا لم يوجد slug، استخدم العنوان من قاعدة البيانات
                    $title = !empty($title) ? $title : $row['ar_title'];
                }
            }
        }
        
        // إذا لم نحصل على slug بعد، أنشئه من العنوان
        if (empty($finalSlug)) {
            if (!empty($title)) {
                $generated_slug = slugify($title);
                $finalSlug = !empty($generated_slug) ? $generated_slug : "article";
                
                // حفظ الـ slug المولد في قاعدة البيانات للاستخدام المستقبلي
                if ($conn && !empty($generated_slug)) {
                    $updateStmt = $conn->prepare("UPDATE sa_articles SET ar_slug = ? WHERE ar_id = ? AND (ar_slug IS NULL OR ar_slug = '')");
                    $updateStmt->bind_param('si', $generated_slug, $id);
                    $updateStmt->execute();
                }
            } else {
                $finalSlug = "article";
            }
        }
    }
    
    // إنشاء المسار النسبي
    $relativePath = "/blog/{$finalSlug}-{$id}";
    
    // إذا كان BASE_URL معرف، استخدمه لإنشاء الرابط الكامل
    if (defined('BASE_URL')) {
        return BASE_URL . $relativePath;
    }
    
    return $relativePath;
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
    // التحقق من البيئة المحلية
    $isLocal = (
        (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] === 'localhost') ||
        (isset($_SERVER['SERVER_NAME']) && strpos($_SERVER['SERVER_NAME'], 'localhost:') === 0) ||
        (isset($_SERVER['SERVER_ADDR']) && $_SERVER['SERVER_ADDR'] === '127.0.0.1') ||
        (isset($_SERVER['HTTP_HOST']) && strpos($_SERVER['HTTP_HOST'], 'localhost') !== false)
    );
    
    // في البيئة المحلية، استخدم الروابط المباشرة
    if ($isLocal) {
        $relativePath = "/service-detail.php?id={$id}";
        if ($type) {
            $relativePath .= "&type={$type}";
        }
        
        // إذا كان BASE_URL معرف، استخدمه لإنشاء الرابط الكامل
        if (defined('BASE_URL')) {
            return BASE_URL . $relativePath;
        }
        
        return $relativePath;
    }
    
    // في البيئة المباشرة، استخدم روابط SEO
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
    
    $relativePath = '';
    switch ($type) {
        case 1:
            $relativePath = "/training-programs/{$slug}-{$id}";
            break;
        case 2:
            $relativePath = "/business-services/{$slug}-{$id}";
            break;
        case 3:
            $relativePath = "/individual-services/{$slug}-{$id}";
            break;
        case 4:
        case 6:
            $relativePath = "/financial-services/{$slug}-{$id}";
            break;
        default:
            $relativePath = "/service/{$slug}-{$id}";
            break;
    }
    
    // إذا كان BASE_URL معرف، استخدمه لإنشاء الرابط الكامل
    if (defined('BASE_URL')) {
        return BASE_URL . $relativePath;
    }
    
    return $relativePath;
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
    $relativePath = "/library/{$slug}-{$id}";
    
    // إذا كان BASE_URL معرف، استخدمه لإنشاء الرابط الكامل
    if (defined('BASE_URL')) {
        return BASE_URL . $relativePath;
    }
    
    return $relativePath;
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
    
    $relativePath = isset($urls[$page]) ? $urls[$page] : "/{$page}";
    
    // إذا كان BASE_URL معرف، استخدمه لإنشاء الرابط الكامل
    if (defined('BASE_URL')) {
        return BASE_URL . $relativePath;
    }
    
    return $relativePath;
}
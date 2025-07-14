<?php
/**
 * ملف تحديد المسار الأساسي للموقع
 * Base URL configuration file
 */

// تحديد المسار الأساسي للموقع
function getBaseUrl() {
    // الحصول على بروتوكول الموقع (http أو https)
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
    
    // الحصول على اسم المضيف
    $host = $_SERVER['HTTP_HOST'];
    
    // تحديد المسار الأساسي
    $baseUrl = $protocol . '://' . $host;
    
    // التحقق من البيئة المحلية بشكل أكثر شمولية
    $isLocal = false;
    $localHosts = ['localhost', '127.0.0.1', '::1'];
    
    foreach ($localHosts as $localHost) {
        if (strpos($host, $localHost) !== false) {
            $isLocal = true;
            break;
        }
    }
    
    // التحقق أيضاً من أي مضيف يحتوي على .local أو يبدأ بـ 192.168
    if (!$isLocal && (strpos($host, '.local') !== false || strpos($host, '192.168') === 0)) {
        $isLocal = true;
    }
    
    if ($isLocal) {
        // في البيئة المحلية، استخدم المسار الكامل
        $scriptName = $_SERVER['SCRIPT_NAME'];
        $scriptDir = dirname($scriptName);
        
        // إذا كان المجلد ليس الجذر، أضفه إلى المسار
        if ($scriptDir !== '/' && $scriptDir !== '\\') {
            // تنظيف المسار من الشرطات المائلة المتكررة
            $scriptDir = str_replace('\\', '/', $scriptDir);
            $baseUrl .= $scriptDir;
        }
    } else {
        // في بيئة الإنتاج فقط، استخدم المجال الرئيسي
        // التحقق من أن النطاق هو النطاق الفعلي للموقع
        if (strpos($host, 'saiebservices.com') !== false) {
            $baseUrl = 'https://saiebservices.com';
        }
        // وإلا استخدم المضيف الحالي (للنطاقات الفرعية أو النطاقات البديلة)
    }
    
    return rtrim($baseUrl, '/');
}

// تحديد المسار الأساسي للأصول (CSS, JS, Images)
function getAssetsUrl() {
    return getBaseUrl();
}

// تعريف ثوابت للاستخدام في جميع أنحاء الموقع
define('BASE_URL', getBaseUrl());
define('ASSETS_URL', getAssetsUrl());
?>

<?php
if (!function_exists('truncate_words')) {
    function truncate_words($text, $word_limit) {
        $text = strip_tags($text);
        $words = explode(' ', $text);
        if (count($words) > $word_limit) {
            return implode(' ', array_slice($words, 0, $word_limit)) . ' ...';
        }
        return $text;
    }
}
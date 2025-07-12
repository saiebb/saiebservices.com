<?php
/**
 * وظائف إنشاء Slug محسنة - Enhanced Slug Generation Functions
 * SAIEB Services - Slug Management System
 */

/**
 * إنشاء slug من النص العربي أو الإنجليزي
 * Create slug from Arabic or English text
 * 
 * @param string $string النص المراد تحويله
 * @return string الـ slug النهائي
 */
function create_slug($string) {
    // 1. إزالة أي وسوم HTML
    $slug = strip_tags($string);
    
    // 2. إزالة المسافات الزائدة من البداية والنهاية
    $slug = trim($slug);
    
    // 3. تحويل الحروف الكبيرة إلى صغيرة
    $slug = mb_strtolower($slug, 'UTF-8');
    
    // 4. إزالة كلمات التوقف العربية والإنجليزية
    $slug = remove_stop_words($slug);
    
    // 5. تحويل الأحرف العربية إلى أحرف إنجليزية
    $slug = transliterate_arabic($slug);
    
    // 6. استبدال المسافات والرموز غير المرغوب فيها بـ "-"
    $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
    
    // 7. استبدال الشرطات المتعددة بشرطة واحدة
    $slug = preg_replace('/-+/', '-', $slug);
    
    // 8. إزالة الشرطة من البداية والنهاية
    $slug = trim($slug, '-');
    
    // 9. التحقق من طول الـ slug (يفضل ألا يتجاوز 60 حرف)
    if (strlen($slug) > 60) {
        $slug = substr($slug, 0, 60);
        // إزالة آخر كلمة جزئية
        $lastDash = strrpos($slug, '-');
        if ($lastDash !== false) {
            $slug = substr($slug, 0, $lastDash);
        }
    }
    
    // 10. إذا كان النص فارغًا، استخدم قيمة افتراضية
    if (empty($slug)) {
        return 'article';
    }
    
    return $slug;
}

/**
 * إزالة كلمات التوقف من النص
 * Remove stop words from text
 */
function remove_stop_words($text) {
    // كلمات التوقف العربية
    $arabic_stop_words = [
        'في', 'من', 'إلى', 'على', 'عن', 'مع', 'بعد', 'قبل', 'عند', 'لدى',
        'بين', 'خلال', 'أمام', 'خلف', 'تحت', 'فوق', 'ضد', 'حول', 'دون', 'حتى',
        'لكن', 'غير', 'سوى', 'عدا', 'خلا', 'حاشا', 'فقط', 'قد', 'لقد',
        'كان', 'أن', 'إن', 'ذلك', 'التي', 'الذي', 'ما', 'هو', 'هي', 'هم', 'هن',
        'أنت', 'أنتم', 'أنتن', 'نحن', 'أنا', 'هذا', 'هذه', 'هؤلاء', 'ذاك', 'تلك',
        'أولئك', 'ال', 'للـ', 'بـ', 'كـ', 'وال', 'فال', 'بال'
    ];
    
    // كلمات التوقف الإنجليزية
    $english_stop_words = [
        'a', 'an', 'and', 'are', 'as', 'at', 'be', 'by', 'for', 'from',
        'has', 'he', 'in', 'is', 'it', 'its', 'of', 'on', 'that', 'the',
        'to', 'was', 'will', 'with', 'this', 'but', 'they', 'have',
        'had', 'what', 'when', 'where', 'who', 'which', 'why', 'how'
    ];
    
    // دمج كلمات التوقف
    $stop_words = array_merge($arabic_stop_words, $english_stop_words);
    
    // إزالة كلمات التوقف
    foreach ($stop_words as $word) {
        $text = preg_replace('/\b' . preg_quote($word, '/') . '\b/ui', '', $text);
    }
    
    // تنظيف المسافات المتعددة
    $text = preg_replace('/\s+/', ' ', trim($text));
    
    return $text;
}

/**
 * تحويل الأحرف العربية إلى أحرف إنجليزية
 * Transliterate Arabic characters to English
 */
function transliterate_arabic($text) {
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
    
    return str_replace(array_keys($arabic_replacements), array_values($arabic_replacements), $text);
}

/**
 * التحقق من أن الـ slug فريد في قاعدة البيانات
 * Check if slug is unique in database
 */
function ensure_unique_slug($base_slug, $article_id = null, $conn = null) {
    if (!$conn) {
        global $conn;
    }
    
    $slug = $base_slug;
    $counter = 1;
    
    while (true) {
        // التحقق من وجود الـ slug
        $check_sql = "SELECT COUNT(*) as count FROM sa_articles WHERE ar_slug = ?";
        $params = [$slug];
        
        // إذا كان هناك معرف مقال، استثناؤه من البحث (للتحديث)
        if ($article_id) {
            $check_sql .= " AND ar_id != ?";
            $params[] = $article_id;
        }
        
        $stmt = $conn->prepare($check_sql);
        $stmt->bind_param(str_repeat('s', count($params)), ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        
        if ($row['count'] == 0) {
            break; // الـ slug فريد
        }
        
        // إذا لم يكن فريدًا، أضف رقمًا
        $slug = $base_slug . '-' . $counter;
        $counter++;
    }
    
    return $slug;
}

/**
 * إنشاء slug فريد للمقال
 * Generate unique slug for article
 */
function generate_article_slug($title, $article_id = null, $conn = null) {
    $base_slug = create_slug($title);
    return ensure_unique_slug($base_slug, $article_id, $conn);
}
?>
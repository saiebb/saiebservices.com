/**
 * Font Awesome Icons Fallback Script - Enhanced Version
 * يتحقق من تحميل أيقونات Font Awesome ويوفر حلول احتياطية محسنة
 */

document.addEventListener('DOMContentLoaded', function() {
    console.log('🔍 بدء فحص أيقونات Font Awesome...');
    
    // التحقق من تحميل Font Awesome
    checkFontAwesome();
    
    // إضافة أيقونات احتياطية إذا لم تحمل
    setTimeout(addFallbackIcons, 1500);
    
    // فحص دوري للأيقونات
    setTimeout(periodicCheck, 3000);
});

function checkFontAwesome() {
    // إنشاء عنصر اختبار
    const testElement = document.createElement('i');
    testElement.className = 'fa-brands fa-instagram';
    testElement.style.position = 'absolute';
    testElement.style.left = '-9999px';
    testElement.style.fontSize = '16px';
    document.body.appendChild(testElement);
    
    setTimeout(() => {
        const computedStyle = window.getComputedStyle(testElement, ':before');
        const content = computedStyle.getPropertyValue('content');
        
        if (content === 'none' || content === '""') {
            console.warn('⚠️ Font Awesome لم يتم تحميله بشكل صحيح');
            loadFallbackCSS();
        } else {
            console.log('✅ Font Awesome تم تحميله بنجاح');
        }
        
        document.body.removeChild(testElement);
    }, 500);
}

function loadFallbackCSS() {
    // تحميل Font Awesome من CDN كحل احتياطي
    const link = document.createElement('link');
    link.rel = 'stylesheet';
    link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css';
    link.crossOrigin = 'anonymous';
    link.referrerPolicy = 'no-referrer';
    
    link.onload = function() {
        console.log('✅ تم تحميل Font Awesome من CDN');
    };
    
    link.onerror = function() {
        console.error('❌ فشل في تحميل Font Awesome من CDN');
        addTextFallback();
    };
    
    document.head.appendChild(link);
}

function addFallbackIcons() {
    console.log('🔄 فحص الأيقونات وإضافة البدائل...');
    
    const socialIcons = document.querySelectorAll('.social-icon');
    let fixedCount = 0;
    
    socialIcons.forEach((icon, index) => {
        const iconElement = icon.querySelector('i');
        if (iconElement) {
            const classes = iconElement.className;
            
            // التحقق من وجود المحتوى
            const computedStyle = window.getComputedStyle(iconElement, ':before');
            const content = computedStyle.getPropertyValue('content');
            const fontFamily = computedStyle.getPropertyValue('font-family');
            
            console.log(`أيقونة ${index + 1}:`, {
                classes: classes,
                content: content,
                fontFamily: fontFamily
            });
            
            if (content === 'none' || content === '""' || content === 'normal' || !fontFamily.includes('Font Awesome')) {
                // إضافة نص احتياطي
                let fallbackText = '';
                let fallbackIcon = '';
                
                if (classes.includes('instagram')) {
                    fallbackText = 'IG';
                    fallbackIcon = '📷';
                } else if (classes.includes('twitter') || classes.includes('x-twitter')) {
                    fallbackText = 'X';
                    fallbackIcon = '🐦';
                } else if (classes.includes('linkedin')) {
                    fallbackText = 'IN';
                    fallbackIcon = '💼';
                } else if (classes.includes('facebook')) {
                    fallbackText = 'FB';
                    fallbackIcon = '📘';
                } else if (classes.includes('whatsapp')) {
                    fallbackText = 'WA';
                    fallbackIcon = '💬';
                } else if (classes.includes('youtube')) {
                    fallbackText = 'YT';
                    fallbackIcon = '📺';
                }
                
                if (fallbackText) {
                    // إضافة النص والرمز التعبيري
                    iconElement.innerHTML = `<span style="font-size: 12px; font-weight: bold;">${fallbackText}</span>`;
                    iconElement.style.fontSize = '12px';
                    iconElement.style.fontFamily = 'Arial, sans-serif';
                    iconElement.style.fontWeight = 'bold';
                    iconElement.style.display = 'flex';
                    iconElement.style.alignItems = 'center';
                    iconElement.style.justifyContent = 'center';
                    
                    // إضافة تلميح
                    icon.title = icon.title || fallbackText;
                    
                    fixedCount++;
                    console.log(`✅ تم إصلاح أيقونة ${fallbackText}`);
                }
            } else {
                console.log(`✅ أيقونة ${index + 1} تعمل بشكل صحيح`);
            }
        }
    });
    
    if (fixedCount > 0) {
        console.log(`🔧 تم إصلاح ${fixedCount} أيقونة`);
        
        // إضافة إشعار للمطور
        if (window.location.hostname === 'localhost' || window.location.hostname.includes('127.0.0.1')) {
            const notification = document.createElement('div');
            notification.innerHTML = `
                <div style="position: fixed; top: 10px; right: 10px; background: #ff9800; color: white; padding: 10px; border-radius: 5px; z-index: 9999; font-size: 12px;">
                    ⚠️ تم استخدام أيقونات احتياطية (${fixedCount})
                </div>
            `;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 5000);
        }
    }
}

// فحص دوري للأيقونات
function periodicCheck() {
    console.log('🔍 فحص دوري للأيقونات...');
    
    const socialIcons = document.querySelectorAll('.social-icon i');
    let needsFix = false;
    
    socialIcons.forEach(icon => {
        const computedStyle = window.getComputedStyle(icon, ':before');
        const content = computedStyle.getPropertyValue('content');
        
        if (content === 'none' || content === '""' || content === 'normal') {
            needsFix = true;
        }
    });
    
    if (needsFix) {
        console.log('🔧 تم اكتشاف أيقونات تحتاج إصلاح، جاري الإصلاح...');
        addFallbackIcons();
    } else {
        console.log('✅ جميع الأيقونات تعمل بشكل صحيح');
    }
}

function addTextFallback() {
    // إضافة نصوص احتياطية للأيقونات
    const socialIcons = document.querySelectorAll('.social-icon');
    
    socialIcons.forEach(icon => {
        const href = icon.getAttribute('href');
        let text = '';
        
        if (href && href.includes('instagram')) {
            text = 'Instagram';
        } else if (href && (href.includes('twitter') || href.includes('x.com'))) {
            text = 'X';
        } else if (href && href.includes('linkedin')) {
            text = 'LinkedIn';
        } else if (href && href.includes('facebook')) {
            text = 'Facebook';
        }
        
        if (text) {
            icon.innerHTML = text;
            icon.style.fontSize = '12px';
            icon.style.fontWeight = 'bold';
            icon.style.padding = '8px';
            console.log('📝 تم إضافة نص احتياطي:', text);
        }
    });
}

// إضافة CSS احتياطي للأيقونات
const fallbackCSS = `
.social-icon {
    display: inline-flex !important;
    align-items: center !important;
    justify-content: center !important;
    min-width: 40px !important;
    min-height: 40px !important;
    border-radius: 50% !important;
    margin: 0 5px !important;
    text-decoration: none !important;
    color: white !important;
    font-weight: bold !important;
    transition: all 0.3s ease !important;
}

.social-icon:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 4px 8px rgba(0,0,0,0.3) !important;
}
`;

// إضافة CSS إلى الصفحة
const style = document.createElement('style');
style.textContent = fallbackCSS;
document.head.appendChild(style);
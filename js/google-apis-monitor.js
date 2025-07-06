/**
 * مراقب Google APIs - لتشخيص ومعالجة مشاكل Google Services
 * Google APIs Monitor - For diagnosing and handling Google Services issues
 */

(function() {
    'use strict';
    
    // إعدادات المراقبة
    const MONITOR_CONFIG = {
        checkInterval: 5000, // 5 ثوان
        maxRetries: 3,
        timeout: 10000 // 10 ثوان
    };
    
    // حالة الخدمات
    const servicesStatus = {
        googleAnalytics: false,
        googleTagManager: false,
        googleAPIs: false,
        googleCustomerReviews: false
    };
    
    // عداد المحاولات
    const retryCounters = {
        googleAnalytics: 0,
        googleTagManager: 0,
        googleAPIs: 0,
        googleCustomerReviews: 0
    };
    
    /**
     * فحص حالة Google Analytics
     */
    function checkGoogleAnalytics() {
        try {
            if (typeof gtag !== 'undefined' && typeof dataLayer !== 'undefined') {
                servicesStatus.googleAnalytics = true;
                console.log('✅ Google Analytics يعمل بشكل طبيعي');
                return true;
            }
        } catch (error) {
            console.warn('⚠️ مشكلة في Google Analytics:', error);
        }
        
        servicesStatus.googleAnalytics = false;
        return false;
    }
    
    /**
     * فحص حالة Google Tag Manager
     */
    function checkGoogleTagManager() {
        try {
            if (typeof dataLayer !== 'undefined' && dataLayer.length > 0) {
                servicesStatus.googleTagManager = true;
                console.log('✅ Google Tag Manager يعمل بشكل طبيعي');
                return true;
            }
        } catch (error) {
            console.warn('⚠️ مشكلة في Google Tag Manager:', error);
        }
        
        servicesStatus.googleTagManager = false;
        return false;
    }
    
    /**
     * فحص حالة Google APIs
     */
    function checkGoogleAPIs() {
        try {
            if (typeof gapi !== 'undefined') {
                servicesStatus.googleAPIs = true;
                console.log('✅ Google APIs محملة بشكل طبيعي');
                return true;
            }
        } catch (error) {
            console.warn('⚠️ مشكلة في Google APIs:', error);
        }
        
        servicesStatus.googleAPIs = false;
        return false;
    }
    
    /**
     * فحص حالة Google Customer Reviews
     */
    function checkGoogleCustomerReviews() {
        try {
            const badgeContainer = document.getElementById('google-reviews-badge');
            if (badgeContainer) {
                const iframe = badgeContainer.querySelector('iframe');
                if (iframe && iframe.src && !iframe.src.includes('404')) {
                    servicesStatus.googleCustomerReviews = true;
                    console.log('✅ Google Customer Reviews يعمل بشكل طبيعي');
                    return true;
                }
            }
        } catch (error) {
            console.warn('⚠️ مشكلة في Google Customer Reviews:', error);
        }
        
        servicesStatus.googleCustomerReviews = false;
        return false;
    }
    
    /**
     * إعادة تحميل خدمة معينة
     */
    function retryService(serviceName) {
        if (retryCounters[serviceName] >= MONITOR_CONFIG.maxRetries) {
            console.error(`❌ تم الوصول للحد الأقصى من المحاولات لـ ${serviceName}`);
            return;
        }
        
        retryCounters[serviceName]++;
        console.log(`🔄 محاولة إعادة تحميل ${serviceName} - المحاولة ${retryCounters[serviceName]}`);
        
        switch (serviceName) {
            case 'googleAnalytics':
                retryGoogleAnalytics();
                break;
            case 'googleAPIs':
                retryGoogleAPIs();
                break;
            case 'googleCustomerReviews':
                retryGoogleCustomerReviews();
                break;
        }
    }
    
    /**
     * إعادة محاولة تحميل Google Analytics
     */
    function retryGoogleAnalytics() {
        if (typeof gtag === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://www.googletagmanager.com/gtag/js?id=G-PELEW7CW99';
            script.async = true;
            script.onload = function() {
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());
                gtag('config', 'G-PELEW7CW99');
                console.log('✅ تم إعادة تحميل Google Analytics بنجاح');
            };
            script.onerror = function() {
                console.error('❌ فشل في إعادة تحميل Google Analytics');
            };
            document.head.appendChild(script);
        }
    }
    
    /**
     * إعادة محاولة تحميل Google APIs
     */
    function retryGoogleAPIs() {
        if (typeof gapi === 'undefined') {
            const script = document.createElement('script');
            script.src = 'https://apis.google.com/js/platform.js';
            script.async = true;
            script.onload = function() {
                console.log('✅ تم إعادة تحميل Google APIs بنجاح');
                // إعادة تحميل Customer Reviews إذا كان متاحاً
                if (typeof window.renderGoogleBadge === 'function') {
                    setTimeout(window.renderGoogleBadge, 1000);
                }
            };
            script.onerror = function() {
                console.error('❌ فشل في إعادة تحميل Google APIs');
            };
            document.head.appendChild(script);
        }
    }
    
    /**
     * إعادة محاولة تحميل Google Customer Reviews
     */
    function retryGoogleCustomerReviews() {
        if (typeof window.renderGoogleBadge === 'function') {
            setTimeout(window.renderGoogleBadge, 1000);
        } else if (typeof window.showFallbackBadge === 'function') {
            window.showFallbackBadge();
        }
    }
    
    /**
     * تشغيل فحص دوري للخدمات
     */
    function startMonitoring() {
        console.log('🔍 بدء مراقبة Google Services...');
        
        setInterval(function() {
            // فحص Google Analytics
            if (!checkGoogleAnalytics() && retryCounters.googleAnalytics < MONITOR_CONFIG.maxRetries) {
                retryService('googleAnalytics');
            }
            
            // فحص Google Tag Manager
            checkGoogleTagManager();
            
            // فحص Google APIs
            if (!checkGoogleAPIs() && retryCounters.googleAPIs < MONITOR_CONFIG.maxRetries) {
                retryService('googleAPIs');
            }
            
            // فحص Google Customer Reviews
            if (!checkGoogleCustomerReviews() && retryCounters.googleCustomerReviews < MONITOR_CONFIG.maxRetries) {
                retryService('googleCustomerReviews');
            }
            
        }, MONITOR_CONFIG.checkInterval);
    }
    
    /**
     * عرض تقرير حالة الخدمات
     */
    function getServicesReport() {
        console.group('📊 تقرير حالة Google Services');
        console.log('Google Analytics:', servicesStatus.googleAnalytics ? '✅ يعمل' : '❌ لا يعمل');
        console.log('Google Tag Manager:', servicesStatus.googleTagManager ? '✅ يعمل' : '❌ لا يعمل');
        console.log('Google APIs:', servicesStatus.googleAPIs ? '✅ يعمل' : '❌ لا يعمل');
        console.log('Google Customer Reviews:', servicesStatus.googleCustomerReviews ? '✅ يعمل' : '❌ لا يعمل');
        console.groupEnd();
        
        return servicesStatus;
    }
    
    /**
     * تهيئة المراقب
     */
    function init() {
        // بدء المراقبة بعد تحميل الصفحة
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', function() {
                setTimeout(startMonitoring, 2000);
            });
        } else {
            setTimeout(startMonitoring, 2000);
        }
        
        // إتاحة دالة التقرير عالمياً للتشخيص
        window.getGoogleServicesReport = getServicesReport;
        
        // إضافة معالج للأخطاء العامة
        window.addEventListener('error', function(event) {
            if (event.filename && (
                event.filename.includes('google') || 
                event.filename.includes('gtag') || 
                event.filename.includes('analytics')
            )) {
                console.warn('⚠️ خطأ في خدمة Google:', event.message);
            }
        });
        
        console.log('🚀 تم تهيئة مراقب Google Services');
    }
    
    // تشغيل المراقب
    init();
    
})();
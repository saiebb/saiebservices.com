<?php
// صفحة تشخيص خدمات Google - للمطورين فقط
// Google Services Diagnostic Page - For Developers Only

// التحقق من وجود معامل التشخيص
if (!isset($_GET['debug']) || $_GET['debug'] !== 'saieb2024') {
    header('HTTP/1.0 404 Not Found');
    exit('Page not found');
}
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تشخيص خدمات Google - صيب</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .status-ok { color: #28a745; }
        .status-error { color: #dc3545; }
        .status-warning { color: #ffc107; }
        .diagnostic-card { margin-bottom: 20px; }
        .log-container { 
            background: #f8f9fa; 
            border: 1px solid #dee2e6; 
            border-radius: 5px; 
            padding: 15px; 
            max-height: 300px; 
            overflow-y: auto; 
            font-family: monospace; 
            font-size: 12px;
        }
        .refresh-btn { margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">🔍 تشخيص خدمات Google</h1>
                <p class="text-center text-muted">صفحة تشخيص للمطورين - مراقبة حالة خدمات Google</p>
                
                <button class="btn btn-primary refresh-btn" onclick="runDiagnostics()">
                    🔄 تحديث التشخيص
                </button>
                
                <button class="btn btn-info refresh-btn" onclick="clearLogs()">
                    🗑️ مسح السجلات
                </button>
            </div>
        </div>
        
        <div class="row">
            <!-- Google Analytics -->
            <div class="col-md-6">
                <div class="card diagnostic-card">
                    <div class="card-header">
                        <h5>📊 Google Analytics</h5>
                    </div>
                    <div class="card-body">
                        <div id="ga-status" class="mb-2">
                            <span class="badge bg-secondary">جاري الفحص...</span>
                        </div>
                        <div id="ga-details"></div>
                    </div>
                </div>
            </div>
            
            <!-- Google Tag Manager -->
            <div class="col-md-6">
                <div class="card diagnostic-card">
                    <div class="card-header">
                        <h5>🏷️ Google Tag Manager</h5>
                    </div>
                    <div class="card-body">
                        <div id="gtm-status" class="mb-2">
                            <span class="badge bg-secondary">جاري الفحص...</span>
                        </div>
                        <div id="gtm-details"></div>
                    </div>
                </div>
            </div>
            
            <!-- Google APIs -->
            <div class="col-md-6">
                <div class="card diagnostic-card">
                    <div class="card-header">
                        <h5>🔧 Google APIs</h5>
                    </div>
                    <div class="card-body">
                        <div id="gapi-status" class="mb-2">
                            <span class="badge bg-secondary">جاري الفحص...</span>
                        </div>
                        <div id="gapi-details"></div>
                    </div>
                </div>
            </div>
            
            <!-- Google Customer Reviews -->
            <div class="col-md-6">
                <div class="card diagnostic-card">
                    <div class="card-header">
                        <h5>⭐ Google Customer Reviews</h5>
                    </div>
                    <div class="card-body">
                        <div id="gcr-status" class="mb-2">
                            <span class="badge bg-secondary">جاري الفحص...</span>
                        </div>
                        <div id="gcr-details"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- سجل الأحداث -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>📝 سجل الأحداث المباشر</h5>
                    </div>
                    <div class="card-body">
                        <div id="console-log" class="log-container">
                            <div class="text-muted">جاري تحميل السجلات...</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- معلومات إضافية -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5>ℹ️ معلومات النظام</h5>
                    </div>
                    <div class="card-body">
                        <div id="system-info"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- تحميل Google Services للاختبار -->
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-NK4L62NP');</script>

    <!-- Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-PELEW7CW99"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-PELEW7CW99');
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // مصفوفة لحفظ سجل الأحداث
        let diagnosticLogs = [];
        
        // دالة إضافة سجل
        function addLog(message, type = 'info') {
            const timestamp = new Date().toLocaleTimeString('ar-SA');
            const logEntry = `[${timestamp}] ${message}`;
            diagnosticLogs.push(logEntry);
            
            // عرض السجل
            const logContainer = document.getElementById('console-log');
            const logElement = document.createElement('div');
            logElement.className = `log-entry log-${type}`;
            logElement.textContent = logEntry;
            
            if (type === 'error') logElement.style.color = '#dc3545';
            else if (type === 'warning') logElement.style.color = '#ffc107';
            else if (type === 'success') logElement.style.color = '#28a745';
            
            logContainer.appendChild(logElement);
            logContainer.scrollTop = logContainer.scrollHeight;
        }
        
        // دالة مسح السجلات
        function clearLogs() {
            diagnosticLogs = [];
            document.getElementById('console-log').innerHTML = '<div class="text-muted">تم مسح السجلات</div>';
        }
        
        // فحص Google Analytics
        function checkGoogleAnalytics() {
            addLog('🔍 فحص Google Analytics...');
            
            const statusEl = document.getElementById('ga-status');
            const detailsEl = document.getElementById('ga-details');
            
            try {
                if (typeof gtag !== 'undefined' && typeof dataLayer !== 'undefined') {
                    statusEl.innerHTML = '<span class="badge bg-success">✅ يعمل</span>';
                    detailsEl.innerHTML = `
                        <small class="text-muted">
                            • gtag متوفر: نعم<br>
                            • dataLayer متوفر: نعم<br>
                            • عدد العناصر في dataLayer: ${dataLayer.length}
                        </small>
                    `;
                    addLog('✅ Google Analytics يعمل بشكل طبيعي', 'success');
                    return true;
                } else {
                    throw new Error('gtag أو dataLayer غير متوفر');
                }
            } catch (error) {
                statusEl.innerHTML = '<span class="badge bg-danger">❌ لا يعمل</span>';
                detailsEl.innerHTML = `<small class="text-danger">خطأ: ${error.message}</small>`;
                addLog(`❌ خطأ في Google Analytics: ${error.message}`, 'error');
                return false;
            }
        }
        
        // فحص Google Tag Manager
        function checkGoogleTagManager() {
            addLog('🔍 فحص Google Tag Manager...');
            
            const statusEl = document.getElementById('gtm-status');
            const detailsEl = document.getElementById('gtm-details');
            
            try {
                if (typeof dataLayer !== 'undefined' && dataLayer.length > 0) {
                    statusEl.innerHTML = '<span class="badge bg-success">✅ يعمل</span>';
                    detailsEl.innerHTML = `
                        <small class="text-muted">
                            • dataLayer متوفر: نعم<br>
                            • عدد الأحداث: ${dataLayer.length}<br>
                            • GTM Container ID: GTM-NK4L62NP
                        </small>
                    `;
                    addLog('✅ Google Tag Manager يعمل بشكل طبيعي', 'success');
                    return true;
                } else {
                    throw new Error('dataLayer فارغ أو غير متوفر');
                }
            } catch (error) {
                statusEl.innerHTML = '<span class="badge bg-danger">❌ لا يعمل</span>';
                detailsEl.innerHTML = `<small class="text-danger">خطأ: ${error.message}</small>`;
                addLog(`❌ خطأ في Google Tag Manager: ${error.message}`, 'error');
                return false;
            }
        }
        
        // فحص Google APIs
        function checkGoogleAPIs() {
            addLog('🔍 فحص Google APIs...');
            
            const statusEl = document.getElementById('gapi-status');
            const detailsEl = document.getElementById('gapi-details');
            
            // محاولة تحميل Google APIs إذا لم تكن محملة
            if (typeof gapi === 'undefined') {
                addLog('⏳ تحميل Google APIs...', 'warning');
                const script = document.createElement('script');
                script.src = 'https://apis.google.com/js/platform.js';
                script.async = true;
                script.onload = function() {
                    addLog('✅ تم تحميل Google APIs بنجاح', 'success');
                    setTimeout(() => checkGoogleAPIs(), 1000);
                };
                script.onerror = function() {
                    statusEl.innerHTML = '<span class="badge bg-danger">❌ فشل التحميل</span>';
                    detailsEl.innerHTML = '<small class="text-danger">فشل في تحميل Google APIs</small>';
                    addLog('❌ فشل في تحميل Google APIs', 'error');
                };
                document.head.appendChild(script);
                return;
            }
            
            try {
                if (typeof gapi !== 'undefined') {
                    statusEl.innerHTML = '<span class="badge bg-success">✅ محملة</span>';
                    detailsEl.innerHTML = `
                        <small class="text-muted">
                            • gapi متوفر: نعم<br>
                            • الإصدار: ${gapi.version || 'غير محدد'}<br>
                            • الخدمات المتاحة: ${Object.keys(gapi).join(', ')}
                        </small>
                    `;
                    addLog('✅ Google APIs محملة بشكل طبيعي', 'success');
                    return true;
                } else {
                    throw new Error('gapi غير متوفر');
                }
            } catch (error) {
                statusEl.innerHTML = '<span class="badge bg-danger">❌ لا تعمل</span>';
                detailsEl.innerHTML = `<small class="text-danger">خطأ: ${error.message}</small>`;
                addLog(`❌ خطأ في Google APIs: ${error.message}`, 'error');
                return false;
            }
        }
        
        // فحص Google Customer Reviews
        function checkGoogleCustomerReviews() {
            addLog('🔍 فحص Google Customer Reviews...');
            
            const statusEl = document.getElementById('gcr-status');
            const detailsEl = document.getElementById('gcr-details');
            
            try {
                // إنشاء عنصر وهمي للاختبار
                const testContainer = document.createElement('div');
                testContainer.id = 'test-google-reviews-badge';
                testContainer.style.display = 'none';
                document.body.appendChild(testContainer);
                
                if (typeof gapi !== 'undefined' && gapi.ratingbadge) {
                    gapi.ratingbadge.render(testContainer, {
                        "merchant_id": 5349752399,
                        "position": "BOTTOM_CENTER"
                    });
                    
                    setTimeout(() => {
                        const iframe = testContainer.querySelector('iframe');
                        if (iframe && iframe.src && !iframe.src.includes('404')) {
                            statusEl.innerHTML = '<span class="badge bg-success">✅ يعمل</span>';
                            detailsEl.innerHTML = `
                                <small class="text-muted">
                                    • معرف التاجر: 5349752399<br>
                                    • الشارة محملة: نعم<br>
                                    • URL الشارة: ${iframe.src.substring(0, 50)}...
                                </small>
                            `;
                            addLog('✅ Google Customer Reviews يعمل بشكل طبيعي', 'success');
                        } else {
                            throw new Error('الشارة لم تحمل بشكل صحيح');
                        }
                        document.body.removeChild(testContainer);
                    }, 3000);
                    
                } else {
                    throw new Error('gapi.ratingbadge غير متوفر');
                }
            } catch (error) {
                statusEl.innerHTML = '<span class="badge bg-danger">❌ لا يعمل</span>';
                detailsEl.innerHTML = `<small class="text-danger">خطأ: ${error.message}</small>`;
                addLog(`❌ خطأ في Google Customer Reviews: ${error.message}`, 'error');
                return false;
            }
        }
        
        // عرض معلومات النظام
        function showSystemInfo() {
            const systemInfoEl = document.getElementById('system-info');
            const info = {
                'متصفح': navigator.userAgent,
                'اللغة': navigator.language,
                'المنطقة الزمنية': Intl.DateTimeFormat().resolvedOptions().timeZone,
                'حجم الشاشة': `${screen.width}x${screen.height}`,
                'حجم النافذة': `${window.innerWidth}x${window.innerHeight}`,
                'اتصال آمن': location.protocol === 'https:' ? 'نعم' : 'لا',
                'الكوكيز مفعلة': navigator.cookieEnabled ? 'نعم' : 'لا'
            };
            
            let infoHtml = '';
            for (const [key, value] of Object.entries(info)) {
                infoHtml += `<strong>${key}:</strong> ${value}<br>`;
            }
            
            systemInfoEl.innerHTML = `<small class="text-muted">${infoHtml}</small>`;
        }
        
        // تشغيل جميع الفحوصات
        function runDiagnostics() {
            addLog('🚀 بدء التشخيص الشامل...', 'info');
            
            // مسح النتائج السابقة
            document.querySelectorAll('[id$="-status"]').forEach(el => {
                el.innerHTML = '<span class="badge bg-secondary">جاري الفحص...</span>';
            });
            document.querySelectorAll('[id$="-details"]').forEach(el => {
                el.innerHTML = '';
            });
            
            // تشغيل الفحوصات
            setTimeout(() => checkGoogleAnalytics(), 500);
            setTimeout(() => checkGoogleTagManager(), 1000);
            setTimeout(() => checkGoogleAPIs(), 1500);
            setTimeout(() => checkGoogleCustomerReviews(), 3000);
            setTimeout(() => showSystemInfo(), 500);
        }
        
        // تشغيل التشخيص عند تحميل الصفحة
        document.addEventListener('DOMContentLoaded', function() {
            addLog('📄 تم تحميل صفحة التشخيص', 'info');
            setTimeout(runDiagnostics, 1000);
        });
        
        // مراقبة الأخطاء
        window.addEventListener('error', function(event) {
            if (event.filename && (
                event.filename.includes('google') || 
                event.filename.includes('gtag') || 
                event.filename.includes('analytics')
            )) {
                addLog(`🚨 خطأ JavaScript: ${event.message} في ${event.filename}:${event.lineno}`, 'error');
            }
        });
    </script>
</body>
</html>
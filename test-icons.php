<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>اختبار الأيقونات</title>
    
    <!-- تحميل Font Awesome من CDN كنسخة احتياطية -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- تحميل الملفات المحلية -->
    <link rel="stylesheet" href="css/font-icons.css" />
    
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background: #f5f5f5;
        }
        .test-section {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .icon-test {
            font-size: 24px;
            margin: 10px;
            padding: 10px;
            display: inline-block;
            background: #f8f9fa;
            border-radius: 5px;
        }
        .social-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            line-height: 40px;
            text-align: center;
            border-radius: 50%;
            margin: 5px;
            color: white;
            text-decoration: none;
            font-size: 18px;
        }
        .h-bg-facebook { background-color: #3b5998; }
        .h-bg-x-twitter { background-color: #000; }
        .h-bg-linkedin { background-color: #0077b5; }
        .h-bg-instagram { background-color: #e4405f; }
    </style>
</head>
<body>
    <h1>اختبار أيقونات التواصل الاجتماعي</h1>
    
    <div class="test-section">
        <h2>اختبار الأيقونات الأساسية</h2>
        <div class="icon-test">
            <i class="fa-brands fa-instagram"></i> Instagram
        </div>
        <div class="icon-test">
            <i class="fa-brands fa-x-twitter"></i> X (Twitter)
        </div>
        <div class="icon-test">
            <i class="fa-brands fa-linkedin"></i> LinkedIn
        </div>
        <div class="icon-test">
            <i class="fa-brands fa-facebook"></i> Facebook
        </div>
    </div>
    
    <div class="test-section">
        <h2>اختبار الأيقونات كما في الموقع</h2>
        <a href="#" class="social-icon h-bg-instagram">
            <i class="fa-brands fa-instagram"></i>
        </a>
        <a href="#" class="social-icon h-bg-x-twitter">
            <i class="fa-brands fa-x-twitter"></i>
        </a>
        <a href="#" class="social-icon h-bg-linkedin">
            <i class="fa-brands fa-linkedin"></i>
        </a>
    </div>
    
    <div class="test-section">
        <h2>معلومات التشخيص</h2>
        <p><strong>تحميل Font Awesome:</strong> <span id="fa-status">جاري التحقق...</span></p>
        <p><strong>عدد الأيقونات المحملة:</strong> <span id="icon-count">جاري العد...</span></p>
        <p><strong>مسار الخطوط:</strong> <span id="font-path">جاري التحقق...</span></p>
        <div id="debug-info" style="background: #f8f9fa; padding: 15px; border-radius: 5px; margin-top: 10px; font-family: monospace; font-size: 12px;"></div>
    </div>
    
    <div class="test-section">
        <h2>اختبار الأيقونات من الموقع الفعلي</h2>
        <div style="background: #333; padding: 20px; border-radius: 8px;">
            <div class="d-flex justify-content-center">
                <a href="https://www.instagram.com/saiebcompany/" target="_blank"
                    class="social-icon border-transparent si-small h-bg-instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="https://x.com/saiebcompany" target="_blank"
                    class="social-icon border-transparent si-small h-bg-x-twitter">
                    <i class="fa-brands fa-x-twitter"></i>
                </a>

                <a href="https://www.linkedin.com/in/saiebcompany/" target="_blank"
                    class="social-icon border-transparent si-small me-0 h-bg-linkedin">
                    <i class="fa-brands fa-linkedin"></i>
                </a>
            </div>
        </div>
    </div>
    
    <script>
        // التحقق من تحميل Font Awesome
        document.addEventListener('DOMContentLoaded', function() {
            // التحقق من وجود خط Font Awesome
            const testElement = document.createElement('i');
            testElement.className = 'fa-brands fa-instagram';
            testElement.style.position = 'absolute';
            testElement.style.left = '-9999px';
            document.body.appendChild(testElement);
            
            setTimeout(() => {
                const computedStyle = window.getComputedStyle(testElement);
                const fontFamily = computedStyle.fontFamily;
                const beforeStyle = window.getComputedStyle(testElement, ':before');
                const content = beforeStyle.getPropertyValue('content');
                
                let debugInfo = `Font Family: ${fontFamily}\n`;
                debugInfo += `Content: ${content}\n`;
                debugInfo += `Font Weight: ${computedStyle.fontWeight}\n`;
                debugInfo += `Font Style: ${computedStyle.fontStyle}\n`;
                
                document.getElementById('debug-info').textContent = debugInfo;
                
                if (fontFamily.includes('Font Awesome') && content !== 'none' && content !== '""') {
                    document.getElementById('fa-status').textContent = '✅ تم التحميل بنجاح';
                    document.getElementById('fa-status').style.color = 'green';
                } else {
                    document.getElementById('fa-status').textContent = '❌ فشل في التحميل';
                    document.getElementById('fa-status').style.color = 'red';
                }
                
                // عد الأيقونات
                const icons = document.querySelectorAll('[class*="fa-"]');
                document.getElementById('icon-count').textContent = icons.length;
                
                // فحص مسار الخطوط
                document.getElementById('font-path').textContent = 'css/icons/font-awesome/';
                
                document.body.removeChild(testElement);
            }, 1000);
        });
    </script>
</body>
</html>
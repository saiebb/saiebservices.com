<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>404 - الصفحة غير موجودة | SAIEB Services</title>
    <meta name="description" content="الصفحة التي تبحث عنها غير موجودة. تصفح خدماتنا المتنوعة في SAIEB Services.">
    
    <!-- Google Site Verification -->
    <meta name="google-site-verification" content="-nu_pz27v0fxcLY9mFOF-ymVgGra8d0ovT06122k0Do" />
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .error-container {
            text-align: center;
            color: white;
            padding: 2rem;
        }
        
        .error-code {
            font-size: 8rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            margin-bottom: 1rem;
        }
        
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }
        
        .btn-home {
            background: rgba(255,255,255,0.2);
            border: 2px solid rgba(255,255,255,0.3);
            color: white;
            padding: 12px 30px;
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            margin: 0.5rem;
        }
        
        .btn-home:hover {
            background: rgba(255,255,255,0.3);
            border-color: rgba(255,255,255,0.5);
            color: white;
            transform: translateY(-2px);
        }
        
        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-top: 2rem;
            max-width: 800px;
        }
        
        .service-card {
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(255,255,255,0.2);
            border-radius: 15px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }
        
        .service-card:hover {
            background: rgba(255,255,255,0.2);
            transform: translateY(-5px);
        }
        
        .service-card i {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #ffd700;
        }
        
        .service-card h5 {
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        
        .service-card a {
            color: white;
            text-decoration: none;
        }
        
        @media (max-width: 768px) {
            .error-code {
                font-size: 5rem;
            }
            
            .error-message {
                font-size: 1.2rem;
            }
            
            .services-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="error-container">
            <div class="error-code">404</div>
            <div class="error-message">
                عذراً، الصفحة التي تبحث عنها غير موجودة
            </div>
            
            <div class="mb-4">
                <a href="/" class="btn-home">
                    <i class="fas fa-home me-2"></i>
                    العودة للرئيسية
                </a>
                <a href="/contact.php" class="btn-home">
                    <i class="fas fa-envelope me-2"></i>
                    اتصل بنا
                </a>
            </div>
            
            <div class="services-grid">
                <div class="service-card">
                    <a href="/service-business.php">
                        <i class="fas fa-building"></i>
                        <h5>خدمات الشركات</h5>
                        <p class="small mb-0">حلول متكاملة للشركات</p>
                    </a>
                </div>
                
                <div class="service-card">
                    <a href="/service-individual.php">
                        <i class="fas fa-user"></i>
                        <h5>خدمات الأفراد</h5>
                        <p class="small mb-0">خدمات شخصية متميزة</p>
                    </a>
                </div>
                
                <div class="service-card">
                    <a href="/training.php">
                        <i class="fas fa-graduation-cap"></i>
                        <h5>التدريب</h5>
                        <p class="small mb-0">برامج تدريبية احترافية</p>
                    </a>
                </div>
                
                <div class="service-card">
                    <a href="/financial.php">
                        <i class="fas fa-chart-line"></i>
                        <h5>الخدمات المالية</h5>
                        <p class="small mb-0">استشارات مالية متخصصة</p>
                    </a>
                </div>
            </div>
            
            <div class="mt-4">
                <small class="opacity-75">
                    © 2024 SAIEB Services - جميع الحقوق محفوظة
                </small>
            </div>
        </div>
    </div>
</body>
</html>
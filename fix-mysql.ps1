# XAMPP MySQL Fix Script
# سكريبت إصلاح مشكلة MySQL في XAMPP

Write-Host "=== XAMPP MySQL Fix Script ===" -ForegroundColor Cyan
Write-Host "سكريبت إصلاح مشكلة MySQL في XAMPP" -ForegroundColor Yellow
Write-Host ""

# التحقق من صلاحيات المدير
if (-NOT ([Security.Principal.WindowsPrincipal] [Security.Principal.WindowsIdentity]::GetCurrent()).IsInRole([Security.Principal.WindowsBuiltInRole] "Administrator")) {
    Write-Host "يجب تشغيل هذا السكريبت كمدير (Administrator)" -ForegroundColor Red
    Write-Host "اضغط أي مفتاح للخروج..."
    $null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
    exit 1
}

# مسارات XAMPP الشائعة
$xamppPaths = @(
    "C:\xampp",
    "C:\Program Files\xampp",
    "C:\Program Files (x86)\xampp",
    "D:\xampp"
)

$xamppPath = $null
foreach ($path in $xamppPaths) {
    if (Test-Path $path) {
        $xamppPath = $path
        break
    }
}

if (-not $xamppPath) {
    Write-Host "لم يتم العثور على XAMPP في المسارات الشائعة" -ForegroundColor Red
    $customPath = Read-Host "يرجى إدخال مسار XAMPP يدوياً"
    if (Test-Path $customPath) {
        $xamppPath = $customPath
    } else {
        Write-Host "المسار غير صحيح" -ForegroundColor Red
        exit 1
    }
}

Write-Host "تم العثور على XAMPP في: $xamppPath" -ForegroundColor Green

# الخطوة 1: إيقاف عمليات MySQL
Write-Host ""
Write-Host "الخطوة 1: إيقاف عمليات MySQL..." -ForegroundColor Yellow

$mysqlProcesses = Get-Process -Name "mysql*" -ErrorAction SilentlyContinue
if ($mysqlProcesses) {
    Write-Host "تم العثور على عمليات MySQL قيد التشغيل. جاري إيقافها..." -ForegroundColor Yellow
    $mysqlProcesses | Stop-Process -Force
    Start-Sleep -Seconds 3
    Write-Host "تم إيقاف عمليات MySQL" -ForegroundColor Green
} else {
    Write-Host "لا توجد عمليات MySQL قيد التشغيل" -ForegroundColor Green
}

# الخطوة 2: حذف ملفات Log المعطوبة
Write-Host ""
Write-Host "الخطوة 2: فحص ملفات Log..." -ForegroundColor Yellow

$dataPath = Join-Path $xamppPath "mysql\data"
if (Test-Path $dataPath) {
    $logFiles = @("ib_logfile0", "ib_logfile1")
    foreach ($logFile in $logFiles) {
        $logFilePath = Join-Path $dataPath $logFile
        if (Test-Path $logFilePath) {
            try {
                Remove-Item $logFilePath -Force
                Write-Host "تم حذف: $logFile" -ForegroundColor Green
            } catch {
                Write-Host "فشل في حذف: $logFile - $($_.Exception.Message)" -ForegroundColor Red
            }
        }
    }
} else {
    Write-Host "لم يتم العثور على مجلد البيانات: $dataPath" -ForegroundColor Red
}

# الخطوة 3: فحص المنفذ 3306
Write-Host ""
Write-Host "الخطوة 3: فحص المنفذ 3306..." -ForegroundColor Yellow

$portCheck = netstat -an | Select-String ":3306"
if ($portCheck) {
    Write-Host "المنفذ 3306 مستخدم من قبل عملية أخرى:" -ForegroundColor Yellow
    Write-Host $portCheck -ForegroundColor White
    
    $choice = Read-Host "هل تريد تغيير منفذ MySQL إلى 3307؟ (y/n)"
    if ($choice -eq "y" -or $choice -eq "Y") {
        $configPath = Join-Path $xamppPath "mysql\bin\my.ini"
        if (Test-Path $configPath) {
            try {
                $config = Get-Content $configPath
                $config = $config -replace "port=3306", "port=3307"
                $config | Set-Content $configPath
                Write-Host "تم تغيير المنفذ إلى 3307" -ForegroundColor Green
            } catch {
                Write-Host "فشل في تعديل ملف الإعدادات" -ForegroundColor Red
            }
        }
    }
} else {
    Write-Host "المنفذ 3306 متاح" -ForegroundColor Green
}

# الخطوة 4: فحص مساحة القرص
Write-Host ""
Write-Host "الخطوة 4: فحص مساحة القرص..." -ForegroundColor Yellow

$drive = (Get-Item $xamppPath).PSDrive
$freeSpace = [math]::Round($drive.Free / 1GB, 2)
Write-Host "المساحة المتاحة: $freeSpace GB" -ForegroundColor White

if ($freeSpace -lt 1) {
    Write-Host "تحذير: مساحة القرص منخفضة!" -ForegroundColor Red
} else {
    Write-Host "مساحة القرص كافية" -ForegroundColor Green
}

# الخطوة 5: محاولة بدء MySQL
Write-Host ""
Write-Host "الخطوة 5: محاولة بدء MySQL..." -ForegroundColor Yellow

$mysqlPath = Join-Path $xamppPath "mysql\bin\mysqld.exe"
if (Test-Path $mysqlPath) {
    try {
        Write-Host "جاري بدء MySQL..." -ForegroundColor Yellow
        $process = Start-Process -FilePath $mysqlPath -ArgumentList "--console" -PassThru -WindowStyle Hidden
        Start-Sleep -Seconds 5
        
        if ($process -and !$process.HasExited) {
            Write-Host "تم بدء MySQL بنجاح!" -ForegroundColor Green
            
            # اختبار الاتصال
            Start-Sleep -Seconds 3
            $testConnection = Test-NetConnection -ComputerName localhost -Port 3306 -WarningAction SilentlyContinue
            if ($testConnection.TcpTestSucceeded) {
                Write-Host "اختبار الاتصال: نجح ✓" -ForegroundColor Green
            } else {
                Write-Host "اختبار الاتصال: فشل ✗" -ForegroundColor Red
            }
        } else {
            Write-Host "فشل في بدء MySQL" -ForegroundColor Red
        }
    } catch {
        Write-Host "خطأ في بدء MySQL: $($_.Exception.Message)" -ForegroundColor Red
    }
} else {
    Write-Host "لم يتم العثور على ملف MySQL: $mysqlPath" -ForegroundColor Red
}

# الخطوة 6: إنشاء ملف batch للتشغيل السريع
Write-Host ""
Write-Host "الخطوة 6: إنشاء ملف تشغيل سريع..." -ForegroundColor Yellow

$batchContent = @"
@echo off
echo Starting XAMPP MySQL...
cd /d "$xamppPath\mysql\bin"
mysqld.exe --console
pause
"@

$batchPath = Join-Path $xamppPath "start-mysql.bat"
try {
    $batchContent | Out-File -FilePath $batchPath -Encoding ASCII
    Write-Host "تم إنشاء ملف التشغيل السريع: $batchPath" -ForegroundColor Green
} catch {
    Write-Host "فشل في إنشاء ملف التشغيل السريع" -ForegroundColor Red
}

# النتائج النهائية
Write-Host ""
Write-Host "=== تقرير الإصلاح ===" -ForegroundColor Cyan
Write-Host "مسار XAMPP: $xamppPath" -ForegroundColor White
Write-Host "حالة العمليات: تم إيقافها" -ForegroundColor Green
Write-Host "ملفات Log: تم فحصها وحذف المعطوب" -ForegroundColor Green
Write-Host "المنفذ: تم فحصه" -ForegroundColor Green
Write-Host "مساحة القرص: $freeSpace GB" -ForegroundColor White

Write-Host ""
Write-Host "الخطوات التالية:" -ForegroundColor Yellow
Write-Host "1. افتح XAMPP Control Panel كمدير" -ForegroundColor White
Write-Host "2. ابدأ Apache ثم MySQL" -ForegroundColor White
Write-Host "3. اختبر الاتصال بقاعدة البيانات" -ForegroundColor White

Write-Host ""
Write-Host "اضغط أي مفتاح للخروج..." -ForegroundColor Gray
$null = $Host.UI.RawUI.ReadKey("NoEcho,IncludeKeyDown")
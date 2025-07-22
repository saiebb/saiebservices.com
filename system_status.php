<?php
/**
 * صفحة فحص حالة نظام إشعارات الإيميل
 */

// التحقق من وجود الملفات المطلوبة
$requiredFiles = [
    'action/send_email_notification.php',
    'action/email_fallback.php',
    'config/email_config.php',
    'js/service-request-enhancement.js'
];

$missingFiles = [];
foreach ($requiredFiles as $file) {
    if (!file_exists($file)) {
        $missingFiles[] = $file;
    }
}

// التحقق من إعدادات PHP
$phpSettings = [
    'mail' => function_exists('mail'),
    'smtp' => ini_get('SMTP'),
    'smtp_port' => ini_get('smtp_port'),
    'sendmail_from' => ini_get('sendmail_from')
];

// التحقق من ملفات السجل
$logFiles = [
    'email_notifications.log',
    'service_requests.log',
    'email_errors.log',
    'pending_notifications.txt'
];

$logStatus = [];
foreach ($logFiles as $logFile) {
    $logStatus[$logFile] = [
        'exists' => file_exists($logFile),
        'writable' => file_exists($logFile) ? is_writable($logFile) : is_writable('.'),
        'size' => file_exists($logFile) ? filesize($logFile) : 0
    ];
}

?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>حالة نظام الإشعارات - صيب للخدمات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .status-good { color: #28a745; }
        .status-warning { color: #ffc107; }
        .status-error { color: #dc3545; }
        .card { margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .status-icon { font-size: 1.2em; margin-left: 10px; }
    </style>
</head>
<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4">
                    <i class="fas fa-cogs"></i>
                    حالة نظام إشعارات الإيميل
                </h1>
            </div>
        </div>

        <!-- حالة الملفات -->
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-file-code"></i> حالة الملفات المطلوبة</h5>
                    </div>
                    <div class="card-body">
                        <?php if (empty($missingFiles)): ?>
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle status-icon status-good"></i>
                                جميع الملفات المطلوبة موجودة
                            </div>
                        <?php else: ?>
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle status-icon status-error"></i>
                                ملفات مفقودة: <?php echo count($missingFiles); ?>
                            </div>
                        <?php endif; ?>

                        <ul class="list-group list-group-flush">
                            <?php foreach ($requiredFiles as $file): ?>
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <?php echo $file; ?>
                                    <?php if (file_exists($file)): ?>
                                        <span class="badge bg-success">
                                            <i class="fas fa-check"></i> موجود
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-danger">
                                            <i class="fas fa-times"></i> مفقود
                                        </span>
                                    <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- إعدادات PHP -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fab fa-php"></i> إعدادات PHP</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                دالة mail()
                                <?php if ($phpSettings['mail']): ?>
                                    <span class="badge bg-success">
                                        <i class="fas fa-check"></i> متاحة
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-times"></i> غير متاحة
                                    </span>
                                <?php endif; ?>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                SMTP Server
                                <span class="badge bg-info">
                                    <?php echo $phpSettings['smtp'] ?: 'غير محدد'; ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                SMTP Port
                                <span class="badge bg-info">
                                    <?php echo $phpSettings['smtp_port'] ?: 'غير محدد'; ?>
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                From Email
                                <span class="badge bg-info">
                                    <?php echo $phpSettings['sendmail_from'] ?: 'غير محدد'; ?>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- حالة ملفات السجل -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-file-alt"></i> حالة ملفات السجل</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>اسم الملف</th>
                                        <th>الحالة</th>
                                        <th>قابل للكتابة</th>
                                        <th>الحجم</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($logStatus as $fileName => $status): ?>
                                        <tr>
                                            <td><?php echo $fileName; ?></td>
                                            <td>
                                                <?php if ($status['exists']): ?>
                                                    <span class="badge bg-success">موجود</span>
                                                <?php else: ?>
                                                    <span class="badge bg-warning">غير موجود</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($status['writable']): ?>
                                                    <span class="badge bg-success">نعم</span>
                                                <?php else: ?>
                                                    <span class="badge bg-danger">لا</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($status['exists']): ?>
                                                    <?php echo number_format($status['size'] / 1024, 2); ?> KB
                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($status['exists']): ?>
                                                    <a href="?view_log=<?php echo $fileName; ?>" class="btn btn-sm btn-outline-primary">
                                                        <i class="fas fa-eye"></i> عرض
                                                    </a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- أزرار الإجراءات -->
        <div class="row">
            <div class="col-12 text-center">
                <div class="card">
                    <div class="card-body">
                        <h5>إجراءات النظام</h5>
                        <div class="btn-group" role="group">
                            <a href="test_email.php" class="btn btn-primary">
                                <i class="fas fa-envelope"></i> اختبار الإيميل
                            </a>
                            <a href="service-detail.php?id=1" class="btn btn-success">
                                <i class="fas fa-cog"></i> اختبار النظام
                            </a>
                            <a href="EMAIL_NOTIFICATION_README.md" class="btn btn-info">
                                <i class="fas fa-book"></i> دليل الاستخدام
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_GET['view_log']) && file_exists($_GET['view_log'])): ?>
            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>محتوى ملف: <?php echo htmlspecialchars($_GET['view_log']); ?></h5>
                        </div>
                        <div class="card-body">
                            <pre class="bg-light p-3" style="max-height: 400px; overflow-y: auto;">
<?php echo htmlspecialchars(file_get_contents($_GET['view_log'])); ?>
                            </pre>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="row mt-4">
            <div class="col-12 text-center">
                <small class="text-muted">
                    آخر فحص: <?php echo date('Y-m-d H:i:s'); ?>
                </small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
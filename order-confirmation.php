<?php
include 'header.php';
include 'action/db.php';

// التحقق من وجود معرف الطلب
if (!isset($_GET['order_id']) || empty($_GET['order_id'])) {
    header('Location: index.php');
    exit();
}

$order_id = strip_tags($_GET['order_id']);

// جلب تفاصيل الطلب من قاعدة البيانات
$tableName = $prefix . "requests";
$sql = "SELECT r.*, 
        CASE 
            WHEN r.req_ser_type = 1 THEN t.ar_title
            WHEN r.req_ser_type = 2 THEN b.ar_title  
            WHEN r.req_ser_type = 3 THEN i.ar_title
            WHEN r.req_ser_type = 6 THEN f.ar_title
        END as service_title
        FROM $tableName r
        LEFT JOIN {$prefix}training t ON r.req_ser_id = t.id AND r.req_ser_type = 1
        LEFT JOIN {$prefix}business_services b ON r.req_ser_id = b.id AND r.req_ser_type = 2  
        LEFT JOIN {$prefix}individual_services i ON r.req_ser_id = i.id AND r.req_ser_type = 3
        LEFT JOIN {$prefix}financial f ON r.req_ser_id = f.id AND r.req_ser_type = 6
        WHERE r.req_order_id = '$order_id'";

$result = $conn->query($sql);

if ($result->num_rows == 0) {
    header('Location: index.php');
    exit();
}

$order = $result->fetch_assoc();

// تحديد نوع الخدمة
$service_type_name = '';
switch($order['req_ser_type']) {
    case 1: $service_type_name = 'التدريب'; break;
    case 2: $service_type_name = 'خدمات الأعمال'; break;
    case 3: $service_type_name = 'الخدمات العامة'; break;
    case 6: $service_type_name = 'الاستشارات المالية'; break;
}

// تقدير تاريخ التسليم (7 أيام من الآن)
$estimated_delivery = date('Y-m-d', strtotime('+7 days'));
?>

<!-- Page Title -->
<section class="page-title bg-transparent border-1">
    <div class="container">
        <div class="page-title-row pt-3 pb-3">
            <div class="page-title-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">الرئيسية</a></li>
                        <li class="breadcrumb-item active" aria-current="page">تأكيد الطلب</li>
                    </ol>
                </nav>
                <h5>
                    <div class="nocolor">تأكيد الطلب</div>
                </h5>
            </div>
        </div>
    </div>
</section>

<section id="content">
    <div class="content-wrap">
        <div class="container">
            
            <!-- رسالة النجاح -->
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8">
                    <div class="card border-0 shadow-lg">
                        <div class="card-body text-center p-5">
                            <div class="mb-4">
                                <i class="bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                            </div>
                            <h2 class="text-success mb-3">تم استلام طلبك بنجاح!</h2>
                            <p class="lead text-muted mb-4">
                                شكراً لك على اختيار خدمات صيب. سيتم التواصل معك قريباً لتأكيد التفاصيل.
                            </p>
                            <div class="alert alert-info">
                                <strong>رقم الطلب:</strong> <?php echo $order_id; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- تفاصيل الطلب -->
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-primary text-white">
                            <h4 class="mb-0">تفاصيل الطلب</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="text-muted">معلومات العميل</h6>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>الاسم:</strong></td>
                                            <td><?php echo htmlspecialchars($order['req_cli_name']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>البريد الإلكتروني:</strong></td>
                                            <td><?php echo htmlspecialchars($order['req_cli_email']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>رقم الهاتف:</strong></td>
                                            <td><?php echo htmlspecialchars($order['req_cli_phone']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>الوقت المناسب للاتصال:</strong></td>
                                            <td><?php echo htmlspecialchars($order['req_cli_time_to_call']); ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="text-muted">معلومات الخدمة</h6>
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>نوع الخدمة:</strong></td>
                                            <td><?php echo $service_type_name; ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>الخدمة:</strong></td>
                                            <td><?php echo htmlspecialchars($order['service_title']); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>تاريخ الطلب:</strong></td>
                                            <td><?php echo date('Y-m-d H:i', strtotime($order['req_time'])); ?></td>
                                        </tr>
                                        <tr>
                                            <td><strong>الحالة:</strong></td>
                                            <td><span class="badge bg-warning">جديد</span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- الخطوات التالية -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0">الخطوات التالية</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-center mb-3">
                                    <div class="mb-3">
                                        <i class="bi-telephone-fill text-primary" style="font-size: 2rem;"></i>
                                    </div>
                                    <h6>التواصل</h6>
                                    <p class="text-muted small">سيتم التواصل معك خلال 24 ساعة</p>
                                </div>
                                <div class="col-md-4 text-center mb-3">
                                    <div class="mb-3">
                                        <i class="bi-clipboard-check text-success" style="font-size: 2rem;"></i>
                                    </div>
                                    <h6>تأكيد التفاصيل</h6>
                                    <p class="text-muted small">مراجعة وتأكيد متطلبات الخدمة</p>
                                </div>
                                <div class="col-md-4 text-center mb-3">
                                    <div class="mb-3">
                                        <i class="bi-rocket-takeoff text-warning" style="font-size: 2rem;"></i>
                                    </div>
                                    <h6>بدء الخدمة</h6>
                                    <p class="text-muted small">البدء في تنفيذ الخدمة المطلوبة</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- أزرار العمل -->
            <div class="row justify-content-center mt-4">
                <div class="col-lg-8 text-center">
                    <a href="index.php" class="btn btn-primary btn-lg me-3">العودة للرئيسية</a>
                    <a href="contact.php" class="btn btn-outline-primary btn-lg">تواصل معنا</a>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Google Customer Reviews Integration -->
<script src="https://apis.google.com/js/platform.js?onload=renderOptIn" async defer></script>

<script>
window.renderOptIn = function() {
    window.gapi.load('surveyoptin', function() {
        window.gapi.surveyoptin.render({
            // REQUIRED FIELDS
            "merchant_id": 5349752399, // معرف التاجر الخاص بك من Google
            "order_id": "<?php echo $order_id; ?>",
            "email": "<?php echo htmlspecialchars($order['req_cli_email']); ?>",
            "delivery_country": "SA", // السعودية
            "estimated_delivery_date": "<?php echo $estimated_delivery; ?>",
            
            // OPTIONAL FIELDS - يمكن إضافة معلومات المنتج/الخدمة هنا
            "products": [
                {
                    "gtin": "SERVICE_<?php echo $order['req_ser_type']; ?>_<?php echo $order['req_ser_id']; ?>"
                }
            ]
        });
    });
}
</script>

<?php include 'footer.php'; ?>
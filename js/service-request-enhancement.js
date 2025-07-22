/**
 * تحسينات JavaScript لنظام طلب الخدمات
 */

jQuery(document).ready(function($) {
    
    // تحسين عرض رسالة النجاح
    function showEnhancedSuccessMessage() {
        const successHtml = `
            <div class="alert alert-success text-center" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <i class="fas fa-check-circle" style="font-size: 2em; color: #28a745; margin-bottom: 10px;"></i>
                <h5 style="color: #155724; margin-bottom: 10px;">تم تسجيل طلبك بنجاح!</h5>
                <p style="margin-bottom: 10px;">سيتم التواصل معك في خلال ساعتين</p>
                <small style="color: #6c757d;">
                    <i class="fas fa-envelope"></i> تم إرسال إشعار بطلبك إلى فريق الخدمة
                </small>
            </div>
        `;
        
        $('#successDiv').html(successHtml).removeClass('hide');
    }
    
    // تحسين رسالة الخطأ
    function showEnhancedErrorMessage() {
        const errorHtml = `
            <div class="alert alert-danger text-center" style="border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                <i class="fas fa-exclamation-triangle" style="font-size: 2em; color: #dc3545; margin-bottom: 10px;"></i>
                <h5 style="color: #721c24; margin-bottom: 10px;">حدث خطأ في إرسال الطلب</h5>
                <p style="margin-bottom: 10px;">يرجى المحاولة مرة أخرى أو التواصل معنا مباشرة</p>
                <small style="color: #6c757d;">
                    <i class="fas fa-phone"></i> يمكنك الاتصال بنا على الرقم المباشر
                </small>
            </div>
        `;
        
        $('#successDiv').html(errorHtml).removeClass('hide');
    }
    
    // إضافة مؤشر تحميل أثناء الإرسال
    function showLoadingIndicator() {
        const loadingHtml = `
            <div class="alert alert-info text-center" style="border-radius: 10px;">
                <div class="spinner-border spinner-border-sm" role="status" style="margin-left: 10px;">
                    <span class="sr-only">Loading...</span>
                </div>
                جاري إرسال طلبك...
            </div>
        `;
        
        $('#successDiv').html(loadingHtml).removeClass('hide');
    }
    
    // تحسين عملية إرسال النموذج
    $("#form").on('submit', function(e) {
        e.preventDefault();
        
        // إخفاء أي رسائل سابقة
        $('#successDiv').addClass('hide');
        
        // التحقق من صحة البيانات
        if (!$(this).valid()) {
            return false;
        }
        
        // عرض مؤشر التحميل
        showLoadingIndicator();
        
        // تعطيل زر الإرسال لمنع الإرسال المتكرر
        $('#register-form-submit').prop('disabled', true).text('جاري الإرسال...');
        
        // AJAX request
        $.ajax({
            url: 'action/savereq.php',
            type: 'POST',
            data: {
                req_cli_phone: $('#req_cli_phone').val(),
                req_cli_time_to_call: $('#req_cli_time_to_call').val(),
                req_ser_id: $('#service-id').val(),
                req_ser_type: $('#service-type').val(),
                req_cli_name: $('#req_cli_name').val(),
                req_cli_email: $('#req_cli_email').val(),
                google_reviews_consent: $('#google_reviews_consent').is(':checked') ? 1 : 0,
            },
            success: function(response) {
                if (response == '1') {
                    // عرض رسالة النجاح المحسنة
                    showEnhancedSuccessMessage();
                    
                    // حفظ بيانات العميل قبل مسح النموذج
                    const customerData = {
                        name: $('#req_cli_name').val(),
                        email: $('#req_cli_email').val(),
                        phone: $('#req_cli_phone').val(),
                        googleConsent: $('#google_reviews_consent').is(':checked')
                    };
                    
                    // إذا وافق العميل على آراء Google، اعرض نموذج Google Customer Reviews
                    if (customerData.googleConsent) {
                        console.log('✅ العميل وافق على Google Customer Reviews');
                        setTimeout(() => {
                            if (typeof showGoogleCustomerReviews === 'function') {
                                showGoogleCustomerReviews(customerData);
                            }
                        }, 1500);
                    }
                    
                    // مسح النموذج
                    $('#form')[0].reset();
                    
                    // إغلاق النموذج بعد 4 ثوان
                    setTimeout(() => {
                        $('#myModal').modal('hide');
                        $('#successDiv').addClass('hide');
                    }, 4000);
                    
                } else {
                    showEnhancedErrorMessage();
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error);
                showEnhancedErrorMessage();
            },
            complete: function() {
                // إعادة تفعيل زر الإرسال
                $('#register-form-submit').prop('disabled', false).text('ســـجل الطلب');
            }
        });
    });
    
    // تحسين عرض معلومات الخدمة في النموذج
    $('.bs-example-modal-lg').on('show.bs.modal', function(e) {
        const button = $(e.relatedTarget);
        const serviceId = button.data('service-id');
        const serviceType = button.data('service-type');
        
        // تحديث الحقول المخفية
        $('#service-id').val(serviceId);
        $('#service-type').val(serviceType);
        
        // إضافة معلومات الخدمة إلى عنوان النموذج (اختياري)
        const serviceTitle = button.closest('.entry').find('h2').text();
        if (serviceTitle) {
            $('#myModalLabel').text('طلب خدمة: ' + serviceTitle);
        }
        
        // إعادة تعيين النموذج
        $('#form')[0].reset();
        $('#successDiv').addClass('hide');
        $('#register-form-submit').prop('disabled', false).text('ســـجل الطلب');
    });
    
    // إضافة تأثيرات بصرية للحقول
    $('#form input, #form textarea').on('focus', function() {
        $(this).parent().addClass('focused');
    }).on('blur', function() {
        if (!$(this).val()) {
            $(this).parent().removeClass('focused');
        }
    });
    
    // تحسين عرض رسائل التحقق
    $('#form').validate({
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback d-block');
            element.addClass('is-invalid');
            error.insertAfter(element);
        },
        success: function(label, element) {
            $(element).removeClass('is-invalid').addClass('is-valid');
            $(label).remove();
        }
    });
});

// إضافة CSS للتحسينات
const enhancementCSS = `
<style>
.form-group.focused label {
    color: #007bff;
    font-weight: bold;
}

.form-control.is-valid {
    border-color: #28a745;
}

.form-control.is-invalid {
    border-color: #dc3545;
}

.spinner-border-sm {
    width: 1rem;
    height: 1rem;
}

#successDiv {
    transition: all 0.3s ease-in-out;
}

.modal-content {
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.btn:disabled {
    opacity: 0.6;
    cursor: not-allowed;
}
</style>
`;

// إضافة CSS إلى الصفحة
$('head').append(enhancementCSS);
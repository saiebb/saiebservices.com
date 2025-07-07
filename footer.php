<!-- Footer
		============================================= -->
<footer id="footer" class="dark">
    <!-- Copyrights
			============================================= -->
    <div id="copyrights">
        <div class="container">
            <!-- شارة آراء العملاء عبر Google - في الوسط -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="text-center">
                        <h5 class="text-light mb-3">
                            <i class="uil uil-star text-warning me-2"></i>
                            تقييمات عملائنا على Google
                            <i class="uil uil-star text-warning ms-2"></i>
                        </h5>
                        <!-- <div id="google-reviews-badge" class="google-badge-center-container">
                            <div class="d-flex justify-content-center align-items-center" style="min-height: 100px;">
                                <div class="text-center">
                                    <div class="spinner-border text-primary mb-2" role="status">
                                        <span class="visually-hidden">جاري التحميل...</span>
                                    </div>
                                    <p class="text-light mb-0">جاري تحميل التقييمات...</p>
                                </div>
                            </div>
                        </div> -->
                        
                        <!-- رابط لترك تقييم -->
                        <div class="text-center mt-3">
                            <a href="https://search.google.com/local/writereview?placeid=ChIJN1t_tDeuEmsRUsoyG83frTQ" 
                               target="_blank" 
                               class="btn btn-outline-light btn-sm rounded-pill px-4">
                                <i class="uil uil-edit me-1"></i>
                                شاركنا تجربتك على Google
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row col-mb-30">
                <div class="col-md-6 text-center text-md-start">
                    حقوق الطبع والنشر&copy; 2024 جميع الحقوق محفوظة
                </div>

                <div class="col-md-6 text-center text-md-end">
                    
                    <div class="d-flex justify-content-center justify-content-md-end mb-2">
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
        </div>
    </div>
    <!-- #copyrights end -->
</footer>
<!-- #footer end -->
</div>
<!-- #wrapper end -->

<!-- Go To Top
	============================================= -->
<div id="gotoTop" class="uil uil-angle-up"></div>

<!-- JavaScripts
	============================================= -->
<!-- تحميل ملفات JavaScript بمسارات مطلقة -->
<script src="<?php echo ASSETS_URL; ?>/js/plugins.min.js"></script>
<script src="<?php echo ASSETS_URL; ?>/js/functions.bundle.js"></script>
<!-- Google APIs Monitor - مراقب خدمات Google -->
<script src="<?php echo ASSETS_URL; ?>/js/google-apis-monitor.js"></script>

<!-- Icons Fallback Script - حل احتياطي للأيقونات -->
<script src="<?php echo ASSETS_URL; ?>/js/icons-fallback.js"></script>

<!-- jQuery Validate - للتحقق من النماذج -->
<script src="<?php echo ASSETS_URL; ?>/js/jquery.validate.js"></script>


<script>
document.addEventListener('DOMContentLoaded', function() {
    var buttons = document.querySelectorAll('a[data-bs-toggle="modal"]');
    buttons.forEach(function(button) {
        button.addEventListener('click', function() {
            var serviceId = this.getAttribute('data-service-id');
            var serviceName = this.getAttribute('data-service-name');
            var serviceType = this.getAttribute('data-service-type');

            var modalInputId = document.getElementById('service-id');
            var modalInputName = document.getElementById('service-name');
            var modalInputType = document.getElementById('service-type');

            if (modalInputId) {
                modalInputId.value = serviceId;
            }
            if (modalInputName) {
                modalInputName.value = serviceName;
            }
            if (modalInputType) {
                modalInputType.value = serviceType;
            }
        });
    });
});
</script>




<div id="myModal" class="modal fade text-start bs-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel"> طلـــب خدمة </h4>
                <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">

                <p class="pb-2">
                    <?php
if($rows['ar_type']== 2) {
    ?>

                <div class="alert text-center alert-warning"> يتم تقديم عرض السعر للخدمة بعد زيارة المنشاة والاطلاع على
                    حجم العمل المطلوب. </div>

                <?php
}

?>


                <div class="alert text-center alert-success hide" id="successDiv"> تم تســـجيل طلبك بنجاح ... سيتم
                    التواصــل معك في خلال 2
                    ســـاعة </div>
                </p>

                <form id="form" name="form" class="row" method="post">

                    <div class="col-6 form-group">
                        <label for="req_cli_name">الاســــم :</label>
                        <input type="text" id="req_cli_name" name="req_cli_name" value="" class="form-control">
                    </div>

                    <div class="col-6 form-group">
                        <label for="req_cli_email"> البريد الالكتروني:</label>
                        <input type="text" id="req_cli_email" name="req_cli_email" value="" class="form-control">
                    </div>

                    <div class="w-100"></div>

                    <div class="col-6 form-group">
                        <label for="req_cli_phone"> رقم الجوال:</label>
                        <input type="text" id="req_cli_phone" name="req_cli_phone" value="" class="form-control">
                    </div>

                    <div class="col-6 form-group">
                        <label for="req_cli_time_to_call">الوقت المفضل للاتصال:</label>
                        <input type="text" id="req_cli_time_to_call" name="req_cli_time_to_call" value=""
                            class="form-control">
                    </div>

                    <div class="w-100"></div>

                    <!-- خيار الموافقة على آراء العملاء مع Google -->
                    <div class="col-12 form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="google_reviews_consent" name="google_reviews_consent" value="1">
                            <label class="form-check-label" for="google_reviews_consent">
                                <small>أوافق على مشاركة تجربتي مع خدمات صيب عبر آراء العملاء في Google لمساعدة العملاء الآخرين</small>
                            </label>
                        </div>
                        <small class="text-muted">
                            <i class="bi-info-circle"></i>
                            هذا الخيار اختياري ويساعدنا في تحسين خدماتنا وبناء الثقة مع العملاء الجدد
                        </small>
                    </div>

                    <div class="w-100"></div>

                    <div class="col-12 form-group text-center ">
                        <button class="btn btn-dark m-0" id="register-form-submit" name="register-form-submit"
                            type="submit"> ســـجل الطلب</button>
                    </div>

                    <input type="hidden" id="service-id" name="req_ser_id" value="">
                    <input type="hidden" id="service-type" name="req_ser_type" value="">
                </form>

            </div>
        </div>
    </div>
</div>



<script src="js/jquery.validate.js"></script>





<script>
jQuery.noConflict();
jQuery(document).ready(function($) {
    // validate signup form on keyup and submit
    $("#form").validate({
        rules: {
            req_cli_name: {
                required: true
            },
            req_cli_email: {
                required: true,
                email: true
            },
            req_cli_phone: {
                required: true
            },
        },
        messages: {
            req_cli_name: {
                required: "هذا الحقل اجباري"
            },
            req_cli_email: {
                required: "هذا الحقل اجباري",
                email: "الرجاء ادخال بريد الكتروني صحيح"
            },
            req_cli_phone: {
                required: "هذا الحقل اجباري"
            },
        },
        submitHandler: function(form) {
            // AJAX request after form validation
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
                        $('#successDiv').removeClass('hide');
                        
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
                            // تأخير قصير لإظهار رسالة النجاح أولاً
                            setTimeout(() => {
                                showGoogleCustomerReviews(customerData);
                            }, 1500);
                        } else {
                            console.log('❌ العميل لم يوافق على Google Customer Reviews');
                        }
                        
                        $('#req_cli_phone').val('');
                        $('#req_cli_time_to_call').val('');
                        $('#req_cli_name').val('');
                        $('#req_cli_email').val('');
                        $('#google_reviews_consent').prop('checked', false);
                        
                        setTimeout(() => {
                            $('#myModal').modal('hide');
                            $('#successDiv').addClass('hide');
                        }, 3000);
                    } else {
                        alert('حدث خطأ ما');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle error
                }
            });
        }
    });

    $('#register-form-submit').click(function(event) {
        event.preventDefault(); // Prevent the default form submission
        $("#form").submit(); // Trigger form validation and submission
    });

});

// وظيفة عرض Google Customer Reviews
function showGoogleCustomerReviews(customerData) {
    // التحقق من تحميل Google API
    if (typeof gapi !== 'undefined' && gapi.surveyoptin) {
        try {
            // إنشاء معرف طلب فريد
            const orderId = 'SAIEB-' + Date.now() + '-' + Math.random().toString(36).substr(2, 6).toUpperCase();
            
            // التحقق من وجود البيانات
            if (!customerData || !customerData.email || customerData.email.trim() === '') {
                console.error('❌ البريد الإلكتروني مطلوب لنظام Google Customer Reviews');
                return;
            }
            
            console.log('📧 بيانات العميل:', {
                name: customerData.name,
                email: customerData.email
            });
            
            // تقدير تاريخ التسليم (7 أيام من الآن)
            const estimatedDelivery = new Date();
            estimatedDelivery.setDate(estimatedDelivery.getDate() + 7);
            const deliveryDate = estimatedDelivery.toISOString().split('T')[0];
            
            // عرض نموذج Google Customer Reviews
            gapi.surveyoptin.render({
                // REQUIRED FIELDS
                "merchant_id": 5349752399, // معرف التاجر من Google Merchant Center
                "order_id": orderId,
                "email": customerData.email,
                "delivery_country": "SA", // السعودية
                "estimated_delivery_date": deliveryDate,
                
                // OPTIONAL FIELDS - إزالة GTIN لأنه يسبب مشاكل
                // "products": [{
                //     "gtin": "SAIEB_SERVICE_" + $('#service-type').val() + "_" + $('#service-id').val()
                // }],
                
                // إعدادات إضافية
                "opt_in_style": "OPT_IN_STYLE_CENTER_DIALOG"
            });
            
            console.log('تم عرض نموذج Google Customer Reviews للعميل: ' + customerData.name);
            
        } catch (error) {
            console.error('خطأ في عرض Google Customer Reviews:', error);
        }
    } else {
        console.warn('Google API غير محمل - سيتم المحاولة مرة أخرى');
        // محاولة أخرى بعد ثانية واحدة
        setTimeout(() => showGoogleCustomerReviews(customerData), 1000);
    }
}

// تحميل Google API عند تحميل الصفحة
function loadGoogleAPI() {
    if (typeof gapi === 'undefined') {
        const script = document.createElement('script');
        script.src = 'https://apis.google.com/js/platform.js';
        script.async = true;
        script.defer = true;
        script.onload = function() {
            console.log('✅ تم تحميل Google Platform API بنجاح');
            initGoogleAPI();
        };
        script.onerror = function() {
            console.error('❌ فشل في تحميل Google Platform API');
        };
        document.head.appendChild(script);
    }
}

// تهيئة Google API
function initGoogleAPI() {
    if (typeof gapi !== 'undefined') {
        gapi.load('surveyoptin', function() {
            console.log('تم تحميل Google Customer Reviews API بنجاح');
        });
    }
}

// تحميل API عند تحميل الصفحة
document.addEventListener('DOMContentLoaded', function() {
    if (typeof $ !== 'undefined') {
        loadGoogleAPI();
    }
    loadGoogleRatingBadge();
    
    // إضافة timeout للتأكد من عرض شيء ما حتى لو فشل Google API
    setTimeout(function() {
        const badgeContainer = document.getElementById('google-reviews-badge');
        if (badgeContainer && badgeContainer.innerHTML.includes('spinner-border')) {
            console.warn('⏰ انتهت مهلة انتظار Google API - عرض المحتوى البديل');
            showFallbackBadge();
        }
    }, 10000); // 10 ثوان
});

// تحميل وعرض شارة آراء العملاء عبر Google
function loadGoogleRatingBadge() {
    // التحقق من وجود العنصر المخصص للشارة
    const badgeContainer = document.getElementById('google-reviews-badge');
    if (!badgeContainer) {
        console.warn('⚠️ لم يتم العثور على حاوي شارة Google Reviews');
        return;
    }
    
    // تحميل Google API للشارة مع timeout
    if (typeof gapi === 'undefined') {
        const script = document.createElement('script');
        script.src = 'https://apis.google.com/js/platform.js';
        script.async = true;
        script.defer = true;
        
        // إضافة timeout للتحميل
        let scriptLoaded = false;
        const loadTimeout = setTimeout(() => {
            if (!scriptLoaded) {
                console.error('❌ انتهت مهلة تحميل Google Platform API');
                showFallbackBadge();
            }
        }, 10000); // 10 ثوان
        
        script.onload = function() {
            scriptLoaded = true;
            clearTimeout(loadTimeout);
            console.log('✅ تم تحميل Google Platform API للشارة بنجاح');
            setTimeout(renderGoogleBadge, 1000);
        };
        
        script.onerror = function() {
            scriptLoaded = true;
            clearTimeout(loadTimeout);
            console.error('❌ فشل في تحميل Google Platform API للشارة');
            showFallbackBadge();
        };
        
        document.head.appendChild(script);
    } else {
        renderGoogleBadge();
    }
}

// عرض شارة Google Customer Reviews
function renderGoogleBadge() {
    console.log('🏆 بدء عرض شارة آراء العملاء عبر Google...');
    
    const badgeContainer = document.getElementById('google-reviews-badge');
    if (!badgeContainer) {
        console.error('❌ لم يتم العثور على حاوي الشارة');
        return;
    }
    
    // التحقق من صحة معرف التاجر أولاً
    const merchantId = 5349752399;
    
    // محاولة تحميل الشارة مع معالجة أفضل للأخطاء
    if (typeof gapi !== 'undefined') {
        gapi.load('ratingbadge', {
            callback: function() {
                try {
                    // التحقق من وجود التقييمات قبل العرض
                    gapi.ratingbadge.render(badgeContainer, {
                        "merchant_id": merchantId,
                        "position": "BOTTOM_CENTER"
                    });
                    
                    console.log('✅ تم عرض شارة آراء العملاء عبر Google بنجاح');
                    
                    // التحقق من نجاح العرض بعد فترة قصيرة
                    setTimeout(() => {
                        const badgeIframe = badgeContainer.querySelector('iframe');
                        if (badgeIframe && badgeIframe.src && !badgeIframe.src.includes('404')) {
                            // تطبيق التنسيق المحسن للشارة المركزية
                            badgeIframe.style.width = '100%';
                            badgeIframe.style.minWidth = '300px';
                            badgeIframe.style.maxWidth = '450px';
                            badgeIframe.style.height = 'auto';
                            badgeIframe.style.minHeight = '80px';
                            badgeIframe.style.borderRadius = '12px';
                            badgeIframe.style.background = 'white';
                            badgeIframe.style.boxShadow = '0 4px 15px rgba(0,0,0,0.2)';
                            
                            console.log('🎨 تم تطبيق التنسيق المحسن للشارة المركزية');
                            
                            // إضافة تأثير بصري للحاوي
                            const container = badgeContainer.closest('.google-badge-center-container');
                            if (container) {
                                container.style.background = 'rgba(255, 255, 255, 0.15)';
                                container.style.borderColor = 'rgba(255, 255, 255, 0.3)';
                            }
                        } else {
                            console.warn('⚠️ لم يتم عرض الشارة بشكل صحيح - عرض المحتوى البديل');
                            showFallbackBadge();
                        }
                    }, 3000);
                    
                } catch (error) {
                    console.error('❌ خطأ في عرض شارة Google:', error);
                    showFallbackBadge();
                }
            },
            onerror: function() {
                console.error('❌ فشل في تحميل Google Rating Badge API');
                showFallbackBadge();
            }
        });
    } else {
        console.error('❌ Google API غير متوفر');
        showFallbackBadge();
    }
}

// عرض شارة بديلة في حالة فشل تحميل Google API
function showFallbackBadge() {
    const badgeContainer = document.getElementById('google-reviews-badge');
    if (badgeContainer) {
        console.log('🔄 عرض الشارة البديلة...');
        
        // عرض محتوى بديل جميل
        badgeContainer.innerHTML = `
            <div class="text-center py-4">
                <div class="mb-3">
                    <i class="uil uil-star text-warning" style="font-size: 2.5rem; margin: 0 5px;"></i>
                    <i class="uil uil-star text-warning" style="font-size: 2.5rem; margin: 0 5px;"></i>
                    <i class="uil uil-star text-warning" style="font-size: 2.5rem; margin: 0 5px;"></i>
                    <i class="uil uil-star text-warning" style="font-size: 2.5rem; margin: 0 5px;"></i>
                    <i class="uil uil-star text-warning" style="font-size: 2.5rem; margin: 0 5px;"></i>
             </div>
                   <h5 class="text-light mb-2">نحن في انتظار تقييمكم الكريم</h5>
                <p class="text-light opacity-75 mb-3">كونوا أول من يقيم خدماتنا المتميزة على Google</p>
                <a href="https://search.google.com/local/writereview?placeid=ChIJN1t_tDeuEmsRUsoyG83frTQ" 
                   target="_blank" 
                   class="btn btn-warning btn-sm rounded-pill px-4">
                    <i class="uil uil-star me-1"></i>
                    اترك تقييمك الآن
                </a>
            </div>
        `;
        
        // إضافة تأثير بصري للحاوي
        const container = badgeContainer.closest('.google-badge-center-container');
        if (container) {
            container.style.background = 'rgba(255, 255, 255, 0.15)';
            container.style.borderColor = 'rgba(255, 255, 255, 0.3)';
        }
        
        console.log('✅ تم عرض الشارة البديلة بنجاح');
    }
}

// جعل الدالة متاحة عالمياً
window.renderGoogleBadge = renderGoogleBadge;

</script>

<!-- Google Customer Reviews Badge (اختياري) -->
<script>
window.renderOptIn = function() {
    // يمكن إضافة شارة آراء العملاء هنا إذا رغبت
}
</script>






</body>

</html>


<!-- whatsapp -->
<div class="whatsapp">
    <a href="https://wa.me/+966502418121" target="_blank"><img src="<?php echo ASSETS_URL; ?>/images/whatsapp.png" alt="" class="whatsapp-img"></a>
</div>
<!-- EOF whatsapp -->
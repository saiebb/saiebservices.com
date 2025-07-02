<!-- Footer
		============================================= -->
<footer id="footer" class="dark">
    <!-- Copyrights
			============================================= -->
    <div id="copyrights">
        <div class="container">
            <div class="row col-mb-30">
                <div class="col-md-6 text-center text-md-start">
                    حقوق الطبع والنشر&copy; 2024 جميع الحقوق محفوظة
                </div>

                <div class="col-md-6 text-center text-md-end">
                    <div class="d-flex justify-content-center justify-content-md-end mb-2">
                        <a href="https://www.instagram.com/saiebcompany/" target="_blank"
                            class="social-icon border-transparent si-small h-bg-facebook">
                            <i class="fa-brands fa-instagram"></i>
                            <i class="fa-brands fa-instagram"></i>
                        </a>

                        <a href="https://x.com/saiebcompany" target="_blank"
                            class="social-icon border-transparent si-small h-bg-x-twitter">
                            <i class="fa-brands fa-x-twitter"></i>
                            <i class="fa-brands fa-x-twitter"></i>
                        </a>

                        <a href="https://www.linkedin.com/in/saiebcompany/" target="_blank"
                            class="social-icon border-transparent si-small me-0 h-bg-linkedin">
                            <i class="fa-brands fa-linkedin"></i>
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
<script src="js/plugins.min.js"></script>
<script src="js/functions.bundle.js"></script>


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
                },
                success: function(response) {
                    if (response == '1') {
                        $('#successDiv').removeClass('hide');
                        $('#req_cli_phone').val('');
                        $('#req_cli_time_to_call').val('');
                        $('#req_cli_name').val('');
                        $('#req_cli_email').val('');
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
</script>






</body>

</html>


<!-- whatsapp -->
<div class="whatsapp">
    <a href="https://wa.me/+966502418121" target="_blank"><img src="images/whatsapp.png" alt="" class="whatsapp-img"></a>
</div>
<!-- EOF whatsapp -->
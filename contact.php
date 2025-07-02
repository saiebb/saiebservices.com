<?php
include 'header.php';
include "action/contact_by_id.php";
?>

<!-- Page Title
		============================================= -->
<section class="page-title bg-transparent border-1">
    <div class="container">
        <div class="page-title-row pt-3 pb-3">

            <div class="page-title-content">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">الرئيســـية</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> اتصل بنا </li>
                    </ol>
                </nav>

                <h5>
                    <div class=" nocolor"> اتصل بنا </div>
                </h5>
            </div>




        </div>
    </div>
</section><!-- .page-title end -->

<section id="content">
    <div class="content-wrap">

        <div class="container mw-lg">

            <div class="row align-items-stretch g-3 gx-lg-6">
                <div class="col-lg-6 d-flex align-items-center bg-primary bg-opacity-20 rounded-6">
                    <div class="card bg-transparent border-0">
                        <div class="card-body  p-lg-1">

                            <div class="col-auto">
                                <h4 class="fw-semibold text-opacity-50 mb-1">العنوان :</h4>
                                <div class=" fw-semibold link-dark">

                                    <?php echo $rows['con_address'] ?>
                                </div>
                            </div>
                            <div class="row justify-content-space-evenly mt-3">
                                <div class="col-auto">
                                    <h4 class="fw-semibold text-opacity-50 mb-1">البريد الالكتروني:</h4>
                                    <a href="#" class=" fw-semibold link-dark"> <?php echo $rows['con_email'] ?> </a>
                                </div>
                                <div class="col-auto">
                                    <h4 class="fw-semibold text-opacity-50 mb-1">هاتف:</h4>
                                    <a href="tel:<?php echo $rows['con_tel'] ?>" class="fw-semibold link-dark">
                                        <?php echo $rows['con_tel'] ?> </a>
                                </div>
                            </div>

                            <div class="line border-dark"></div>

                            <h3 class="fw-semibold fs-5 mb-5">روابط وسائل التواصل الاجتماعي <span
                                    class="text-secondary text-opacity-50">
                                </span></h3>


                            <a href="<?php echo $rows['con_instagram'] ?>" target="_blank"
                                class="social-icon border-transparent bg-white h-bg-facebook">

                                <i class="fa-brands fa-instagram"></i>
                                <i class="fa-brands fa-instagram"></i>
                            </a>

                            <a href="<?php echo $rows['con_x'] ?>" target="_blank"
                                class="social-icon border-transparent bg-white h-bg-x-twitter">
                                <i class="fa-brands fa-x-twitter"></i>
                                <i class="fa-brands fa-x-twitter"></i>
                            </a>


                            <a href="<?php echo $rows['con_linkedin'] ?>" target="_blank"
                                class="social-icon border-transparent bg-white h-bg-linkedin">
                                <i class="fa-brands fa-linkedin"></i>
                                <i class="fa-brands fa-linkedin"></i>
                            </a>


                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-contrast-0 border-0" style="border-radius: 20px;">
                        <div class="card-body p-5">

                            <div class="form-widget">

                                <div class="form-result"></div>

                                <div class="alert text-center alert-success hide" id="successDiv"> تم الارســـال بنجاح
                                    ... سيتم
                                    التواصــل معك في خلال 2
                                    ســـاعة </div>
                                </p>
                                <form id="contactformsaib" name="contactformsaib" class="row" method="post" action="#">

                                    <div class="col-12 form-group">
                                        <label for="user_email"> البريد الالكتروني:</label>
                                        <input type="text" id="user_email" name="user_email" class="form-control">
                                    </div>


                                    <div class="col-6 form-group">
                                        <label>الاســــم :</label>
                                        <input type="text" id="user_name" name="user_name" class="form-control">
                                    </div>




                                    <div class="col-6 form-group">
                                        <label for="user_tel"> رقم الجوال:</label>
                                        <input type="text" id="user_tel" name="user_tel" class="form-control">
                                    </div>



                                    <div class="w-100"></div>

                                    <div class="col-12 form-group">
                                        <label for="user_message"> الرســالة :</label>
                                        <textarea name="user_message" id="user_message" rows="8"
                                            class="form-control"></textarea>
                                    </div>


                                    <div class="w-100"></div>

                                    <div class="col-12 form-group text-center ">
                                        <button class="btn btn-dark m-0" type="submit" id="send" name="send"> ارســل
                                        </button>
                                    </div>

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</section><!-- #content end -->

<?php
include 'footer.php';
?>


<script src="admin/plugins/jquery/jquery.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script>
jQuery.noConflict();
jQuery(document).ready(function($) {
    // validate signup form on keyup and submit
    $("#contactformsaib").validate({
        rules: {
            user_email: {
                required: true,
                email: true
            },
            user_name: {
                required: true
            },
            user_tel: {
                required: true
            },
            user_message: {
                required: true
            }
        },
        messages: {
            user_email: {
                required: "هذا الحقل اجباري",
                email: "الرجاء ادخال بريد الكتروني صحيح"
            },
            user_name: {
                required: "هذا الحقل اجباري"
            },
            user_tel: {
                required: "هذا الحقل اجباري"
            },
            user_message: {
                required: "هذا الحقل اجباري"
            }
        },
        submitHandler: function(form) {
            // AJAX request after form validation
            $.ajax({
                url: 'action/contact.php',
                type: 'POST',
                data: {
                    user_email: $('#user_email').val(),
                    user_name: $('#user_name').val(),
                    user_tel: $('#user_tel').val(),
                    user_message: $('#user_message').val()

                },
                success: function(response) {
                    if (response == '1') {

                        $('#user_email').val('');
                        $('#user_name').val('');
                        $('#user_tel').val('');
                        $('#user_message').val('');

                        setTimeout(() => {
                            if (response == '1') {
                                $('#successDiv').removeClass('hide');
                                $('#user_email').val('');
                                $('#user_name').val('');
                                $('#user_tel').val('');
                                $('#user_message').val('');
                                setTimeout(() => {

                                    $('#successDiv').addClass('hide');
                                }, 3000);
                            } else {
                                alert('حدث خطأ ما');
                            }
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

    $('#send').click(function(event) {
        event.preventDefault(); // Prevent the default form submission
        $("#contactformsaib").submit(); // Trigger form validation and submission
    });




});
</script>
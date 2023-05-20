$(document).ready(function() {

    var signup_slide = $('.signup-slide');
    var login_slide = $('.login-slide');
    var forgot_password_slide = $('.forgot-password-slide');

    $(document).on('click', '.sign-up-click', function() {
        $('.style2 .login-box').velocity({ maxWidth: '1000px' })
        signup_slide.velocity({ translateX: ['0%', '-100%'] }, { display: "block" });
        login_slide.velocity({ translateX: '100%' }, { display: "none" });
        forgot_password_slide.velocity({ translateX: '100%' }, { display: "none" });
    });

    $(document).on('click', '.login-click', function() {
        $('.style2 .login-box').velocity({ maxWidth: '400px' })
        login_slide.velocity({ translateX: ['0%', '-100%'] }, { display: "block" });
        forgot_password_slide.velocity({ translateX: '100%' }, { display: "none" });
        signup_slide.velocity({ translateX: '100%' }, { display: "none" });
    });

    $(document).on('click', '.forgot-password-click', function() {
        forgot_password_slide.velocity({ translateX: ['0%', '-100%'] }, { display: "block" });
        login_slide.velocity({ translateX: '100%' }, { display: "none" });
    });


    toastr.options = {
        'positionClass': 'toast-top-center',
        'progressBar': true
    }

    $("#login-formm").validate({
        errorElement: "span",
        rules: {
            username: "required",
            password: "required"
        },
        messages: {
            username: "Please enter your username",
            password: "Please enter your password"

        },
        submitHandler: function(form) {
            $.ajax({
                type: 'POST',
                url: "ajax_api/login.php",
                data: $("#login-form").serialize(),
                success: function(e) {
                    if (e.charAt(0) == '-') toastr.error(e.substr(1));
                    else window.location.href = e;
                }
            });
        }
    });

    $.validator.addMethod("my_equal_to", function(val, elem) {
        return $("#form_cpass").val() == $("#form_pass").val();
    });

    $("#sign-up-formm").validate({
        errorElement: "span",
        rules: {
            f_name: "required",
            f_lname: "required",
            f_username: "required",
            f_company: "required",
            f_file: "required",
            f_email: { required: true, email: true },
            f_pass: { required: true, minlength: 8 },
            f_cpass: { required: true, my_equal_to: true }
        },
        messages: {
            f_name: "Please enter your First-Name",
            f_lname: "Please enter your Last-Name",
            f_username: "Please enter your username",
            f_company: "Please enter company ",
            f_file: "Please attach the proper Document required",
            f_email: "Please enter valid email",
            f_pass: {
                required: "Please enter password",
                minlength: "Your password must be at least 8 characters long"
            },
            f_cpass: {
                required: "Please Re-enter password",
                my_equal_to: "Password doesn't match"
            }
        },
        submitHandler: function(form) {
            $.ajax({
                type: 'POST',

            });
        }
    });

    $("#forget-pass-btn").click(function(e) {
        if ($("#forget-pass-input").val() == '') return true;
        $.ajax({
            type: 'POST',

        });
        e.preventDefault();
    });

});
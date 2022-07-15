
$(document).ready(function () {


    $("#name_error_message").hide();
    $("#rollno_error_message").hide();
    $("#regno_error_message").hide();

    $("#phone_error_message").hide();
    $("#email_error_message").hide();
    $("#password_error_message").hide();
    // $("#retype_password_error_message").hide();

    var error_name = false;
    var error_rollno = false;
    var error_regno = false;

    var error_phone = false;
    var error_email = false;
    var error_password = false;
    // var error_retype_password = false;

    // onchange was onfocusout
    $("#name").focusout(function () {
        check_name();
    });
    $("#rollno").focusout(function () {
        check_rollno();
    });
    $("#regno").focusout(function () {
        check_regno();
    });

    $("#phone").focusout(function () {
        check_phone();
    });
    $("#email").focusout(function () {
        check_email();
    });
    $("#password").focusout(function () {
        check_password();
    });
    // $("#form_retype_password").focusout(function () {
    //     check_retype_password();
    // });

    function check_name() {
        var pattern = /^[a-zA-Z ]*$/;
        var name = $("#name").val();
        if (pattern.test(name) && name !== '') {
            $("#name_error_message").hide();
            $("#name").css("border-bottom", "3px solid green");
        } else {
            $("#name_error_message").html("Should contain only Characters");
            $("#name_error_message").show();
            $("#name").css("border-bottom", "2px solid #c00909");
            error_name = true;
        }
    }

    function check_rollno() {
        var rollno_length = $("#rollno").val().length;
        if (rollno_length < 6) {
            $("#rollno_error_message").html("rollno should be atleast 6 Characters");
            $("#rollno_error_message").show();
            $("#rollno").css("border-bottom", "2px solid #F90A0A");
            error_rollno = true;
        } else {
            $("#rollno_error_message").hide();
            $("#rollno").css("border-bottom", "2px solid #34F458");
        }
    }

    function check_regno() {
        var regno_length = $("#regno").val().length;
        if (regno_length < 6) {
            $("#regno_error_message").html("regno should be atleast 6 Characters");
            $("#regno_error_message").show();
            $("#regno").css("border-bottom", "2px solid #F90A0A");
            error_regno = true;
        } else {
            $("#regno_error_message").hide();
            $("#regno").css("border-bottom", "2px solid #34F458");
        }
    }

    function check_phone() {
        var pattern = /^[0-9]*$/;
        var phone = $("#phone").val();
        var phone_lenth = phone.length;
        if (pattern.test(phone) && phone !== '' && phone_lenth == 10) {
            $("#phone_error_message").hide();
            $("#phone").css("border-bottom", "3px solid green");
        } else {
            $("#phone_error_message").html("Should contain only Characters and 10 digits");
            $("#phone_error_message").show();
            $("#phone").css("border-bottom", "2px solid red");
            error_phone = true;
        }
    }

    function check_password() {
        var password_length = $("#password").val().length;
        if (password_length < 5) {
            $("#password_error_message").html("Password should be atleast 5 Characters");
            $("#password_error_message").show();
            $("#password").css("border-bottom", "2px solid #F90A0A");
            error_password = true;
        } else {
            $("#password_error_message").hide();
            $("#password").css("border-bottom", "2px solid #34F458");
        }
    }

    // function check_retype_password() {
    //     var password = $("#password").val();
    //     var retype_password = $("#form_retype_password").val();
    //     if (password !== retype_password) {
    //         $("#retype_password_error_message").html("Passwords Did not Matched");
    //         $("#retype_password_error_message").show();
    //         $("#form_retype_password").css("border-bottom", "2px solid #F90A0A");
    //         error_retype_password = true;
    //     } else {
    //         $("#retype_password_error_message").hide();
    //         $("#form_retype_password").css("border-bottom", "2px solid #34F458");
    //     }
    // }

    function check_email() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#email").val();
        if (pattern.test(email) && email !== '') {
            $("#email_error_message").hide();
            $("#email").css("border-bottom", "2px solid #34F458");
        } else {
            $("#email_error_message").html("Invalid Email Pattern");
            $("#email_error_message").show();
            $("#email").css("border-bottom", "2px solid #F90A0A");
            error_email = true;
        }
    }

    $("#registerForm").submit(function () {

        error_name = false;
        error_rollno = false;
        error_regno = false;
        error_phone = false;
        error_email = false;
        error_password = false;


        check_name();
        check_rollno();
        check_regno();
        check_phone();
        check_email();
        check_password();


        //     error_fname = false;
        //     error_sname = false;
        //     error_email = false;
        //     error_password = false;
        //     error_retype_password = false;

        //     check_fname();
        //     check_sname();
        //     check_email();
        //     check_password();
        //     check_retype_password();


        if (error_name === false && error_rollno === false && error_regno === false && error_phone === false && error_email === false && error_password === false) {
            // alert("Registration Successfull. You will be redirected to otp verify page");
            return true;
        } else {

            function alertFunc() {
                swal({
                    icon: "warning",
                    text: "Please Fill the form Correctly"
                });
            }
            // alert("Please Fill the form Correctly");
            alertFunc();
            return false;
        }
    });


});
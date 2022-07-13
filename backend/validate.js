
$(document).ready(function () {
    // $.validator.addMethod("email", function(value, element) {
    //     return this.optional(element) || /^[a-zA-Z0-9._-]+@[a-zA-Z0-9-]+\.[a-zA-Z.]{2,5}$/i.test(value);
    // }, "Email Address is invalid: Please enter a valid email address.");

    $.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            return this.optional(element) || regexp.test(value);
        }
    );

    jQuery('#registerForm').validate({
        rules: {
            name: {
                required: true,
                minlenth: 6,
                maxlenth: 20,
                regex: /^[a-zA-Z ]+$/
            },
            rollno: {
                required: true,
                minlenth: 12,
                maxlenth: 12
            },
            regno: {
                required: true,
                minlenth: 9,
                maxlenth: 9
            },
            dob: {
                required: true,
                minlenth: 12,
                maxlenth: 12
            },
            phone: {
                required: true,
                regex: /^[0-9]{10}$/
            },
            addr: {
                required: true,
                regex: /^[a-zA-Z ]+$/
            },
            gender: {
                required: true
            },
            branch: {
                required: true
            },
            semester: {
                required: true
            },
            photo: {
                required: true
            },
            idproof: {
                required: true
            },
            email: {
                required: true,
                email: true,
                regex: /^[a-zA-Z.%_-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}$/
            },
            password: {
                required: true,
                minlenth: 6,
                maxlenth: 20,
                regex: /^[a-zA-Z._-%]{6}$/
            }
        },
        messages: {
            name: "required",
            rollno: "",
            regno: "",
            dob: "",
            phone: "",
            addr: "",
            gender: "",
            branch: "",
            semester: "",
            photo: "",
            idproof: "",
            email: "",
            password: ""
        },
        submitHandler: function(regSubmit){
            regSubmit.submit();
        }
    })
});
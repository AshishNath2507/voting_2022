<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validate</title>
    <script src="./library/jquery.min.js"></script>
    <script src="./library/jquery.validate.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->
    <!-- <script src="./backend/validate.js"></script> -->
    <link rel="stylesheet" href="./library/css/bootstrap.min.css">
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <form class="row g-3 w-75 mt-4 mx-auto form" id="registerForm" action="?form=submit" method="POST" enctype="multipart/form-data" validate>
        <div class="col-md-12 mb-1 ">
            <label for="name" class="form-label w-25">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" autofocus>
        </div>

        <div class="col-md-4 mb-1">
            <label for="rollno" class="form-label">Roll No.</label>
            <input type="text" class="form-control" id="rollno" name="rollno"  aria-describedby="rollHelp">
        </div>

        <div class="col-md-4 mb-1">
            <label for="regno" class="form-label">Registration No.</label>
            <input type="text" class="form-control" id="regno" name="regno" aria-describedby="regHelp">
        </div>

        <div class="col-md-4 mb-1">
            <label for="sob" class="form-label w-25">DoB</label>
            <input type="date" class="form-control w-50" id="dob" name="dob" aria-describedby="dobHelp">
        </div>
        <div class="text-center">
            <button type="submit" name="regSubmit" id="regSubmit" class="btn w-50 fs-3" style="background-color: #337171; color: white">Submit</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            $.validator.addMethod(
                "regex",
                function(value, element, regexp) {
                    return regexp.test(value);
                }
            );
            jQuery.validator.setDefaults({
                debug: true,
                success: "valid"
            });

            $('#registerForm').validate({
                rules: {
                    name: {
                        required: true,
                        regex: /^[a-zA-Z ]$/
                    },
                    rollno: {
                        required: true,
                        regex: /^[0-9]+$/
                    },
                    regno: {
                        required: true,
                        regex: /^[0-9]+$/
                    },
                    dob: {
                        required: true
                    },
                },
                messages: {
                    name: {
                        required: 'This field is needed',
                        
                        regex: 'Cannot add numbers'
                    },
                    rollno: {
                        required: 'This field is needed',
                        minlength: 'atleast 12 numbers, cannot add characters'
                    },
                    regno: {
                        required: 'This field is needed',
                        minlength: 'atleast 9 numbers'
                    },
                    dob: {
                        required: 'This field is needed'
                    }
                }
                // submitHandler: function(regSubmit) {
                //     regSubmit.submit();
                // }
            })
        });
    </script>
    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>
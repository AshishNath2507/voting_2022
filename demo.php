<?php
require "connect.php";
$result = mysqli_query($con, "SELECT * FROM users AS u INNER JOIN roles AS r ON (u.id = r.user_id) WHERE r.role = 'student' AND u.isdel = '0'");
$row = mysqli_fetch_array($result)
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- // Links -->
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="./library/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="./library/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#btn").click(function() {
                // alert("ok");
                if ($("#sa").val() === $("#xy").val()) {
                    alert("matched");
                } else {
                    alert("Not matched");
                }
            });
            // $.ajax({
            //     type: "POST",
            //     url: "./backend/register1.php",
            //     data: ;
            //     success: function(response) {
            //         console.log(response);
            //     },
            //     error:  function(response) {
            //         console.log(response);
            //     }
            // });
            $(".btn").click(function() {
                
                alert($(".btn").val())
            })
        });
    </script>
    <title>Document</title>
</head>

<body>
    <input type="text" name="sa" id="sa">
    <input type="text" name="xy" id="xy">
    <input type="button" value="Show" id="btn">
    <button class="btn btn-info" name="submit" value="<?php echo $row["id"]; ?>">
        <span class=""><?php echo $row["status"] ?></span>
    </button>
    <p></p>
    <button type="button" class="btn btn-success rounded-circle appr apprbtn m-1" data-toggle="modal" value="<?php echo $row["id"]; ?>"></button>


    <button type="button" class="btn btn-danger rounded-circle delete deletebtn m-1" value="<?php echo $row["id"]; ?>"></button>

</body>

</html>
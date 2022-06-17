<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Candidate Homepage</title>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../library/css/bootstrap.min.css">
    <style>
    @font-face { font-family: anurati; src: url('./library/fonts/anurati/ANURATI/Anurati-Regular.otf'); } 
    .anurati {
        font-family: anurati;
    }
</style>
</head>
<body>
    <p class="fs-1">Candidate Homepage</p>
    <?php
        echo $_SESSION['candidate'];
    ?>
    <!-- Bootstrap script -->
    <script src="../library/js/bootstrap.bundle.min.js"></script>
</body>
</html>
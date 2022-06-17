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
</head>
<body>
    <p>Candidate Homepage</p>
    <?php
        echo $_SESSION['candidate'];
    ?>
</body>
</html>
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
    <link rel="stylesheet" href="../../library/css/bootstrap.min.css">
    <style>
        @font-face {
            font-family: anurati;
            src: url('../../library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        }

        .anurati {
            font-family: anurati;
        }
    </style>
</head>

<body>
    <?php include "usernav.php"; ?>
    <p class="fs-1">Candidate Homepage</p>
    <?php
    echo $_SESSION['candidate'];
    ?>

    <div class="container-sm w-50 mt-3">
        <p class="text-center fs-3">Enter details below:</p>
        <form action="../../backend/cand_ins.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="post" class="form-label mx-4">Post:</label>
                <div class="input-group mb-3">
                    <label class="input-group-text" for="post">Options</label>
                    <select class="form-select" name="post" id="post">
                        <option selected>Choose...</option>
                        <option value="president">President</option>
                        <option value="assistant general secretary">Assistant General Secretary</option>
                        <option value="general secretary">General Secretary</option>
                        <option value="sports secretary">Sports Secretary</option>
                        <option value="cultural secretary">Cultural Secretary</option>
                        <option value="boys common room secretarty">Boys Common Room Secretarty</option>
                        <option value="girls common room secretarty">Girls Common Room Secretarty</option>
                        <option value="major games secretary">Major Games Secretary</option>
                        <option value="minor games secretary">Minor Games Secretary</option>
                        <option value="literature and poem secretary">Literature and Poem Secretary</option>
                    </select>
                </div>
            </div>
            <div class="mb-3">
                <label for="insignia" class="form-label">Insignia:</label>
                <input class="form-control" name="insignia" type="file" id="insignia">
            </div>
            <button class="btn btn-primary" type="submit" name="insSubmit"> Submit</button>
        </form>
    </div>
    <!-- Bootstrap script -->
    <script src="../../library/js/bootstrap.bundle.min.js"></script>
</body>

</html>
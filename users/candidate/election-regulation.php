<?php
session_start();
if (!isset($_SESSION['username'])) {
    $_SESSION['alert_message'] = "You are Logged Out";
    header("Location: ../login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regulations for Election</title>
    <!-- Bootstrap links -->
    <link rel="stylesheet" href="../../library/css/bootstrap.min.css">
    <!-- Bootstrap script -->
    <script src="../../library/js/bootstrap.bundle.min.js"></script>
    <!-- Anurati font -->
    <style>
        @font-face {
            font-family: anurati;
            src: url('../../library/fonts/anurati/ANURATI/Anurati-Regular.otf');
        }

        .anurati {
            font-family: anurati;
        }

        body {
            background-color: #ededed;
            /* background-color: #d2d4d3; */
        }
    </style>
    <link rel="stylesheet" href="../../css/custom.css">
</head>

<body>
    <?php include "./usernav.php"; ?>

    <div class="container-fluid">
        <div class="container ">
            <div class="regulations bg-light shadow p-5 rounded roboto">
                <p class="election-para fs-3 bg-info text-dark text-center">
                    ELECTION OF STUDENTS IN JORHAT ENGINEERING COLLEGE, 2022
                </p>
                <ul>
                    <p class="fs-4 text-bold">Election – Related Expenditure and Financial Accountability ---</p>
                    <li>The candidate shall in no event have any academic arrears in the year of contesting the election.</li>
                    <li> Each candidate shall, within two weeks of the declaration of the result, submit complete and audited accounts to the Medical College/Institution/University. The Medical College/Institution/University shall publish such audited accounts within 2 days of submission of such accounts, through a suitable medium so that any member of the student body may freely examine the same.
                    </li>
                    <li> The election of the candidate shall be nullified in the event of any non-compliance or in the event of any excessive expenditure.</li>
                    <li> The candidates shall be barred from utilizing funds from any political party or any other sources other than voluntary contributions from the student body.</li>
                </ul>
                <hr class="border-primary border-3 opacity-75">
                <ul>
                    <p class="fs-4 text-bold">Eligibility Criteria for Candidates ---</p>
                    <li>The maximum age limit to legitimately contest for election shall be between the ages of 22-30 years.</li>
                    <li>The candidate shall in no event have any academic arrears in the year of contesting the election.</li>
                    <li>The candidate shall have attained the minimum percentage of attendance as prescribed by the university or 75% attendance, whichever is higher.
                    </li>
                    <li>The candidate shall have one opportunity to contest for the post of office bearer, and two opportunities to contest for the post of an executive member.</li>
                    <li>The candidate shall not have a previous criminal record, that is to say he/she shall not have been tried and/or convicted of any criminal offence or misdemeanor. The candidate shall also not have been subjected to any disciplinary action by Medical College/Institution/University authorities.</li>
                    <li>The candidate shall be a regular, full time student of the Medical College/Institution/University. That is to say that all eligible candidates shall be enrolled in a full time course.</li>
                </ul>
                <div class="text-center">
                    <button class="btn btn-primary" onclick="location.href = './candidate_reg.php';">Continue</button>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
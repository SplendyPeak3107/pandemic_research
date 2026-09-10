<?php
session_start();

if(!isset($_SESSION["success"])){
    header("location: ../index.php");
    die();
    }

unset($_SESSION["success"]);
session_abort();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thank You | Questionnaire</title>

    <link rel="stylesheet" href="../assets/css/thank-you.css">
</head>

<body>

    <main class="thank-you-card">

        <div class="check-icon">
            ✓
        </div>

        <h1>Thank You for Participating!</h1>

        <p class="main-message">
            Your response has been successfully submitted.
            Thank you for taking the time to participate in this survey.
        </p>

        <p class="appreciation">
            Your contribution means a lot to me. The time, effort, and
            thoughtful answers you have provided will go a long way in
            supporting this research and helping me achieve the goals
            of this project.
        </p>

        <p class="closing">
            I sincerely appreciate your effort and participation.
            Thank you once again!
        </p>

    </main>

</body>
</html>
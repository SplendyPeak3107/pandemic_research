<?php

// ============================================================
// 1. MAKE SURE THE REQUEST IS POST
// ============================================================

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: ../index.php');
    die();
}


// ============================================================
// 2. GET ALL FORM DATA
// ============================================================

$answers = [
    'q1'  => $_POST['q1'] ?? '',
    'q2'  => $_POST['q2'] ?? '',
    'q3'  => $_POST['q3'] ?? '',
    'q4'  => $_POST['q4'] ?? '',

    'q5'  => $_POST['q5'] ?? '',
    'q6'  => $_POST['q6'] ?? '',
    'q7'  => $_POST['q7'] ?? [],

    'q8'  => $_POST['q8'] ?? '',
    'q9'  => $_POST['q9'] ?? [],
    'q10' => $_POST['q10'] ?? '',

    'q11' => $_POST['q11'] ?? [],
    'q12' => $_POST['q12'] ?? '',
    'q13' => $_POST['q13'] ?? '',

    'q14' => $_POST['q14'] ?? '',
    'q15' => $_POST['q15'] ?? '',
    'q16' => $_POST['q16'] ?? [],
    'q17' => $_POST['q17'] ?? '',

    'q18' => $_POST['q18'] ?? [],
    'q19' => $_POST['q19'] ?? '',
    'q20' => $_POST['q20'] ?? '',

    'q21' => $_POST['q21'] ?? '',
    'q22' => $_POST['q22'] ?? [],
    'q23' => $_POST['q23'] ?? '',
    'q24' => $_POST['q24'] ?? '',
    'q25' => $_POST['q25'] ?? ''
];


// ============================================================
// 3. CHECK FOR MISSING REQUIRED FIELDS
// ============================================================

$errors = [];


// Questions that expect ONE answer
$requiredQuestions = [
    'q1', 'q2', 'q3', 'q4',
    'q5', 'q6',
    'q8', 'q10',
    'q12', 'q13',
    'q14', 'q15', 'q17',
    'q19', 'q20',
    'q21', 'q23', 'q24', 'q25'
];


foreach ($requiredQuestions as $question) {

    if (trim($answers[$question]) === '') {
        $errors[] = "please pick an answer for $question";
    }
}


// Questions that expect MULTIPLE answers
$requiredCheckboxQuestions = [
    'q7',
    'q9',
    'q11',
    'q16',
    'q18',
    'q22'
];


foreach ($requiredCheckboxQuestions as $question) {

    if (
        !isset($answers[$question]) ||
        !is_array($answers[$question]) ||
        count($answers[$question]) === 0
    ) {
        $errors[] = "please pick an answer for $question";
    }
}


// ============================================================
// 4. IF THERE ARE ERRORS, SAVE THEM IN SESSION
//    AND REDIRECT TO INDEX
// ============================================================

if (!empty($errors)) {
  session_start();
  
  $_SESSION['errors'] = $errors;

  header('Location: ../index.php');
  die();
}


// ============================================================
// 5. NO VALIDATION ERRORS
//    CONNECT TO DATABASE
// ============================================================

require_once 'dbh.inc.php';


try {

    // ========================================================
    // 6. START TRANSACTION
    // ========================================================

    $pdo->beginTransaction();


    // ========================================================
    // 7. INSERT MAIN QUESTIONNAIRE RESPONSE
    // ========================================================

    $sql = "
        INSERT INTO questionnaire_responses (
            q1_age,
            q2_background,
            q3_experience,
            q4_surveillance_experience,

            q5_surveillance_effectiveness,
            q6_detection_speed,

            q8_reporting_delay_impact,
            q10_most_significant_barrier,

            q12_strongest_growth_indicator,
            q13_mobility_importance,

            q14_ml_awareness,
            q15_ml_improves_detection,
            q17_forecast_usefulness,

            q19_geographic_map_use,
            q20_alert_usefulness,

            q21_explainability_importance,
            q23_human_review_required,
            q24_privacy_concern,
            q25_overall_improvement
        )

        VALUES (
            :age,
            :background,
            :experience,
            :surveillance_experience,

            :surveillance_effectiveness,
            :detection_speed,

            :reporting_delay_impact,
            :most_significant_barrier,

            :strongest_growth_indicator,
            :mobility_importance,

            :ml_awareness,
            :ml_improves_detection,
            :forecast_usefulness,

            :geographic_map_use,
            :alert_usefulness,

            :explainability_importance,
            :human_review_required,
            :privacy_concern,
            :overall_improvement
        )
    ";


    $statement = $pdo->prepare($sql);


    // ========================================================
    // 8. BIND THE VALUES
    // ========================================================

    $statement->bindValue(':age', $answers['q1']);
    $statement->bindValue(':background', $answers['q2']);
    $statement->bindValue(':experience', $answers['q3']);
    $statement->bindValue(':surveillance_experience', $answers['q4']);

    $statement->bindValue(':surveillance_effectiveness', $answers['q5']);

    $statement->bindValue(':detection_speed', $answers['q6']);

    $statement->bindValue(
        ':reporting_delay_impact',
        $answers['q8']
    );

    $statement->bindValue(
        ':most_significant_barrier',
        $answers['q10']
    );

    $statement->bindValue(
        ':strongest_growth_indicator',
        $answers['q12']
    );

    $statement->bindValue(
        ':mobility_importance',
        $answers['q13']
    );

    $statement->bindValue(
        ':ml_awareness',
        $answers['q14']
    );

    $statement->bindValue(
        ':ml_improves_detection',
        $answers['q15']
    );

    $statement->bindValue(
        ':forecast_usefulness',
        $answers['q17']
    );

    $statement->bindValue(
        ':geographic_map_use',
        $answers['q19']
    );

    $statement->bindValue(
        ':alert_usefulness',
        $answers['q20']
    );

    $statement->bindValue(
        ':explainability_importance',
        $answers['q21']
    );

    $statement->bindValue(
        ':human_review_required',
        $answers['q23']
    );

    $statement->bindValue(
        ':privacy_concern',
        $answers['q24']
    );

    $statement->bindValue(
        ':overall_improvement',
        $answers['q25']
    );


    // ========================================================
    // 9. EXECUTE MAIN INSERT
    // ========================================================

    $statement->execute();


    // ========================================================
    // 10. GET THE ID OF THE NEW RESPONSE
    // ========================================================

    $responseId = $pdo->lastInsertId();


    // ========================================================
    // 11. INSERT Q7 ANSWERS
    // ========================================================

    $sql = "
        INSERT INTO q7_information_sources
        (response_id, source)
        VALUES (:response_id, :source)
    ";

    $statement = $pdo->prepare($sql);

    foreach ($answers['q7'] as $source) {

        $statement->bindValue(':response_id', $responseId);
        $statement->bindValue(':source', $source);

        $statement->execute();
    }


    // ========================================================
    // 12. INSERT Q9 ANSWERS
    // ========================================================

    $sql = "
        INSERT INTO q9_detection_challenges
        (response_id, challenge)
        VALUES (:response_id, :challenge)
    ";

    $statement = $pdo->prepare($sql);

    foreach ($answers['q9'] as $challenge) {

        $statement->bindValue(':response_id', $responseId);
        $statement->bindValue(':challenge', $challenge);

        $statement->execute();
    }


    // ========================================================
    // 13. INSERT Q11 ANSWERS
    // ========================================================

    $sql = "
        INSERT INTO q11_escalation_indicators
        (response_id, indicator)
        VALUES (:response_id, :indicator)
    ";

    $statement = $pdo->prepare($sql);

    foreach ($answers['q11'] as $indicator) {

        $statement->bindValue(':response_id', $responseId);
        $statement->bindValue(':indicator', $indicator);

        $statement->execute();
    }


    // ========================================================
    // 14. INSERT Q16 ANSWERS
    // ========================================================

    $sql = "
        INSERT INTO q16_ml_applications
        (response_id, application)
        VALUES (:response_id, :application)
    ";

    $statement = $pdo->prepare($sql);

    foreach ($answers['q16'] as $application) {

        $statement->bindValue(':response_id', $responseId);
        $statement->bindValue(':application', $application);

        $statement->execute();
    }


    // ========================================================
    // 15. INSERT Q18 ANSWERS
    // ========================================================

    $sql = "
        INSERT INTO q18_system_features
        (response_id, feature)
        VALUES (:response_id, :feature)
    ";

    $statement = $pdo->prepare($sql);

    foreach ($answers['q18'] as $feature) {

        $statement->bindValue(':response_id', $responseId);
        $statement->bindValue(':feature', $feature);

        $statement->execute();
    }


    // ========================================================
    // 16. INSERT Q22 ANSWERS
    // ========================================================

    $sql = "
        INSERT INTO q22_alert_information
        (response_id, information)
        VALUES (:response_id, :information)
    ";

    $statement = $pdo->prepare($sql);

    foreach ($answers['q22'] as $information) {

        $statement->bindValue(':response_id', $responseId);
        $statement->bindValue(':information', $information);

        $statement->execute();
    }


    // ========================================================
    // 17. EVERYTHING WAS SUCCESSFUL
    //    COMMIT THE TRANSACTION
    // ========================================================

    $pdo->commit();


    // ========================================================
    // 18. CLOSE CONNECTION AND STOP
    // ========================================================

    $pdo = null;

    session_start();
    $_SESSION["success"] = true;

    header("location: ../pages/thank-you.php");

    die();


} catch (PDOException $error) {

    // ========================================================
    // 19. SOMETHING WENT WRONG
    // ========================================================

    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }

    echo "Error: " . $error->getMessage();

    die();
}
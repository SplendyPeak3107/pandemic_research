<?php
session_start();

$errors = $_SESSION['errors'] ?? [];

// Clear the errors after retrieving them.
// This prevents them from showing again on the next page load.
unset($_SESSION['errors']);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Pandemic Prediction System Questionnaire</title>
    <link rel="stylesheet" href="assets/css/style.css">
  </head>

  <body>
    <div class="container">
      <div class="header">
        <h1>
          Questionnaire on a Machine Learning-Based Epidemic and Pandemic
          Early-Warning System
        </h1>

        <p>
          This questionnaire is designed to collect information on
          infectious-disease surveillance, outbreak detection, epidemic
          escalation, machine learning, predictive analytics, and the
          requirements of an intelligent early-warning system.
        </p>

        <p style="margin-top: 15px">
          <strong>Instruction:</strong> Please select the option(s) that best
          represent your opinion or experience. All questions are required.
        </p>
      </div>

      <form
        action="includes/form_handler.inc.php"
        method="post"
        class="form-card"
        id="questionnaireForm"
      >
      <!-- Show errors -->
       <?php if (!empty($errors)): ?>

      <div style="color: red; margin-bottom: 2rem" class="form-errors" role="alert">

          <h3>There are some issues with your submission</h3>

          <p>Please correct the following before submitting the questionnaire:</p>

          <ul">
              <?php foreach ($errors as $error): ?>
                  <li style="margin-left: 1.5rem"><?= htmlspecialchars($error) ?></li>
              <?php endforeach; ?>
          </ul>

      </div>

      <?php endif; ?>

        <!-- SECTION A -->
        <div class="section">
          <div class="section-title">Section A — Respondent Information</div>

          <!-- Q1 -->
          <div class="question">
            <div class="question-title">
              1. What is your age range? <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q1" value="18-25" required />
              18–25
            </label>

            <label class="option">
              <input type="radio" name="q1" value="26-35" />
              26–35
            </label>

            <label class="option">
              <input type="radio" name="q1" value="36-45" />
              36–45
            </label>

            <label class="option">
              <input type="radio" name="q1" value="46-55" />
              46–55
            </label>

            <label class="option">
              <input type="radio" name="q1" value="56+" />
              56 and above
            </label>
          </div>

          <!-- Q2 -->
          <div class="question">
            <div class="question-title">
              2. What is your professional or academic background?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q2" value="Medicine" required />
              Medicine
            </label>

            <label class="option">
              <input type="radio" name="q2" value="Nursing" />
              Nursing
            </label>

            <label class="option">
              <input type="radio" name="q2" value="Public Health" />
              Public Health / Epidemiology
            </label>

            <label class="option">
              <input type="radio" name="q2" value="Laboratory" />
              Medical Laboratory Science
            </label>

            <label class="option">
              <input type="radio" name="q2" value="Pharmacy" />
              Pharmacy
            </label>

            <label class="option">
              <input type="radio" name="q2" value="Computer Science" />
              Computer Science / Software Engineering
            </label>

            <label class="option">
              <input type="radio" name="q2" value="Data Science" />
              Data Science / Artificial Intelligence
            </label>

            <label class="option">
              <input type="radio" name="q2" value="Other" />
              Other
            </label>
          </div>

          <!--
             |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||
              -->

          <!-- Q3 -->
          <div class="question">
            <div class="question-title">
              3. How many years of professional or academic experience do you
              have?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q3" value="<1" required />
              Less than 1 year
            </label>

            <label class="option">
              <input type="radio" name="q3" value="1-3" />
              1–3 years
            </label>

            <label class="option">
              <input type="radio" name="q3" value="4-6" />
              4–6 years
            </label>

            <label class="option">
              <input type="radio" name="q3" value="7-10" />
              7–10 years
            </label>

            <label class="option">
              <input type="radio" name="q3" value="10+" />
              More than 10 years
            </label>
          </div>

          <!-- Q4 -->
          <div class="question">
            <div class="question-title">
              4. Have you previously participated in disease surveillance,
              outbreak monitoring, or outbreak response?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q4" value="Yes" required />
              Yes
            </label>

            <label class="option">
              <input type="radio" name="q4" value="No" />
              No
            </label>

            <label class="option">
              <input type="radio" name="q4" value="Related" />
              No, but I have related experience
            </label>
          </div>
        </div>

        <!-- SECTION B -->
        <div class="section">
          <div class="section-title">
            Section B — Current Disease Surveillance
          </div>

          <!-- Q5 -->
          <div class="question">
            <div class="question-title">
              5. How effective do you consider current methods of detecting
              infectious-disease outbreaks?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q5" value="Very ineffective" required />
              Very ineffective
            </label>

            <label class="option">
              <input type="radio" name="q5" value="Ineffective" />
              Ineffective
            </label>

            <label class="option">
              <input type="radio" name="q5" value="Neutral" />
              Neutral
            </label>

            <label class="option">
              <input type="radio" name="q5" value="Effective" />
              Effective
            </label>

            <label class="option">
              <input type="radio" name="q5" value="Very effective" />
              Very effective
            </label>
          </div>

          <!-- Q6 -->
          <div class="question">
            <div class="question-title">
              6. How quickly do you believe unusual increases in infectious
              diseases are normally detected?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q6" value="Very quickly" required />
              Very quickly
            </label>

            <label class="option">
              <input type="radio" name="q6" value="Quickly" />
              Quickly
            </label>

            <label class="option">
              <input type="radio" name="q6" value="Moderately" />
              Moderately quickly
            </label>

            <label class="option">
              <input type="radio" name="q6" value="Slowly" />
              Slowly
            </label>

            <label class="option">
              <input type="radio" name="q6" value="Very slowly" />
              Very slowly
            </label>
          </div>

          <!-- Q7 -->
          <div class="question">
            <div class="question-title">
              7. Which sources of information do you consider useful for
              infectious-disease surveillance? <span class="required">*</span>
            </div>

            <label class="option">
              <input type="checkbox" name="q7[]" value="Hospital records" />
              Hospital records
            </label>

            <label class="option">
              <input type="checkbox" name="q7[]" value="Laboratory reports" />
              Laboratory reports
            </label>

            <label class="option">
              <input
                type="checkbox"
                name="q7[]"
                value="Government surveillance"
              />
              Government surveillance systems
            </label>

            <label class="option">
              <input type="checkbox" name="q7[]" value="Community health" />
              Community health reports
            </label>

            <label class="option">
              <input type="checkbox" name="q7[]" value="Mobility" />
              Population mobility / transportation data
            </label>

            <label class="option">
              <input type="checkbox" name="q7[]" value="Environmental" />
              Environmental data
            </label>

            <label class="option">
              <input type="checkbox" name="q7[]" value="Social media" />
              Social media / online signals
            </label>
          </div>
        </div>

        <!-- SECTION C -->
        <div class="section">
          <div class="section-title">
            Section C — Challenges in Early Outbreak Detection
          </div>

          <!-- Q8 -->
          <div class="question">
            <div class="question-title">
              8. To what extent do you agree that delays in disease reporting
              can hinder early outbreak detection?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input
                type="radio"
                name="q8"
                value="Strongly disagree"
                required
              />
              Strongly disagree
            </label>

            <label class="option">
              <input type="radio" name="q8" value="Disagree" />
              Disagree
            </label>

            <label class="option">
              <input type="radio" name="q8" value="Neutral" />
              Neutral
            </label>

            <label class="option">
              <input type="radio" name="q8" value="Agree" />
              Agree
            </label>

            <label class="option">
              <input type="radio" name="q8" value="Strongly agree" />
              Strongly agree
            </label>
          </div>

          <!-- Q9 -->
          <div class="question">
            <div class="question-title">
              9. Which factors make early outbreak detection difficult?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="checkbox" name="q9[]" value="Delayed reporting" />
              Delayed reporting
            </label>

            <label class="option">
              <input type="checkbox" name="q9[]" value="Incomplete data" />
              Incomplete or missing data
            </label>

            <label class="option">
              <input type="checkbox" name="q9[]" value="Limited testing" />
              Limited laboratory testing
            </label>

            <label class="option">
              <input type="checkbox" name="q9[]" value="Poor communication" />
              Poor communication between agencies
            </label>

            <label class="option">
              <input type="checkbox" name="q9[]" value="Insufficient personnel" />
              Insufficient trained personnel
            </label>

            <label class="option">
              <input type="checkbox" name="q9[]" value="Limited technology" />
              Limited technological infrastructure
            </label>

            <label class="option">
              <input type="checkbox" name="q9[]" value="Population movement" />
              Population movement
            </label>

            <label class="option">
              <input
                type="checkbox"
                name="q9[]"
                value="Changing disease characteristics"
              />
              Changing disease characteristics
            </label>
          </div>

          <!-- Q10 -->
          <div class="question">
            <div class="question-title">
              10. Which challenge do you consider the most significant barrier
              to early outbreak detection?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input
                type="radio"
                name="q10"
                value="Delayed reporting"
                required
              />
              Delayed reporting
            </label>

            <label class="option">
              <input type="radio" name="q10" value="Data quality" />
              Poor data quality
            </label>

            <label class="option">
              <input type="radio" name="q10" value="Testing" />
              Limited testing
            </label>

            <label class="option">
              <input type="radio" name="q10" value="Technology" />
              Limited technology
            </label>

            <label class="option">
              <input type="radio" name="q10" value="Personnel" />
              Lack of trained personnel
            </label>

            <label class="option">
              <input type="radio" name="q10" value="Communication" />
              Poor communication
            </label>
          </div>
        </div>

        <!-- SECTION D -->
        <div class="section">
          <div class="section-title">
            Section D — Indicators of Epidemic and Pandemic Escalation
          </div>

          <!-- Q11 -->
          <div class="question">
            <div class="question-title">
              11. Which indicators do you consider important for determining
              whether an outbreak is becoming more serious?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Case growth" />
              Rapid increase in reported cases
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Rt" />
              Reproduction/transmission rate
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Geographic spread" />
              Geographic spread
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Hospitalization" />
              Hospitalization
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Mortality" />
              Mortality
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Positivity" />
              Testing positivity rate
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Mobility" />
              Population mobility
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="International travel" />
              International travel
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Environment" />
              Environmental conditions
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Healthcare capacity" />
              Healthcare capacity
            </label>

            <label class="option">
              <input type="checkbox" name="q11[]" value="Variants" />
              Emergence of new variants
            </label>
          </div>

          <!-- Q12 -->
          <div class="question">
            <div class="question-title">
              12. Which factor do you consider the strongest indicator that an
              outbreak may continue growing?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q12" value="Case growth" required />
              Rapid case growth
            </label>

            <label class="option">
              <input type="radio" name="q12" value="Rt" />
              Reproduction number above 1
            </label>

            <label class="option">
              <input type="radio" name="q12" value="Geographic spread" />
              Increasing geographic spread
            </label>

            <label class="option">
              <input type="radio" name="q12" value="Hospitalization" />
              Increasing hospitalization
            </label>

            <label class="option">
              <input type="radio" name="q12" value="International spread" />
              Increasing international transmission
            </label>
          </div>

          <!-- Q13 -->
          <div class="question">
            <div class="question-title">
              13. How important is population movement or international travel
              when assessing the risk of disease expansion?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q13" value="Not important" required />
              Not important
            </label>

            <label class="option">
              <input type="radio" name="q13" value="Slightly important" />
              Slightly important
            </label>

            <label class="option">
              <input type="radio" name="q13" value="Moderately important" />
              Moderately important
            </label>

            <label class="option">
              <input type="radio" name="q13" value="Important" />
              Important
            </label>

            <label class="option">
              <input type="radio" name="q13" value="Very important" />
              Very important
            </label>
          </div>
        </div>

        <!-- SECTION E -->
        <div class="section">
          <div class="section-title">
            Section E — Machine Learning and Predictive Surveillance
          </div>

          <!-- Q14 -->
          <div class="question">
            <div class="question-title">
              14. Have you heard of machine learning being used for disease
              forecasting or outbreak detection?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q14" value="Yes" required />
              Yes
            </label>

            <label class="option">
              <input type="radio" name="q14" value="No" />
              No
            </label>

            <label class="option">
              <input type="radio" name="q14" value="Not sure" />
              Not sure
            </label>
          </div>

          <!-- Q15 -->
          <div class="question">
            <div class="question-title">
              15. Do you believe machine learning can improve the early
              detection of infectious-disease outbreaks?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input
                type="radio"
                name="q15"
                value="Strongly disagree"
                required
              />
              Strongly disagree
            </label>

            <label class="option">
              <input type="radio" name="q15" value="Disagree" />
              Disagree
            </label>

            <label class="option">
              <input type="radio" name="q15" value="Neutral" />
              Neutral
            </label>

            <label class="option">
              <input type="radio" name="q15" value="Agree" />
              Agree
            </label>

            <label class="option">
              <input type="radio" name="q15" value="Strongly agree" />
              Strongly agree
            </label>
          </div>

          <!-- Q16 -->
          <div class="question">
            <div class="question-title">
              16. Which applications of machine learning would be most useful
              for infectious-disease surveillance?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="checkbox" name="q16[]" value="Anomaly detection" />
              Detecting unusual disease activity
            </label>

            <label class="option">
              <input type="checkbox" name="q16[]" value="Forecasting" />
              Predicting future case numbers
            </label>

            <label class="option">
              <input type="checkbox" name="q16[]" value="Geographic prediction" />
              Identifying high-risk geographical regions
            </label>

            <label class="option">
              <input type="checkbox" name="q16[]" value="Risk classification" />
              Classifying outbreak risk
            </label>

            <label class="option">
              <input type="checkbox" name="q16[]" value="Early warning" />
              Generating early warnings
            </label>

            <label class="option">
              <input type="checkbox" name="q16[]" value="Resource planning" />
              Supporting healthcare resource planning
            </label>
          </div>

          <!-- Q17 -->
          <div class="question">
            <div class="question-title">
              17. How useful would an ML system that forecasts disease cases
              7–30 days ahead be?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q17" value="Not useful" required />
              Not useful
            </label>

            <label class="option">
              <input type="radio" name="q17" value="Slightly useful" />
              Slightly useful
            </label>

            <label class="option">
              <input type="radio" name="q17" value="Moderately useful" />
              Moderately useful
            </label>

            <label class="option">
              <input type="radio" name="q17" value="Useful" />
              Useful
            </label>

            <label class="option">
              <input type="radio" name="q17" value="Extremely useful" />
              Extremely useful
            </label>
          </div>
        </div>

        <!-- SECTION F -->
        <div class="section">
          <div class="section-title">
            Section F — Proposed System Requirements
          </div>

          <!-- Q18 -->
          <div class="question">
            <div class="question-title">
              18. Which features should the proposed early-warning system
              provide?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Real-time monitoring" />
              Real-time disease monitoring
            </label>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Forecasting" />
              Disease case forecasting
            </label>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Risk score" />
              Epidemic/pandemic risk score
            </label>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Risk map" />
              Geographic risk map
            </label>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Alerts" />
              Automated alerts
            </label>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Dashboard" />
              Interactive dashboard
            </label>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Historical comparison" />
              Historical outbreak comparison
            </label>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Reports" />
              Automated reports
            </label>

            <label class="option">
              <input type="checkbox" name="q18[]" value="Explainable AI" />
              Explanation of predictions
            </label>
          </div>

          <!-- Q19 -->
          <div class="question">
            <div class="question-title">
              19. How useful would an interactive geographical risk map be for
              monitoring disease spread?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q19" value="Not useful" required />
              Not useful
            </label>

            <label class="option">
              <input type="radio" name="q19" value="Slightly useful" />
              Slightly useful
            </label>

            <label class="option">
              <input type="radio" name="q19" value="Moderately useful" />
              Moderately useful
            </label>

            <label class="option">
              <input type="radio" name="q19" value="Useful" />
              Useful
            </label>

            <label class="option">
              <input type="radio" name="q19" value="Extremely useful" />
              Extremely useful
            </label>
          </div>

          <!-- Q20 -->
          <div class="question">
            <div class="question-title">
              20. How useful would an automated alert system be if it notified
              users when disease activity exceeded a predefined risk threshold?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q20" value="Not useful" required />
              Not useful
            </label>

            <label class="option">
              <input type="radio" name="q20" value="Slightly useful" />
              Slightly useful
            </label>

            <label class="option">
              <input type="radio" name="q20" value="Moderately useful" />
              Moderately useful
            </label>

            <label class="option">
              <input type="radio" name="q20" value="Useful" />
              Useful
            </label>

            <label class="option">
              <input type="radio" name="q20" value="Extremely useful" />
              Extremely useful
            </label>
          </div>
        </div>

        <!-- SECTION G -->
        <div class="section">
          <div class="section-title">
            Section G — Trust, Explainability, Privacy and Acceptance
          </div>

          <!-- Q21 -->
          <div class="question">
            <div class="question-title">
              21. How important is it for the system to explain the factors
              responsible for its prediction?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q21" value="Not important" required />
              Not important
            </label>

            <label class="option">
              <input type="radio" name="q21" value="Slightly important" />
              Slightly important
            </label>

            <label class="option">
              <input type="radio" name="q21" value="Moderately important" />
              Moderately important
            </label>

            <label class="option">
              <input type="radio" name="q21" value="Important" />
              Important
            </label>

            <label class="option">
              <input type="radio" name="q21" value="Very important" />
              Very important
            </label>
          </div>

          <!-- Q22 -->
          <div class="question">
            <div class="question-title">
              22. What information would you want to see when the system
              generates a high-risk alert?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="checkbox" name="q22[]" value="Case growth" />
              Case growth rate
            </label>

            <label class="option">
              <input type="checkbox" name="q22[]" value="Transmission" />
              Transmission/reproduction rate
            </label>

            <label class="option">
              <input type="checkbox" name="q22[]" value="Geographic spread" />
              Geographic spread
            </label>

            <label class="option">
              <input type="checkbox" name="q22[]" value="Hospitalization" />
              Hospitalization
            </label>

            <label class="option">
              <input type="checkbox" name="q22[]" value="Mortality" />
              Mortality
            </label>

            <label class="option">
              <input type="checkbox" name="q22[]" value="Forecast" />
              Future forecast
            </label>

            <label class="option">
              <input type="checkbox" name="q22[]" value="Confidence" />
              Model confidence/risk probability
            </label>
          </div>

          <!-- Q23 -->
          <div class="question">
            <div class="question-title">
              23. Should predictions generated by the system be reviewed by
              qualified public-health professionals before major decisions are
              made?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q23" value="Yes" required />
              Yes
            </label>

            <label class="option">
              <input type="radio" name="q23" value="No" />
              No
            </label>

            <label class="option">
              <input type="radio" name="q23" value="Not sure" />
              Not sure
            </label>
          </div>

          <!-- Q24 -->
          <div class="question">
            <div class="question-title">
              24. How concerned are you about privacy and security when
              health-related data is processed by an AI-based system?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input type="radio" name="q24" value="Not concerned" required />
              Not concerned
            </label>

            <label class="option">
              <input type="radio" name="q24" value="Slightly concerned" />
              Slightly concerned
            </label>

            <label class="option">
              <input type="radio" name="q24" value="Moderately concerned" />
              Moderately concerned
            </label>

            <label class="option">
              <input type="radio" name="q24" value="Very concerned" />
              Very concerned
            </label>

            <label class="option">
              <input type="radio" name="q24" value="Extremely concerned" />
              Extremely concerned
            </label>
          </div>

          <!-- Q25 -->
          <div class="question">
            <div class="question-title">
              25. Overall, do you believe a machine-learning-based epidemic and
              pandemic early-warning system would improve disease preparedness
              and response?
              <span class="required">*</span>
            </div>

            <label class="option">
              <input
                type="radio"
                name="q25"
                value="Strongly disagree"
                required
              />
              Strongly disagree
            </label>

            <label class="option">
              <input type="radio" name="q25" value="Disagree" />
              Disagree
            </label>

            <label class="option">
              <input type="radio" name="q25" value="Neutral" />
              Neutral
            </label>

            <label class="option">
              <input type="radio" name="q25" value="Agree" />
              Agree
            </label>

            <label class="option">
              <input type="radio" name="q25" value="Strongly agree" />
              Strongly agree
            </label>
          </div>
        </div>

        <!-- ||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->

        <div class="submit-area">
          <button type="submit">Submit Questionnaire</button>
        </div>
      </form>

      <div class="footer">Pandemic Prediction System Research Project</div>
    </div>

    <script src="assets/script.js"></script>
  </body>
</html>

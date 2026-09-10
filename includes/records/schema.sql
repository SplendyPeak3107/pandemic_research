-- ============================================================
-- DATABASE: pandemic_research
-- PURPOSE: Questionnaire response storage
-- ============================================================

CREATE DATABASE IF NOT EXISTS pandemic_research;

USE pandemic_research;


-- ============================================================
-- MAIN QUESTIONNAIRE RESPONSES TABLE
-- One row = one completed questionnaire
-- ============================================================

DROP TABLE IF EXISTS q22_alert_information;
DROP TABLE IF EXISTS q18_system_features;
DROP TABLE IF EXISTS q16_ml_applications;
DROP TABLE IF EXISTS q11_escalation_indicators;
DROP TABLE IF EXISTS q9_detection_challenges;
DROP TABLE IF EXISTS q7_information_sources;
DROP TABLE IF EXISTS questionnaire_responses;


CREATE TABLE questionnaire_responses (
    id INT AUTO_INCREMENT PRIMARY KEY,

    submitted_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    -- ========================================================
    -- Section A: Respondent Information
    -- ========================================================

    q1_age VARCHAR(20),
    q2_background VARCHAR(50),
    q3_experience VARCHAR(20),
    q4_surveillance_experience VARCHAR(20),


    -- ========================================================
    -- Section B: Current Disease Surveillance
    -- ========================================================

    q5_surveillance_effectiveness VARCHAR(30),
    q6_detection_speed VARCHAR(30),


    -- ========================================================
    -- Section C: Challenges in Early Outbreak Detection
    -- ========================================================

    q8_reporting_delay_impact VARCHAR(30),
    q10_most_significant_barrier VARCHAR(50),


    -- ========================================================
    -- Section D: Indicators of Epidemic and Pandemic Escalation
    -- ========================================================

    q12_strongest_growth_indicator VARCHAR(50),
    q13_mobility_importance VARCHAR(30),


    -- ========================================================
    -- Section E: Machine Learning and Predictive Surveillance
    -- ========================================================

    q14_ml_awareness VARCHAR(20),
    q15_ml_improves_detection VARCHAR(30),
    q17_forecast_usefulness VARCHAR(30),


    -- ========================================================
    -- Section F: Proposed System Requirements
    -- ========================================================

    q19_geographic_map_use VARCHAR(30),
    q20_alert_usefulness VARCHAR(30),


    -- ========================================================
    -- Section G: Trust, Explainability, Privacy and Acceptance
    -- ========================================================

    q21_explainability_importance VARCHAR(30),
    q23_human_review_required VARCHAR(20),
    q24_privacy_concern VARCHAR(30),
    q25_overall_improvement VARCHAR(30),


    -- ========================================================
    -- Record creation timestamp
    -- ========================================================

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    INDEX idx_submitted_at (submitted_at)
);


-- ============================================================
-- Q7: INFORMATION SOURCES
-- Multiple selections allowed
-- ============================================================

CREATE TABLE q7_information_sources (
    id INT AUTO_INCREMENT PRIMARY KEY,

    response_id INT NOT NULL,

    source VARCHAR(100) NOT NULL,

    FOREIGN KEY (response_id)
        REFERENCES questionnaire_responses(id)
        ON DELETE CASCADE,

    INDEX idx_q7_response_id (response_id),
    INDEX idx_q7_source (source)
);


-- ============================================================
-- Q9: DETECTION CHALLENGES
-- Multiple selections allowed
-- ============================================================

CREATE TABLE q9_detection_challenges (
    id INT AUTO_INCREMENT PRIMARY KEY,

    response_id INT NOT NULL,

    challenge VARCHAR(100) NOT NULL,

    FOREIGN KEY (response_id)
        REFERENCES questionnaire_responses(id)
        ON DELETE CASCADE,

    INDEX idx_q9_response_id (response_id),
    INDEX idx_q9_challenge (challenge)
);


-- ============================================================
-- Q11: ESCALATION INDICATORS
-- Multiple selections allowed
-- ============================================================

CREATE TABLE q11_escalation_indicators (
    id INT AUTO_INCREMENT PRIMARY KEY,

    response_id INT NOT NULL,

    indicator VARCHAR(100) NOT NULL,

    FOREIGN KEY (response_id)
        REFERENCES questionnaire_responses(id)
        ON DELETE CASCADE,

    INDEX idx_q11_response_id (response_id),
    INDEX idx_q11_indicator (indicator)
);


-- ============================================================
-- Q16: MACHINE LEARNING APPLICATIONS
-- Multiple selections allowed
-- ============================================================

CREATE TABLE q16_ml_applications (
    id INT AUTO_INCREMENT PRIMARY KEY,

    response_id INT NOT NULL,

    application VARCHAR(100) NOT NULL,

    FOREIGN KEY (response_id)
        REFERENCES questionnaire_responses(id)
        ON DELETE CASCADE,

    INDEX idx_q16_response_id (response_id),
    INDEX idx_q16_application (application)
);


-- ============================================================
-- Q18: PROPOSED SYSTEM FEATURES
-- Multiple selections allowed
-- ============================================================

CREATE TABLE q18_system_features (
    id INT AUTO_INCREMENT PRIMARY KEY,

    response_id INT NOT NULL,

    feature VARCHAR(100) NOT NULL,

    FOREIGN KEY (response_id)
        REFERENCES questionnaire_responses(id)
        ON DELETE CASCADE,

    INDEX idx_q18_response_id (response_id),
    INDEX idx_q18_feature (feature)
);


-- ============================================================
-- Q22: INFORMATION NEEDED WITH HIGH-RISK ALERT
-- Multiple selections allowed
-- ============================================================

CREATE TABLE q22_alert_information (
    id INT AUTO_INCREMENT PRIMARY KEY,

    response_id INT NOT NULL,

    information VARCHAR(100) NOT NULL,

    FOREIGN KEY (response_id)
        REFERENCES questionnaire_responses(id)
        ON DELETE CASCADE,

    INDEX idx_q22_response_id (response_id),
    INDEX idx_q22_information (information)
);
<?php

// echo '<pre>', print_r($_SESSION, true) ?: 'undefined index', '</pre>';die;
    // Check if the user is logged in (you can adjust this condition)
    if (!isset($_SESSION['user_authenticated'])) {
        header("Location: /.."); // Redirect to the login page
        exit();
    }
    
    // trail where activity saved in db
    // Extend the session timeout (adjust as needed)
    // $inactiveTimeout = 1800000; // 30 minutes
    $inactiveTimeout = 300000;
    if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > $inactiveTimeout) {
        session_unset();
        session_destroy();
        header("Location: /.."); // Redirect to the login page
        exit();
    }

    // Update the last activity timestamp
    $_SESSION['last_activity'] = time();
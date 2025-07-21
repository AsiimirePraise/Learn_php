<?php
// Declare time-based greeting function
function timeBasedGreeting() {
    $hour = date('G'); // Hour in 24-hour format (0–23)
    if ($hour < 12) {
        return "Good morning";
    } elseif ($hour < 17) {
        return "Good afternoon";
    } else {
        return "Good evening";
    }
}

// Log the time a user has been logged in
function timeLog($startTime) {
    $currentTime = time();
    $timeLoggedIn = ($currentTime - $startTime) / 3600; // Convert seconds to hours
    return round($timeLoggedIn, 2); // Rounded for neat display
}

// Welcome user based on their role and time
function welcomeUser($role, $startTime) {
    $greeting = timeBasedGreeting();
    $timeLoggedIn = timeLog($startTime);

    switch ($role) {
        case 'admin':
            return "$greeting, Admin! You have been logged in for $timeLoggedIn hours.";
        case 'user':
            return "$greeting, User! You have been logged in for $timeLoggedIn hours.";
        case 'guest':
            return "$greeting, Guest! You have been logged in for $timeLoggedIn hours.";
        default:
            return "$greeting! Role not recognized.";
    }
}

// Load dashboard based on role
function loadDashboard($role) {
    switch ($role) {
        case 'admin':
            include 'admin-dashboard.php';
            break;
        case 'user':
            include 'user-dashboard.php';
            break;
        case 'guest':
            include 'guest-dashboard.php';
            break;
        default:
            echo "Dashboard not available for this role.";
    }
}
?>

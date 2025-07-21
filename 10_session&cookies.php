<?php
// Question 1 & 2: Page view counter using cookies with milestones and reset

session_start(); // for Q3 and Q4 later

// Q1: Count how many times the user has viewed the page
if (isset($_COOKIE['page_views'])) {
    $pageViews = $_COOKIE['page_views'] + 1;
    setcookie('page_views', $pageViews, time() + 3600); // Update cookie (1 hour lifetime)
} else {
    $pageViews = 1;
    setcookie('page_views', $pageViews, time() + 3600); // Set new cookie
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Page View Tracker</title>
</head>
<body>
    <h1>Q1: Number of Views: <?= $pageViews ?></h1>

    <?php
    if ($pageViews == 5) {
        echo "<p> Q2: Special message for 5 views!</p>";
    } elseif ($pageViews == 10) {
        echo "<p> Q2: Wow! 10 views already!</p>";
    } elseif ($pageViews == 15) {
        echo "<p> Q2: 15 views! You're really dedicated!</p>";
    } elseif ($pageViews == 20) {
        setcookie('page_views', '', time() - 3600); // Delete cookie to reset
        echo "<p> Q2: Cookie deleted. View count has been reset.</p>";
    }
    ?>
</body>
</html>

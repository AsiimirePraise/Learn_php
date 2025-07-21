<?php

// Q1: Fixing the syntax error in the say_hello function
// Original error: "syntax error, unexpected token 'global'"
// Fix: Declare global variable properly before using it

$name = 'Umberto';
function say_hello() {
    global $name;
    print 'Hello, ';
    print $name;
}
say_hello();


// Q2: Modified validate_form() to log submitted parameters
function validate_form() {
    foreach ($_POST as $key => $value) {
        error_log("Submitted: $key => $value");
    }
    $errors = [];
    if (empty($_POST['name'])) {
        $errors[] = 'Name is required';
    }
    return $errors;
}


// Q3: Database error handler
function handle_db_error($message, $exception) {
    // Log detailed error
    error_log("DB ERROR: $message: " . $exception->getMessage());
    // Display generic message
    echo "<p>Something went wrong. Please try again later.</p>";
    exit();
}

try {
    $db = new PDO('sqlite:/tmp/restaurant.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    handle_db_error("Connection failed", $e);
}


// Q4: Fixed program to list customers alphabetically by name
try {
    // Get dish names
    $dish_names = [];
    $res = $db->query('SELECT dish_id, dish_name FROM dishes');
    foreach ($res->fetchAll() as $row) {
        $dish_names[$row['dish_id']] = $row['dish_name'];
    }

    // Get customers ordered by name
    $res = $db->query('SELECT customer_id, customer_name, phone, favorite_dish_id FROM customers ORDER BY customer_name ASC');
    $customers = $res->fetchAll();

    if (count($customers) === 0) {
        print "No customers.";
    } else {
        print '<table border="1">';
        print '<tr><th>ID</th><th>Name</th><th>Phone</th><th>Favorite Dish</th></tr>';
        foreach ($customers as $customer) {
            $dish_name = $dish_names[$customer['favorite_dish_id']] ?? 'Unknown';
            printf("<tr><td>%d</td><td>%s</td><td>%s</td><td>%s</td></tr>\n",
                $customer['customer_id'],
                htmlentities($customer['customer_name']),
                htmlentities($customer['phone']),
                htmlentities($dish_name));
        }
        print '</table>';
    }

} catch (PDOException $e) {
    handle_db_error("Query failed", $e);
}

?>

<?php
// Database connection
$db = new mysqli('localhost', 'root', '', 'practice1');
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Create table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS dishes (
    dish_id INT AUTO_INCREMENT PRIMARY KEY,
    dish_name VARCHAR(255) NOT NULL,
    price DECIMAL(4,2) NOT NULL,
    is_spicy INT NOT NULL
)";
$db->query($createTableQuery);

// Insert sample data
$insertDataQuery = "INSERT IGNORE INTO dishes (dish_id, dish_name, price, is_spicy) VALUES
    (1, 'Walnut Bun', 1.00, 0),
    (2, 'Cashew Nuts and White Mushrooms', 4.95, 0),
    (3, 'Dried Mulberries', 3.00, 0),
    (4, 'Eggplant with Chili Sauce', 6.50, 1),
    (5, 'Red Bean Bun', 1.00, 0),
    (6, 'General Tso\'s Chicken', 5.50, 1)";
$db->query($insertDataQuery);

// ---------- Question 1: List all dishes sorted by price ----------
echo "<h2>All Dishes (Sorted by Price)</h2>";
$result = $db->query("SELECT dish_name, price FROM dishes ORDER BY price");
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Dish: " . htmlspecialchars($row["dish_name"]) . " - Price: $" . number_format($row["price"], 2) . "</li>";
    }
    echo "</ul>";
} else {
    echo "No dishes found.";
}

// ---------- Question 2: Price filter form + results ----------
?>

<h2>Find Dishes Priced At Least...</h2>
<form method="get">
    <label for="price">Minimum Price:</label>
    <input type="number" id="price" name="price" step="0.01" required>
    <input type="submit" value="Submit">
</form>

<?php
if (isset($_GET['price'])) {
    $minPrice = floatval($_GET['price']);
    $stmt = $db->prepare("SELECT dish_name, price FROM dishes WHERE price >= ?");
    $stmt->bind_param("d", $minPrice);
    $stmt->execute();
    $result = $stmt->get_result();

    echo "<h3>Dishes with Price ≥ $" . number_format($minPrice, 2) . "</h3>";
    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>Dish: " . htmlspecialchars($row["dish_name"]) . " - Price: $" . number_format($row["price"], 2) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "No dishes found at or above that price.";
    }
}


// ---------- Part 3: Dish Selection Form ----------
echo "<h2>Select a Dish to View Details</h2>";
$dishResult = $db->query("SELECT dish_id, dish_name FROM dishes ORDER BY dish_name");

echo '<form method="get">';
echo '<label for="selected_dish">Choose a dish:</label>';
echo '<select name="selected_dish" id="selected_dish">';
while ($row = $dishResult->fetch_assoc()) {
    echo '<option value="' . $row["dish_id"] . '">' . htmlspecialchars($row["dish_name"]) . '</option>';
}
echo '</select>';
echo '<input type="submit" value="Show Details">';
echo '</form>';

// Display selected dish details
if (isset($_GET['selected_dish'])) {
    $dishId = intval($_GET['selected_dish']);
    $stmt = $db->prepare("SELECT * FROM dishes WHERE dish_id = ?");
    $stmt->bind_param("i", $dishId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($dish = $result->fetch_assoc()) {
        echo "<h3>Dish Details:</h3>";
        echo "ID: " . $dish['dish_id'] . "<br>";
        echo "Name: " . htmlspecialchars($dish['dish_name']) . "<br>";
        echo "Price: $" . number_format($dish['price'], 2) . "<br>";
        echo "Spicy: " . ($dish['is_spicy'] ? "Yes" : "No") . "<br>";
    } else {
        echo "Dish not found.";
    }
}

// ---------- Part 4: Customer Table & Insert Form ----------

// Create customers table if not exists
$createCustomerTable = "CREATE TABLE IF NOT EXISTS customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    phone VARCHAR(50),
    favorite_dish_id INT,
    FOREIGN KEY (favorite_dish_id) REFERENCES dishes(dish_id)
)";
$db->query($createCustomerTable);

// Form to add new customer
echo "<h2>Add a New Customer</h2>";
$dishes = $db->query("SELECT dish_id, dish_name FROM dishes ORDER BY dish_name");

echo '<form method="post">';
echo '<label for="customer_name">Name:</label><br>';
echo '<input type="text" name="customer_name" id="customer_name" required><br>';

echo '<label for="phone">Phone:</label><br>';
echo '<input type="text" name="phone" id="phone"><br>';

echo '<label for="favorite_dish">Favorite Dish:</label><br>';
echo '<select name="favorite_dish" id="favorite_dish">';
while ($row = $dishes->fetch_assoc()) {
    echo '<option value="' . $row["dish_id"] . '">' . htmlspecialchars($row["dish_name"]) . '</option>';
}
echo '</select><br>';

echo '<input type="submit" name="add_customer" value="Add Customer">';
echo '</form>';

// Insert customer on form submit
if (isset($_POST['add_customer'])) {
    $name = $_POST['customer_name'];
    $phone = $_POST['phone'];
    $fav_dish_id = intval($_POST['favorite_dish']);

    $stmt = $db->prepare("INSERT INTO customers (name, phone, favorite_dish_id) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $name, $phone, $fav_dish_id);

    if ($stmt->execute()) {
        echo "<p>Customer added successfully!</p>";
    } else {
        echo "<p>Error adding customer: " . $stmt->error . "</p>";
    }
}

?>
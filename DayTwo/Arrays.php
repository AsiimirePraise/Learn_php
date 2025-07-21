<!-- arrays 
associative arrays
indexed arrays
multidimensional arrays
array functions
  -->

<?php

// Indexed Array
$fruits = array("Apple", "Banana", "Cherry");
echo "Indexed Array: <br>";
foreach ($fruits as $fruit) {
    echo $fruit . " ";
}
echo "\n";
// Associative Array
$person = array("name" => "Praise", "age" => 30, "city" => "New York");
echo "Associative Array: <br>";
foreach ($person as $key => $value) {
    echo $key . ": " . $value . " <br>";
}
echo "<br>";

// Multidimensional Array
$employees = array(
    array("name" => "Praise", "position" => "Developer"),
    array("name" => "Peron", "position" => "Designer"),
    array("name" => "Cherry", "position" => "Manager")
);
// check if an element exists in an associative array
if (array_key_exists('Shrimp Puffs', $employees)) {
    echo "Yes, we have Shrimp Puffs";
} else {
    echo "No, we don't have Shrimp Puffs <br>";
}

// $employees[]='praise';
echo "Multidimensional Array: <br>";
foreach ($employees as $employee) {
    echo "Name: " . $employee['name'] . ", Position: " . $employee['position'] . "<br>";
}


#we use in _array to check if an element exists in an indexed array
$vegetables = array("Carrot", "Broccoli", "Spinach");
if (in_array("Carrot", $vegetables)) {
    echo "Carrot is in the vegetable list.<br>";
} else {
    echo "Carrot is not in the vegetable list.<br>";
}


#finding an element with a particular value in an associative array 
# we use array_search to find the key of an element with a specific value
$searchValue = "Alice";
$foundKey = array_search($searchValue, array_column($employees, 'name'));
if ($foundKey !== false) {
    echo "Found $searchValue at index: $foundKey<br>";
} else {
    echo "$searchValue not found.<br>";
}


#modifying an array
$fruits[] = "Orange"; // Add an element
echo "Modified Indexed Array: <br>";
foreach ($fruits as $fruit) {
    echo $fruit . " ";
}
echo "<br>";


#use of the implode function to join array elements into a string
$vegetableString = implode(", ", $vegetables);
echo "Vegetables: " . $vegetableString . "<br>";
echo "<br>";

$letters = array('A', 'B', 'C', 'D');
print implode('', $letters);
echo "<br>";

#explode-turns a string into an array
$sentence = "PHP is a popular scripting language.";
$words = explode(" ", $sentence);
print_r($words);
echo "<br>";
echo "Words in the sentence: <br>";
foreach ($words as $word) {
    echo $word . "<br>";
}


#sorting an array
$numbers = array(5, 2, 8, 1, 4);
sort($numbers); // Sort the array in ascending order
echo "Sorted Numbers: <br>";
foreach ($numbers as $number) {
    echo $number . " ";
}

#descending order
rsort($numbers); // Sort the array in descending order
echo "<br>Sorted Numbers in Descending Order: <br>";
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";

#sorting in associative arrays
$people = array(
    array("name" => "Praise", "age" => 25),
    array("name" => "Pearl", "age" => 30),
    array("name" => "Peron", "age" => 20)
);
usort($people, function ($a, $b) {
    return $a['age'] <=> $b['age']; // Sort by age
});
echo "<br>Sorted People by Age: <br>";
foreach ($people as $person) {
    echo "Name: " . $person['name'] . ", Age: " . $person['age'] . "<br>";
}


#sorting in multidimensional arrays
$products = array(
    array("name" => "Laptop", "price" => 1000),
    array("name" => "Phone", "price" => 500),
    array("name" => "Tablet", "price" => 300)
);
usort($products, function ($a, $b) {
    return $a['price'] <=> $b['price']; // Sort by price
});
echo "<br>Sorted Products by Price: <br>";
foreach ($products as $product) {
    echo "Product: " . $product['name'] . ", Price: $" . $product['price'] . "<br>";
}

#munipulating multidimensional arrays
$students = array(
    array("name" => "Alice", "grade" => 85),
    array("name" => "Bob", "grade" => 90),
    array("name" => "Charlie", "grade" => 78)
);
// Add a new student
$students[] = array("name" => "David", "grade" => 88);
echo "<br>Students after adding David: <br>";
foreach ($students as $student) {
    echo "Name: " . $student['name'] . ", Grade: " . $student['grade'] . "<br>";
}

// Remove a student
$removeIndex = array_search("Bob", array_column($students, 'name'));
if ($removeIndex !== false) {
    unset($students[$removeIndex]);
}
echo "<br>Students after removing Bob: <br>";
foreach ($students as $student) {
    echo "Name: " . $student['name'] . ", Grade: " . $student['grade'] . "<br>";
}


// Array Functions
$numbers = array(1, 2, 3, 4, 5);
echo "Array Functions: <br>";
echo "Count: " . count($numbers) . "<br>"; // Count elements
echo "Sum: " . array_sum($numbers) . "<br>"; // Sum of elements
echo "Max: " . max($numbers) . "<br>"; // Maximum value
echo "Min: " . min($numbers) . "<br>"; // Minimum value
echo "Sorted: ";
sort($numbers);
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";
echo "Reversed: <br>";
$reversed = array_reverse($numbers);
foreach ($reversed as $number) {
    echo $number . " <br>";
}
// loop through an indexed array

$dinner = array(
    'Sweet Corn and Asparagus',
    'Lemon Chicken',
    'Braised Bamboo Fungus'
);
for ($i = 0, $num_dishes = count($dinner); $i < $num_dishes; $i++) {
    print "Dish number $i is $dinner[$i]\n";
}
?>
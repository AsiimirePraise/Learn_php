 <!-- According to the US Census Bureau, the 10 largest American cities (by popula
tion) in 2010 were as follows:
 • New York, NY (8,175,133 people)
 • Los Angeles, CA (3,792,621)
 • Chicago, IL (2,695,598)
 • Houston, TX (2,100,263)
 • Philadelphia, PA (1,526,006)
 • Phoenix, AZ (1,445,632)
 • San Antonio, TX (1,327,407)
 • San Diego, CA (1,307,402)
 • Dallas, TX (1,197,816)
 • San Jose, CA (945,942)
 Define an array (or arrays) that holds this information about locations and popu
lations. Print a table of locations and population information that includes the
 total population in all 10 cities.
 2. Modify your solution to the previous exercise so that the rows in the result table
 are ordered by population. Then modify your solution so that the rows are
 ordered by city name.
 3. Modify your solution to the first exercise so that the table also contains rows that
 hold state population totals for each state represented in the list of cities.
 4. For each of the following kinds of information, state how you would store it in an
 array and then give sample code that creates such an array with a few elements.
 For example, for the first item, you might say, “An associative array whose key is
 78 
| 
Chapter 4: Groups of Data: Working with Arrays
the student’s name and whose value is an associative array of grade and ID num
ber,” as in the following:
 $students = [ 'James D. McCawley' => [ 'grade' => 'A+','id' => 271231 ],
 'Buwei Yang Chao' => [ 'grade' => 'A', 'id' => 818211] ];
 a. The grades and ID numbers of students in a class
 b. How many of each item in a store inventory are in stock
 c. School lunches for a week: the different parts of each meal (entrée, side dish,
 drink, etc.) and the cost for each day
 d. The names of people in your family
 e. The names, ages, and relationship to you of people in your family -->


 #question One 
<?php

// Define an array of cities and their populations
$cities = array(        
    array("city" => "New York", "population" => 8175133),
    array("city" => "Los Angeles", "population" => 3792621),
    array("city" => "Chicago", "population" => 2695598),
    array("city" => "Houston", "population" => 2100263),
    array("city" => "Philadelphia", "population" => 1526006),
    array("city" => "Phoenix", "population" => 1445632),
    array("city" => "San Antonio", "population" => 1327407),
    array("city" => "San Diego", "population" => 1307402),
    array("city" => "Dallas", "population" => 1197816),
    array("city" => "San Jose", "population" => 945942)
);

// Calculate total population
$totalPopulation = 0;
foreach ($cities as $city) {
    $totalPopulation += $city['population'];
}   
echo "<h2>City Population Table</h2>";
echo "<table border='1'>
<tr><th>City</th><th>Population</th></tr>";
foreach ($cities as $city) {
    echo "<tr><td>" . $city['city'] . "</td><td>" . number_format($city['population']) . "</td></tr>";
}
echo "<tr><td><strong>Total</strong></td><td><strong>" . number_format($totalPopulation) . "</strong></td></tr>";
echo "</table>";
echo "<br>";

#sort by population
usort($cities, function ($a, $b) {
    return $b['population'] <=> $a['population']; // Sort by population in descending order
});
echo "<h2>City Population Sorted by Population</h2>";
echo "<table border='1'>
<tr><th>City</th><th>Population</th></tr>";
foreach ($cities as $city) {
    echo "<tr><td>" . $city['city'] . "</td><td>" . number_format($city['population']) . "</td></tr>";
}
echo "<tr><td><strong>Total</strong></td><td><strong>" . number_format($totalPopulation) . "</strong></td></tr>";
echo "</table>";


#sort by city name
usort($cities, function ($a, $b) {
    return strcmp($a['city'], $b['city']); // Sort by city name in ascending order
});
echo "<h2>City Population Sorted by City Name</h2>";
echo "<table border='1'>
<tr><th>City</th><th>Population</th></tr>";
foreach ($cities as $city) {
    echo "<tr><td>" . $city['city'] . "</td><td>" . number_format($city['population']) . "</td></tr>";
}
echo "<tr><td><strong>Total</strong></td><td><strong>" . number_format($totalPopulation) . "</strong></td></tr>";
echo "</table>";


#question Two
// Define an array of states and their populations  
$states = array(
    array("state" => "New York", "population" => 19378102),
    array("state" => "California", "population" => 39538223),
    array("state" => "Texas", "population" => 29145505),
    array("state" => "Florida", "population" => 21538187),
    array("state" => "Illinois", "population" => 12812508)
);
// Calculate total state population
$totalStatePopulation = 0;
foreach ($states as $state) {
    $totalStatePopulation += $state['population'];
}
echo "<h2>State Population Table</h2>";
echo "<table border='1'>

<tr><th>State</th><th>Population</th></tr>";
foreach ($states as $state) {
    echo "<tr><td>" . $state['state'] . "</td><td>" . number_format($state['population']) . "</td></tr>";
}
echo "<tr><td><strong>Total</strong></td><td><strong>" . number_format($totalStatePopulation) . "</strong></td></tr>";
echo "</table>";

#question 4
// a. Grades and ID numbers of students in a class
$students = array(
    "James D. McCawley" => array("grade" => "A+", "id" => 271231),
    "Buwei Yang Chao" => array("grade" => "A", "id" => 818211)
);
echo "<h2>Students Grades and IDs</h2>";
echo "<table border='1'>

<tr><th>Student Name</th><th>Grade</th><th>ID</th></tr>";
foreach ($students as $name => $info) {

    echo "<tr><td>" . $name . "</td><td>" . $info['grade'] . "</td><td>" . $info['id'] . "</td></tr>";
}
echo "</table>";
// b. How many of each item in a store inventory are in stock
$inventory = array(
    "Apples" => 50,
    "Bananas" => 30,
    "Oranges" => 20
);
echo "<h2>Store Inventory</h2>";
echo "<table border='1'>
<tr><th>Item</th><th>Quantity in Stock</th></tr>";
foreach ($inventory as $item => $quantity) {
    echo "<tr><td>" . $item . "</td><td>" . $quantity . "</td></tr>";
}

echo "</table>";
?>
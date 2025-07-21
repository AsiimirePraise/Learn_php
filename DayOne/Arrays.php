<?php
$skills = ["PHP", "JavaScript", "HTML", "CSS"]; #one dimensional array

#arrays
echo "My skills are:<br>";
foreach ($skills as $skill) {
    echo $skill . "<br>";
}
echo "<b>";
# Example usage of functions
echo "My skills are:<br>";
foreach ($skills as $skill) {
    echo $skill . "<br>";
}
#asssociative array
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];
echo "Person details:<br>";
foreach ($person as $key => $value) {
    echo "$key: $value<br>";
}

#multidimensional array
$students = [
    ["name" => "Alice", "age" => 20],
    ["name" => "Bob", "age" => 22],
    ["name" => "Charlie", "age" => 21]
];
echo "Students details:<br>";
foreach ($students as $student) {
    echo "Name: " . $student["name"] . ", Age: " . $student["age"] . "<br>";
}
echo "<br>";
#array functions
echo "Total number of skills: " . count($skills) . "<br>";
echo "Skills in reverse order: " . implode(", ", array_reverse($skills)) .
    "<br>";
$sortedSkills = $skills;
sort($sortedSkills);
echo "Skills sorted alphabetically: " . implode(", ", $sortedSkills) . "<br>";
shuffle($skills);
echo "Skills in random order: " . implode(", ", $skills) . "<br>";

#update an array
$skills[] = "Python"; // add new skill
echo "Updated skills: " . implode(", ", $skills) . "<br>";
unset($skills[1]); // remove second skill
echo "Skills after removal: " . implode(", ", $skills) . "<br>";

#Access array elements
echo "First skill: " . $skills[0] . "<br>";
echo "Last skill: " . end($skills) . "<br>";
